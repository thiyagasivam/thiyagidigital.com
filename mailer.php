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
  $bcc = 'admin@thiyagidigital.com';
  $body = "Name: $name\nPhone: $phone\nEmail: $email\nService: $service\nMessage: $message\n";
 
   //mail headers are mandatory for sending email
   $headers = 'From: ' .$email . "\r\n".
   'Cc: ' .$cc . "\r\n".
   'Bcc: ' .$bcc . "\r\n".
   'Reply-To: ' . $email. "\r\n" .
   'X-Mailer: PHP/' . phpversion();
 
   if(@mail($to, $subject, $body, $headers)) {
     $output = json_encode(array('success' => true));
     echo "<script>window.location= 'thankyou.php'</script>";
   } else {
     $output = json_encode(array('success' => false));
     die($output);
   }
 }

?>
