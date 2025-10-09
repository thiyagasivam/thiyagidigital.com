# 📋 CONTACT FORM - QUICK REFERENCE

## 🔗 Important URLs

| Page | URL | Purpose |
|------|-----|---------|
| **Contact Form** | `/contact` | Main contact form |
| **Thank You** | `/thankyou` | Success page |
| **Admin Panel** | `/admin_contacts.php?pass=thiyagi2024` | View submissions |
| **Testing Page** | `/contact-test.php` | Verify setup |

---

## ⚙️ Configuration Quick Reference

### Email Settings (contact-action.php)
```php
$TO_EMAIL = 'info@thiyagidigital.com';      // Line 5
$CC_EMAIL = 'support@thiyagidigital.com';   // Line 6
```

### Admin Password (admin_contacts.php)
```php
$correct_password = 'thiyagi2024';           // Line 7
```

### Upload Settings (contact-action.php)
```php
$UPLOAD_DIR = 'uploads/contact_attachments/'; // Line 7
$maxSize = 5 * 1024 * 1024;                  // Line 126 (5MB)
$allowedExtensions = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'txt']; // Line 131
```

---

## 📂 File Locations

| File | Purpose |
|------|---------|
| `contact.php` | Contact form page |
| `contact-action.php` | Form processing & email |
| `thankyou.php` | Thank you page |
| `admin_contacts.php` | Admin dashboard |
| `contact_submissions.json` | Submissions data (JSON) |
| `contact_submissions.txt` | Submissions backup (TXT) |
| `uploads/contact_attachments/` | Uploaded files |

---

## 🔑 Key Features

✅ File upload (5MB max, PDF/DOC/Image)  
✅ Email to TO + CC addresses  
✅ Attachments in emails  
✅ Data storage (even if email fails)  
✅ Admin dashboard  
✅ Thank you page redirect  
✅ Clean URLs (no .php)  
✅ Security features  

---

## 🧪 Quick Test Commands

### Test in Browser:
1. Visit: `contact-test.php` → System check
2. Visit: `contact` → Fill and submit form
3. Visit: `admin_contacts.php?pass=thiyagi2024` → View submission

### Check Files:
```powershell
# Check if files exist
Test-Path contact.php
Test-Path contact-action.php
Test-Path thankyou.php
Test-Path admin_contacts.php

# Check upload directory
Test-Path uploads\contact_attachments
```

---

## 🚨 Troubleshooting Quick Fixes

| Problem | Solution |
|---------|----------|
| Emails not sending | Check PHP mail config, verify SMTP settings |
| Upload fails | Check folder permissions (755), verify php.ini upload settings |
| Clean URLs broken | Enable mod_rewrite, check .htaccess exists |
| Can't access admin | Use full URL: `admin_contacts.php?pass=thiyagi2024` |
| 404 errors | Restart Apache, clear browser cache |

---

## 📧 Email Recipients

- **Primary (TO):** info@thiyagidigital.com
- **Copy (CC):** support@thiyagidigital.com
- **From:** noreply@thiyagidigital.com
- **Reply-To:** [Customer's email]

---

## 🔐 Admin Access

**URL:** `admin_contacts.php?pass=thiyagi2024`  
**Password:** `thiyagi2024`  
**Change password in:** `admin_contacts.php` line 7

---

## 📊 What Admin Panel Shows

- Total submissions
- Email sent count
- Email failed count
- Last 24 hours count
- All submission details
- Attachment information
- Status indicators

---

## ✅ Success Indicators

After submitting form:
1. ✅ User redirected to `/thankyou`
2. ✅ Email received at info@thiyagidigital.com
3. ✅ CC email received at support@thiyagidigital.com
4. ✅ Attachment included in emails
5. ✅ Data appears in admin panel
6. ✅ Status shows "EMAIL SENT"

---

## 🎯 Common Tasks

### Change Email Address:
Edit `contact-action.php` lines 5-6

### Change Admin Password:
Edit `admin_contacts.php` line 7

### Add Allowed File Type:
Edit `contact-action.php` line 131

### Increase Upload Limit:
Edit `contact-action.php` line 126

### View Submissions:
Visit `admin_contacts.php?pass=thiyagi2024`

### Export Data:
Copy `contact_submissions.json` or `.txt` file

---

## 📱 Contact Information on Site

- **Email:** info@thiyagidigital.com
- **Support:** support@thiyagidigital.com
- **Phone:** +91 9363252875
- **Address:** 3/651, Annai Avenue, Thoraipakkam, Chennai, Tamil Nadu 600097

---

## 🔄 Form Flow

```
User visits /contact
    ↓
Fills form + uploads file (optional)
    ↓
Submits to /contact-action
    ↓
File uploaded → Data saved → Email sent
    ↓
Redirect to /thankyou
    ↓
Admin views in admin_contacts.php
```

---

## 📝 Data Format

**JSON (one line per submission):**
```json
{"id":"contact_xxx","timestamp":"2025-10-09 14:30:00","name":"Name","phone":"Phone","email":"Email","service":"Service","message":"Message","attachment":"file.pdf","ip":"IP","status":"email_sent"}
```

**TXT (formatted for reading):**
```
=== NEW CONTACT - 2025-10-09 14:30:00 ===
Name: Name
Phone: Phone
Email: Email
Service: Service
Message: Message
Attachment: file.pdf
IP: IP
=====================================
```

---

## 🎨 Status Colors in Admin

- 🟢 **Green** - Received
- 🔵 **Blue** - Email sent successfully
- 🟡 **Yellow** - Email failed
- 🔴 **Red** - Error

---

## 📦 Backup These Files

Regular backups recommended:
- ✅ `contact_submissions.json`
- ✅ `contact_submissions.txt`
- ✅ `uploads/contact_attachments/*`

---

## ⚡ Performance Tips

1. Clear old attachments monthly
2. Archive old submissions
3. Monitor file sizes
4. Keep upload folder clean
5. Regular security updates

---

**Quick Help:** See `CONTACT_FORM_README.md` for full documentation  
**Version:** 2.0 | **Date:** October 9, 2025 | **Status:** ✅ Ready
