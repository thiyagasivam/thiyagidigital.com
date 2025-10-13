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
echo "<p>You can test the form by:</p>";
echo "<ol>";
echo "<li>Go to the <a href='contact' target='_blank'>contact page</a></li>";
echo "<li>Fill in all required fields</li>";
echo "<li>Optionally attach a file</li>";
echo "<li>Click 'Send Message'</li>";
echo "<li>Check if you get redirected to the thank you page</li>";
echo "<li>Check <a href='admin_contacts.php' target='_blank'>admin panel</a> for submissions</li>";
echo "</ol>";

echo "</body></html>";
?>