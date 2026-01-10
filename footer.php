<!-- Modern Footer Design -->
<style>
    :root {
        --footer-bg-dark: #0f172a;
        --footer-bg-darker: #020617;
        --footer-text: #94a3b8;
        --footer-heading: #f1f5f9;
        --footer-accent: #6366f1;
        --footer-accent-hover: #818cf8;
    }

    .modern-footer {
        background: linear-gradient(180deg, var(--footer-bg-dark) 0%, var(--footer-bg-darker) 100%);
        color: var(--footer-text);
        position: relative;
        overflow: hidden;
    }

    .modern-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--footer-accent), transparent);
    }

    /* Floating WhatsApp Button */
    .whatsapp-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 30px;
        right: 30px;
        background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
        color: #fff;
        border-radius: 50%;
        text-align: center;
        font-size: 30px;
        box-shadow: 0 8px 24px rgba(37, 211, 102, 0.4);
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        animation: pulse 2s infinite;
    }

    .whatsapp-float:hover {
        transform: scale(1.1);
        box-shadow: 0 12px 32px rgba(37, 211, 102, 0.6);
    }

    @keyframes pulse {
        0%, 100% { box-shadow: 0 8px 24px rgba(37, 211, 102, 0.4); }
        50% { box-shadow: 0 8px 24px rgba(37, 211, 102, 0.6), 0 0 0 15px rgba(37, 211, 102, 0.1); }
    }

    /* Footer Main Content */
    .footer-main {
        padding: 80px 0 60px;
        position: relative;
    }

    .footer-brand h3 {
        color: var(--footer-heading);
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .footer-brand p {
        color: var(--footer-text);
        line-height: 1.8;
        font-size: 0.95rem;
    }

    .footer-widget-title {
        color: var(--footer-heading);
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 12px;
    }

    .footer-widget-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 3px;
        background: linear-gradient(90deg, var(--footer-accent), transparent);
        border-radius: 2px;
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 12px;
        transition: all 0.3s ease;
    }

    .footer-links li a {
        color: var(--footer-text);
        text-decoration: none;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        position: relative;
        padding-left: 0;
    }

    .footer-links li a:hover {
        color: var(--footer-accent-hover);
        padding-left: 8px;
    }

    .footer-links li a::before {
        content: '→';
        opacity: 0;
        margin-right: 8px;
        transform: translateX(-10px);
        transition: all 0.3s ease;
    }

    .footer-links li a:hover::before {
        opacity: 1;
        transform: translateX(0);
    }

    /* Service Categories */
    .service-category {
        margin-bottom: 20px;
    }

    .service-category > a {
        font-weight: 600 !important;
        color: var(--footer-heading) !important;
        font-size: 1rem !important;
    }

    .service-subcategory {
        padding-left: 20px !important;
        margin-top: 8px;
    }

    .service-subcategory a {
        font-size: 0.85rem !important;
    }

    /* Bottom Bar */
    .footer-bottom {
        background: var(--footer-bg-darker);
        padding: 30px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .footer-logo-section {
        padding: 40px 0;
        text-align: center;
        background: rgba(255, 255, 255, 0.02);
    }

    .footer-logo-section img {
        max-width: 180px;
        margin-bottom: 20px;
        filter: brightness(1.2);
    }

    .footer-contact-info {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .footer-contact-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--footer-text);
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .footer-contact-item:hover {
        color: var(--footer-accent-hover);
    }

    .footer-contact-item i {
        font-size: 1.2rem;
        color: var(--footer-accent);
    }

    /* Social Links */
    .footer-social {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin: 30px 0;
    }

    .social-link {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.05);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--footer-text);
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .social-link:hover {
        background: var(--footer-accent);
        color: #fff;
        transform: translateY(-3px);
        border-color: var(--footer-accent);
    }

    .footer-copyright {
        text-align: center;
        padding: 25px 0;
        color: var(--footer-text);
        font-size: 0.9rem;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .footer-main { padding: 50px 0 30px; }
        .footer-brand, .footer-widget { margin-bottom: 40px; }
        .whatsapp-float { width: 50px; height: 50px; font-size: 24px; bottom: 20px; right: 20px; }
    }
</style>

<!-- Footer Start -->
<footer class="modern-footer">
    <!-- Floating WhatsApp Button -->
    <a href="https://api.whatsapp.com/send?phone=919363252875&text=Hi, we would like to know about your Services!" 
       class="whatsapp-float" target="_blank" aria-label="Contact us on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Main Footer Content -->
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <!-- Brand Section -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-brand">
                        <h3>Let's Transform Your Business</h3>
                        <p>We are a team of highly motivated entrepreneurs with extensive experience in strategizing and executing digital marketing campaigns across various industries. Your success is our mission.</p>
                        
                        <!-- Contact Info -->
                        <div class="mt-4">
                            <div class="footer-contact-item mb-3">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:info@thiyagidigital.com" style="color: var(--footer-text);">info@thiyagidigital.com</a>
                            </div>
                            <div class="footer-contact-item">
                                <i class="fas fa-phone-alt"></i>
                                <a href="tel:+919363252875" style="color: var(--footer-text);">+91 93632 52875</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Our Services</h4>
                        <ul class="footer-links">
                            <li class="service-category">
                                <a href="https://www.thiyagidigital.com/seo-services">Digital Marketing</a>
                            </li>
                            <li class="service-category">
                                <a href="https://www.thiyagidigital.com/web-development-service">Web Development</a>
                            </li>
                            <li class="service-category">
                                <a href="https://www.thiyagidigital.com/graphic-design-service">Design Services</a>
                            </li>
                            <li class="service-category">
                                <a href="https://www.thiyagidigital.com/web-hosting-service">Hosting & Domains</a>
                            </li>
                            <li class="mt-3">
                                <a href="https://www.thiyagidigital.com/services" style="color: var(--footer-accent) !important; font-weight: 600;">View All Services →</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Company</h4>
                        <ul class="footer-links">
                            <li><a href="https://www.thiyagidigital.com/about">About Us</a></li>
                            <li><a href="https://www.thiyagidigital.com/portfolio">Portfolio</a></li>
                            <li><a href="https://www.thiyagidigital.com/sitemap">Sitemap</a></li>
                            <li><a href="https://www.thiyagidigital.com/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Legal & Locations -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Legal</h4>
                        <ul class="footer-links">
                            <li><a href="https://www.thiyagidigital.com/privacy-policy">Privacy Policy</a></li>
                            <li><a href="https://www.thiyagidigital.com/terms-and-conditions">Terms & Conditions</a></li>
                            <li><a href="https://www.thiyagidigital.com/return-refund-policy">Refund Policy</a></li>
                        </ul>
                        
                        <h4 class="footer-widget-title mt-4">Locations</h4>
                        <ul class="footer-links">
                            <li><a href="/seo-city?city=chennai">Chennai</a></li>
                            <li><a href="/contact">Bengaluru</a></li>
                            <li><a href="/contact">Dubai</a></li>
                            <li><a href="/contact">USA</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Logo & Social Section -->
    <div class="footer-logo-section">
        <div class="container">
            <a href="/" class="d-inline-block">
                <img src="/assets/img/logo/tdigilogo.png" alt="Thiyagi Digital" loading="lazy">
            </a>
            
            <!-- Social Links -->
            <div class="footer-social">
                <a href="https://www.facebook.com/profile.php?id=61560465773612" class="social-link" target="_blank" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/thiyagidigital/" class="social-link" target="_blank" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://x.com/thiyagidigital" class="social-link" target="_blank" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://in.pinterest.com/thiyagidigital/" class="social-link" target="_blank" aria-label="Pinterest">
                    <i class="fab fa-pinterest"></i>
                </a>
                <a href="https://www.linkedin.com/company/thiyagi-digital/" class="social-link" target="_blank" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-copyright">
        <div class="container">
            <p class="mb-0">© 2026 Thiyagi Digital. All rights reserved. | Crafted with <span style="color: #ef4444;">❤</span> in Chennai</p>
        </div>
    </div>
</footer>
<!-- Footer End -->

</div>
</div>

<!-- JS here -->
<script src="/assets/js/jquery-3.6.0.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/swiper-bundle.min.js"></script>
<script src="/assets/js/appear.js"></script>
<script src="/assets/js/counter.js"></script>
<script src="/assets/js/gsap.min.js"></script>
<script src="/assets/js/knob.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/jquery.counterup.min.js"></script>
<script src="/assets/js/waypoints.min.js"></script>
<script src="/assets/js/parallax.min.js"></script>
<script src="/assets/js/ScrollTrigger.min.js"></script>
<script src="/assets/js/ScrollToPlugin.min.js"></script>
<script src="/assets/js/ScrollSmoother.min.js"></script>
<script src="/assets/js/SplitText.min.js"></script>
<script src="/assets/js/jquery.filterizr.js"></script>
<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="/assets/js/hover-resvel.js"></script>
<script src="/assets/js/split-type.min.js"></script>
<script src="/assets/js/parallax-scroll.js"></script>
<script src="/assets/js/jquery.marquee.min.js"></script>
<script src="/assets/js/wow.min.js"></script>
<script src="/assets/js/jquery.meanmenu.min.js"></script>
<script src="/assets/js/tilt.jquery.min.js"></script>
<script src="/assets/js/matter.min.js"></script>
<script src="/assets/js/script.js"></script>
<script src="/assets/js/home-6.js"></script>
</body>
</html>
