<?php include 'header.php';?>

<?php
// Get city name from URL and sanitize it
$citySlug = isset($_GET['city']) ? strtolower(trim($_GET['city'])) : '';
$cityName = ucwords(str_replace('-', ' ', $citySlug));

// List of supported cities (same as your other services)
$supportedCities = [
    'chennai' => ['name' => 'Chennai', 'state' => 'Tamil Nadu'],
    'coimbatore' => ['name' => 'Coimbatore', 'state' => 'Tamil Nadu'],
    // ... (include all your cities from the other services)
];

// Redirect to main email marketing page if city not found
if (!array_key_exists($citySlug, $supportedCities)) {
    header("Location: /email-marketing");
    exit();
}

// Get city data
$cityData = $supportedCities[$citySlug];
$fullCityName = $cityData['name'];
$stateName = $cityData['state'];

// Dynamic SEO variables for this city page
$page_title = "Professional Email Marketing Services in {$fullCityName} | ThiyagiDigital";
$page_description = "Targeted email marketing solutions for {$fullCityName} businesses. Drive engagement and conversions with our localized email campaigns in {$stateName}.";
$page_keywords = "email marketing {$fullCityName}, email campaigns {$fullCityName}, email automation {$fullCityName}";
$canonical_url = "https://www.thiyagidigital.com/email-marketing-service/{$citySlug}";
?>
	
<!-- Start of breadcrumb section -->
<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="/assets/img/bg/bread-bg.jpg">
    <div class="background_overlay"></div>
    <div class="container">
        <div class="bi-breadcrumbs-content headline ul-li text-center">
            <h2 style="color: white"><b>Email Marketing Services in <?php echo $fullCityName; ?></b></h2><br>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#">Services</a></li>
                <li style="color: white">Email Marketing in <?php echo $fullCityName; ?></li>
            </ul>
        </div>
    </div>
</section>	
<!-- End of breadcrumb section -->

<!-- Start of Service Details section -->
<section id="bi-service-details" class="bi-service-details-section inner-page-padding">
    <div class="container">
        <div class="bi-service-details-content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bi-service-details-text-area">
                        <div class="bi-service-details-img">
                            <img src="/assets/img/service/serd1.jpg" alt="Email Marketing Services in <?php echo $fullCityName; ?>">
                        </div>
                        <div class="bi-service-details-text headline pera-content">
                            <h3>Email Marketing in <?php echo $fullCityName; ?></h3>

                            <p>In <?php echo $fullCityName; ?>'s competitive business environment, email marketing remains one of the most effective ways to reach and engage your target audience. Our localized email marketing services help <?php echo $fullCityName; ?> businesses create campaigns that resonate with local customers while driving measurable results.</p>

                            <p>Our <?php echo $fullCityName; ?>-focused email strategies combine global best practices with local market insights. We understand the unique preferences and behaviors of <?php echo $stateName; ?> audiences, allowing us to craft email campaigns that achieve higher open rates, click-through rates, and conversions for <?php echo $fullCityName; ?> businesses.</p>

                            <p>For <?php echo $fullCityName; ?> companies, we create email content that speaks directly to your local customers. Whether it's incorporating regional references, local event tie-ins, or vernacular language options, we ensure your emails feel personal and relevant to <?php echo $fullCityName; ?> recipients.</p>

                            <h4>"Driving Results Through Targeted Email Campaigns in <?php echo $fullCityName; ?>"</h4>

                            <p>We go beyond basic email blasts. Our <?php echo $fullCityName; ?> email marketing services include advanced segmentation based on location-specific data, automated nurture sequences for local leads, and performance tracking tailored to <?php echo $stateName; ?> market benchmarks. We help you build lasting relationships with your <?php echo $fullCityName; ?> customer base through strategic email communication.</p>

                            <p>Whether you're a <?php echo $fullCityName; ?>-based retailer looking to boost local sales or a service provider aiming to nurture <?php echo $stateName; ?> leads, our email marketing experts have the local knowledge and technical expertise to deliver campaigns that work. Partner with us to transform your email marketing into a powerful growth channel for your <?php echo $fullCityName; ?> business.</p>

                            <h4>Frequently Asked Questions About Email Marketing in <?php echo $fullCityName; ?></h4>
                            <div class="bi-faq-content-area">
                                <div class="accordion" id="accordionExample_31">
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading10">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                                                <span>How do you localize email content for <?php echo $fullCityName; ?> audiences?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse10" class="accordion-collapse collapse show" aria-labelledby="heading10" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                We incorporate <?php echo $fullCityName; ?>-specific references, local event tie-ins, and regional language options where appropriate. Our subject lines and content are optimized for what resonates with <?php echo $stateName; ?> audiences based on performance data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading12">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                                <span>What email marketing platforms work best in <?php echo $fullCityName; ?>?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                For <?php echo $fullCityName; ?> businesses, we recommend and work with platforms like Mailchimp, Sendinblue, and HubSpot that offer excellent deliverability in <?php echo $stateName; ?>, along with features for local audience segmentation and regional performance tracking.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading13">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                                <span>Can you help build email lists for <?php echo $fullCityName; ?> businesses?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                Yes, we implement ethical list-building strategies specifically for <?php echo $fullCityName; ?> audiences, including localized lead magnets, event-based signups, and permission-based collection methods compliant with <?php echo $stateName; ?> data protection norms.
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
                            <?php include 'sideform.php';?>
                            <?php include 'mainservice-sidebar.php';?>
                            <div class="bi-single-sidebar-item">
                                <div class="bi-sidebar-contact-widget headline">
                                    <h3 class="widget-title">Serving <?php echo $fullCityName; ?> Area</h3>
                                    <p>We provide specialized email marketing services for businesses in <?php echo $fullCityName; ?>, <?php echo $stateName; ?>.</p>
                                </div>
                            </div>
                            <?php include 'callservice-sidebar.php';?>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Service Details section -->
<?php include 'testmonial2.php';?>
<?php include 'client-logo.php';?>
<?php include 'project-count.php';?>
<?php include 'certify-partner.php';?>
<?php include 'footer.php';?>