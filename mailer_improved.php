<?php
// IMPROVED MAILER WITH BETTER SMTP CONFIGURATION
// This file provides better email functionality for the contact form

function sendImprovedEmail($to, $subject, $body, $replyTo, $cc = '', $bcc = '') {
    // Set better mail headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "From: ThiyagiDigital <noreply@thiyagidigital.com>\r\n";
    $headers .= "Reply-To: $replyTo\r\n";
    
    if (!empty($cc)) {
        $headers .= "Cc: $cc\r\n";
    }
    
    if (!empty($bcc)) {
        $headers .= "Bcc: $bcc\r\n";
    }
    
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "X-Priority: 3\r\n";
    
    // Try to use mail function with better configuration
    $result = @mail($to, $subject, $body, $headers);
    
    // If mail fails, try alternative approach
    if (!$result) {
        // Log the issue
        error_log("Mail function failed for: $to - $subject");
        
        // Alternative: Use basic mail without SMTP dependencies
        $basicHeaders = "From: noreply@thiyagidigital.com\r\n";
        $basicHeaders .= "Reply-To: $replyTo\r\n";
        
        $result = @mail($to, $subject, $body, $basicHeaders);
    }
    
    return $result;
}

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
            throw new Exception("Invalid email format: $email");
        }
        
        $subject = 'New Lead - ThiyagiDigital.com - ' . $service;
        
        // Create email body
        $body = "=== NEW CONTACT FORM SUBMISSION ===\n\n";
        $body .= "Name: $name\n";
        $body .= "Phone: $phone\n";
        $body .= "Email: $email\n";
        $body .= "Service: $service\n\n";
        
        if (!empty($message)) {
            $body .= "Message:\n$message\n\n";
        }
        
        $body .= "---\n";
        $body .= "Submitted: " . date('Y-m-d H:i:s') . "\n";
        $body .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n";
        
        // Try sending to main email
        $success1 = sendImprovedEmail($to, $subject, $body, $email);
        
        // Try sending copies (don't fail if these don't work)
        @sendImprovedEmail('thiyagasivamp@gmail.com', $subject, $body, $email);
        @sendImprovedEmail('kannasivamps@gmail.com', $subject, $body, $email);
        
        if ($success1) {
            // Log success
            $log = date('Y-m-d H:i:s') . " - SUCCESS: Email sent for $name ($email) - $service\n";
            @file_put_contents('contact_success.log', $log, FILE_APPEND | LOCK_EX);
            
            // Redirect to thank you page
            header("Location: thankyou.php");
            exit();
        } else {
            throw new Exception("Failed to send email to primary recipient");
        }
        
    } catch (Exception $e) {
        // Log error
        $log = date('Y-m-d H:i:s') . " - ERROR: " . $e->getMessage() . " - " . json_encode($_POST) . "\n";
        @file_put_contents('contact_errors.log', $log, FILE_APPEND | LOCK_EX);
        
        // Show user-friendly error
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Contact Form Error</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 40px; }
                .error { background: #f8d7da; color: #721c24; padding: 20px; border-radius: 5px; }
                .contact-info { background: #d1ecf1; color: #0c5460; padding: 20px; border-radius: 5px; margin-top: 20px; }
            </style>
        </head>
        <body>
            <div class="error">
                <h2>Message Not Sent</h2>
                <p>We're sorry, but there was a technical issue sending your message. This is likely due to server configuration.</p>
            </div>
            
            <div class="contact-info">
                <h3>Please Contact Us Directly:</h3>
                <p><strong>Email:</strong> info@thiyagidigital.com</p>
                <p><strong>Phone:</strong> +91 9363252875</p>
                <p><strong>Alternative Email:</strong> thiyagasivamp@gmail.com</p>
                
                <h4>Your Message Details:</h4>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($name ?? ''); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email ?? ''); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone ?? ''); ?></p>
                <p><strong>Service:</strong> <?php echo htmlspecialchars($service ?? ''); ?></p>
                <?php if (!empty($message)): ?>
                <p><strong>Message:</strong> <?php echo htmlspecialchars($message); ?></p>
                <?php endif; ?>
            </div>
            
            <p><a href="contact.php">← Back to Contact Form</a></p>
        </body>
        </html>
        <?php
        exit();
    }
} else {
    // No POST data - redirect to contact page
    header("Location: contact.php");
    exit();
}
?>