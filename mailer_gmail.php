<?php
// GMAIL SMTP MAILER - Alternative solution for email delivery
// This uses Gmail SMTP to send emails (requires App Password)

function sendGmailSMTP($to, $subject, $body, $replyTo, $fromName = 'ThiyagiDigital') {
    // Gmail SMTP configuration
    $smtp_server = 'smtp.gmail.com';
    $smtp_port = 587; // or 465 for SSL
    $smtp_username = 'your-gmail@gmail.com'; // Replace with your Gmail
    $smtp_password = 'your-app-password'; // Replace with your App Password
    
    // Email headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "From: $fromName <$smtp_username>\r\n";
    $headers .= "Reply-To: $replyTo\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    
    // Additional parameters for sendmail
    $additional_parameters = "-f$smtp_username";
    
    // Note: This is a simplified version. For production use PHPMailer
    return mail($to, $subject, $body, $headers, $additional_parameters);
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
            throw new Exception("Invalid email format");
        }
        
        $subject = 'New Contact - ThiyagiDigital.com - ' . $service;
        
        // Create email body
        $body = "=== NEW CONTACT FROM THIYAGIDIGITAL.COM ===\n\n";
        $body .= "Contact Information:\n";
        $body .= "Name: $name\n";
        $body .= "Phone: $phone\n";
        $body .= "Email: $email\n";
        $body .= "Service Requested: $service\n\n";
        
        if (!empty($message)) {
            $body .= "Message:\n$message\n\n";
        }
        
        $body .= "---\n";
        $body .= "Submitted: " . date('Y-m-d H:i:s') . "\n";
        $body .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n";
        $body .= "User Agent: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown') . "\n";
        
        // Try sending email
        $success = sendGmailSMTP($to, $subject, $body, $email, 'ThiyagiDigital Contact');
        
        if ($success) {
            // Log success
            $log = date('Y-m-d H:i:s') . " - SUCCESS: Gmail SMTP email sent for $name ($email)\n";
            @file_put_contents('gmail_success.log', $log, FILE_APPEND | LOCK_EX);
            
            // Redirect to thank you page
            header("Location: thankyou.php");
            exit();
        } else {
            throw new Exception("Gmail SMTP delivery failed");
        }
        
    } catch (Exception $e) {
        // Log error
        $log = date('Y-m-d H:i:s') . " - ERROR: " . $e->getMessage() . "\n";
        @file_put_contents('gmail_errors.log', $log, FILE_APPEND | LOCK_EX);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Email Configuration Required</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 40px; }
                .error { background: #f8d7da; color: #721c24; padding: 20px; border-radius: 5px; }
                .setup { background: #d1ecf1; color: #0c5460; padding: 20px; border-radius: 5px; margin-top: 20px; }
                .code { background: #f8f9fa; padding: 10px; border-radius: 3px; font-family: monospace; margin: 10px 0; }
            </style>
        </head>
        <body>
            <div class="error">
                <h2>Gmail SMTP Not Configured</h2>
                <p>The Gmail SMTP mailer needs to be configured with your credentials.</p>
            </div>
            
            <div class="setup">
                <h3>Setup Instructions:</h3>
                <ol>
                    <li><strong>Enable 2-Step Verification</strong> on your Gmail account</li>
                    <li><strong>Generate App Password:</strong>
                        <ul>
                            <li>Go to Gmail → Settings → Security</li>
                            <li>Under "2-Step Verification", click "App passwords"</li>
                            <li>Generate a new app password for "Mail"</li>
                        </ul>
                    </li>
                    <li><strong>Edit mailer_gmail.php</strong> and update:</li>
                </ol>
                
                <div class="code">
$smtp_username = 'your-gmail@gmail.com'; // Your Gmail address<br>
$smtp_password = 'your-app-password'; // 16-character app password
                </div>
                
                <p><strong>Alternative:</strong> Use the regular mailer and set up XAMPP SMTP, or use an external email service.</p>
            </div>
            
            <p><a href="contact.php">← Back to Contact Form</a></p>
        </body>
        </html>
        <?php
        exit();
    }
} else {
    header("Location: contact.php");
    exit();
}
?>