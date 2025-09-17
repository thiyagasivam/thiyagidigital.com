<?php
// MAIL FUNCTIONALITY TEST
// Visit this page directly to test if mail is working on your server

if (isset($_GET['test'])) {
    echo "<h2>Testing Mail Functionality...</h2>";
    
    $to = "info@thiyagidigital.com";
    $subject = "Test Email - ThiyagiDigital Mail Test";
    $message = "This is a test email sent from your XAMPP server.\n\n";
    $message .= "Time: " . date('Y-m-d H:i:s') . "\n";
    $message .= "Server: " . $_SERVER['SERVER_NAME'] . "\n";
    $message .= "PHP Version: " . phpversion() . "\n";
    
    $headers = "From: test@thiyagidigital.com\r\n";
    $headers .= "Reply-To: test@thiyagidigital.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    echo "<p>Attempting to send email to: $to</p>";
    
    $result = mail($to, $subject, $message, $headers);
    
    if ($result) {
        echo "<div style='background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin: 10px 0;'>";
        echo "<strong>✓ SUCCESS:</strong> Mail function returned TRUE";
        echo "<br>Check your email at $to";
        echo "</div>";
    } else {
        echo "<div style='background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin: 10px 0;'>";
        echo "<strong>✗ FAILED:</strong> Mail function returned FALSE";
        echo "<br>This means your XAMPP server is not configured to send emails.";
        echo "</div>";
        
        echo "<h3>Possible Solutions:</h3>";
        echo "<ol>";
        echo "<li><strong>Use External SMTP:</strong> Configure with Gmail, Yahoo, or other SMTP service</li>";
        echo "<li><strong>Use Email Service:</strong> Integrate with services like SendGrid, Mailgun, etc.</li>";
        echo "<li><strong>Configure XAMPP SMTP:</strong> Edit php.ini and set up local SMTP server</li>";
        echo "</ol>";
    }
    
    // Show current PHP mail configuration
    echo "<h3>Current PHP Mail Configuration:</h3>";
    echo "<table border='1' cellpadding='5' style='border-collapse: collapse; margin: 10px 0;'>";
    echo "<tr><td><strong>SMTP Server:</strong></td><td>" . ini_get('SMTP') . "</td></tr>";
    echo "<tr><td><strong>SMTP Port:</strong></td><td>" . ini_get('smtp_port') . "</td></tr>";
    echo "<tr><td><strong>Sendmail From:</strong></td><td>" . ini_get('sendmail_from') . "</td></tr>";
    echo "<tr><td><strong>Sendmail Path:</strong></td><td>" . ini_get('sendmail_path') . "</td></tr>";
    echo "</table>";
    
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>ThiyagiDigital - Mail Test</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 40px; background: #f8f9fa; }
            .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
            .btn { background: #007bff; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 10px 0; }
            .btn:hover { background: #0056b3; }
            .warning { background: #fff3cd; color: #856404; padding: 15px; border-radius: 5px; margin: 15px 0; border: 1px solid #ffeaa7; }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>📧 ThiyagiDigital Mail Test</h1>
            
            <div class="warning">
                <strong>⚠️ Important:</strong> This will test if your XAMPP server can send emails. 
                Most local XAMPP installations cannot send emails without proper SMTP configuration.
            </div>
            
            <p>Click the button below to test if the mail function is working on your server:</p>
            
            <a href="?test=1" class="btn">🧪 Test Mail Function</a>
            
            <h3>Expected Result:</h3>
            <ul>
                <li><strong>If SUCCESSFUL:</strong> You'll see a green success message and should receive an email</li>
                <li><strong>If FAILED:</strong> You'll see a red error message with solutions</li>
            </ul>
            
            <h3>Common XAMPP Mail Issues:</h3>
            <ul>
                <li>XAMPP by default cannot send emails on localhost</li>
                <li>You need to configure SMTP server or use external email services</li>
                <li>The mail() function requires proper server configuration</li>
            </ul>
            
            <p><a href="contact.php">← Back to Contact Form</a></p>
        </div>
    </body>
    </html>
    <?php
}
?>