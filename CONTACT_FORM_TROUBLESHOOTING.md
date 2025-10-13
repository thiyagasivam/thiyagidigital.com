# 🔧 CONTACT FORM TROUBLESHOOTING GUIDE

## Current Issue: Contact form not working or receiving data

### 📋 Quick Diagnosis Steps:

1. **Test the Debug Version:**
   - Visit: `contact-debug-test.php`
   - Fill and submit the test form
   - Check if data is saved and emails are sent

2. **Check System Status:**
   - Visit: `php-config-check.php`
   - Review PHP mail settings and file permissions

3. **View Debug Logs:**
   - Look for: `debug_contact_[today's date].log`
   - Check for error messages and processing steps

---

## 🔍 Possible Issues & Solutions:

### Issue 1: Form not submitting
**Symptoms:** Form doesn't submit, stays on same page
**Solutions:**
- Check if JavaScript is blocking submission
- Verify form action points to `contact-action.php`
- Check browser console for JavaScript errors

### Issue 2: PHP mail not working
**Symptoms:** Data saves but no emails received
**Solutions:**
- XAMPP mail configuration (common issue):
  ```
  1. Configure sendmail in XAMPP
  2. Edit php.ini: 
     - sendmail_path = "C:\xampp\sendmail\sendmail.exe -t"
  3. Configure sendmail.ini in C:\xampp\sendmail\
  ```

### Issue 3: File upload not working  
**Symptoms:** File upload fails or errors
**Solutions:**
- Check folder permissions: `uploads/contact_attachments/`
- Verify PHP upload settings in php.ini
- Check file size limits (5MB max)

### Issue 4: Data not saving
**Symptoms:** No entries in admin panel
**Solutions:**
- Check write permissions on current directory
- Verify `contact_submissions.json` can be created/written
- Check PHP error logs

---

## ⚡ Quick Fixes Applied:

### 1. Added Error Reporting
```php
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

### 2. Improved Success Page
- Changed from header redirect to HTML page with meta redirect
- Shows confirmation message before redirect
- Provides fallback link if redirect fails

### 3. Debug Tools Created
- `contact-debug-test.php` - Test form with detailed feedback
- `contact-action-debug.php` - Debug version with extensive logging
- `php-config-check.php` - System configuration check

---

## 📧 Email Configuration for XAMPP:

### Step 1: Configure php.ini
```ini
[mail function]
SMTP = smtp.gmail.com
smtp_port = 587
sendmail_from = your-email@gmail.com
sendmail_path = "C:\xampp\sendmail\sendmail.exe -t"
```

### Step 2: Configure sendmail.ini
```ini
[sendmail]
smtp_server = smtp.gmail.com
smtp_port = 587
smtp_ssl = tls
auth_username = your-email@gmail.com
auth_password = your-app-password
force_sender = your-email@gmail.com
```

### Step 3: Restart Apache
After configuration changes, restart Apache in XAMPP Control Panel.

---

## 🧪 Test Sequence:

### Test 1: Basic Form Submission
1. Visit `contact-debug-test.php`
2. Fill required fields only (no file)
3. Submit and check results

### Test 2: With File Upload
1. Use same test form
2. Add a small PDF or image
3. Submit and verify file is uploaded

### Test 3: Email Functionality
1. Check if emails arrive at configured addresses
2. Verify CC emails are also sent
3. Check if attachments are included

### Test 4: Admin Panel
1. Visit `admin_contacts.php?pass=thiyagi2024`
2. Verify submissions appear
3. Check attachment information is displayed

---

## 🔧 Current File Status:

### Modified Files:
- ✅ `contact.php` - Form points to `contact-action.php`
- ✅ `contact-action.php` - Added error reporting and better success page
- ✅ `admin_contacts.php` - Shows attachment info

### Debug Files Created:
- ✅ `contact-debug-test.php` - Test form with system status
- ✅ `contact-action-debug.php` - Debug version with extensive logging
- ✅ `php-config-check.php` - PHP configuration checker

---

## 📊 Expected Behavior:

1. **User submits form** → Form data sent to `contact-action.php`
2. **Data validation** → Check required fields and email format
3. **File upload** → Handle attachment if provided
4. **Data storage** → Save to JSON and TXT files
5. **Email sending** → Send to TO and CC addresses with attachment
6. **Success page** → Show confirmation and redirect to thank you page

---

## 🚨 Common XAMPP Issues:

### Mail Not Working:
- **Problem:** XAMPP doesn't have mail server by default
- **Solution:** Configure with Gmail SMTP or use local mail server

### Permission Issues:
- **Problem:** Cannot write files
- **Solution:** Run XAMPP as administrator or check folder permissions

### PHP Extensions:
- **Problem:** Missing PHP extensions
- **Solution:** Enable required extensions in php.ini

---

## 🔍 Debug Information:

### Check These Files:
1. **Debug Log:** `debug_contact_[date].log`
2. **PHP Error Log:** Check XAMPP/php/logs/
3. **Apache Error Log:** Check XAMPP/apache/logs/
4. **Submission Data:** `contact_submissions.json`

### Verify These URLs:
- ✅ `contact` - Contact form page
- ✅ `contact-action.php` - Form processing
- ✅ `thankyou` - Thank you page  
- ✅ `admin_contacts.php?pass=thiyagi2024` - Admin panel

---

## 📞 Next Steps:

1. **Run the test form:** `contact-debug-test.php`
2. **Check system config:** `php-config-check.php`  
3. **Review debug logs:** Look for error messages
4. **Test main form:** Use regular contact page
5. **Verify admin panel:** Check if data appears

---

## 📝 Quick Commands for Testing:

### Test Form Submission:
```
1. Open: http://localhost/live/thiyagidigital/contact-debug-test.php
2. Fill all required fields
3. Submit and check results
```

### Check System Status:
```
1. Open: http://localhost/live/thiyagidigital/php-config-check.php
2. Review all status indicators
3. Fix any red/failed items
```

### View Admin Panel:
```
1. Open: http://localhost/live/thiyagidigital/admin_contacts.php?pass=thiyagi2024
2. Check for new submissions
3. Verify data is being stored
```

---

**Status:** 🔧 Troubleshooting mode active  
**Next Action:** Test the debug form and check results  
**Files Ready:** All debug tools and fixes applied