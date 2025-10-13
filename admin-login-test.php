<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Test</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; }
        .test-section { background: #f8f9fa; padding: 20px; margin: 20px 0; border-radius: 5px; border-left: 4px solid #007cba; }
        .success { background: #d4edda; border-left-color: #28a745; }
        .error { background: #f8d7da; border-left-color: #dc3545; }
        .code { background: #e9ecef; padding: 10px; font-family: monospace; border-radius: 3px; }
        input, button { padding: 10px; margin: 5px; border: 1px solid #ddd; border-radius: 3px; }
        button { background: #007cba; color: white; border: none; cursor: pointer; }
        button:hover { background: #005a87; }
    </style>
</head>
<body>
    <h1>🔐 Admin Login Test & Debug</h1>

    <div class="test-section">
        <h3>📋 Current Admin Setup:</h3>
        <ul>
            <li><strong>Admin File:</strong> admin_contacts.php</li>
            <li><strong>Password:</strong> admin123</li>
            <li><strong>Method:</strong> POST form</li>
        </ul>
    </div>

    <div class="test-section">
        <h3>🧪 Quick Login Test Form:</h3>
        <form action="admin_contacts.php" method="POST" target="_blank">
            <p>Test the admin login directly:</p>
            <input type="password" name="pass" value="admin123" placeholder="Password">
            <button type="submit">🔑 Test Login</button>
        </form>
    </div>

    <div class="test-section">
        <h3>🔗 Direct Access Links:</h3>
        <ul>
            <li><a href="admin_contacts.php" target="_blank">📱 Normal Admin Login Page</a></li>
            <li><a href="admin_contacts.php?pass=admin123" target="_blank">🚀 Direct Access (GET method)</a></li>
        </ul>
    </div>

    <?php
    // Check if admin_contacts.php file exists and is readable
    $adminFile = 'admin_contacts.php';
    echo '<div class="test-section">';
    echo '<h3>📁 File Status Check:</h3>';
    
    if (file_exists($adminFile)) {
        echo '<p class="success">✅ admin_contacts.php exists</p>';
        echo '<p>File size: ' . number_format(filesize($adminFile)) . ' bytes</p>';
        echo '<p>Last modified: ' . date('Y-m-d H:i:s', filemtime($adminFile)) . '</p>';
        
        if (is_readable($adminFile)) {
            echo '<p class="success">✅ File is readable</p>';
        } else {
            echo '<p class="error">❌ File is not readable</p>';
        }
    } else {
        echo '<p class="error">❌ admin_contacts.php not found</p>';
    }
    
    // Check if contact submissions exist
    if (file_exists('contact_submissions.json')) {
        $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        echo '<p class="success">✅ contact_submissions.json exists (' . count($lines) . ' submissions)</p>';
    } else {
        echo '<p>⚠️ contact_submissions.json not found (no submissions yet)</p>';
    }
    
    echo '</div>';
    ?>

    <div class="test-section">
        <h3>🛠️ Troubleshooting Steps:</h3>
        <ol>
            <li><strong>Clear Browser Cache:</strong> Press Ctrl+F5 to refresh</li>
            <li><strong>Check URL:</strong> Make sure you're accessing the correct path</li>
            <li><strong>Try Direct Link:</strong> Use the "Direct Access" link above</li>
            <li><strong>Check Permissions:</strong> Ensure admin_contacts.php has proper read permissions</li>
            <li><strong>PHP Errors:</strong> Check for any PHP error messages</li>
        </ol>
    </div>

    <div class="test-section">
        <h3>💡 Expected Behavior:</h3>
        <ol>
            <li>Visit admin_contacts.php</li>
            <li>See login form asking for password</li>
            <li>Enter: <code>admin123</code></li>
            <li>Click "Login" button</li>
            <li>Should show admin dashboard with contact submissions</li>
        </ol>
    </div>

    <div class="test-section">
        <h3>🔍 Debug Information:</h3>
        <div class="code">
            Server: <?php echo $_SERVER['SERVER_NAME'] ?? 'Unknown'; ?><br>
            PHP Version: <?php echo PHP_VERSION; ?><br>
            Current Directory: <?php echo __DIR__; ?><br>
            Current Time: <?php echo date('Y-m-d H:i:s'); ?>
        </div>
    </div>

    <script>
        // Auto-test direct access after 2 seconds
        setTimeout(function() {
            console.log('Testing direct admin access...');
            // This will be logged in browser console
        }, 2000);
    </script>
</body>
</html>