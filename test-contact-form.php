<!DOCTYPE html>
<html>
<head>
    <title>Test Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; background: #f5f5f5; }
        .form-container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #333; }
        input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px; }
        select { background: white; }
        textarea { height: 100px; resize: vertical; }
        .submit-btn { background: #007cba; color: white; border: none; padding: 15px 30px; border-radius: 5px; cursor: pointer; font-size: 16px; }
        .submit-btn:hover { background: #005a87; }
        .submit-btn:disabled { background: #ccc; cursor: not-allowed; }
        .required { color: red; }
        .info { background: #e7f3ff; padding: 15px; border-left: 4px solid #2196F3; margin-bottom: 20px; }
        .success { background: #d4edda; color: #155724; padding: 15px; border-left: 4px solid #28a745; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>🧪 Test Contact Form Submission</h2>
        
        <div class="info">
            <strong>📋 Test Purpose:</strong> This form tests the complete contact submission flow:<br>
            ✅ Form validation → ✅ Data processing → ✅ Email sending → ✅ Data storage → ✅ Admin panel
        </div>

        <form action="contact-action" method="POST" enctype="multipart/form-data" id="testContactForm">
            <div class="form-group">
                <label for="name">Full Name <span class="required">*</span></label>
                <input type="text" id="name" name="name" value="John Test User" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address <span class="required">*</span></label>
                <input type="email" id="email" name="email" value="test@example.com" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number <span class="required">*</span></label>
                <input type="tel" id="phone" name="phone" value="+91 9876543210" required>
            </div>

            <div class="form-group">
                <label for="service">Service Interested <span class="required">*</span></label>
                <select id="service" name="service" required>
                    <option value="">Select Service</option>
                    <option value="Website Development" selected>Website Development</option>
                    <option value="SEO Services">SEO Services</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="E-commerce Development">E-commerce Development</option>
                    <option value="Graphic Design">Graphic Design</option>
                    <option value="Content Writing">Content Writing</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Tell us about your project requirements...">This is a test submission from the test form. Testing the complete contact form flow including data storage and email functionality.</textarea>
            </div>

            <div class="form-group">
                <label for="attachment">File Attachment (Optional)</label>
                <input type="file" id="attachment" name="attachment" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.txt">
                <small style="color: #666;">Max file size: 5MB. Allowed types: PDF, DOC, DOCX, JPG, PNG, TXT</small>
            </div>

            <button type="submit" class="submit-btn" id="submitBtn">
                📤 Test Submit Form
            </button>
        </form>

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 5px;">
            <h3>🔍 After Submission Check:</h3>
            <ol>
                <li><strong>Email Check:</strong> Check if emails were sent to:
                    <ul>
                        <li>📧 gopikannaps@gmail.com (Primary)</li>
                        <li>📧 kannasivamp@gmail.com (CC)</li>
                        <li>📧 kannasivamps@gmail.com (BCC)</li>
                    </ul>
                </li>
                <li><strong>Data Storage:</strong> Check <a href="admin_contacts.php" target="_blank">Admin Panel</a> (Password: admin123)</li>
                <li><strong>Files:</strong> Check if contact_submissions.json and contact_submissions.txt are created</li>
                <li><strong>Redirect:</strong> Should redirect to thankyou page after submission</li>
            </ol>
        </div>
    </div>

    <script>
        document.getElementById('testContactForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '⏳ Testing...';
            
            console.log('Test form submission started');
        });
    </script>
</body>
</html>