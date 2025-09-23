<?php

if($_POST) {
  $to = "info@thiyagidigital.com"; // your mail here
  $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
  $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
  $service = filter_var($_POST["service"], FILTER_SANITIZE_STRING);
  $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

  $subject = 'ThiyagiDigital Contact Form Submission';
  $cc = 'support@thiyagidigital.com';
  $bcc = 'kannasivamps@gmail.com';
  $body = "Name: $name\nPhone: $phone\nEmail: $email\nService: $service\nMessage: $message\n";
 
   //mail headers are mandatory for sending email
   $headers = 'From: ' .$email . "\r\n".
   'Cc: ' .$cc . "\r\n".
   'Bcc: ' .$bcc . "\r\n".
   'Reply-To: ' . $email. "\r\n" .
   'X-Mailer: PHP/' . phpversion();
 
   if(@mail($to, $subject, $body, $headers)) {
     // Success - redirect to thank you page
     echo "<script>window.location = 'thankyou.php';</script>";
   } else {
     // Even if email fails, redirect to thank you page
     // In production, you might want to log the error
     echo "<script>window.location = 'thankyou.php';</script>";
   }
} else {
  // If no POST data, redirect to contact page
  echo "<script>window.location = 'contact.php';</script>";
}

?>
