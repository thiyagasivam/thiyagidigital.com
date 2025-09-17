<?php
// Error logging function
function logError($message) {
    $log = date('Y-m-d H:i:s') . " - " . $message . PHP_EOL;
    file_put_contents('sideform_errors.log', $log, FILE_APPEND | LOCK_EX);
}

if ($_POST) {
    try {
        // Validate required fields
        if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["phone"])) {
            throw new Exception("Required fields missing");
        }

        $to = "info@thiyagidigital.com"; // Your mail here
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $service = isset($_POST["service"]) ? filter_var($_POST["service"], FILTER_SANITIZE_STRING) : 'Not specified';
        $message = isset($_POST["message"]) ? filter_var($_POST["message"], FILTER_SANITIZE_STRING) : '';
        
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }
        
        $subject = 'Side Form Lead - ThiyagiDigital.com - ' . $service;
        $cc = 'thiyagasivamp@gmail.com';
        $bcc = 'kannasivamps@gmail.com';
        
        // Create a professional email body
        $body = "=== SIDE FORM LEAD FROM THIYAGIDIGITAL.COM ===\n\n";
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
        $body .= "User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "\n";
        
        // Constructing the mail headers with proper from address
        $headers = "From: noreply@thiyagidigital.com\r\n" .
                   "Reply-To: $email\r\n" .
                   "Cc: $cc\r\n" .
                   "Bcc: $bcc\r\n" .
                   "X-Mailer: PHP/" . phpversion() . "\r\n" .
                   "Content-Type: text/plain; charset=UTF-8\r\n";

        // Sending email
        $mailSent = mail($to, $subject, $body, $headers);
        
        if ($mailSent) {
            // Log successful submission
            logError("SUCCESS: Side form email sent for $name ($email) - Service: $service");
            echo "<script>alert('Thank you! Your message has been sent successfully. We will contact you soon.'); window.location = 'thankyou';</script>";
        } else {
            throw new Exception("Mail function returned false");
        }
        
    } catch (Exception $e) {
        // Log the error
        logError("ERROR: " . $e->getMessage() . " - Data: " . json_encode($_POST));
        
        // Return error response
        echo "<script>alert('Sorry, there was an error sending your message. Please try again or contact us directly at info@thiyagidigital.com or call +91 9363252875'); window.history.back();</script>";
    }
} else {
    // No POST data
    echo "<script>alert('Invalid request'); window.location = 'contact.php';</script>";
}
?>
