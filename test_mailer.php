<?php
// TEST MAILER FUNCTIONALITY

echo "<h2>Testing Mailer Functionality</h2>";

// Check if POST works
if ($_POST) {
    echo "<h3>✅ POST data received:</h3>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    // Test file writing
    $testData = "Test entry: " . date('Y-m-d H:i:s') . "\n";
    if (file_put_contents('test_leads.txt', $testData, FILE_APPEND | LOCK_EX)) {
        echo "<p>✅ File writing works - check test_leads.txt</p>";
    } else {
        echo "<p>❌ File writing failed</p>";
    }
    
    // Test mail function
    $subject = "Test email from ThiyagiDigital";
    $message = "This is a test email to verify mail functionality";
    $headers = 'From: noreply@thiyagidigital.com';
    
    if (mail("info@thiyagidigital.com", $subject, $message, $headers)) {
        echo "<p>✅ Mail function appears to work</p>";
    } else {
        echo "<p>⚠️ Mail function may have issues (but this is normal on XAMPP)</p>";
    }
    
} else {
    echo "<h3>No POST data received</h3>";
    echo "<form method='post'>";
    echo "<input type='text' name='name' placeholder='Test Name' required><br><br>";
    echo "<input type='email' name='email' placeholder='test@example.com' required><br><br>";
    echo "<input type='tel' name='phone' placeholder='1234567890' required><br><br>";
    echo "<select name='service'>";
    echo "<option value='SEO Services'>SEO Services</option>";
    echo "</select><br><br>";
    echo "<textarea name='message' placeholder='Test message'></textarea><br><br>";
    echo "<button type='submit'>Test Form</button>";
    echo "</form>";
}

// Check file permissions
echo "<h3>File System Check:</h3>";
echo "Current directory: " . getcwd() . "<br>";
echo "Directory writable: " . (is_writable('.') ? '✅ Yes' : '❌ No') . "<br>";

// Check if leads file exists
if (file_exists('leads.txt')) {
    echo "Leads file exists: ✅ Yes<br>";
    echo "File size: " . filesize('leads.txt') . " bytes<br>";
} else {
    echo "Leads file exists: ⚠️ Not yet created<br>";
}

?>