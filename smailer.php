<?php

if ($_POST) {
    $to = "info@thiyagidigital.com"; // Your mail here
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL); // Changed to sanitize email
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    $subject = 'Thiyagidigital lead side Form';
    $cc = 'thiyagasivamp@gmail.com';
    $bcc = 'kannasivamps@gmail.com';
    
    $body = "Name: $name\nPhone: $phone\nEmail: $email\nMessage: $message";
    
    // Constructing the mail headers
    $headers = "From: $email\r\n" .
               "Cc: $cc\r\n" .
               "Bcc: $bcc\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Sending email
    if (@mail($to, $subject, $body, $headers)) {
        echo "<script>window.location = 'thankyou.php';</script>";
    } else {
        $output = json_encode(array('success' => false));
        die($output);
    }
}
?>
