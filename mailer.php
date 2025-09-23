<?php
// ROBUST MAILER - Always saves form data, ensures no leads are lost

if($_POST) {
  // Get form data
  $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
  $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
  $service = filter_var($_POST["service"], FILTER_SANITIZE_STRING);
  $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
  
  // ALWAYS save form data to file first (so we never lose a lead)
  $timestamp = date('Y-m-d H:i:s');
  $leadData = "=== NEW LEAD - $timestamp ===\n";
  $leadData .= "Name: $name\n";
  $leadData .= "Phone: $phone\n";
  $leadData .= "Email: $email\n";
  $leadData .= "Service: $service\n";
  $leadData .= "Message: $message\n";
  $leadData .= "IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
  $leadData .= "=====================================\n\n";
  
  // Save to leads file
  file_put_contents('leads.txt', $leadData, FILE_APPEND | LOCK_EX);
  
  // Try to send email (but don't fail if it doesn't work)
  $to = "info@thiyagidigital.com";
  $subject = "New Lead from ThiyagiDigital.com - $service";
  $body = "NEW LEAD RECEIVED:\n\n";
  $body .= "Name: $name\n";
  $body .= "Phone: $phone\n";
  $body .= "Email: $email\n";
  $body .= "Service Interest: $service\n";
  $body .= "Message: $message\n\n";
  $body .= "Time: $timestamp\n";
  $body .= "Website: ThiyagiDigital.com";
  
  $headers = 'From: noreply@thiyagidigital.com' . "\r\n" .
             'Reply-To: ' . $email . "\r\n" .
             'X-Mailer: PHP/' . phpversion();

  // Try to send email to multiple recipients
  @mail("info@thiyagidigital.com", $subject, $body, $headers);
  @mail("thiyagasivamp@gmail.com", $subject, $body, $headers);
  @mail("kannasivamps@gmail.com", $subject, $body, $headers);
  
  // Always redirect to thank you page (lead is saved regardless of email status)
  echo "<script>window.location = 'thankyou.php';</script>";
  
} else {
  // No POST data - redirect to contact
  echo "<script>window.location = 'contact.php';</script>";
}
?>
