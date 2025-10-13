<?php
// CONTACT FORM LIVE TEST - Tests actual form submission
// This page simulates form submission to identify issues

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<!DOCTYPE html><html><head><title>Form Test Results</title>";
    echo "<style>body{font-family:Arial;margin:20px;background:#f5f5f5;} .result{background:white;padding:20px;margin:10px 0;border-radius:5px;box-shadow:0 2px 5px rgba(0,0,0,0.1);} .success{background:#d4edda;color:#155724;} .error{background:#f8d7da;color:#721c24;}</style>";
    echo "</head><body>";
    
    echo "<h1>🧪 Contact Form Test Results</h1>";
    
    // Test 1: Check POST data received
    echo "<div class='result'>";
    echo "<h3>📥 POST Data Received:</h3>";
    if (!empty($_POST)) {
        echo "<div class='success'>";
        echo "<strong>✅ POST data received successfully!</strong><br>";
        foreach ($_POST as $key => $value) {
            echo htmlspecialchars($key) . ": " . htmlspecialchars($value) . "<br>";
        }
        echo "</div>";
    } else {
        echo "<div class='error'>❌ No POST data received</div>";
    }
    echo "</div>";
    
    // Test 2: Required fields validation
    echo "<div class='result'>";
    echo "<h3>✅ Required Fields Check:</h3>";
    $required = ['name', 'email', 'phone', 'service'];
    $missing = [];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $missing[] = $field;
        }
    }
    if (empty($missing)) {
        echo "<div class='success'>✅ All required fields are present</div>";
    } else {
        echo "<div class='error'>❌ Missing required fields: " . implode(', ', $missing) . "</div>";
    }
    echo "</div>";
    
    // Test 3: Email validation
    echo "<div class='result'>";
    echo "<h3>📧 Email Validation:</h3>";
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "<div class='success'>✅ Email format is valid</div>";
        } else {
            echo "<div class='error'>❌ Email format is invalid</div>";
        }
    }
    echo "</div>";
    
    // Test 4: File upload check
    echo "<div class='result'>";
    echo "<h3>📎 File Upload Check:</h3>";
    if (!empty($_FILES['attachment']['name'])) {
        $file = $_FILES['attachment'];
        echo "<strong>File Details:</strong><br>";
        echo "Name: " . htmlspecialchars($file['name']) . "<br>";
        echo "Size: " . number_format($file['size']) . " bytes<br>";
        echo "Type: " . htmlspecialchars($file['type']) . "<br>";
        echo "Error: " . $file['error'] . "<br>";
        
        if ($file['error'] === UPLOAD_ERR_OK) {
            echo "<div class='success'>✅ File uploaded successfully</div>";
        } else {
            echo "<div class='error'>❌ File upload error: " . $file['error'] . "</div>";
        }
    } else {
        echo "<div style='background:#fff3cd;color:#856404;padding:15px;'>ℹ️ No file attached (optional)</div>";
    }
    echo "</div>";
    
    // Test 5: Simulate contact-action processing
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['service'])) {
        echo "<div class='result success'>";
        echo "<h3>🚀 Simulation - Forward to contact-action:</h3>";
        echo "<p>✅ Form data is valid and ready for processing</p>";
        echo "<p><strong>Next step:</strong> Data would be sent to contact-action.php for:</p>";
        echo "<ul>";
        echo "<li>📧 Email sending to recipients</li>";
        echo "<li>💾 Data storage in JSON/TXT files</li>";
        echo "<li>🔄 Redirect to thank you page</li>";
        echo "</ul>";
        
        // Show what would be saved
        echo "<h4>📋 Data that would be saved:</h4>";
        echo "<div style='background:#f8f9fa;padding:10px;border-radius:3px;font-family:monospace;font-size:12px;'>";
        echo "Name: " . htmlspecialchars($_POST['name']) . "<br>";
        echo "Email: " . htmlspecialchars($_POST['email']) . "<br>";
        echo "Phone: " . htmlspecialchars($_POST['phone']) . "<br>";
        echo "Service: " . htmlspecialchars($_POST['service']) . "<br>";
        echo "Message: " . htmlspecialchars($_POST['message'] ?? 'No message') . "<br>";
        echo "Timestamp: " . date('Y-m-d H:i:s') . "<br>";
        echo "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "<br>";
        echo "</div>";
        echo "</div>";
    }
    
    echo "<div class='result'>";
    echo "<h3>🔧 Test Actions:</h3>";
    echo "<p><a href='contact-form-live-test' style='background:#007cba;color:white;padding:10px 15px;text-decoration:none;border-radius:3px;'>🔄 Test Again</a> ";
    echo "<a href='contact' style='background:#28a745;color:white;padding:10px 15px;text-decoration:none;border-radius:3px;margin-left:10px;'>📝 Real Contact Form</a> ";
    echo "<a href='admin-working' style='background:#17a2b8;color:white;padding:10px 15px;text-decoration:none;border-radius:3px;margin-left:10px;'>👨‍💼 Admin Panel</a></p>";
    echo "</div>";
    
    echo "</body></html>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>🧪 Live Contact Form Test</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; padding: 20px; background: #f5f5f5; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .info { background: #e7f3ff; padding: 15px; border-radius: 5px; margin: 20px 0; border-left: 4px solid #2196F3; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { background: #007cba; color: white; padding: 15px 25px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; width: 100%; }
        button:hover { background: #005a87; }
        .required { color: red; }
        .test-links { margin: 20px 0; }
        .test-links a { background: #28a745; color: white; padding: 8px 12px; text-decoration: none; border-radius: 3px; margin-right: 10px; display: inline-block; margin-bottom: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🧪 Contact Form Live Test</h1>
        
        <div class="info">
            <strong>📋 Test Purpose:</strong><br>
            This form tests the exact same submission process as the real contact form, but shows detailed results instead of processing the data. Use this to identify any form submission issues.
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Full Name <span class="required">*</span></label>
                <input type="text" name="name" id="name" value="John Test User" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address <span class="required">*</span></label>
                <input type="email" name="email" id="email" value="test@example.com" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number <span class="required">*</span></label>
                <input type="tel" name="phone" id="phone" value="+91 9876543210" required>
            </div>

            <div class="form-group">
                <label for="service">Service Interested <span class="required">*</span></label>
                <select name="service" id="service" required>
                    <option value="">Choose A Service</option>
                    <option value="SEO Services" selected>SEO Services</option>
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
                <textarea name="message" id="message" rows="4" placeholder="Tell us about your project requirements...">This is a test submission to verify the contact form is working correctly. Testing all form fields and validation.</textarea>
            </div>

            <div class="form-group">
                <label for="attachment">File Attachment (Optional)</label>
                <input type="file" name="attachment" id="attachment" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.txt">
                <small style="color: #666;">Max 5MB. Allowed: PDF, DOC, DOCX, JPG, PNG, TXT</small>
            </div>

            <button type="submit">🧪 Test Form Submission</button>
        </form>

        <div class="test-links">
            <strong>🔗 Other Test Tools:</strong><br>
            <a href="contact">📝 Real Contact Page</a>
            <a href="contact-form-debug">🔧 System Debug</a>
            <a href="admin-working">👨‍💼 Admin Panel</a>
        </div>

        <div class="info">
            <strong>📊 What This Tests:</strong>
            <ul>
                <li>✅ Form field validation</li>
                <li>✅ POST data transmission</li>
                <li>✅ File upload functionality</li>
                <li>✅ Email format validation</li>
                <li>✅ Required field checking</li>
            </ul>
        </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function() {
            const btn = document.querySelector('button[type="submit"]');
            btn.innerHTML = '⏳ Testing...';
            btn.disabled = true;
        });
    </script>
</body>
</html>