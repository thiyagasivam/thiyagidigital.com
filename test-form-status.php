<?php
// Quick test to check form submission status
echo "<!DOCTYPE html><html><head><title>Contact Form Status Check</title></head><body>";
echo "<h2>Contact Form Status Check</h2>";

echo "<h3>📋 Form Files Status:</h3>";
echo "<ul>";
echo "<li><strong>contact.php:</strong> " . (file_exists('contact.php') ? '✅ EXISTS' : '❌ MISSING') . "</li>";
echo "<li><strong>contact-action.php:</strong> " . (file_exists('contact-action.php') ? '✅ EXISTS' : '❌ MISSING') . "</li>";
echo "<li><strong>thankyou.php:</strong> " . (file_exists('thankyou.php') ? '✅ EXISTS' : '❌ MISSING') . "</li>";
echo "</ul>";

echo "<h3>📁 Upload Directory:</h3>";
$uploadDir = 'uploads/contact_attachments/';
if (is_dir($uploadDir)) {
    echo "<p>✅ Upload directory exists: $uploadDir</p>";
    echo "<p>Permissions: " . substr(sprintf('%o', fileperms($uploadDir)), -4) . "</p>";
} else {
    echo "<p>❌ Upload directory missing: $uploadDir</p>";
}

echo "<h3>📧 Email Configuration:</h3>";
echo "<ul>";
echo "<li><strong>TO Email:</strong> gopikannaps@gmail.com</li>";
echo "<li><strong>CC Email:</strong> kannasivamp@gmail.com</li>";
echo "<li><strong>BCC Email:</strong> kannasivamps@gmail.com</li>";
echo "<li><strong>mail() function:</strong> " . (function_exists('mail') ? '✅ AVAILABLE' : '❌ NOT AVAILABLE') . "</li>";
echo "<li><strong>file_uploads:</strong> " . (ini_get('file_uploads') ? '✅ ENABLED' : '❌ DISABLED') . "</li>";
echo "<li><strong>max_file_uploads:</strong> " . ini_get('max_file_uploads') . "</li>";
echo "<li><strong>upload_max_filesize:</strong> " . ini_get('upload_max_filesize') . "</li>";
echo "<li><strong>post_max_size:</strong> " . ini_get('post_max_size') . "</li>";
echo "</ul>";

echo "<h3>📊 Recent Submissions:</h3>";
if (file_exists('contact_submissions.json')) {
    $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo "<p>Total submissions: " . count($lines) . "</p>";
    
    if (count($lines) > 0) {
        echo "<p><strong>Last 3 submissions:</strong></p>";
        $lastThree = array_slice($lines, -3);
        echo "<div style='background:#f8f9fa; padding:10px; border-radius:5px; margin:10px 0;'>";
        foreach ($lastThree as $line) {
            $data = json_decode($line, true);
            if ($data) {
                echo "<p><strong>{$data['timestamp']}</strong> - {$data['name']} ({$data['email']}) - Service: {$data['service']} - Status: {$data['status']}</p>";
            }
        }
        echo "</div>";
    }
} else {
    echo "<p>❌ No submissions file found</p>";
}

echo "<h3>🔗 URL Rewrite Status:</h3>";
if (file_exists('.htaccess')) {
    echo "<p>✅ .htaccess file exists</p>";
    $htaccess = file_get_contents('.htaccess');
    if (strpos($htaccess, 'contact-action') !== false) {
        echo "<p>✅ Contact action rewrite rule found</p>";
    } else {
        echo "<p>❌ Contact action rewrite rule not found</p>";
    }
} else {
    echo "<p>❌ .htaccess file missing</p>";
}

echo "<h3>🔧 Test Form Submission:</h3>";
echo "<div style='background:#e7f3ff; padding:15px; border-radius:5px; margin:15px 0;'>";
echo "<p><strong>Quick Test Options:</strong></p>";
echo "<ul>";
echo "<li><a href='test-contact-form.php' target='_blank' style='color:#007cba;'>🧪 Use Test Form</a> - Pre-filled form for quick testing</li>";
echo "<li><a href='contact' target='_blank' style='color:#007cba;'>📝 Real Contact Page</a> - Production contact form</li>";
echo "<li><a href='admin_contacts.php' target='_blank' style='color:#007cba;'>👨‍💼 Admin Panel</a> - View submissions (Password: admin123)</li>";
echo "</ul>";
echo "</div>";

echo "<p><strong>Testing Steps:</strong></p>";
echo "<ol>";
echo "<li>Use either the test form or real contact page</li>";
echo "<li>Fill in all required fields (Name, Email, Phone, Service)</li>";
echo "<li>Optionally add a message and attach a file</li>";
echo "<li>Click 'Send Message'</li>";
echo "<li>Check if you get redirected to the thank you page</li>";
echo "<li>Check the admin panel to verify data was saved</li>";
echo "<li>Check emails (gopikannaps@gmail.com, kannasivamp@gmail.com, kannasivamps@gmail.com)</li>";
echo "</ol>";

echo "</body></html>";
?>