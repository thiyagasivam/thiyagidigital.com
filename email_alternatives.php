<?php
// ALTERNATIVE MAILER USING SMTP (for better email delivery)

// If you want to use Gmail SMTP or other SMTP services, uncomment and configure:
/*
// Gmail SMTP Configuration
$smtp_host = 'smtp.gmail.com';
$smtp_port = 587;
$smtp_username = 'your-email@gmail.com';  // Replace with your email
$smtp_password = 'your-app-password';     // Replace with Gmail App Password
$smtp_secure = 'tls';

// Basic SMTP function (you can also use PHPMailer library)
function sendSMTPEmail($to, $subject, $message, $from_email, $from_name) {
    // This is a simplified example
    // For production, use PHPMailer or similar library
    $headers = "From: $from_name <$from_email>\r\n";
    $headers .= "Reply-To: $from_email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    return mail($to, $subject, $message, $headers);
}
*/

// WEBHOOK ALTERNATIVE - Send to external service
function sendWebhookNotification($leadData) {
    // Example: Send to Slack, Discord, or custom webhook
    $webhookUrl = 'YOUR_WEBHOOK_URL_HERE';
    
    $payload = json_encode(array(
        'text' => '🔥 New Lead from ThiyagiDigital.com',
        'attachments' => array(array(
            'color' => 'good',
            'fields' => array(
                array('title' => 'Name', 'value' => $leadData['name'], 'short' => true),
                array('title' => 'Phone', 'value' => $leadData['phone'], 'short' => true),
                array('title' => 'Email', 'value' => $leadData['email'], 'short' => true),
                array('title' => 'Service', 'value' => $leadData['service'], 'short' => true),
                array('title' => 'Message', 'value' => $leadData['message'], 'short' => false),
            )
        ))
    ));
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $webhookUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    
    return $result;
}

// TELEGRAM BOT NOTIFICATION
function sendTelegramNotification($leadData) {
    $botToken = 'YOUR_BOT_TOKEN';  // Get from @BotFather
    $chatId = 'YOUR_CHAT_ID';      // Your Telegram chat ID
    
    $text = "🔥 *New Lead from ThiyagiDigital.com*\n\n";
    $text .= "👤 *Name:* " . $leadData['name'] . "\n";
    $text .= "📱 *Phone:* " . $leadData['phone'] . "\n";
    $text .= "📧 *Email:* " . $leadData['email'] . "\n";
    $text .= "🎯 *Service:* " . $leadData['service'] . "\n";
    if (!empty($leadData['message'])) {
        $text .= "💬 *Message:* " . $leadData['message'] . "\n";
    }
    
    $url = "https://api.telegram.org/bot$botToken/sendMessage";
    $data = array(
        'chat_id' => $chatId,
        'text' => $text,
        'parse_mode' => 'Markdown'
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    
    return $result;
}

// WHATSAPP NOTIFICATION (using API service like Twilio)
function sendWhatsAppNotification($leadData) {
    // Example with Twilio WhatsApp API
    $accountSid = 'YOUR_TWILIO_SID';
    $authToken = 'YOUR_TWILIO_TOKEN';
    $twilioWhatsAppNumber = 'whatsapp:+14155238886'; // Twilio Sandbox
    $yourWhatsAppNumber = 'whatsapp:+919876543210'; // Your WhatsApp number
    
    $message = "🔥 New Lead from ThiyagiDigital.com\n\n";
    $message .= "Name: " . $leadData['name'] . "\n";
    $message .= "Phone: " . $leadData['phone'] . "\n";
    $message .= "Email: " . $leadData['email'] . "\n";
    $message .= "Service: " . $leadData['service'] . "\n";
    if (!empty($leadData['message'])) {
        $message .= "Message: " . $leadData['message'] . "\n";
    }
    
    // Use Twilio API to send WhatsApp message
    // (Requires Twilio PHP SDK or cURL implementation)
    
    return "WhatsApp notification would be sent here";
}

echo "This file contains alternative notification methods for leads.";
echo "<br>Check the source code for SMTP, Webhook, Telegram, and WhatsApp options.";

?>