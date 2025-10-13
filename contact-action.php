<?php
// CONTACT FORM ACTION - No .php extension
// Handles form submission with file upload, saves data, sends email with TO/CC, and redirects

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuration - Updated email addresses
$TO_EMAIL = 'gopikannaps@gmail.com'; // Primary recipient
$CC_EMAIL = 'kannasivamp@gmail.com';  // CC recipient
$BCC_EMAIL = 'kannasivamps@gmail.com'; // BCC recipient
$UPLOAD_DIR = 'uploads/contact_attachments/';

// Create upload directory if it doesn't exist
if (!file_exists($UPLOAD_DIR)) {
    mkdir($UPLOAD_DIR, 0755, true);
}

// Function to save contact data
function saveContactData($name, $phone, $email, $service, $message = '', $fileName = '') {
    $timestamp = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
    
    // Save to JSON file for admin panel
    $contactData = array(
        'id' => uniqid('contact_', true),
        'timestamp' => $timestamp,
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'service' => $service,
        'message' => $message,
        'attachment' => $fileName,
        'ip' => $ip,
        'status' => 'received'
    );
    
    // Append to JSON file
    file_put_contents('contact_submissions.json', json_encode($contactData) . "\n", FILE_APPEND | LOCK_EX);
    
    // Also save to text file for backup
    $textData = "=== NEW CONTACT - $timestamp ===\n";
    $textData .= "Name: $name\n";
    $textData .= "Phone: $phone\n";
    $textData .= "Email: $email\n";
    $textData .= "Service: $service\n";
    $textData .= "Message: $message\n";
    if ($fileName) {
        $textData .= "Attachment: $fileName\n";
    }
    $textData .= "IP: $ip\n";
    $textData .= "=====================================\n\n";
    
    file_put_contents('contact_submissions.txt', $textData, FILE_APPEND | LOCK_EX);
    
    return $contactData['id'];
}

// Function to send email with attachment and CC/BCC - Updated to match reference format
function sendContactEmail($name, $phone, $email, $service, $message = '', $attachmentPath = '') {
    global $TO_EMAIL, $CC_EMAIL, $BCC_EMAIL;
    
    // Sanitize input data
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $service = filter_var($service, FILTER_SANITIZE_STRING);
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    
    $subject = 'Thiyagi Contact Form Submission';
    
    // Create email body - matching reference format
    $body = "New Contact Form Submission\n\n";
    $body .= "Name: $name\n";
    $body .= "Phone: $phone\n";
    $body .= "Email: $email\n";
    $body .= "Service Interested: $service\n";
    if (!empty($message)) {
        $body .= "Message:\n$message\n";
    }
    
    // Basic headers for simple email (no attachment)
    if (empty($attachmentPath) || !file_exists($attachmentPath)) {
        // Mail headers are mandatory for sending email - matching reference format
        $headers = 'From: ' . $email . "\r\n";
        $headers .= 'Cc: ' . $CC_EMAIL . "\r\n";
        $headers .= 'Bcc: ' . $BCC_EMAIL . "\r\n";
        $headers .= 'Reply-To: ' . $email . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        
        return @mail($TO_EMAIL, $subject, $body, $headers);
    }
    
    // Email with attachment - use MIME multipart
    $boundary = md5(uniqid(time()));
    
    $headers = 'From: ' . $email . "\r\n";
    $headers .= 'Cc: ' . $CC_EMAIL . "\r\n";
    $headers .= 'Bcc: ' . $BCC_EMAIL . "\r\n";
    $headers .= 'Reply-To: ' . $email . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";
    
    // Email body with attachment
    $mimeBody = "--{$boundary}\r\n";
    $mimeBody .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $mimeBody .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
    $mimeBody .= $body . "\r\n";
    
    // Add attachment if exists
    if (file_exists($attachmentPath)) {
        $fileName = basename($attachmentPath);
        $fileContent = chunk_split(base64_encode(file_get_contents($attachmentPath)));
        
        $mimeBody .= "--{$boundary}\r\n";
        $mimeBody .= "Content-Type: application/octet-stream; name=\"{$fileName}\"\r\n";
        $mimeBody .= "Content-Transfer-Encoding: base64\r\n";
        $mimeBody .= "Content-Disposition: attachment; filename=\"{$fileName}\"\r\n\r\n";
        $mimeBody .= $fileContent . "\r\n";
    }
    
    $mimeBody .= "--{$boundary}--";
    
    return @mail($TO_EMAIL, $subject, $mimeBody, $headers);
}

// Handle file upload
function handleFileUpload() {
    global $UPLOAD_DIR;
    
    if (!isset($_FILES['attachment']) || $_FILES['attachment']['error'] == UPLOAD_ERR_NO_FILE) {
        return ['success' => true, 'fileName' => '', 'filePath' => ''];
    }
    
    $file = $_FILES['attachment'];
    
    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'error' => 'File upload failed'];
    }
    
    // Validate file size (5MB max)
    $maxSize = 5 * 1024 * 1024; // 5MB in bytes
    if ($file['size'] > $maxSize) {
        return ['success' => false, 'error' => 'File size exceeds 5MB limit'];
    }
    
    // Validate file type
    $allowedExtensions = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'txt'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if (!in_array($fileExtension, $allowedExtensions)) {
        return ['success' => false, 'error' => 'Invalid file type'];
    }
    
    // Generate unique filename
    $uniqueFileName = date('Ymd_His') . '_' . uniqid() . '.' . $fileExtension;
    $uploadPath = $UPLOAD_DIR . $uniqueFileName;
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        return [
            'success' => true,
            'fileName' => $file['name'],
            'filePath' => $uploadPath
        ];
    } else {
        return ['success' => false, 'error' => 'Failed to save file'];
    }
}

// Main form processing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $service = trim($_POST['service'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($phone) || empty($email) || empty($service)) {
        echo "<script>alert('Please fill all required fields'); window.history.back();</script>";
        exit;
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address'); window.history.back();</script>";
        exit;
    }
    
    // Handle file upload
    $uploadResult = handleFileUpload();
    
    if (!$uploadResult['success'] && isset($uploadResult['error'])) {
        echo "<script>alert('{$uploadResult['error']}'); window.history.back();</script>";
        exit;
    }
    
    $fileName = $uploadResult['fileName'] ?? '';
    $filePath = $uploadResult['filePath'] ?? '';
    
    // Save contact data (ALWAYS save data first - even if email fails)
    $contactId = saveContactData($name, $phone, $email, $service, $message, $fileName);
    
    // Try to send email with attachment
    $emailSent = false;
    $emailError = '';
    
    try {
        $emailSent = sendContactEmail($name, $phone, $email, $service, $message, $filePath);
    } catch (Exception $e) {
        $emailError = $e->getMessage();
    }
    
    // Update status in JSON file based on email result
    if (file_exists('contact_submissions.json')) {
        $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES);
        if (!empty($lines)) {
            $lastLine = end($lines);
            $data = json_decode($lastLine, true);
            if ($data && $data['id'] === $contactId) {
                $data['status'] = $emailSent ? 'email_sent' : 'email_failed';
                if (!$emailSent && $emailError) {
                    $data['email_error'] = $emailError;
                }
                $lines[count($lines) - 1] = json_encode($data);
                file_put_contents('contact_submissions.json', implode("\n", $lines) . "\n", LOCK_EX);
            }
        }
    }
    
    // ALWAYS redirect to thank you page (data is saved regardless of email status)
    // This ensures user gets confirmation even if email fails
    header("Location: thankyou");
    exit();
    
} else {
    // If not POST request, redirect to contact page
    header('Location: contact');
    exit;
}
?>
