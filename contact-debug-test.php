<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form - Debug & Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .section {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            background: #007cba;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #005a87;
        }
        .status {
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🔍 Contact Form Debug & Test Page</h1>
        <p>Use this page to test the contact form functionality and debug any issues.</p>
    </div>

    <?php
    // Check system status
    $status_checks = [];
    
    // Check PHP mail function
    $status_checks['mail_function'] = function_exists('mail');
    
    // Check file permissions
    $status_checks['upload_dir_exists'] = is_dir('uploads/contact_attachments/');
    $status_checks['upload_dir_writable'] = is_writable('uploads/contact_attachments/');
    $status_checks['json_file_writable'] = is_writable('.') || (file_exists('contact_submissions.json') && is_writable('contact_submissions.json'));
    
    // Check required files
    $status_checks['contact_action_exists'] = file_exists('contact-action.php');
    $status_checks['contact_action_debug_exists'] = file_exists('contact-action-debug.php');
    $status_checks['admin_panel_exists'] = file_exists('admin_contacts.php');
    
    ?>

    <div class="section">
        <h2>📊 System Status</h2>
        
        <?php foreach ($status_checks as $check => $result): ?>
            <div class="status <?php echo $result ? 'success' : 'error'; ?>">
                <strong><?php echo ucfirst(str_replace('_', ' ', $check)); ?>:</strong> 
                <?php echo $result ? '✅ OK' : '❌ FAILED'; ?>
            </div>
        <?php endforeach; ?>
        
        <div class="status info">
            <strong>Debug Log:</strong> Check for file: debug_contact_<?php echo date('Y-m-d'); ?>.log
        </div>
    </div>

    <div class="section">
        <h2>📋 Test Form</h2>
        <p>Fill out this form to test the contact functionality:</p>
        
        <form method="post" action="contact-action-debug.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" name="name" id="name" required placeholder="Enter your full name">
            </div>
            
            <div class="form-group">
                <label for="phone">Phone *</label>
                <input type="tel" name="phone" id="phone" required placeholder="Enter your phone number">
            </div>
            
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" required placeholder="Enter your email address">
            </div>
            
            <div class="form-group">
                <label for="service">Service *</label>
                <select name="service" id="service" required>
                    <option value="">Choose A Service</option>
                    <option value="SEO Services">SEO Services</option>
                    <option value="Social Media Marketing">Social Media Marketing</option>
                    <option value="Search Engine Marketing">Search Engine Marketing</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Content Writing">Content Writing</option>
                    <option value="Email Marketing">Email Marketing</option>
                    <option value="WordPress Development">WordPress Development</option>
                    <option value="eCommerce Development">eCommerce Development</option>
                    <option value="Logo Design">Logo Design</option>
                    <option value="Graphic Design">Graphic Design</option>
                    <option value="Web Hosting">Web Hosting</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="message">Message (Optional)</label>
                <textarea name="message" id="message" rows="4" placeholder="Enter your message or requirements"></textarea>
            </div>
            
            <div class="form-group">
                <label for="attachment">Attachment (Optional)</label>
                <input type="file" name="attachment" id="attachment" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.txt">
                <small style="color: #666;">Allowed: PDF, DOC, DOCX, JPG, PNG, TXT (Max 5MB)</small>
            </div>
            
            <button type="submit">🚀 Test Submit Form</button>
        </form>
    </div>

    <div class="section">
        <h2>🔗 Quick Links</h2>
        <p>
            <a href="contact" style="color: #007cba;">📝 Main Contact Form</a> | 
            <a href="admin_contacts.php?pass=thiyagi2024" style="color: #007cba;">👤 Admin Panel</a> | 
            <a href="thankyou" style="color: #007cba;">✅ Thank You Page</a>
        </p>
    </div>

    <div class="section">
        <h2>🔧 Troubleshooting Steps</h2>
        <ol>
            <li><strong>Test this form above</strong> - Submit with test data</li>
            <li><strong>Check debug log</strong> - Look for debug_contact_<?php echo date('Y-m-d'); ?>.log</li>
            <li><strong>View admin panel</strong> - Check if data appears in admin_contacts.php</li>
            <li><strong>Check email settings</strong> - Verify PHP mail configuration</li>
            <li><strong>Test file upload</strong> - Try with and without attachments</li>
        </ol>
    </div>

    <div class="section">
        <h2>📊 Recent Submissions</h2>
        <?php
        if (file_exists('contact_submissions.json')) {
            $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES);
            $recent_submissions = array_slice($lines, -3); // Last 3 submissions
            
            if (!empty($recent_submissions)) {
                echo "<p>Last " . count($recent_submissions) . " submission(s):</p>";
                foreach (array_reverse($recent_submissions) as $line) {
                    $submission = json_decode($line, true);
                    if ($submission) {
                        echo "<div class='status info'>";
                        echo "<strong>{$submission['timestamp']}</strong><br>";
                        echo "Name: {$submission['name']}<br>";
                        echo "Email: {$submission['email']}<br>";
                        echo "Service: {$submission['service']}<br>";
                        echo "Status: {$submission['status']}";
                        echo "</div>";
                    }
                }
            } else {
                echo "<div class='status info'>No submissions found yet.</div>";
            }
        } else {
            echo "<div class='status error'>contact_submissions.json file not found.</div>";
        }
        ?>
    </div>

    <script>
        // Add form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const email = document.getElementById('email').value.trim();
            const service = document.getElementById('service').value;
            
            if (!name || !phone || !email || !service) {
                alert('Please fill in all required fields (marked with *)');
                e.preventDefault();
                return;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address');
                e.preventDefault();
                return;
            }
            
            // File size validation
            const fileInput = document.getElementById('attachment');
            if (fileInput.files.length > 0) {
                const fileSize = fileInput.files[0].size / 1024 / 1024; // in MB
                if (fileSize > 5) {
                    alert('File size must be less than 5MB');
                    e.preventDefault();
                    return;
                }
            }
            
            // Show processing message
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '⏳ Processing...';
            submitBtn.disabled = true;
        });
    </script>
</body>
</html>