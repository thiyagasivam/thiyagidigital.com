<?php
// SIMPLE CONTACT FORM ACTION - No .php extension
// Handles form submission, saves data, sends email, and redirects

// Function to save contact data
function saveContactData($name, $phone, $email, $service, $message = '') {
    $timestamp = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
    
    // Save to JSON file for admin panel
    $contactData = array(
        'timestamp' => $timestamp,
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'service' => $service,
        'message' => $message,
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
    $textData .= "IP: $ip\n";
    $textData .= "=====================================\n\n";
    
    file_put_contents('contact_submissions.txt', $textData, FILE_APPEND | LOCK_EX);
    
    return true;
}

// Function to send simple email
function sendContactEmail($name, $phone, $email, $service, $message = '') {
    $to = 'info@thiyagidigital.com';
    $subject = "New Contact Form Submission - $service";
    
    $emailBody = "New Contact Form Submission\n\n";
    $emailBody .= "Name: $name\n";
    $emailBody .= "Phone: $phone\n";
    $emailBody .= "Email: $email\n";
    $emailBody .= "Service: $service\n";
    
    if (!empty($message)) {
        $emailBody .= "Message: $message\n";
    }
    
    $emailBody .= "\nSubmitted on: " . date('Y-m-d H:i:s');
    $emailBody .= "\nIP Address: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown');
    
    $headers = "From: noreply@thiyagidigital.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    return @mail($to, $subject, $emailBody, $headers);
}

// Main form processing
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
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
    
    // Save contact data (always save regardless of email success)
    saveContactData($name, $phone, $email, $service, $message);
    
    // Try to send email
    $emailSent = sendContactEmail($name, $phone, $email, $service, $message);
    
    // Update status in JSON file if email was sent
    if ($emailSent) {
        // Update the last entry in JSON file
        if (file_exists('contact_submissions.json')) {
            $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES);
            if (!empty($lines)) {
                $lastLine = end($lines);
                $data = json_decode($lastLine, true);
                if ($data) {
                    $data['status'] = 'email_sent';
                    $lines[count($lines) - 1] = json_encode($data);
                    file_put_contents('contact_submissions.json', implode("\n", $lines) . "\n", LOCK_EX);
                }
            }
        }
    }
    
    // Always redirect to thank you page
    header('Location: thankyou.php');
    exit;
    
} else {
    // If not POST request, redirect to contact page
    if (isset($_SERVER['REQUEST_METHOD'])) {
        header('Location: contact.php');
        exit;
    }
    // If called directly (like in test), just process the data
    else if (isset($_POST['name'])) {
        // Get form data
        $name = trim($_POST['name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $service = trim($_POST['service'] ?? '');
        $message = trim($_POST['message'] ?? '');
        
        // Validate required fields
        if (empty($name) || empty($phone) || empty($email) || empty($service)) {
            echo "ERROR: Please fill all required fields\n";
            exit;
        }
        
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "ERROR: Please enter a valid email address\n";
            exit;
        }
        
        // Save contact data
        saveContactData($name, $phone, $email, $service, $message);
        echo "SUCCESS: Contact data saved successfully\n";
    }
}
?>
