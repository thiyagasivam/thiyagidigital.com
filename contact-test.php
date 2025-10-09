<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form - Testing & Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .section {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .status-item {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            background: #f8f9fa;
        }
        .status-ok {
            background: #d4edda;
            color: #155724;
        }
        .status-error {
            background: #f8d7da;
            color: #721c24;
        }
        .status-warning {
            background: #fff3cd;
            color: #856404;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
        }
        .btn:hover {
            background: #764ba2;
        }
        h2 {
            color: #333;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
        }
        .info-box {
            background: #e7f3ff;
            padding: 15px;
            border-left: 4px solid #2196F3;
            margin: 15px 0;
        }
        .checklist {
            list-style: none;
            padding: 0;
        }
        .checklist li {
            padding: 10px;
            margin: 5px 0;
            background: #f8f9fa;
            border-radius: 5px;
        }
        .checklist li:before {
            content: "☐ ";
            font-size: 20px;
            margin-right: 10px;
        }
        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎉 Contact Form Implementation Complete!</h1>
        <p>All features have been successfully implemented. Use this page to verify everything works correctly.</p>
    </div>

    <div class="section">
        <h2>📋 System Status Check</h2>
        
        <?php
        $checks = [];
        
        // Check if files exist
        $checks[] = [
            'name' => 'contact.php exists',
            'status' => file_exists('contact.php'),
            'message' => file_exists('contact.php') ? 'Contact form file found' : 'Contact form file missing'
        ];
        
        $checks[] = [
            'name' => 'contact-action.php exists',
            'status' => file_exists('contact-action.php'),
            'message' => file_exists('contact-action.php') ? 'Form action file found' : 'Form action file missing'
        ];
        
        $checks[] = [
            'name' => 'thankyou.php exists',
            'status' => file_exists('thankyou.php'),
            'message' => file_exists('thankyou.php') ? 'Thank you page found' : 'Thank you page missing'
        ];
        
        $checks[] = [
            'name' => 'admin_contacts.php exists',
            'status' => file_exists('admin_contacts.php'),
            'message' => file_exists('admin_contacts.php') ? 'Admin panel found' : 'Admin panel missing'
        ];
        
        // Check upload directory
        $uploadDir = 'uploads/contact_attachments/';
        $checks[] = [
            'name' => 'Upload directory exists',
            'status' => is_dir($uploadDir),
            'message' => is_dir($uploadDir) ? 'Upload directory created' : 'Upload directory missing'
        ];
        
        $checks[] = [
            'name' => 'Upload directory writable',
            'status' => is_writable($uploadDir),
            'message' => is_writable($uploadDir) ? 'Can write to upload directory' : 'Upload directory not writable - check permissions'
        ];
        
        // Check .htaccess
        $checks[] = [
            'name' => '.htaccess exists',
            'status' => file_exists('.htaccess'),
            'message' => file_exists('.htaccess') ? 'URL rewrite rules found' : '.htaccess file missing'
        ];
        
        // Check if mod_rewrite is enabled (this is approximate)
        $checks[] = [
            'name' => 'Clean URLs support',
            'status' => function_exists('apache_get_modules') ? in_array('mod_rewrite', apache_get_modules()) : null,
            'message' => function_exists('apache_get_modules') && in_array('mod_rewrite', apache_get_modules()) ? 'Apache mod_rewrite enabled' : 'Cannot verify - ensure mod_rewrite is enabled in Apache'
        ];
        
        foreach ($checks as $check) {
            $statusClass = $check['status'] === true ? 'status-ok' : ($check['status'] === false ? 'status-error' : 'status-warning');
            $icon = $check['status'] === true ? '✅' : ($check['status'] === false ? '❌' : '⚠️');
            echo "<div class='status-item $statusClass'>";
            echo "<strong>$icon {$check['name']}</strong>";
            echo "<span>{$check['message']}</span>";
            echo "</div>";
        }
        ?>
    </div>

    <div class="section">
        <h2>🔗 Quick Links</h2>
        <a href="contact" class="btn">📝 View Contact Form</a>
        <a href="admin_contacts.php?pass=thiyagi2024" class="btn">👤 Admin Dashboard</a>
        <a href="thankyou" class="btn">✅ Thank You Page</a>
    </div>

    <div class="section">
        <h2>⚙️ Configuration Summary</h2>
        
        <div class="info-box">
            <strong>Email Configuration:</strong><br>
            TO: <code>info@thiyagidigital.com</code><br>
            CC: <code>support@thiyagidigital.com</code>
        </div>
        
        <div class="info-box">
            <strong>Admin Panel Access:</strong><br>
            URL: <code>admin_contacts.php?pass=thiyagi2024</code><br>
            Password: <code>thiyagi2024</code> (Change in admin_contacts.php line 7)
        </div>
        
        <div class="info-box">
            <strong>Upload Settings:</strong><br>
            Directory: <code>uploads/contact_attachments/</code><br>
            Max Size: <code>5MB</code><br>
            Allowed Types: <code>PDF, DOC, DOCX, JPG, PNG, TXT</code>
        </div>
        
        <div class="info-box">
            <strong>Data Storage:</strong><br>
            JSON: <code>contact_submissions.json</code><br>
            Backup: <code>contact_submissions.txt</code>
        </div>
    </div>

    <div class="section">
        <h2>✅ Testing Checklist</h2>
        <ul class="checklist">
            <li>Submit form without file attachment</li>
            <li>Submit form with PDF file attachment</li>
            <li>Submit form with image attachment (JPG/PNG)</li>
            <li>Verify email received at info@thiyagidigital.com</li>
            <li>Verify CC email received at support@thiyagidigital.com</li>
            <li>Check attachment is included in email</li>
            <li>Verify redirect to thank you page works</li>
            <li>Check data appears in admin panel</li>
            <li>Verify attachment info shown in admin panel</li>
            <li>Test file size validation (try uploading >5MB file)</li>
            <li>Test invalid file type (try .exe or .zip file)</li>
            <li>Test all URLs work without .php extension</li>
            <li>Test required field validation</li>
            <li>Test email format validation</li>
        </ul>
    </div>

    <div class="section">
        <h2>📁 File Structure</h2>
        <pre style="background: #f4f4f4; padding: 15px; border-radius: 5px; overflow-x: auto;">
thiyagidigital/
├── contact.php                          (Contact form page)
├── contact-action.php                   (Form processing with file upload)
├── thankyou.php                        (Thank you page)
├── admin_contacts.php                  (Admin dashboard)
├── .htaccess                           (URL rewriting - .php removal)
├── contact_submissions.json            (Data storage)
├── contact_submissions.txt             (Backup storage)
└── uploads/
    └── contact_attachments/
        ├── .htaccess                   (Security settings)
        └── [uploaded files]            (User attachments)
        </pre>
    </div>

    <div class="section">
        <h2>🎯 Key Features Implemented</h2>
        
        <div class="info-box">
            <strong>✅ File Upload</strong><br>
            Users can attach files (PDF, DOC, images) up to 5MB. Files are stored securely and included in emails.
        </div>
        
        <div class="info-box">
            <strong>✅ Email with TO & CC</strong><br>
            Emails sent to both info@thiyagidigital.com (TO) and support@thiyagidigital.com (CC) with attachments.
        </div>
        
        <div class="info-box">
            <strong>✅ Data Storage</strong><br>
            All submissions saved to JSON and TXT files, accessible via admin dashboard even if emails fail.
        </div>
        
        <div class="info-box">
            <strong>✅ Thank You Page Redirect</strong><br>
            Automatic redirect to professional thank you page after successful submission.
        </div>
        
        <div class="info-box">
            <strong>✅ Clean URLs</strong><br>
            All .php extensions removed from URLs using .htaccess rewrite rules.
        </div>
    </div>

    <div class="section">
        <h2>📞 Support</h2>
        <p>If you encounter any issues:</p>
        <ol>
            <li>Check Apache error logs for PHP errors</li>
            <li>Verify upload folder permissions (should be writable)</li>
            <li>Ensure mod_rewrite is enabled in Apache</li>
            <li>Check PHP mail configuration if emails not sending</li>
            <li>Review CONTACT_FORM_IMPLEMENTATION_SUMMARY.md for details</li>
        </ol>
    </div>

    <div style="text-align: center; margin-top: 40px; padding: 20px; background: #667eea; color: white; border-radius: 10px;">
        <h3>🎉 Ready to Go!</h3>
        <p>Your contact form is fully configured and ready for testing.</p>
        <a href="contact" style="display: inline-block; background: white; color: #667eea; padding: 12px 24px; text-decoration: none; border-radius: 5px; font-weight: bold; margin-top: 10px;">Test Contact Form Now →</a>
    </div>
</body>
</html>
