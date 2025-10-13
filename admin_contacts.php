<?php
// ADMIN PANEL TO VIEW ALL CONTACT FORM SUBMISSIONS
// Access this page to see all form submissions even if emails failed

// Simple password protection
$correct_password = 'admin123'; // Simple admin password
$entered_password = $_GET['pass'] ?? $_POST['pass'] ?? '';

// Debug information (remove in production)
$debug_info = [
    'GET_pass' => $_GET['pass'] ?? 'not set',
    'POST_pass' => $_POST['pass'] ?? 'not set',
    'entered_password' => $entered_password,
    'correct_password' => $correct_password,
    'match' => ($entered_password === $correct_password) ? 'YES' : 'NO'
];

if ($entered_password !== $correct_password) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Admin Login - Contact Forms</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
            .login-form { background: white; padding: 30px; border-radius: 10px; max-width: 400px; margin: 100px auto; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
            input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
            input[type="submit"] { background: #007cba; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; }
            input[type="submit"]:hover { background: #005a87; }
        </style>
    </head>
    <body>
        <form class="login-form" method="post" action="">
            <h2>Admin Access Required</h2>
            <p>Enter password to view contact form submissions:</p>
            <p><strong>Password:</strong> admin123</p>
            <input type="password" name="pass" placeholder="Enter Password" required autocomplete="off">
            <input type="submit" value="Login">
            <div style="margin-top: 15px; font-size: 12px; color: #666;">
                <p>Default password: <code>admin123</code></p>
                <p><a href="admin-login-test.php" style="color: #007cba;">🔧 Having trouble? Try debug page</a></p>
            </div>
            
            <!-- Debug info (remove in production) -->
            <div style="margin-top: 20px; padding: 10px; background: #f8f9fa; border-radius: 5px; font-size: 11px;">
                <strong>Debug Info:</strong><br>
                <?php foreach ($debug_info as $key => $value): ?>
                    <?php echo $key . ': ' . $value . '<br>'; ?>
                <?php endforeach; ?>
            </div>
        </form>
    </body>
    </html>
    <?php
    exit();
}

// Load submissions
$submissions = [];
if (file_exists('contact_submissions.json')) {
    $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        if (trim($line)) {
            $submission = json_decode($line, true);
            if ($submission) {
                $submissions[] = $submission;
            }
        }
    }
}

// Sort by timestamp (newest first)
usort($submissions, function($a, $b) {
    return strtotime($b['timestamp']) - strtotime($a['timestamp']);
});

?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submissions - Admin Panel</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .header { background: white; padding: 20px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .stats { display: flex; gap: 20px; margin-bottom: 20px; }
        .stat-box { background: white; padding: 20px; border-radius: 10px; flex: 1; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .stat-number { font-size: 24px; font-weight: bold; color: #007cba; }
        .stat-label { color: #666; margin-top: 5px; }
        .submission { background: white; padding: 20px; margin-bottom: 15px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .submission-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .submission-title { font-size: 18px; font-weight: bold; color: #333; }
        .submission-status { padding: 4px 8px; border-radius: 15px; color: white; font-size: 12px; }
        .status-received { background: #28a745; }
        .status-email_sent { background: #17a2b8; }
        .status-email_failed { background: #ffc107; color: #333; }
        .status-error { background: #dc3545; }
        .submission-details { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; }
        .detail-item { padding: 5px 0; }
        .detail-label { font-weight: bold; color: #555; font-size: 12px; text-transform: uppercase; margin-bottom: 5px; }
        .detail-value { color: #333; word-break: break-all; }
        .message-box { background: #f8f9fa; padding: 15px; border-radius: 5px; margin-top: 10px; }
        .no-submissions { text-align: center; color: #666; padding: 40px; }
        .refresh-btn { background: #007cba; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; display: inline-block; }
        .refresh-btn:hover { background: #005a87; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Contact Form Submissions - ThiyagiDigital.com</h1>
        <p>Admin panel to view all contact form submissions. This system saves data even when emails fail.</p>
        <a href="?pass=<?php echo urlencode($correct_password); ?>" class="refresh-btn">🔄 Refresh</a>
    </div>

    <div class="stats">
        <div class="stat-box">
            <div class="stat-number"><?php echo count($submissions); ?></div>
            <div class="stat-label">Total Submissions</div>
        </div>
        <div class="stat-box">
            <div class="stat-number"><?php echo count(array_filter($submissions, function($s) { return $s['status'] === 'email_sent'; })); ?></div>
            <div class="stat-label">Emails Sent</div>
        </div>
        <div class="stat-box">
            <div class="stat-number"><?php echo count(array_filter($submissions, function($s) { return $s['status'] === 'email_failed'; })); ?></div>
            <div class="stat-label">Email Failed</div>
        </div>
        <div class="stat-box">
            <div class="stat-number"><?php echo count(array_filter($submissions, function($s) { return strtotime($s['timestamp']) > strtotime('-24 hours'); })); ?></div>
            <div class="stat-label">Last 24 Hours</div>
        </div>
    </div>

    <?php if (empty($submissions)): ?>
        <div class="submission">
            <div class="no-submissions">
                <h3>No submissions yet</h3>
                <p>Contact form submissions will appear here when users submit the form.</p>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($submissions as $submission): ?>
            <div class="submission">
                <div class="submission-header">
                    <div class="submission-title"><?php echo htmlspecialchars($submission['name']); ?></div>
                    <div class="submission-status status-<?php echo $submission['status']; ?>">
                        <?php echo strtoupper(str_replace('_', ' ', $submission['status'])); ?>
                    </div>
                </div>
                
                <div class="submission-details">
                    <div class="detail-item">
                        <div class="detail-label">Date & Time</div>
                        <div class="detail-value"><?php echo $submission['timestamp']; ?></div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Name</div>
                        <div class="detail-value"><?php echo htmlspecialchars($submission['name']); ?></div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Phone</div>
                        <div class="detail-value">
                            <a href="tel:<?php echo htmlspecialchars($submission['phone']); ?>" style="color: #007cba; text-decoration: none;">
                                <?php echo htmlspecialchars($submission['phone']); ?>
                            </a>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Email</div>
                        <div class="detail-value">
                            <a href="mailto:<?php echo htmlspecialchars($submission['email']); ?>" style="color: #007cba; text-decoration: none;">
                                <?php echo htmlspecialchars($submission['email']); ?>
                            </a>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Service Interest</div>
                        <div class="detail-value"><?php echo htmlspecialchars($submission['service']); ?></div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">IP Address</div>
                        <div class="detail-value"><?php echo htmlspecialchars($submission['ip']); ?></div>
                    </div>
                    
                    <?php if (!empty($submission['attachment'])): ?>
                    <div class="detail-item">
                        <div class="detail-label">Attachment</div>
                        <div class="detail-value">
                            📎 <?php echo htmlspecialchars($submission['attachment']); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                
                <?php if (!empty($submission['message'])): ?>
                    <div class="message-box">
                        <div class="detail-label">Message:</div>
                        <div><?php echo nl2br(htmlspecialchars($submission['message'])); ?></div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div style="text-align: center; margin-top: 40px; color: #666;">
        <p>Last updated: <?php echo date('Y-m-d H:i:s'); ?></p>
        <p>Data files: contact_submissions.json | contact_submissions.txt</p>
    </div>
</body>
</html>