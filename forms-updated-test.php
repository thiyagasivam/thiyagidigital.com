<!DOCTYPE html>
<html>
<head>
    <title>✅ Contact Form Updated - Test Both Forms</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 1000px; margin: 20px auto; padding: 20px; background: #f5f5f5; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin: 20px 0; }
        .success { background: #d4edda; border-left: 4px solid #28a745; color: #155724; }
        .info { background: #e7f3ff; border-left: 4px solid #2196F3; color: #0c5460; }
        .forms-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin: 20px 0; }
        .form-container { background: #f8f9fa; padding: 20px; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { background: #007cba; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; width: 100%; }
        button:hover { background: #005a87; }
        .test-links { margin: 15px 0; }
        .test-links a { background: #28a745; color: white; padding: 8px 12px; text-decoration: none; border-radius: 3px; margin: 5px; display: inline-block; }
        .code { background: #e9ecef; padding: 10px; border-radius: 3px; font-family: monospace; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container success">
        <h1>✅ Contact Forms Updated Successfully!</h1>
        <p><strong>Both contact form and sidebar forms now use your reference mailer code with dashboard data saving.</strong></p>
    </div>

    <div class="container info">
        <h3>📧 Email Configuration:</h3>
        <div class="code">
            TO: gopikannaps@gmail.com<br>
            CC: kannasivamp@gmail.com<br>
            BCC: kannasivamps@gmail.com<br>
            Subject: Thiyagi Contact Form Submission
        </div>

        <h3>💾 Data Storage:</h3>
        <ul>
            <li>✅ All submissions saved to contact_submissions.json</li>
            <li>✅ Backup saved to contact_submissions.txt</li>
            <li>✅ File attachments supported (main contact form)</li>
            <li>✅ Admin dashboard shows all submissions</li>
        </ul>

        <h3>🔄 Form Flow:</h3>
        <ol>
            <li>User submits form → Data sanitized and validated</li>
            <li>Data saved to dashboard files (ALWAYS happens)</li>
            <li>Email sent to recipients (gopikannaps@gmail.com + CC/BCC)</li>
            <li>Status updated (email_sent or email_failed)</li>
            <li>User redirected to thank you page (ALWAYS happens)</li>
        </ol>
    </div>

    <div class="container">
        <h2>🧪 Test Both Forms</h2>
        
        <div class="forms-grid">
            <!-- Main Contact Form Test -->
            <div class="form-container">
                <h3>📝 Main Contact Form (with file upload)</h3>
                <form action="contact-action" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" name="name" value="John Main Form" required>
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" value="mainform@test.com" required>
                    </div>
                    <div class="form-group">
                        <label>Phone *</label>
                        <input type="tel" name="phone" value="+91 9876543210" required>
                    </div>
                    <div class="form-group">
                        <label>Service *</label>
                        <select name="service" required>
                            <option value="">Choose Service</option>
                            <option value="SEO Services" selected>SEO Services</option>
                            <option value="Web Development">Web Development</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" rows="3">Test message from main contact form with updated reference mailer code.</textarea>
                    </div>
                    <div class="form-group">
                        <label>File (Optional)</label>
                        <input type="file" name="attachment" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.txt">
                    </div>
                    <button type="submit">Test Main Form</button>
                </form>
            </div>

            <!-- Sidebar Form Test -->
            <div class="form-container">
                <h3>📋 Sidebar Form (simulated)</h3>
                <form action="contact-action" method="POST">
                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" name="name" value="Jane Sidebar" required>
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" value="sidebar@test.com" required>
                    </div>
                    <div class="form-group">
                        <label>Phone *</label>
                        <input type="tel" name="phone" value="+91 8765432109" required>
                    </div>
                    <div class="form-group">
                        <label>Service *</label>
                        <select name="service" required>
                            <option value="">Choose Service</option>
                            <option value="Social Media Marketing" selected>Social Media Marketing</option>
                            <option value="SEO Services">SEO Services</option>
                            <option value="Content Writing">Content Writing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" rows="3">Test message from sidebar form using the same contact-action processor.</textarea>
                    </div>
                    <button type="submit">Test Sidebar Form</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <h3>🔗 Quick Access Links:</h3>
        <div class="test-links">
            <a href="contact">📝 Real Contact Page</a>
            <a href="admin-working">👨‍💼 Working Admin Panel</a>
            <a href="admin_contacts?pass=admin123">🔐 Full Admin Panel</a>
            <a href="contact-form-debug">🔧 System Debug</a>
        </div>

        <h3>📊 What Changed:</h3>
        <ul>
            <li>✅ Updated contact-action.php to match your reference mailer code</li>
            <li>✅ Kept dashboard data saving functionality</li>
            <li>✅ Both main and sidebar forms use same processor</li>
            <li>✅ Email headers match your reference exactly</li>
            <li>✅ User always gets success page (even if email fails)</li>
            <li>✅ Admin can track email success/failure status</li>
        </ul>
    </div>

    <div class="container info">
        <h3>📋 Technical Details:</h3>
        <p><strong>Email Recipients:</strong></p>
        <div class="code">
            $to = "gopikannaps@gmail.com";<br>
            $cc = 'kannasivamp@gmail.com';<br>
            $bcc = 'kannasivamps@gmail.com';
        </div>

        <p><strong>Form Processing:</strong></p>
        <div class="code">
            1. Data sanitization with FILTER_SANITIZE_STRING/EMAIL<br>
            2. Required field validation<br>
            3. File upload handling (main form only)<br>
            4. Dashboard data storage (JSON + TXT)<br>
            5. Email sending with your reference headers<br>
            6. Status tracking and redirect to thank you page
        </div>
    </div>

    <script>
        // Add form submission feedback
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const btn = this.querySelector('button[type="submit"]');
                btn.innerHTML = '⏳ Submitting...';
                btn.disabled = true;
            });
        });
    </script>
</body>
</html>