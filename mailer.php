<?php
// ROBUST MAILER - Always saves form data, tries multiple email methods
// This ensures no leads are lost even if email fails on XAMPP

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

function logError($message) {
    $log = date('Y-m-d H:i:s') . " - " . $message . "\n";
    file_put_contents('contact_errors.log', $log, FILE_APPEND | LOCK_EX);
}

function sendEmail($to, $subject, $body, $replyTo, $name) {
    // Method 1: Standard PHP mail() with proper headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "From: ThiyagiDigital Contact Form <noreply@thiyagidigital.com>\r\n";
    $headers .= "Reply-To: $name <$replyTo>\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    
    $success = @mail($to, $subject, $body, $headers);
    
    if ($success) {
        logError("Email sent successfully to: $to");
        return true;
    }
    
    // Method 2: Try with simpler headers (for XAMPP/localhost)
    $simpleHeaders = "From: noreply@thiyagidigital.com\r\n";
    $simpleHeaders .= "Reply-To: $replyTo\r\n";
    
    $success2 = @mail($to, $subject, $body, $simpleHeaders);
    
    if ($success2) {
        logError("Email sent with simple headers to: $to");
        return true;
    }
    
    logError("Failed to send email to: $to");
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
        
        $subject = 'New Lead from ThiyagiDigital.com - ' . $service;
        
        // Create email body
        $body = "=== NEW LEAD FROM THIYAGIDIGITAL.COM ===\n\n";
        $body .= "Contact Details:\n";
        $body .= "Name: $name\n";
        $body .= "Phone: $phone\n";
        $body .= "Email: $email\n";
        $body .= "Service Interest: $service\n\n";
        
        if (!empty($message)) {
            $body .= "Message:\n$message\n\n";
        }
        
        $body .= "=== SUBMISSION DETAILS ===\n";
        $body .= "Date: " . date('Y-m-d H:i:s') . "\n";
        $body .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n";
        $body .= "Website: ThiyagiDigital.com\n";
        
        // Try to send emails (but don't fail if they don't work)
        $emailsSent = 0;
        
        // Send to main email
        if (sendEmail('info@thiyagidigital.com', $subject, $body, $email, $name)) {
            $emailsSent++;
        }
        
        // Send copies (don't fail if these don't work)
        if (sendEmail('thiyagasivamp@gmail.com', $subject, $body, $email, $name)) {
            $emailsSent++;
        }
        
        if (sendEmail('kannasivamps@gmail.com', $subject, $body, $email, $name)) {
            $emailsSent++;
        }
        
        // Update submission status and log
        if ($emailsSent > 0) {
            saveFormSubmission($name, $phone, $email, $service, $message, 'email_sent');
            $log = "SUCCESS: $emailsSent emails sent for $name ($email) - $service";
        } else {
            saveFormSubmission($name, $phone, $email, $service, $message, 'email_failed');
            $log = "WARNING: Form saved but no emails sent for $name ($email) - $service";
        }
        
        logError($log);
        
        // ALWAYS redirect to thank you page (regardless of email status)
        // The important thing is that we have the form data saved
        echo "<script>window.location = 'thankyou';</script>";
        exit();
        
    } catch (Exception $e) {
        // Log error but still save what we can
        logError("ERROR: " . $e->getMessage() . " - Data: " . json_encode($_POST));
        
        // Try to save partial data
        $name = $_POST['name'] ?? 'Unknown';
        $email = $_POST['email'] ?? 'Unknown';
        $phone = $_POST['phone'] ?? 'Unknown';
        $service = $_POST['service'] ?? 'Unknown';
        $message = $_POST['message'] ?? '';
        
        saveFormSubmission($name, $phone, $email, $service, $message, 'error');
        
        // Instead of showing error, redirect to thank you with the data saved
        echo "<script>
            alert('Thank you for your message! We have received your information and will contact you soon.');
            window.location = 'thankyou';
        </script>";
        exit();
    }
} else {
    // No POST data - redirect to contact page
    echo "<script>window.location = 'contact';</script>";
    exit();
}
?>
