<!DOCTYPE html>
<html>
<head>
    <title>Test Contact Form - ThiyagiDigital</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; }
        button { background: #007cba; color: white; padding: 12px 30px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        button:hover { background: #005a87; }
        .info { background: #e7f3ff; padding: 15px; border-radius: 5px; margin-bottom: 20px; border-left: 4px solid #007cba; }
        .success { background: #d4edda; border-left-color: #28a745; color: #155724; }
        .link { margin-top: 20px; padding: 15px; background: #f8f9fa; border-radius: 5px; }
        a { color: #007cba; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🧪 Test Contact Form Submission</h1>
        
        <div class="info">
            <strong>Test Instructions:</strong><br>
            1. Fill out the form below with test data<br>
            2. Click "Submit Test"<br>
            3. You should be redirected to thank you page<br>
            4. Check admin panel to see your submission<br>
            5. Check email to see if notification was received
        </div>

        <form method="post" action="mailer.php">
            <div class="form-group">
                <label>Name*</label>
                <input type="text" name="name" value="Test User" required>
            </div>

            <div class="form-group">
                <label>Phone*</label>
                <input type="tel" name="phone" value="+91 9876543210" required>
            </div>

            <div class="form-group">
                <label>Email*</label>
                <input type="email" name="email" value="test@example.com" required>
            </div>

            <div class="form-group">
                <label>Service Interest*</label>
                <select name="service" required>
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
                <label>Message (Optional)</label>
                <textarea name="message" rows="4">This is a test submission to verify the contact form is working correctly.</textarea>
            </div>

            <button type="submit">🚀 Submit Test</button>
        </form>

        <div class="link">
            <strong>📊 View Submissions:</strong><br>
            <a href="admin_contacts.php?pass=thiyagi2024" target="_blank">Open Admin Panel →</a>
        </div>

        <div class="link">
            <strong>🔍 Check Files Created:</strong><br>
            • contact_submissions.json<br>
            • contact_submissions.txt<br>
            • email_log.txt
        </div>

        <div class="link">
            <strong>📧 Expected Behavior:</strong><br>
            • Form data saved to both TXT and JSON files<br>
            • Emails attempted to 3 recipients<br>
            • Redirect to thankyou.php<br>
            • Submission visible in admin panel<br>
            • Email log shows attempt results
        </div>
    </div>
</body>
</html>
