<?php
$page_title = 'Our Services | ThiyagiDigital - Complete Digital Solutions';
$page_description = 'Explore our comprehensive range of digital services including SEO, web development, eCommerce solutions, hosting services, and creative design. Professional digital solutions for your business growth.';
$page_keywords = 'digital marketing services, web development, eCommerce development, SEO services, hosting services, logo design, graphic design, ThiyagiDigital services';

// Breadcrumb Schema
$canonical_url = 'https://www.thiyagidigital.com/services';
$breadcrumbSchema = [
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => 'https://www.thiyagidigital.com/'
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Services',
            'item' => $canonical_url
        ]
    ]
];

$page_schema = [
    '@context' => 'https://schema.org',
    '@graph' => [ $breadcrumbSchema ]
];

include 'header.php';
?>

<!-- Start of breadcrumb section -->
<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="assets/img/bg/bread-bg.jpg">
    <div class="background_overlay"></div>
    <div class="container">
        <div class="bi-breadcrumbs-content headline ul-li text-center">
            <h1 style="color: white"><b>Our Digital Services</b></h1><br>
            <ul>
                <li><a href="/#">Home</a></li>
                <li style="color: white">Services</li>
            </ul>
        </div>
    </div>
</section>
<!-- End of breadcrumb section -->

<!-- Start of Services Overview section -->
<section id="bi-service-overview" class="bi-service-overview-section inner-page-padding">
    <div class="container">
        <div class="bi-service-overview-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bi-service-overview-text-area text-center mb-60">
                        <h2 class="headline">Complete Digital Solutions for Your Business Growth</h2>
                        <p class="pera-content">At ThiyagiDigital, we offer a comprehensive suite of digital services designed to elevate your online presence, drive traffic, and boost your business revenue. From digital marketing to web development and creative design, we're your one-stop solution for all digital needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Services Overview section -->

<!-- Start of Services Categories section -->
<section id="bi-services-categories" class="bi-services-categories-section pb-90">
    <div class="container">
        <!-- Digital Marketing Services -->
        <div class="service-category mb-80">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-header text-center mb-50">
                        <h3 class="category-title">Digital Marketing Services</h3>
                        <p class="category-desc">Drive targeted traffic and boost your online visibility with our proven digital marketing strategies.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/seo-icon.png" alt="SEO Services" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="seo-services">SEO Services</a></h4>
                            <p>Improve your search engine rankings and drive organic traffic with our comprehensive SEO strategies.</p>
                            <a href="seo-services" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/sem-icon.png" alt="SEM Services" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="sem-services">SEM Services</a></h4>
                            <p>Maximize your online visibility with targeted search engine marketing and PPC campaigns.</p>
                            <a href="sem-services" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/smm-icon.png" alt="Social Media Marketing" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="smm-service">Social Media Marketing</a></h4>
                            <p>Build brand awareness and engage your audience across all major social media platforms.</p>
                            <a href="smm-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/content-icon.png" alt="Content Writing" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="content-writing-service">Content Writing</a></h4>
                            <p>Create compelling, SEO-optimized content that engages your audience and drives conversions.</p>
                            <a href="content-writing-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/email-icon.png" alt="Email Marketing" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="email-marketing-service">Email Marketing</a></h4>
                            <p>Nurture leads and drive sales with targeted email marketing campaigns and automation.</p>
                            <a href="email-marketing-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Web Development Services -->
        <div class="service-category mb-80">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-header text-center mb-50">
                        <h3 class="category-title">Web Development Services</h3>
                        <p class="category-desc">Build powerful, responsive websites and web applications tailored to your business needs.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/web-dev-icon.png" alt="Web Development" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="web-development-service">Web Development</a></h4>
                            <p>Custom web development solutions using the latest technologies and best practices.</p>
                            <a href="web-development-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/woocommerce-icon.png" alt="WooCommerce Development" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="woocommerce-development-service">WooCommerce Development</a></h4>
                            <p>Build powerful WordPress eCommerce stores with WooCommerce platform customization.</p>
                            <a href="woocommerce-development-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/shopify-icon.png" alt="Shopify Development" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="shopify-development-service">Shopify Development</a></h4>
                            <p>Create stunning Shopify stores with custom themes and powerful eCommerce functionality.</p>
                            <a href="shopify-development-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/magento-icon.png" alt="Magento Development" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="magento-development-service">Magento Development</a></h4>
                            <p>Enterprise-level Magento eCommerce solutions for scalable online business growth.</p>
                            <a href="magento-development-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/opencart-icon.png" alt="OpenCart Development" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="opencart-development-service">OpenCart Development</a></h4>
                            <p>Flexible OpenCart eCommerce development for user-friendly online store management.</p>
                            <a href="opencart-development-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- eCommerce Services -->
        <div class="service-category mb-80">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-header text-center mb-50">
                        <h3 class="category-title">eCommerce Services</h3>
                        <p class="category-desc">Complete eCommerce solutions to launch and grow your online business successfully.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/ecommerce-dev-icon.png" alt="eCommerce Development" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="ecommerce-development-service">eCommerce Development</a></h4>
                            <p>Comprehensive eCommerce development solutions for modern online retail success.</p>
                            <a href="ecommerce-development-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/store-setup-icon.png" alt="Online Store Setup" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="online-store-setup-service">Online Store Setup</a></h4>
                            <p>Quick and efficient online store setup services to get your business online fast.</p>
                            <a href="online-store-setup-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/payment-gateway-icon.png" alt="Payment Gateway Integration" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="payment-gateway-integration-service">Payment Gateway Integration</a></h4>
                            <p>Secure payment processing integration for seamless customer transactions.</p>
                            <a href="payment-gateway-integration-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/shopping-cart-icon.png" alt="Shopping Cart Development" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="shopping-cart-development-service">Shopping Cart Development</a></h4>
                            <p>Custom shopping cart solutions for enhanced user experience and conversion rates.</p>
                            <a href="shopping-cart-development-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/product-catalog-icon.png" alt="Product Catalog Management" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="product-catalog-management-service">Product Catalog Management</a></h4>
                            <p>Efficient product catalog management systems for streamlined inventory control.</p>
                            <a href="product-catalog-management-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/marketplace-icon.png" alt="Multi-vendor Marketplace" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="multi-vendor-marketplace-service">Multi-vendor Marketplace</a></h4>
                            <p>Advanced multi-vendor marketplace development for scalable eCommerce platforms.</p>
                            <a href="multi-vendor-marketplace-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hosting & Domain Services -->
        <div class="service-category mb-80">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-header text-center mb-50">
                        <h3 class="category-title">Hosting & Domain Services</h3>
                        <p class="category-desc">Reliable hosting solutions and domain services to keep your website running smoothly.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/web-hosting-icon.png" alt="Web Hosting" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="web-hosting-service">Web Hosting</a></h4>
                            <p>Fast, secure, and reliable web hosting solutions with 99.9% uptime guarantee.</p>
                            <a href="web-hosting-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/domain-icon.png" alt="Domain Registration" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="domain-registration-service">Domain Registration</a></h4>
                            <p>Secure your perfect domain name with competitive pricing and easy management.</p>
                            <a href="domain-registration-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/cloud-hosting-icon.png" alt="Cloud Hosting" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="cloud-hosting-service">Cloud Hosting</a></h4>
                            <p>Scalable cloud hosting solutions with auto-scaling and high availability features.</p>
                            <a href="cloud-hosting-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/vps-hosting-icon.png" alt="VPS Hosting" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="vps-hosting-service">VPS Hosting</a></h4>
                            <p>Virtual private server hosting with dedicated resources and full root access control.</p>
                            <a href="vps-hosting-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Design Services -->
        <div class="service-category mb-80">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-header text-center mb-50">
                        <h3 class="category-title">Creative Design Services</h3>
                        <p class="category-desc">Professional design services to create a strong visual identity for your brand.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/logo-design-icon.png" alt="Logo Design" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="logo-design-service">Logo Design</a></h4>
                            <p>Professional logo design services to create memorable brand identities that stand out.</p>
                            <a href="logo-design-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-30">
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="assets/img/icon/graphic-design-icon.png" alt="Graphic Design" style="width: 60px; height: 60px;">
                        </div>
                        <div class="service-content">
                            <h4><a href="graphic-design-service">Graphic Design</a></h4>
                            <p>Creative graphic design solutions for all your branding and marketing material needs.</p>
                            <a href="graphic-design-service" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Services Categories section -->

<!-- Start of CTA section -->
<section id="bi-cta" class="bi-cta-section" style="background: linear-gradient(135deg, #2c5aa0 0%, #1e3a5f 100%); padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="bi-cta-content text-center">
                    <h2 class="cta-title" style="color: white; margin-bottom: 20px;">Ready to Grow Your Business?</h2>
                    <p class="cta-desc" style="color: white; margin-bottom: 30px;">Get started with our comprehensive digital services and take your business to the next level. Contact us today for a free consultation.</p>
                    <div class="btn-wrap">
                        <a class="hpt-btn-3" href="contact.php" style="background: white; color: #2c5aa0; padding: 15px 30px; border-radius: 5px; text-decoration: none; font-weight: bold;">
                            GET FREE CONSULTATION
                            <span class="icon"><i class="fal fa-chevron-double-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of CTA section -->

<?php include 'testmonial2.php';?>
<?php include 'client-logo.php';?>
<?php include 'project-count.php';?>
<?php include 'certify-partner.php';?>
<?php include 'footer.php';?>

<style>
.service-card {
    background: #fff;
    padding: 30px 25px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    text-align: center;
    transition: all 0.3s ease;
    height: 100%;
    border: 1px solid #f0f0f0;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    border-color: #2c5aa0;
}

.service-icon {
    margin-bottom: 20px;
}

.service-icon img {
    filter: sepia(1) hue-rotate(200deg) saturate(2);
}

.service-card:hover .service-icon img {
    filter: none;
}

.service-content h4 {
    color: #2c5aa0;
    margin-bottom: 15px;
    font-size: 18px;
    font-weight: 600;
}

.service-content h4 a {
    color: inherit;
    text-decoration: none;
}

.service-content p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 14px;
}

.service-link {
    color: #2c5aa0;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.service-link:hover {
    color: #1e3a5f;
}

.service-link i {
    margin-left: 5px;
    transition: all 0.3s ease;
}

.service-card:hover .service-link i {
    transform: translateX(5px);
}

.category-title {
    color: #2c5aa0;
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 15px;
}

.category-desc {
    color: #666;
    font-size: 16px;
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto;
}

.service-category {
    position: relative;
}

.service-category::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    width: 80%;
    height: 1px;
    background: linear-gradient(90deg, transparent, #e0e0e0, transparent);
    transform: translateX(-50%);
}

.service-category:first-child::before {
    display: none;
}

@media (max-width: 768px) {
    .service-card {
        margin-bottom: 30px;
    }
    
    .category-title {
        font-size: 24px;
    }
    
    .category-desc {
        font-size: 14px;
    }
}
</style>