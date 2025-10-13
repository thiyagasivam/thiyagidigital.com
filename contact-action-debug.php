<?php
// DEBUG VERSION - Contact Form Action
// This will help us see what's happening

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log all activity
$debug_log = "debug_contact_" . date('Y-m-d') . ".log";
file_put_contents($debug_log, "\n=== DEBUG SESSION - " . date('Y-m-d H:i:s') . " ===\n", FILE_APPEND);
file_put_contents($debug_log, "Request Method: " . $_SERVER['REQUEST_METHOD'] . "\n", FILE_APPEND);
file_put_contents($debug_log, "POST Data: " . print_r($_POST, true) . "\n", FILE_APPEND);
file_put_contents($debug_log, "FILES Data: " . print_r($_FILES, true) . "\n", FILE_APPEND);

// Configuration
$TO_EMAIL = 'info@thiyagidigital.com';
$CC_EMAIL = 'kannasivamps@gmail.com';
$UPLOAD_DIR = 'uploads/contact_attachments/';

// Create upload directory if it doesn't exist
if (!file_exists($UPLOAD_DIR)) {
    mkdir($UPLOAD_DIR, 0755, true);
    file_put_contents($debug_log, "Created upload directory: $UPLOAD_DIR\n", FILE_APPEND);
}

// Function to save contact data
function saveContactData($name, $phone, $email, $service, $message = '', $fileName = '') {
    global $debug_log;
    
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
    
    file_put_contents($debug_log, "Saving contact data: " . print_r($contactData, true) . "\n", FILE_APPEND);
    
    // Append to JSON file
    $jsonResult = file_put_contents('contact_submissions.json', json_encode($contactData) . "\n", FILE_APPEND | LOCK_EX);
    file_put_contents($debug_log, "JSON save result: " . ($jsonResult ? 'Success' : 'Failed') . "\n", FILE_APPEND);
    
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
    
    $txtResult = file_put_contents('contact_submissions.txt', $textData, FILE_APPEND | LOCK_EX);
    file_put_contents($debug_log, "TXT save result: " . ($txtResult ? 'Success' : 'Failed') . "\n", FILE_APPEND);
    
    return $contactData['id'];
}

// Function to send email with attachment and CC
function sendContactEmail($name, $phone, $email, $service, $message = '', $attachmentPath = '') {
    global $TO_EMAIL, $CC_EMAIL, $debug_log;
    
    file_put_contents($debug_log, "Attempting to send email to: $TO_EMAIL and CC: $CC_EMAIL\n", FILE_APPEND);
    
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
        
        file_put_contents($debug_log, "Email includes attachment: $fileName\n", FILE_APPEND);
    }
    
    $body .= "--{$boundary}--";
    
    $mailResult = @mail($TO_EMAIL, $subject, $body, $headers);
    file_put_contents($debug_log, "Email send result: " . ($mailResult ? 'Success' : 'Failed') . "\n", FILE_APPEND);
    
    return $mailResult;
}

// Handle file upload
function handleFileUpload() {
    global $UPLOAD_DIR, $debug_log;
    
    file_put_contents($debug_log, "Checking file upload...\n", FILE_APPEND);
    
    if (!isset($_FILES['attachment']) || $_FILES['attachment']['error'] == UPLOAD_ERR_NO_FILE) {
        file_put_contents($debug_log, "No file uploaded\n", FILE_APPEND);
        return ['success' => true, 'fileName' => '', 'filePath' => ''];
    }
    
    $file = $_FILES['attachment'];
    file_put_contents($debug_log, "File details: " . print_r($file, true) . "\n", FILE_APPEND);
    
    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        file_put_contents($debug_log, "Upload error: " . $file['error'] . "\n", FILE_APPEND);
        return ['success' => false, 'error' => 'File upload failed'];
    }
    
    // Validate file size (5MB max)
    $maxSize = 5 * 1024 * 1024; // 5MB in bytes
    if ($file['size'] > $maxSize) {
        file_put_contents($debug_log, "File too large: " . $file['size'] . " bytes\n", FILE_APPEND);
        return ['success' => false, 'error' => 'File size exceeds 5MB limit'];
    }
    
    // Validate file type
    $allowedExtensions = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'txt'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if (!in_array($fileExtension, $allowedExtensions)) {
        file_put_contents($debug_log, "Invalid file type: $fileExtension\n", FILE_APPEND);
        return ['success' => false, 'error' => 'Invalid file type'];
    }
    
    // Generate unique filename
    $uniqueFileName = date('Ymd_His') . '_' . uniqid() . '.' . $fileExtension;
    $uploadPath = $UPLOAD_DIR . $uniqueFileName;
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        file_put_contents($debug_log, "File uploaded successfully: $uploadPath\n", FILE_APPEND);
        return [
            'success' => true,
            'fileName' => $file['name'],
            'filePath' => $uploadPath
        ];
    } else {
        file_put_contents($debug_log, "Failed to move uploaded file\n", FILE_APPEND);
        return ['success' => false, 'error' => 'Failed to save file'];
    }
}

// Main form processing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    file_put_contents($debug_log, "Processing POST request\n", FILE_APPEND);
    
    // Get form data
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $service = trim($_POST['service'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    file_put_contents($debug_log, "Form data - Name: $name, Phone: $phone, Email: $email, Service: $service\n", FILE_APPEND);
    
    // Validate required fields
    if (empty($name) || empty($phone) || empty($email) || empty($service)) {
        file_put_contents($debug_log, "Validation failed - missing required fields\n", FILE_APPEND);
        echo "<script>alert('Please fill all required fields'); window.history.back();</script>";
        exit;
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        file_put_contents($debug_log, "Validation failed - invalid email format\n", FILE_APPEND);
        echo "<script>alert('Please enter a valid email address'); window.history.back();</script>";
        exit;
    }
    
    file_put_contents($debug_log, "Validation passed\n", FILE_APPEND);
    
    // Handle file upload
    $uploadResult = handleFileUpload();
    
    if (!$uploadResult['success'] && isset($uploadResult['error'])) {
        file_put_contents($debug_log, "File upload failed: " . $uploadResult['error'] . "\n", FILE_APPEND);
        echo "<script>alert('{$uploadResult['error']}'); window.history.back();</script>";
        exit;
    }
    
    $fileName = $uploadResult['fileName'] ?? '';
    $filePath = $uploadResult['filePath'] ?? '';
    
    // Save contact data (always save regardless of email success)
    $contactId = saveContactData($name, $phone, $email, $service, $message, $fileName);
    file_put_contents($debug_log, "Contact saved with ID: $contactId\n", FILE_APPEND);
    
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
                file_put_contents($debug_log, "Updated status to email_sent\n", FILE_APPEND);
            }
        }
    }
    
    file_put_contents($debug_log, "Processing complete - redirecting to thankyou\n", FILE_APPEND);
    
    // Show success message and redirect
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Contact Form Submitted</title>
        <style>
            body { font-family: Arial, sans-serif; padding: 20px; text-align: center; }
            .success { background: #d4edda; color: #155724; padding: 20px; border-radius: 10px; margin: 20px auto; max-width: 600px; }
            .info { background: #d1ecf1; color: #0c5460; padding: 15px; border-radius: 5px; margin: 10px auto; max-width: 600px; }
            .debug { background: #f8f9fa; color: #495057; padding: 10px; border-radius: 5px; margin: 10px auto; max-width: 600px; font-size: 12px; }
        </style>
    </head>
    <body>
        <div class='success'>
            <h2>✅ Contact Form Submitted Successfully!</h2>
            <p>Thank you for contacting us. We have received your message and will get back to you soon.</p>
        </div>
        
        <div class='info'>
            <strong>Submitted Details:</strong><br>
            Name: " . htmlspecialchars($name) . "<br>
            Email: " . htmlspecialchars($email) . "<br>
            Service: " . htmlspecialchars($service) . "<br>
            " . ($fileName ? "Attachment: " . htmlspecialchars($fileName) . "<br>" : "") . "
        </div>
        
        <div class='info'>
            <strong>Status:</strong><br>
            Data Saved: ✅ Yes<br>
            Email Sent: " . ($emailSent ? '✅ Yes' : '❌ Failed (but data is saved)') . "<br>
            Contact ID: " . htmlspecialchars($contactId) . "
        </div>
        
        <div class='debug'>
            <strong>Debug Info:</strong><br>
            Check debug log: debug_contact_" . date('Y-m-d') . ".log<br>
            Admin panel: <a href='admin_contacts.php?pass=thiyagi2024'>View submissions</a>
        </div>
        
        <script>
            setTimeout(function() {
                window.location.href = 'thankyou';
            }, 5000);
        </script>
        
        <p><a href='thankyou'>Continue to Thank You Page →</a></p>
        <p><a href='contact'>Submit Another Form ←</a></p>
    </body>
    </html>";
    
} else {
    file_put_contents($debug_log, "Not a POST request - redirecting to contact\n", FILE_APPEND);
    // If not POST request, redirect to contact page
    header('Location: contact');
    exit;
}
?>