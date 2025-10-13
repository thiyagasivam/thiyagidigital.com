<?php
// WORKING ADMIN PANEL - SIMPLIFIED VERSION
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Password check
$password = 'admin123';
$login_ok = false;

if (isset($_POST['pass']) && $_POST['pass'] === $password) {
    $login_ok = true;
} elseif (isset($_GET['pass']) && $_GET['pass'] === $password) {
    $login_ok = true;
}

if (!$login_ok) {
    // Show login form
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Admin Login - Working Version</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
            .container { max-width: 500px; margin: 0 auto; }
            .login-box { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
            .debug-box { background: #e7f3ff; padding: 15px; border-radius: 5px; margin: 20px 0; border-left: 4px solid #2196F3; }
            input[type="password"], input[type="text"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
            button { background: #007cba; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; width: 100%; }
            button:hover { background: #005a87; }
            .test-links { margin-top: 20px; }
            .test-links a { background: #28a745; color: white; padding: 8px 15px; text-decoration: none; border-radius: 3px; margin-right: 10px; display: inline-block; margin-bottom: 5px; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="login-box">
                <h2>🔐 Admin Login (Working Version)</h2>
                
                <div class="debug-box">
                    <strong>🧪 Debug Information:</strong><br>
                    Request Method: <?= $_SERVER['REQUEST_METHOD'] ?><br>
                    GET pass: <?= isset($_GET['pass']) ? $_GET['pass'] : 'not set' ?><br>
                    POST pass: <?= isset($_POST['pass']) ? $_POST['pass'] : 'not set' ?><br>
                    Expected: admin123
                </div>
                
                <form method="POST" action="">
                    <p><strong>Enter Password:</strong></p>
                    <input type="text" name="pass" placeholder="admin123" value="admin123" autocomplete="off">
                    <button type="submit">🔑 Login with POST</button>
                </form>
                
                <div class="test-links">
                    <strong>Quick Test Links:</strong><br>
                    <a href="?pass=admin123">🔗 Login with GET</a>
                    <a href="admin-debug">🧪 Full Debug</a>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// If we reach here, login was successful
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Contact Submissions</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .success { background: #d4edda; color: #155724; padding: 20px; border-radius: 10px; margin-bottom: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        .submission { background: white; padding: 20px; margin: 10px 0; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="container">
        <div class="success">
            <h2>✅ Login Successful!</h2>
            <p>Welcome to the admin panel. The login system is working correctly.</p>
            <p><a href="admin_contacts?pass=admin123" style="color: #155724;">Go to Full Admin Panel</a></p>
        </div>
        
        <div class="submission">
            <h3>📊 Contact Submissions:</h3>
            <?php
            if (file_exists('contact_submissions.json')) {
                $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                echo "<p>Total submissions: " . count($lines) . "</p>";
                
                if (count($lines) > 0) {
                    echo "<h4>Recent submissions:</h4>";
                    $recent = array_slice($lines, -3);
                    foreach ($recent as $line) {
                        $data = json_decode($line, true);
                        if ($data) {
                            echo "<p><strong>" . htmlspecialchars($data['name']) . "</strong> - " . htmlspecialchars($data['email']) . " (" . htmlspecialchars($data['timestamp']) . ")</p>";
                        }
                    }
                }
            } else {
                echo "<p>No submissions file found yet.</p>";
            }
            ?>
        </div>
        
        <div class="submission">
            <h3>🔧 Admin Tools:</h3>
            <p><a href="admin_contacts?pass=admin123">Full Admin Panel</a></p>
            <p><a href="test-contact-form">Test Contact Form</a></p>
            <p><a href="test-form-status">System Status</a></p>
        </div>
    </div>
</body>
</html>