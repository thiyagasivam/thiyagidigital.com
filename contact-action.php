<?php
// CONTACT FORM ACTION - No .php extension
// Handles form submission with file upload, saves data, sends email with TO/CC, and redirects

// Configuration
$TO_EMAIL = 'info@thiyagidigital.com';
$CC_EMAIL = 'kannasivamps@gmail.com';
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

// Function to send email with attachment and CC
function sendContactEmail($name, $phone, $email, $service, $message = '', $attachmentPath = '') {
    global $TO_EMAIL, $CC_EMAIL;
    
    $subject = "New Contact Form Submission - $service";
    $boundary = md5(time());
    
    // Email headers
    $headers = "From: noreply@thiyagidigital.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Cc: $CC_EMAIL\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";
    
    // Email body
    $body = "--{$boundary}\r\n";
    $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    
    $body .= "NEW CONTACT FORM SUBMISSION\r\n";
    $body .= "============================\r\n\r\n";
    $body .= "Name: $name\r\n";
    $body .= "Phone: $phone\r\n";
    $body .= "Email: $email\r\n";
    $body .= "Service Interested: $service\r\n\r\n";
    
    if (!empty($message)) {
        $body .= "Message:\r\n$message\r\n\r\n";
    }
    
    $body .= "============================\r\n";
    $body .= "Submitted on: " . date('d M Y, h:i A') . "\r\n";
    $body .= "IP Address: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\r\n";
    
    // Add attachment if exists
    if (!empty($attachmentPath) && file_exists($attachmentPath)) {
        $fileName = basename($attachmentPath);
        $fileContent = file_get_contents($attachmentPath);
        $fileContent = chunk_split(base64_encode($fileContent));
        
        $body .= "\r\n--{$boundary}\r\n";
        $body .= "Content-Type: application/octet-stream; name=\"{$fileName}\"\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n";
        $body .= "Content-Disposition: attachment; filename=\"{$fileName}\"\r\n\r\n";
        $body .= $fileContent . "\r\n";
    }
    
    $body .= "--{$boundary}--";
    
    return @mail($TO_EMAIL, $subject, $body, $headers);
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
    
    // Save contact data (always save regardless of email success)
    $contactId = saveContactData($name, $phone, $email, $service, $message, $fileName);
    
    // Try to send email with attachment
    $emailSent = sendContactEmail($name, $phone, $email, $service, $message, $filePath);
    
    // Update status in JSON file if email was sent
    if ($emailSent && file_exists('contact_submissions.json')) {
        $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES);
        if (!empty($lines)) {
            $lastLine = end($lines);
            $data = json_decode($lastLine, true);
            if ($data && $data['id'] === $contactId) {
                $data['status'] = 'email_sent';
                $lines[count($lines) - 1] = json_encode($data);
                file_put_contents('contact_submissions.json', implode("\n", $lines) . "\n", LOCK_EX);
            }
        }
    }
    
    // Always redirect to thank you page (without .php)
    header('Location: thankyou');
    exit;
    
} else {
    // If not POST request, redirect to contact page
    header('Location: contact');
    exit;
}
?>
