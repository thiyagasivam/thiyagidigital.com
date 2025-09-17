<?php
// ROBUST MAILER - Works in XAMPP and Production
// Always saves form data and tries multiple email methods

function saveFormSubmission($name, $phone, $email, $service, $message, $status = 'pending') {
    $data = [
        'timestamp' => date('Y-m-d H:i:s'),
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'service' => $service,
        'message' => $message,
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'Unknown',
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown',
        'status' => $status
    ];
    
    // Save as JSON for easy parsing
    $jsonData = json_encode($data) . "\n";
    file_put_contents('contact_submissions.json', $jsonData, FILE_APPEND | LOCK_EX);
    
    // Also save as readable text
    $readable = sprintf(
        "[%s] NEW CONTACT FORM SUBMISSION\n" .
        "Name: %s\n" .
        "Phone: %s\n" .
        "Email: %s\n" .
        "Service: %s\n" .
        "Message: %s\n" .
        "IP: %s\n" .
        "Status: %s\n" .
        "----------------------------------------\n\n",
        $data['timestamp'], $name, $phone, $email, $service, $message, $data['ip'], $status
    );
    
    file_put_contents('contact_submissions.txt', $readable, FILE_APPEND | LOCK_EX);
    
    return true;
}

function sendEmail($to, $subject, $body, $replyTo, $name) {
    // Method 1: Standard PHP mail() function
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "From: ThiyagiDigital Contact Form <noreply@thiyagidigital.com>\r\n";
    $headers .= "Reply-To: $name <$replyTo>\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    
    $success = @mail($to, $subject, $body, $headers);
    
    if ($success) {
        error_log("Email sent successfully to: $to");
        return true;
    }
    
    // Method 2: Try with simpler headers (for local testing)
    $simpleHeaders = "From: noreply@thiyagidigital.com\r\n";
    $simpleHeaders .= "Reply-To: $replyTo\r\n";
    
    $success2 = @mail($to, $subject, $body, $simpleHeaders);
    
    if ($success2) {
        error_log("Email sent with simple headers to: $to");
        return true;
    }
    
    error_log("Failed to send email to: $to");
    return false;
}

if ($_POST) {
    try {
        // Validate required fields
        if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["phone"])) {
            throw new Exception("Required fields missing");
        }

        $name = htmlspecialchars(trim($_POST["name"]), ENT_QUOTES, 'UTF-8');
        $phone = htmlspecialchars(trim($_POST["phone"]), ENT_QUOTES, 'UTF-8');
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $service = isset($_POST["service"]) ? htmlspecialchars(trim($_POST["service"]), ENT_QUOTES, 'UTF-8') : 'Not specified';
        $message = isset($_POST["message"]) ? htmlspecialchars(trim($_POST["message"]), ENT_QUOTES, 'UTF-8') : '';
        
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format: $email");
        }
        
        // ALWAYS save the form submission first (this ensures data is never lost)
        saveFormSubmission($name, $phone, $email, $service, $message, 'received');
        
        $subject = 'New Contact Form Submission - ThiyagiDigital.com';
        
        // Create email body
        $body = "=== NEW CONTACT FORM SUBMISSION ===\n\n";
        $body .= "Name: $name\n";
        $body .= "Phone: $phone\n";
        $body .= "Email: $email\n";
        $body .= "Service Interest: $service\n\n";
        
        if (!empty($message)) {
            $body .= "Message:\n$message\n\n";
        }
        
        $body .= "---\n";
        $body .= "Submitted: " . date('Y-m-d H:i:s') . "\n";
        $body .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n";
        $body .= "Website: ThiyagiDigital.com\n";
        
        // Try to send emails (but don't fail if they don't work)
        $emailsSent = 0;
        
        // Send to main email
        if (sendEmail('info@thiyagidigital.com', $subject, $body, $email, $name)) {
            $emailsSent++;
        }
        
        // Send copies
        if (sendEmail('thiyagasivamp@gmail.com', $subject, $body, $email, $name)) {
            $emailsSent++;
        }
        
        if (sendEmail('kannasivamps@gmail.com', $subject, $body, $email, $name)) {
            $emailsSent++;
        }
        
        // Update submission status
        if ($emailsSent > 0) {
            saveFormSubmission($name, $phone, $email, $service, $message, 'email_sent');
            $log = date('Y-m-d H:i:s') . " - SUCCESS: $emailsSent emails sent for $name ($email)\n";
        } else {
            saveFormSubmission($name, $phone, $email, $service, $message, 'email_failed');
            $log = date('Y-m-d H:i:s') . " - WARNING: Form saved but no emails sent for $name ($email)\n";
        }
        
        file_put_contents('contact_status.log', $log, FILE_APPEND | LOCK_EX);
        
        // ALWAYS redirect to thank you page (regardless of email status)
        // The important thing is that we have the form data saved
        header("Location: thankyou.php");
        exit();
        
    } catch (Exception $e) {
        // Log error but still save what we can
        $log = date('Y-m-d H:i:s') . " - ERROR: " . $e->getMessage() . "\n";
        file_put_contents('contact_errors.log', $log, FILE_APPEND | LOCK_EX);
        
        // Try to save partial data
        $name = $_POST['name'] ?? 'Unknown';
        $email = $_POST['email'] ?? 'Unknown';
        $phone = $_POST['phone'] ?? 'Unknown';
        $service = $_POST['service'] ?? 'Unknown';
        $message = $_POST['message'] ?? '';
        
        saveFormSubmission($name, $phone, $email, $service, $message, 'error');
        
        // Show user-friendly message
        echo "<script>alert('Thank you for your message! We have received your information and will contact you soon.'); window.location = 'thankyou.php';</script>";
        exit();
    }
} else {
    // No POST data - redirect to contact page
    header("Location: contact.php");
    exit();
}
?>
?>