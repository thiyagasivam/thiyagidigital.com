# XAMPP Email Configuration Guide

## Problem: PHP mail() function doesn't work on XAMPP by default

### Solution 1: Configure XAMPP to use Gmail SMTP

1. **Install sendmail for XAMPP:**
   - Download sendmail from: https://www.glob.com.au/sendmail/
   - Extract to: `C:\xampp\sendmail\`

2. **Configure sendmail.ini:**
   ```ini
   [sendmail]
   smtp_server=smtp.gmail.com
   smtp_port=587
   auth_username=your-email@gmail.com
   auth_password=your-app-password
   force_sender=your-email@gmail.com
   ```

3. **Configure php.ini:**
   ```ini
   [mail function]
   SMTP = smtp.gmail.com
   smtp_port = 587
   sendmail_from = your-email@gmail.com
   sendmail_path = "C:\xampp\sendmail\sendmail.exe -t"
   ```

4. **Restart XAMPP Apache**

### Solution 2: Use PHPMailer (Recommended)

1. **Download PHPMailer:**
   ```bash
   composer require phpmailer/phpmailer
   ```

2. **Use in your mailer.php:**
   ```php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;

   $mail = new PHPMailer(true);
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->SMTPAuth = true;
   $mail->Username = 'your-email@gmail.com';
   $mail->Password = 'your-app-password';
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
   $mail->Port = 587;
   ```

### Solution 3: Use External Services

1. **Telegram Bot (Instant notifications):**
   - Create bot via @BotFather
   - Get bot token and your chat ID
   - Send instant notifications to your phone

2. **WhatsApp Business API:**
   - Use services like Twilio, MessageBird
   - Get instant lead notifications on WhatsApp

3. **Slack/Discord Webhooks:**
   - Create webhook in your workspace
   - Get instant notifications in your team chat

### Current Solution in mailer.php:

✅ **File-based backup** - All leads saved to `leads.txt`
✅ **Multiple email attempts** - Different header configurations
✅ **Detailed logging** - Check `email_log.txt` for troubleshooting
✅ **Fallback methods** - System works even if email fails

### Testing Your Setup:

1. Submit a test form
2. Check `leads.txt` - Lead should be saved here immediately
3. Check `email_log.txt` - Shows email attempt status
4. Configure one of the above solutions for reliable email delivery

### Quick Test Command:
```php
// Test PHP mail function
php -r "mail('your-email@gmail.com', 'Test', 'PHP mail test from XAMPP');"
```

### Gmail App Password Setup:
1. Enable 2-Factor Authentication on Gmail
2. Go to Google Account Settings > Security > App Passwords
3. Generate app password for "Mail"
4. Use this password (not your Gmail password)

---

**Current Status:** Your lead capture system is working perfectly with file backup. Email delivery can be enhanced using any of the above methods.