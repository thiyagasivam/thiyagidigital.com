<?php
// SIMPLIFIED ADMIN LOGIN DEBUG VERSION
session_start();

echo "<h2>🔍 Admin Login Debug</h2>";
echo "<hr>";

// Debug current request
echo "<h3>Current Request Debug:</h3>";
echo "<pre>";
echo "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . "\n";
echo "GET data: " . print_r($_GET, true);
echo "POST data: " . print_r($_POST, true);
echo "</pre>";

// Password logic
$correct_password = 'admin123';
$entered_password = $_GET['pass'] ?? $_POST['pass'] ?? '';

echo "<h3>Password Check:</h3>";
echo "<pre>";
echo "Correct Password: '$correct_password'\n";
echo "Entered Password: '$entered_password'\n";
echo "Passwords Match: " . (($entered_password === $correct_password) ? 'YES' : 'NO') . "\n";
echo "Password Length - Correct: " . strlen($correct_password) . ", Entered: " . strlen($entered_password) . "\n";
echo "</pre>";

// Test login
if ($entered_password === $correct_password) {
    echo "<div style='background: #d4edda; padding: 15px; border-radius: 5px; color: #155724;'>";
    echo "<h3>✅ LOGIN SUCCESS!</h3>";
    echo "<p>Password authentication worked correctly.</p>";
    echo "<p><a href='admin_contacts'>Go to Real Admin Panel</a></p>";
    echo "</div>";
} else {
    echo "<div style='background: #f8d7da; padding: 15px; border-radius: 5px; color: #721c24;'>";
    echo "<h3>❌ LOGIN FAILED</h3>";
    echo "<p>Password authentication failed.</p>";
    echo "</div>";
    
    // Show login form
    echo "<hr>";
    echo "<h3>🔐 Test Login Form:</h3>";
    echo "<form method='POST' style='background: #f8f9fa; padding: 20px; border-radius: 5px;'>";
    echo "<p>Enter password:</p>";
    echo "<input type='password' name='pass' value='admin123' style='padding: 10px; border: 1px solid #ccc; border-radius: 3px;'>";
    echo "<button type='submit' style='padding: 10px 20px; background: #007cba; color: white; border: none; border-radius: 3px; margin-left: 10px;'>Test Login</button>";
    echo "</form>";
    
    // Show GET method test
    echo "<hr>";
    echo "<h3>🔗 Direct GET Method Test:</h3>";
    echo "<p><a href='?pass=admin123' style='background: #007cba; color: white; padding: 10px 15px; text-decoration: none; border-radius: 3px;'>Test with GET parameter</a></p>";
}

// File existence check
echo "<hr>";
echo "<h3>📁 File Check:</h3>";
echo "<pre>";
echo "admin_contacts.php exists: " . (file_exists('admin_contacts.php') ? 'YES' : 'NO') . "\n";
echo "contact_submissions.json exists: " . (file_exists('contact_submissions.json') ? 'YES' : 'NO') . "\n";
if (file_exists('contact_submissions.json')) {
    $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo "Number of submissions: " . count($lines) . "\n";
}
echo "</pre>";
?>

<style>
body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
pre { background: #e9ecef; padding: 10px; border-radius: 3px; overflow-x: auto; }
</style>