<?php
// CONTACT FORM ACTION - Based on reference mailer code with dashboard data saving
// Handles both main contact form and sidebar forms

if($_POST) {
  // Email configuration - matching reference
  $to = "gopikannaps@gmail.com"; // your mail here
  $cc = 'kannasivamp@gmail.com';
  $bcc = 'kannasivamps@gmail.com';
  
  // Sanitize input data - matching reference
  $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
  $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  $service = filter_var($_POST["service"], FILTER_SANITIZE_STRING);
  $message = filter_var($_POST["message"] ?? '', FILTER_SANITIZE_STRING);

  // Validate required fields
  if (empty($name) || empty($phone) || empty($email) || empty($service)) {
    echo "<script>alert('Please fill all required fields'); window.history.back();</script>";
    exit;
  }

  // Validate email format
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Please enter a valid email address'); window.history.back();</script>";
    exit;
  }

  // Handle file upload (for main contact form only)
  $fileName = '';
  $filePath = '';
  if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/contact_attachments/';
    if (!file_exists($uploadDir)) {
      mkdir($uploadDir, 0755, true);
    }
    
    $file = $_FILES['attachment'];
    $allowedExtensions = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'txt'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if (in_array($fileExtension, $allowedExtensions) && $file['size'] <= 5 * 1024 * 1024) {
      $fileName = $file['name'];
      $uniqueFileName = date('Ymd_His') . '_' . uniqid() . '.' . $fileExtension;
      $filePath = $uploadDir . $uniqueFileName;
      move_uploaded_file($file['tmp_name'], $filePath);
    }
  }

  // Save data to dashboard (ALWAYS save data regardless of email success)
  $timestamp = date('Y-m-d H:i:s');
  $ip = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
  
  $contactData = array(
    'id' => uniqid('contact_', true),
    'timestamp' => $timestamp,
    'name' => $name,
    'phone' => $phone,
    'email' => $email,
    'service' => $service,
    'message' => $message,
    'attachment' => $fileName,
    'ip' => $ip,
    'status' => 'received'
  );
  
  // Save to JSON file for admin panel
  file_put_contents('contact_submissions.json', json_encode($contactData) . "\n", FILE_APPEND | LOCK_EX);
  
  // Save to text file for backup
  $textData = "=== NEW CONTACT - $timestamp ===\n";
  $textData .= "Name: $name\n";
  $textData .= "Phone: $phone\n";
  $textData .= "Email: $email\n";
  $textData .= "Service: $service\n";
  $textData .= "Message: $message\n";
  if ($fileName) {
    $textData .= "Attachment: $fileName\n";
  }
  $textData .= "IP: $ip\n";
  $textData .= "=====================================\n\n";
  file_put_contents('contact_submissions.txt', $textData, FILE_APPEND | LOCK_EX);

  // Prepare email content - matching reference format
  $subject = 'Thiyagi Contact Form Submission';
  
  $body = "New Contact Form Submission\n\n";
  $body .= "Name: $name\n";
  $body .= "Phone: $phone\n";
  $body .= "Email: $email\n";
  $body .= "Service Interested: $service\n";
  if (!empty($message)) {
    $body .= "Message:\n$message\n";
  }
  if ($fileName) {
    $body .= "\nFile Attachment: $fileName\n";
  }
  $body .= "\nSubmitted: $timestamp\n";
  $body .= "IP Address: $ip\n";
 
  // Mail headers are mandatory for sending email - matching reference
  $headers = 'From: ' . $email . "\r\n";
  $headers .= 'Cc: ' . $cc . "\r\n";
  $headers .= 'Bcc: ' . $bcc . "\r\n";
  $headers .= 'Reply-To: ' . $email . "\r\n";
  $headers .= 'X-Mailer: PHP/' . phpversion();
 
  // Send email and handle response - matching reference
  if(@mail($to, $subject, $body, $headers)) {
    // Update status to email_sent
    if (file_exists('contact_submissions.json')) {
      $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES);
      if (!empty($lines)) {
        $lastLine = end($lines);
        $data = json_decode($lastLine, true);
        if ($data && $data['id'] === $contactData['id']) {
          $data['status'] = 'email_sent';
          $lines[count($lines) - 1] = json_encode($data);
          file_put_contents('contact_submissions.json', implode("\n", $lines) . "\n", LOCK_EX);
        }
      }
    }
    
    // Redirect to thank you page - matching reference
    header("Location: thankyou");
    exit();
  } else {
    // Update status to email_failed but still redirect (data is saved)
    if (file_exists('contact_submissions.json')) {
      $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES);
      if (!empty($lines)) {
        $lastLine = end($lines);
        $data = json_decode($lastLine, true);
        if ($data && $data['id'] === $contactData['id']) {
          $data['status'] = 'email_failed';
          $lines[count($lines) - 1] = json_encode($data);
          file_put_contents('contact_submissions.json', implode("\n", $lines) . "\n", LOCK_EX);
        }
      }
    }
    
    // Still redirect to success page (data saved successfully)
    header("Location: thankyou");
    exit();
  }
  
} else {
  // If not POST request, redirect to contact page
  header('Location: contact');
  exit;
}
?>