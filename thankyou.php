    
<?php
$page_title = 'Thank You - Message Sent Successfully | ThiyagiDigital';
$page_description = 'Thank you for contacting ThiyagiDigital. Our team will reach out to you shortly to discuss your digital marketing needs.';
$page_robots = 'noindex, nofollow';
include 'header.php';
?>

<section style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 70vh; padding: 100px 0;">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 col-md-10 text-center">
                <div style="background: white; padding: 60px 40px; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.1);">
                    
                    <!-- Success Icon -->
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#28a745" viewBox="0 0 16 16" class="animate__animated animate__bounceIn">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                    </div>
                    
                    <!-- Thank You Message -->
                    <h1 style="color: #333; font-size: 2.5rem; font-weight: 700; margin-bottom: 20px;">Thank You!</h1>
                    <h2 style="color: #666; font-size: 1.3rem; font-weight: 400; margin-bottom: 30px;">Your message has been sent successfully</h2>
                    
                    <!-- Message Details -->
                    <div style="background: #f8f9fa; padding: 30px; border-radius: 10px; margin: 30px 0;">
                        <h3 style="color: #333; font-size: 1.2rem; margin-bottom: 15px;">What happens next?</h3>
                        <div style="color: #666; line-height: 1.8;">
                            <p>✅ <strong>Message Received:</strong> We have received your inquiry</p>
                            <p>📞 <strong>Quick Response:</strong> Our team will contact you within 24 hours</p>
                            <p>💼 <strong>Free Consultation:</strong> We'll discuss your digital marketing needs</p>
                            <p>📈 <strong>Custom Strategy:</strong> We'll create a tailored plan for your business</p>
                        </div>
                    </div>
                    
                    <!-- Contact Information -->
                    <div style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 25px; border-radius: 10px; margin: 30px 0;">
                        <h3 style="margin-bottom: 15px; font-size: 1.1rem;">Need Immediate Assistance?</h3>
                        <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
                            <div>
                                <strong>📧 Email:</strong><br>
                                <a href="mailto:info@thiyagidigital.com" style="color: #fff; text-decoration: none;">info@thiyagidigital.com</a>
                            </div>
                            <div>
                                <strong>📱 Phone:</strong><br>
                                <a href="tel:+919363252875" style="color: #fff; text-decoration: none;">+91 9363252875</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div style="margin-top: 40px;">
                        <a href="/" class="btn" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 15px 30px; border-radius: 50px; text-decoration: none; margin: 0 10px; display: inline-block; font-weight: 600; transition: all 0.3s;">
                            🏠 Back to Home
                        </a>
                        <a href="/services" class="btn" style="background: transparent; color: #667eea; padding: 15px 30px; border: 2px solid #667eea; border-radius: 50px; text-decoration: none; margin: 0 10px; display: inline-block; font-weight: 600; transition: all 0.3s;">
                            🚀 View Our Services
                        </a>
                    </div>
                    
                    <!-- Social Media -->
                    <div style="margin-top: 40px; padding-top: 30px; border-top: 1px solid #eee;">
                        <p style="color: #666; margin-bottom: 15px;">Follow us for digital marketing tips:</p>
                        <div style="display: flex; justify-content: center; gap: 20px;">
                            <a href="#" style="color: #667eea; font-size: 1.5rem; transition: all 0.3s;">📘</a>
                            <a href="#" style="color: #667eea; font-size: 1.5rem; transition: all 0.3s;">📷</a>
                            <a href="#" style="color: #667eea; font-size: 1.5rem; transition: all 0.3s;">🐦</a>
                            <a href="#" style="color: #667eea; font-size: 1.5rem; transition: all 0.3s;">💼</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add some animation styles -->
<style>
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    
    @media (max-width: 768px) {
        section {
            padding: 50px 0 !important;
        }
        
        .col-lg-8 > div {
            padding: 40px 20px !important;
        }
        
        h1 {
            font-size: 2rem !important;
        }
        
        .btn {
            display: block !important;
            margin: 10px 0 !important;
            width: 100%;
        }
    }
</style>

<?php include 'footer.php'; ?>
