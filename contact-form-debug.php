<!DOCTYPE html>
<html>
<head>
    <title>🧪 Contact Form Test & Debug</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 20px; background: #f5f5f5; }
        .test-section { background: white; padding: 20px; margin: 20px 0; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .success { background: #d4edda; border-left: 4px solid #28a745; color: #155724; }
        .error { background: #f8d7da; border-left: 4px solid #dc3545; color: #721c24; }
        .warning { background: #fff3cd; border-left: 4px solid #ffc107; color: #856404; }
        .info { background: #e7f3ff; border-left: 4px solid #2196F3; color: #0c5460; }
        .form-container { background: #f8f9fa; padding: 20px; border-radius: 5px; margin: 15px 0; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { background: #007cba; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #005a87; }
        .test-btn { background: #28a745; margin: 5px; display: inline-block; text-decoration: none; }
        .debug-info { background: #e9ecef; padding: 10px; border-radius: 3px; font-family: monospace; font-size: 12px; }
        pre { background: #f8f9fa; padding: 10px; border-radius: 3px; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>🧪 Contact Form Complete Test & Debug</h1>

    <?php
    // Check system components
    echo '<div class="test-section info">';
    echo '<h3>📋 System Component Check</h3>';
    
    $checks = [
        'contact.php' => file_exists('contact.php'),
        'contact-action.php' => file_exists('contact-action.php'),
        'thankyou.php' => file_exists('thankyou.php'),
        'admin_contacts.php' => file_exists('admin_contacts.php'),
        '.htaccess' => file_exists('.htaccess'),
        'contact_submissions.json' => file_exists('contact_submissions.json'),
        'uploads directory' => is_dir('uploads/contact_attachments')
    ];
    
    foreach ($checks as $item => $exists) {
        $status = $exists ? '✅' : '❌';
        $class = $exists ? 'success' : 'error';
        echo "<p class='$class'>$status $item</p>";
    }
    echo '</div>';

    // PHP Configuration Check
    echo '<div class="test-section info">';
    echo '<h3>⚙️ PHP Configuration</h3>';
    echo '<div class="debug-info">';
    echo "PHP Version: " . PHP_VERSION . "<br>";
    echo "mail() function: " . (function_exists('mail') ? '✅ Available' : '❌ Not Available') . "<br>";
    echo "file_uploads: " . (ini_get('file_uploads') ? '✅ Enabled' : '❌ Disabled') . "<br>";
    echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "<br>";
    echo "post_max_size: " . ini_get('post_max_size') . "<br>";
    echo "max_execution_time: " . ini_get('max_execution_time') . "s<br>";
    echo '</div>';
    echo '</div>';

    // Email Configuration Check
    echo '<div class="test-section warning">';
    echo '<h3>📧 Email Configuration</h3>';
    echo '<p><strong>Recipients configured in contact-action.php:</strong></p>';
    echo '<ul>';
    echo '<li>TO: gopikannaps@gmail.com</li>';
    echo '<li>CC: kannasivamp@gmail.com</li>';
    echo '<li>BCC: kannasivamps@gmail.com</li>';
    echo '</ul>';
    echo '<p><em>Note: Emails may not work in local development. Check with hosting provider for mail server configuration.</em></p>';
    echo '</div>';

    // URL Rewrite Check
    if (file_exists('.htaccess')) {
        echo '<div class="test-section info">';
        echo '<h3>🔗 URL Rewrite Status</h3>';
        $htaccess = file_get_contents('.htaccess');
        if (strpos($htaccess, 'contact-action') !== false) {
            echo '<p class="success">✅ contact-action URL rewrite rule found</p>';
        } else {
            echo '<p class="error">❌ contact-action URL rewrite rule missing</p>';
        }
        echo '</div>';
    }

    // Contact Submissions Check
    if (file_exists('contact_submissions.json')) {
        echo '<div class="test-section success">';
        echo '<h3>📊 Contact Submissions Status</h3>';
        $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        echo '<p>Total submissions: <strong>' . count($lines) . '</strong></p>';
        
        if (count($lines) > 0) {
            echo '<p><strong>Last 3 submissions:</strong></p>';
            $recent = array_slice($lines, -3);
            echo '<div style="background: #f8f9fa; padding: 10px; border-radius: 5px;">';
            foreach ($recent as $line) {
                $data = json_decode($line, true);
                if ($data) {
                    echo "<p><strong>{$data['name']}</strong> ({$data['email']}) - {$data['service']} - <em>{$data['timestamp']}</em></p>";
                }
            }
            echo '</div>';
        }
        echo '</div>';
    }
    ?>

    <div class="test-section">
        <h3>🚀 Quick Test Form</h3>
        <p>Test the contact form functionality with pre-filled data:</p>
        
        <form action="contact-action" method="POST" enctype="multipart/form-data" class="form-container">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" name="name" id="name" value="Test User" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" value="test@example.com" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone *</label>
                <input type="tel" name="phone" id="phone" value="+91 9876543210" required>
            </div>
            
            <div class="form-group">
                <label for="service">Service *</label>
                <select name="service" id="service" required>
                    <option value="">Choose Service</option>
                    <option value="SEO Services" selected>SEO Services</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="3">This is a test message from the contact form debug page. Testing complete form submission flow.</textarea>
            </div>
            
            <div class="form-group">
                <label for="attachment">File Attachment (Optional)</label>
                <input type="file" name="attachment" id="attachment" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.txt">
                <small>Max 5MB. Allowed: PDF, DOC, DOCX, JPG, PNG, TXT</small>
            </div>
            
            <button type="submit">🧪 Test Submit Form</button>
        </form>
    </div>

    <div class="test-section">
        <h3>🔧 Admin & Debug Links</h3>
        <p>
            <a href="contact" class="test-btn">📝 Real Contact Page</a>
            <a href="admin-working" class="test-btn">👨‍💼 Working Admin Panel</a>
            <a href="admin_contacts?pass=admin123" class="test-btn">🔐 Full Admin Panel</a>
            <a href="test-form-status" class="test-btn">📊 System Status</a>
        </p>
    </div>

    <div class="test-section">
        <h3>🐛 Troubleshooting Steps</h3>
        <ol>
            <li><strong>Check File Permissions:</strong> Ensure contact-action.php is readable</li>
            <li><strong>Test Form Submission:</strong> Use the test form above</li>
            <li><strong>Check Data Storage:</strong> Look for contact_submissions.json after submission</li>
            <li><strong>Verify Email Settings:</strong> Contact hosting provider for mail server setup</li>
            <li><strong>Check Browser Console:</strong> Look for JavaScript errors during form submission</li>
            <li><strong>Test Admin Panel:</strong> Verify data appears in admin interface</li>
        </ol>
    </div>

    <div class="test-section">
        <h3>📋 Expected Flow</h3>
        <ol>
            <li>User fills contact form</li>
            <li>JavaScript validation passes</li>
            <li>Form submits to contact-action (clean URL)</li>
            <li>PHP processes data and saves to JSON/TXT files</li>
            <li>Email sent to configured recipients</li>
            <li>User redirected to thank you page</li>
            <li>Data visible in admin panel</li>
        </ol>
    </div>

    <script>
        // Log form submission for debugging
        document.querySelector('form').addEventListener('submit', function(e) {
            console.log('Form submission started');
            console.log('Form data:', new FormData(this));
            
            // Show loading message
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '⏳ Testing...';
            submitBtn.disabled = true;
        });
    </script>
</body>
</html>