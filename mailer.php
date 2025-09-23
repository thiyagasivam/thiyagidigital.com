<?php
// ENHANCED MAILER - Multiple email methods + lead backup

// Function to log email attempts
function logEmailAttempt($message) {
  $log = date('Y-m-d H:i:s') . " - " . $message . "\n";
  file_put_contents('email_log.txt', $log, FILE_APPEND | LOCK_EX);
}

// Function to send email with multiple methods
function sendEmailMultipleMethods($to, $subject, $body, $replyEmail, $name) {
  $success = false;
  
  // Method 1: Standard PHP mail with proper headers
  $headers1 = 'MIME-Version: 1.0' . "\r\n";
  $headers1 .= 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
  $headers1 .= 'From: ThiyagiDigital Contact <noreply@thiyagidigital.com>' . "\r\n";
  $headers1 .= 'Reply-To: ' . $name . ' <' . $replyEmail . '>' . "\r\n";
  $headers1 .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
  
  if (@mail($to, $subject, $body, $headers1)) {
    logEmailAttempt("SUCCESS: Standard mail() to $to");
    $success = true;
  } else {
    logEmailAttempt("FAILED: Standard mail() to $to");
  }
  
  // Method 2: Simple headers (for XAMPP compatibility)
  $headers2 = 'From: noreply@thiyagidigital.com' . "\r\n";
  $headers2 .= 'Reply-To: ' . $replyEmail . "\r\n";
  
  if (@mail($to, $subject, $body, $headers2)) {
    logEmailAttempt("SUCCESS: Simple mail() to $to");
    $success = true;
  } else {
    logEmailAttempt("FAILED: Simple mail() to $to");
  }
  
  // Method 3: Try with different From header
  $headers3 = 'From: ' . $replyEmail . "\r\n";
  $headers3 .= 'Reply-To: ' . $replyEmail . "\r\n";
  
  if (@mail($to, $subject, $body, $headers3)) {
    logEmailAttempt("SUCCESS: From user email mail() to $to");
    $success = true;
  } else {
    logEmailAttempt("FAILED: From user email mail() to $to");
  }
  
  return $success;
}

if($_POST) {
  // Get and sanitize form data
  $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
  $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  $service = filter_var($_POST["service"], FILTER_SANITIZE_STRING);
  $message = isset($_POST["message"]) ? filter_var($_POST["message"], FILTER_SANITIZE_STRING) : '';
  
  // Validate required fields
  if (empty($name) || empty($phone) || empty($email) || empty($service)) {
    logEmailAttempt("ERROR: Required fields missing");
    echo "<script>alert('Please fill all required fields'); history.back();</script>";
    exit;
  }
  
  // Validate email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    logEmailAttempt("ERROR: Invalid email format: $email");
    echo "<script>alert('Please enter a valid email address'); history.back();</script>";
    exit;
  }
  
  // ALWAYS save form data to file first (GUARANTEED backup)
  $timestamp = date('Y-m-d H:i:s');
  $leadData = "=== NEW LEAD - $timestamp ===\n";
  $leadData .= "Name: $name\n";
  $leadData .= "Phone: $phone\n";
  $leadData .= "Email: $email\n";
  $leadData .= "Service: $service\n";
  $leadData .= "Message: $message\n";
  $leadData .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n";
  $leadData .= "User Agent: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown') . "\n";
  $leadData .= "=====================================\n\n";
  
  // Save to leads file
  if (file_put_contents('leads.txt', $leadData, FILE_APPEND | LOCK_EX)) {
    logEmailAttempt("SUCCESS: Lead saved to file - $name ($email)");
  } else {
    logEmailAttempt("ERROR: Failed to save lead to file - $name ($email)");
  }
  
  // Prepare email content
  $subject = "🔥 NEW LEAD from ThiyagiDigital.com - $service";
  $emailBody = "===== NEW LEAD RECEIVED =====\n\n";
  $emailBody .= "📧 CONTACT DETAILS:\n";
  $emailBody .= "Name: $name\n";
  $emailBody .= "Phone: $phone\n";
  $emailBody .= "Email: $email\n";
  $emailBody .= "Service Interest: $service\n\n";
  
  if (!empty($message)) {
    $emailBody .= "💬 MESSAGE:\n$message\n\n";
  }
  
  $emailBody .= "📊 SUBMISSION INFO:\n";
  $emailBody .= "Date & Time: $timestamp\n";
  $emailBody .= "IP Address: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n";
  $emailBody .= "Source: ThiyagiDigital.com Contact Form\n\n";
  $emailBody .= "⚡ QUICK RESPONSE RECOMMENDED ⚡\n";
  $emailBody .= "This lead was generated from your website contact form.";
  
  // Email recipients
  $recipients = array(
    'info@thiyagidigital.com',
    'thiyagasivamp@gmail.com',
    'kannasivamps@gmail.com'
  );
  
  $emailsSent = 0;
  $totalAttempts = 0;
  
  // Try to send to all recipients
  foreach ($recipients as $recipient) {
    logEmailAttempt("ATTEMPTING: Send to $recipient");
    if (sendEmailMultipleMethods($recipient, $subject, $emailBody, $email, $name)) {
      $emailsSent++;
      logEmailAttempt("SUCCESS: Email delivered to $recipient");
    } else {
      logEmailAttempt("FAILED: All methods failed for $recipient");
    }
    $totalAttempts++;
  }
  
  // Log final result
  logEmailAttempt("FINAL RESULT: $emailsSent/$totalAttempts emails sent for lead: $name ($email)");
  
  // Always redirect to thank you page (lead is saved regardless)
  echo "<script>window.location = 'thankyou.php';</script>";
  exit;
  
} else {
  // No POST data
  logEmailAttempt("ERROR: No POST data received");
  echo "<script>window.location = 'contact.php';</script>";
  exit;
}

?>
