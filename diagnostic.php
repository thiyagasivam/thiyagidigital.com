<?php
// CONTACT FORM DIAGNOSTIC PAGE
// Use this to check if everything is set up correctly

$correct_password = 'thiyagi2024';
$entered_password = $_GET['pass'] ?? '';

if ($entered_password !== $correct_password) {
    die('Access Denied. Add ?pass=thiyagi2024 to URL');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Diagnostics</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; }
        .check { background: white; padding: 20px; margin-bottom: 15px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .status { display: inline-block; padding: 5px 10px; border-radius: 5px; font-weight: bold; margin-left: 10px; }
        .ok { background: #28a745; color: white; }
        .warning { background: #ffc107; color: #333; }
        .error { background: #dc3545; color: white; }
        h1 { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; border-bottom: 2px solid #007cba; padding-bottom: 10px; }
        pre { background: #f8f9fa; padding: 10px; border-radius: 5px; overflow-x: auto; }
        .info { color: #666; font-size: 14px; margin-top: 10px; }
        a { color: #007cba; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Contact Form System Diagnostics</h1>

        <div class="check">
            <h2>📁 File Checks</h2>
            
            <?php
            $files = [
                'mailer.php' => 'Main form processor',
                'smailer.php' => 'Sidebar form processor',
                'contact.php' => 'Contact page',
                'sideform.php' => 'Sidebar form',
                'admin_contacts.php' => 'Admin panel',
                'thankyou.php' => 'Thank you page',
                'contact_submissions.json' => 'Submission data (JSON)',
                'contact_submissions.txt' => 'Submission data (TXT)',
                'email_log.txt' => 'Email send log'
            ];
            
            foreach ($files as $file => $description) {
                $exists = file_exists($file);
                $status = $exists ? 'ok' : 'warning';
                $statusText = $exists ? '✓ EXISTS' : '⚠ NOT FOUND';
                
                if ($exists) {
                    $size = filesize($file);
                    $modified = date('Y-m-d H:i:s', filemtime($file));
                    $extra = " | Size: " . number_format($size) . " bytes | Modified: $modified";
                } else {
                    $extra = in_array($file, ['contact_submissions.json', 'contact_submissions.txt', 'email_log.txt']) 
                        ? ' | Will be created on first submission' 
                        : ' | ⚠ REQUIRED FILE MISSING!';
                }
                
                echo "<div>$description: <strong>$file</strong><span class='status $status'>$statusText</span>";
                echo "<span class='info'>$extra</span></div>";
            }
            ?>
        </div>

        <div class="check">
            <h2>🔧 PHP Configuration</h2>
            <?php
            $phpVersion = phpversion();
            $mailEnabled = function_exists('mail');
            $jsonEnabled = function_exists('json_encode');
            $fileWritable = is_writable('.');
            
            echo "<div>PHP Version: <strong>$phpVersion</strong> <span class='status ok'>✓ OK</span></div>";
            echo "<div>mail() Function: <strong>" . ($mailEnabled ? 'Available' : 'Not Available') . "</strong> ";
            echo "<span class='status " . ($mailEnabled ? 'ok' : 'error') . "'>" . ($mailEnabled ? '✓ OK' : '✗ ERROR') . "</span></div>";
            echo "<div>JSON Functions: <strong>" . ($jsonEnabled ? 'Available' : 'Not Available') . "</strong> ";
            echo "<span class='status " . ($jsonEnabled ? 'ok' : 'error') . "'>" . ($jsonEnabled ? '✓ OK' : '✗ ERROR') . "</span></div>";
            echo "<div>Directory Writable: <strong>" . ($fileWritable ? 'Yes' : 'No') . "</strong> ";
            echo "<span class='status " . ($fileWritable ? 'ok' : 'error') . "'>" . ($fileWritable ? '✓ OK' : '✗ ERROR') . "</span>";
            if (!$fileWritable) {
                echo "<div class='info'>⚠ Cannot write files! Check folder permissions.</div>";
            }
            echo "</div>";
            ?>
        </div>

        <div class="check">
            <h2>📊 Submission Statistics</h2>
            <?php
            $count = 0;
            $recentCount = 0;
            if (file_exists('contact_submissions.json')) {
                $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES);
                $count = count(array_filter($lines, 'trim'));
                
                foreach ($lines as $line) {
                    if (trim($line)) {
                        $submission = json_decode($line, true);
                        if ($submission && strtotime($submission['timestamp']) > strtotime('-24 hours')) {
                            $recentCount++;
                        }
                    }
                }
            }
            
            echo "<div>Total Submissions: <strong>$count</strong></div>";
            echo "<div>Last 24 Hours: <strong>$recentCount</strong></div>";
            
            if ($count > 0) {
                echo "<div class='info'>✓ System is receiving submissions!</div>";
            } else {
                echo "<div class='info'>ℹ No submissions yet. Test the form to create first submission.</div>";
            }
            ?>
        </div>

        <div class="check">
            <h2>📧 Email Log Preview</h2>
            <?php
            if (file_exists('email_log.txt')) {
                $log = file('email_log.txt');
                $recentLog = array_slice(array_reverse($log), 0, 10);
                echo "<pre>" . htmlspecialchars(implode('', array_reverse($recentLog))) . "</pre>";
                echo "<div class='info'>Showing last 10 log entries</div>";
            } else {
                echo "<div class='info'>No email log yet. Will be created when form is submitted.</div>";
            }
            ?>
        </div>

        <div class="check">
            <h2>🔗 Quick Links</h2>
            <div>
                <a href="contact.php" target="_blank">📝 Contact Form</a> | 
                <a href="test_contact_form.php" target="_blank">🧪 Test Form</a> | 
                <a href="admin_contacts.php?pass=thiyagi2024" target="_blank">📊 Admin Panel</a> | 
                <a href="?pass=thiyagi2024">🔄 Refresh Diagnostics</a>
            </div>
        </div>

        <div class="check">
            <h2>✅ System Status</h2>
            <?php
            $allOk = file_exists('mailer.php') && 
                     file_exists('contact.php') && 
                     $mailEnabled && 
                     $jsonEnabled && 
                     $fileWritable;
            
            if ($allOk) {
                echo "<div style='background: #d4edda; padding: 15px; border-radius: 5px; color: #155724;'>";
                echo "<strong>✓ ALL SYSTEMS OPERATIONAL</strong><br>";
                echo "Contact form system is ready to receive submissions.";
                echo "</div>";
            } else {
                echo "<div style='background: #f8d7da; padding: 15px; border-radius: 5px; color: #721c24;'>";
                echo "<strong>⚠ ISSUES DETECTED</strong><br>";
                echo "Please review the checks above and fix any errors.";
                echo "</div>";
            }
            ?>
        </div>

        <div style="text-align: center; margin-top: 40px; color: #666;">
            <p>Last checked: <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>
    </div>
</body>
</html>
