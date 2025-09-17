<?php
// Alternative SMTP mailer - Use this if basic mail() function fails
// You'll need to install PHPMailer via Composer or download manually

// For basic SMTP without PHPMailer (fallback option)
function sendSMTPEmail($to, $subject, $body, $from, $fromName, $replyTo) {
    // This is a simple SMTP implementation
    // For production, consider using PHPMailer or similar library
    
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "From: $fromName <$from>\r\n";
    $headers .= "Reply-To: $replyTo\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    
    // Use mail() with better headers
    return mail($to, $subject, $body, $headers);
}

// Enhanced mailer with better configuration
if ($_POST) {
    try {
        // Validate required fields
        if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["phone"])) {
            throw new Exception("Required fields missing");
        }

        $to = "info@thiyagidigital.com";
        $name = htmlspecialchars(trim($_POST["name"]), ENT_QUOTES, 'UTF-8');
        $phone = htmlspecialchars(trim($_POST["phone"]), ENT_QUOTES, 'UTF-8');
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $service = isset($_POST["service"]) ? htmlspecialchars(trim($_POST["service"]), ENT_QUOTES, 'UTF-8') : 'Not specified';
        $message = isset($_POST["message"]) ? htmlspecialchars(trim($_POST["message"]), ENT_QUOTES, 'UTF-8') : '';
        
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }
        
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
        $body .= "IP Address: " . $_SERVER['REMOTE_ADDR'] . "\n";
        
        // Try sending email
        $mailSent = sendSMTPEmail(
            $to,
            $subject,
            $body,
            'noreply@thiyagidigital.com',
            'ThiyagiDigital Contact Form',
            $email
        );
        
        // Also send copies
        sendSMTPEmail('thiyagasivamp@gmail.com', $subject, $body, 'noreply@thiyagidigital.com', 'ThiyagiDigital Contact Form', $email);
        sendSMTPEmail('kannasivamps@gmail.com', $subject, $body, 'noreply@thiyagidigital.com', 'ThiyagiDigital Contact Form', $email);
        
        if ($mailSent) {
            // Log successful submission
            $log = date('Y-m-d H:i:s') . " - SUCCESS: Email sent for $name ($email) - Service: $service" . PHP_EOL;
            file_put_contents('contact_success.log', $log, FILE_APPEND | LOCK_EX);
            
            echo "<script>alert('Thank you! Your message has been sent successfully. We will contact you soon.'); window.location = 'thankyou.php';</script>";
        } else {
            throw new Exception("Mail function returned false");
        }
        
    } catch (Exception $e) {
        // Log the error
        $log = date('Y-m-d H:i:s') . " - ERROR: " . $e->getMessage() . " - Data: " . json_encode($_POST) . PHP_EOL;
        file_put_contents('contact_errors.log', $log, FILE_APPEND | LOCK_EX);
        
        // Return error response
        echo "<script>alert('Sorry, there was an error sending your message. Please try again or contact us directly at info@thiyagidigital.com or call +91 9363252875'); window.history.back();</script>";
    }
} else {
    // No POST data
    echo "<script>alert('Invalid request'); window.location = 'contact.php';</script>";
}
?>