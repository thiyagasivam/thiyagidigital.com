<?php
// PHP Configuration Check for Contact Form

echo "<h2>📊 PHP Configuration Check</h2>";

echo "<h3>Mail Function</h3>";
if (function_exists('mail')) {
    echo "✅ mail() function is available<br>";
    
    // Test sending a simple email
    $test_email = @mail('test@example.com', 'Test Subject', 'Test Body', 'From: test@localhost');
    echo "📧 Mail test result: " . ($test_email ? "✅ Success" : "❌ Failed") . "<br>";
} else {
    echo "❌ mail() function is NOT available<br>";
}

echo "<h3>File Upload Settings</h3>";
echo "📁 upload_max_filesize: " . ini_get('upload_max_filesize') . "<br>";
echo "📁 post_max_size: " . ini_get('post_max_size') . "<br>";
echo "📁 file_uploads: " . (ini_get('file_uploads') ? '✅ Enabled' : '❌ Disabled') . "<br>";
echo "📁 max_file_uploads: " . ini_get('max_file_uploads') . "<br>";

echo "<h3>Directory Permissions</h3>";
$upload_dir = 'uploads/contact_attachments/';
if (is_dir($upload_dir)) {
    echo "📂 Upload directory exists: ✅ Yes<br>";
    echo "📂 Upload directory writable: " . (is_writable($upload_dir) ? '✅ Yes' : '❌ No') . "<br>";
} else {
    echo "📂 Upload directory exists: ❌ No<br>";
}

if (is_writable('.')) {
    echo "📂 Current directory writable: ✅ Yes<br>";
} else {
    echo "📂 Current directory writable: ❌ No<br>";
}

echo "<h3>Required Files</h3>";
$files = ['contact.php', 'contact-action.php', 'contact-action-debug.php', 'thankyou.php', 'admin_contacts.php'];
foreach ($files as $file) {
    echo "📄 $file: " . (file_exists($file) ? '✅ Exists' : '❌ Missing') . "<br>";
}

echo "<h3>Data Files</h3>";
$data_files = ['contact_submissions.json', 'contact_submissions.txt'];
foreach ($data_files as $file) {
    if (file_exists($file)) {
        echo "📄 $file: ✅ Exists (" . filesize($file) . " bytes)<br>";
    } else {
        echo "📄 $file: ❌ Missing<br>";
    }
}

echo "<h3>Error Logs</h3>";
$debug_log = "debug_contact_" . date('Y-m-d') . ".log";
if (file_exists($debug_log)) {
    echo "📄 $debug_log: ✅ Exists (" . filesize($debug_log) . " bytes)<br>";
    echo "<pre style='background: #f4f4f4; padding: 10px; border-radius: 5px; max-height: 200px; overflow-y: auto;'>";
    echo htmlspecialchars(file_get_contents($debug_log));
    echo "</pre>";
} else {
    echo "📄 $debug_log: ❌ Not found (no activity yet)<br>";
}

echo "<h3>Recent Activity</h3>";
if (file_exists('contact_submissions.json')) {
    $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES);
    echo "📊 Total submissions: " . count($lines) . "<br>";
    
    if (!empty($lines)) {
        $last_submission = json_decode(end($lines), true);
        if ($last_submission) {
            echo "📅 Last submission: " . $last_submission['timestamp'] . " by " . $last_submission['name'] . "<br>";
        }
    }
} else {
    echo "📊 No submissions file found<br>";
}

echo "<hr><p><a href='contact-debug-test.php'>← Back to Test Form</a></p>";
?>