<?php
// Online Store Setup City Page
$city = isset($_GET['city']) ? $_GET['city'] : 'Chennai';
$service_title = 'Online Store Setup';
$city_formatted = ucwords(str_replace('-', ' ', $city));

$page_title = "Online Store Setup Services in $city_formatted | ThiyagiDigital";
$page_description = "Professional online store setup services in $city_formatted. Quick eCommerce store launch, product configuration, and payment integration for businesses in $city_formatted.";
$page_keywords = "online store setup $city_formatted, ecommerce store setup services $city_formatted, store launch $city_formatted, online business setup $city_formatted";

// List of major cities for tabs
$major_cities = [
    'Mumbai', 'Delhi', 'Bangalore', 'Hyderabad', 'Ahmedabad', 'Chennai', 'Kolkata', 'Surat', 'Pune', 'Jaipur',
    'Lucknow', 'Kanpur', 'Nagpur', 'Indore', 'Thane', 'Bhopal', 'Visakhapatnam', 'Pimpri-Chinchwad', 'Patna', 'Vadodara',
    'Ghaziabad', 'Ludhiana', 'Agra', 'Nashik', 'Faridabad', 'Meerut', 'Rajkot', 'Kalyan-Dombivli', 'Vasai-Virar', 'Varanasi',
    // International Cities
    'New York', 'Los Angeles', 'Chicago', 'Toronto', 'London', 'Manchester', 'Berlin', 'Paris', 'Tokyo', 'Singapore',
    'Dubai', 'Sydney', 'Melbourne', 'São Paulo', 'Mexico City'
];

include 'header.php';
?>

<!-- Start of breadcrumb section -->
<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="assets/img/bg/bread-bg.jpg">
    <div class="background_overlay"></div>
    <div class="container">
        <div class="bi-breadcrumbs-content headline ul-li text-center">
            <h1 style="color: white"><b>Online Store Setup Services in <?php echo $city_formatted; ?></b></h1><br>
            <ul>
                <li><a href="/#">Home</a></li>
                <li><a href="/online-store-setup-service">Online Store Setup</a></li>
                <li style="color: white"><?php echo $city_formatted; ?></li>
            </ul>
        </div>
    </div>
</section>

<!-- Service Details Section -->
<section id="bi-service-details" class="bi-service-details-section inner-page-padding">
    <div class="container">
        <div class="bi-service-details-content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bi-service-details-text-area">
                        <div class="bi-service-details-img">
                            <img src="assets/img/service/serd1.jpg" alt="Online Store Setup Services in <?php echo $city_formatted; ?>">
                        </div>
                        <div class="bi-service-details-text headline pera-content">
                            <h2>Professional Online Store Setup Services in <?php echo $city_formatted; ?></h2>

                            <p>Launch your eCommerce business quickly and efficiently with our expert Online Store Setup Services in <?php echo $city_formatted; ?>. At ThiyagiDigital, we provide comprehensive store setup solutions that get your online business running fast, from initial configuration to go-live support.</p>

                            <p>Our <?php echo $city_formatted; ?>-based team understands the local market dynamics and customer preferences, ensuring your online store is optimized for success in the <?php echo $city_formatted; ?> market while maintaining global eCommerce best practices and standards.</p>

                            <p>From platform selection to payment gateway integration, product uploads to shipping configuration, we handle every aspect of your online store setup in <?php echo $city_formatted; ?>. Our streamlined process ensures your store is professional, functional, and ready to generate sales from day one.</p>

                            <div class="row" style="margin: 30px 0;">
                                <div class="col-md-6">
                                    <h5>Our Store Setup Services in <?php echo $city_formatted; ?></h5>
                                    <ul style="list-style-type: disc; margin-left: 20px;">
                                        <li>Platform Selection & Setup</li>
                                        <li>Store Design & Configuration</li>
                                        <li>Product Upload & Catalog Setup</li>
                                        <li>Payment Gateway Integration</li>
                                        <li>Shipping Method Configuration</li>
                                        <li>Tax Settings & Compliance</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5>Additional Setup Features</h5>
                                    <ul style="list-style-type: disc; margin-left: 20px;">
                                        <li>SEO Optimization</li>
                                        <li>Analytics Integration</li>
                                        <li>Security Setup</li>
                                        <li>Mobile Responsiveness</li>
                                        <li>Training & Support</li>
                                        <li>Go-Live Assistance</li>
                                    </ul>
                                </div>
                            </div>

                            <h4>Why Choose Our Store Setup Services in <?php echo $city_formatted; ?>?</h4>

                            <p><strong>Local Market Expertise:</strong> Our <?php echo $city_formatted; ?> team understands local consumer behavior, preferred payment methods, and regional compliance requirements, ensuring your store is perfectly configured for the local market.</p>

                            <p><strong>Quick Launch Process:</strong> We follow a proven methodology that gets your store online quickly without compromising quality. Most stores are ready for launch within 1-2 weeks, depending on complexity and content requirements.</p>

                            <p><strong>Complete Setup Solution:</strong> From technical configuration to content management, payment processing to shipping setup, we handle every aspect of your store launch, so you can focus on your business operations in <?php echo $city_formatted; ?>.</p>

                            <p><strong>Platform Flexibility:</strong> Whether you prefer WooCommerce, Shopify, Magento, or other platforms, we provide setup services across all major eCommerce platforms, choosing the best fit for your business needs and technical requirements.</p>

                            <h4>Our Store Setup Process in <?php echo $city_formatted; ?></h4>
                            <p>Our systematic approach ensures smooth and efficient store setup:</p>
                            <ol style="margin-left: 20px;">
                                <li><strong>Consultation & Planning:</strong> Understanding your business, target audience, and <?php echo $city_formatted; ?> market requirements</li>
                                <li><strong>Platform & Theme Setup:</strong> Installing and configuring your chosen eCommerce platform and design theme</li>
                                <li><strong>Product Configuration:</strong> Setting up product categories, uploading products, and organizing your catalog</li>
                                <li><strong>Payment & Shipping Setup:</strong> Integrating payment gateways and configuring shipping methods for <?php echo $city_formatted; ?></li>
                                <li><strong>Testing & Optimization:</strong> Comprehensive testing and performance optimization before launch</li>
                                <li><strong>Training & Go-Live:</strong> Staff training and support during the launch phase</li>
                            </ol>

                            <div class="row" style="margin: 30px 0; background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
                                <div class="col-12">
                                    <h5 style="color: #2c5aa0;">Ready to Launch Your Online Store in <?php echo $city_formatted; ?>?</h5>
                                    <p style="margin-bottom: 15px;">Let's get your eCommerce business online and generating sales quickly. Contact ThiyagiDigital today to discuss your online store setup requirements.</p>
                                    <p style="margin-bottom: 0;"><strong>Serving businesses across <?php echo $city_formatted; ?></strong> with professional online store setup and launch services.</p>
                                </div>
                            </div>

                            <h4>Frequently Asked Questions</h4>
                            <div class="bi-faq-content-area">
                                <div class="accordion" id="accordionExample_<?php echo rand(100,999); ?>">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                <span>How long does online store setup take in <?php echo $city_formatted; ?>?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionExample_<?php echo rand(100,999); ?>">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">Online store setup in <?php echo $city_formatted; ?> typically takes 1-2 weeks depending on the complexity, number of products, and customization requirements. We provide a detailed timeline after initial consultation.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                                <span>Do you provide on-site setup assistance in <?php echo $city_formatted; ?>?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionExample_<?php echo rand(100,999); ?>">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">Yes, we offer on-site consultation and setup assistance for clients in <?php echo $city_formatted; ?>. We can visit your office to understand your requirements and provide hands-on training.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                                <span>What's included in the store setup service?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample_<?php echo rand(100,999); ?>">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">Our setup service includes platform installation, theme configuration, product upload, payment gateway integration, shipping setup, basic SEO, and training. We provide a complete ready-to-sell store.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading4">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                <span>Do you support local <?php echo $city_formatted; ?> payment methods?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample_<?php echo rand(100,999); ?>">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">Absolutely! We integrate popular Indian payment gateways like Razorpay, PayU, and Paytm, along with UPI, net banking, and wallet options preferred by customers in <?php echo $city_formatted; ?>.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bi-single-sidebar">
                        <div class="container">
                            <?php include 'sideform.php'; ?>
                            <?php include 'mainservice-sidebar.php'; ?>
                            <?php include 'callservice-sidebar.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cities Tabs Section -->
<?php include 'cities-tabs.php'; ?>

<?php include 'testmonial2.php'; ?>
<?php include 'client-logo.php'; ?>
<?php include 'project-count.php'; ?>
<?php include 'certify-partner.php'; ?>
<?php include 'footer.php'; ?>