<?php
// Graphic Design City Page
$city = isset($_GET['city']) ? $_GET['city'] : 'Chennai';
$service_title = 'Graphic Design';
$city_formatted = ucwords(str_replace('-', ' ', $city));

$page_title = "Graphic Design Services in $city_formatted | ThiyagiDigital";
$page_description = "Professional graphic design services in $city_formatted. Creative brochure design, banner design, social media graphics, and marketing materials for businesses in $city_formatted.";
$page_keywords = "graphic design $city_formatted, creative design services $city_formatted, brochure design $city_formatted, banner design $city_formatted, marketing materials design $city_formatted";

include 'header.php';
?>

<!-- Start of breadcrumb section -->
<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="assets/img/bg/bread-bg.jpg">
    <div class="background_overlay"></div>
    <div class="container">
        <div class="bi-breadcrumbs-content headline ul-li text-center">
            <h1 style="color: white"><b>Graphic Design Services in <?php echo $city_formatted; ?></b></h1><br>
            <ul>
                <li><a href="/#">Home</a></li>
                <li><a href="/graphic-design-service">Graphic Design</a></li>
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
                            <img src="assets/img/service/serd1.jpg" alt="Graphic Design Services in <?php echo $city_formatted; ?>">
                        </div>
                        <div class="bi-service-details-text headline pera-content">
                            <h2>Professional Graphic Design Services in <?php echo $city_formatted; ?></h2>

                            <p>Transform your brand communications with our expert Graphic Design Services in <?php echo $city_formatted; ?>. At ThiyagiDigital, we create visually compelling designs that capture attention, communicate your message effectively, and drive engagement. Our <?php echo $city_formatted; ?>-based design team combines creative excellence with strategic thinking to deliver impactful visual solutions.</p>

                            <p>Our comprehensive graphic design expertise covers both print and digital media, ensuring your brand maintains consistency across all communication channels. From marketing materials to corporate communications, we understand the unique market dynamics of <?php echo $city_formatted; ?> and create designs that resonate with your local audience.</p>

                            <p>Serving businesses across <?php echo $city_formatted; ?>, we've helped countless brands enhance their visual identity through thoughtful, purposeful design. Our deep understanding of local business culture and consumer preferences ensures your designs connect meaningfully with the <?php echo $city_formatted; ?> market while maintaining professional standards.</p>

                            <div class="row" style="margin: 30px 0;">
                                <div class="col-md-6">
                                    <h5>Our Design Services in <?php echo $city_formatted; ?></h5>
                                    <ul style="list-style-type: disc; margin-left: 20px;">
                                        <li>Brochure & Flyer Design</li>
                                        <li>Banner & Poster Design</li>
                                        <li>Social Media Graphics</li>
                                        <li>Business Card Design</li>
                                        <li>Presentation Design</li>
                                        <li>Marketing Collaterals</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5>Design Specializations</h5>
                                    <ul style="list-style-type: disc; margin-left: 20px;">
                                        <li>Brand Identity Materials</li>
                                        <li>Print Advertisement</li>
                                        <li>Digital Marketing Graphics</li>
                                        <li>Packaging Design</li>
                                        <li>Infographic Design</li>
                                        <li>Corporate Communications</li>
                                    </ul>
                                </div>
                            </div>

                            <h4>Why Choose Our Graphic Design Services in <?php echo $city_formatted; ?>?</h4>

                            <p><strong>Local Market Insight:</strong> Our <?php echo $city_formatted; ?> presence provides deep understanding of local business culture, consumer behavior, and design preferences. This insight enables us to create graphics that not only look great but also perform effectively in the <?php echo $city_formatted; ?> market.</p>

                            <p><strong>Creative Excellence:</strong> Our design team combines artistic talent with strategic thinking, ensuring every graphic element serves a purpose. We create designs that are visually stunning while effectively communicating your brand message to your <?php echo $city_formatted; ?> audience.</p>

                            <p><strong>Multi-Media Expertise:</strong> From traditional print materials to cutting-edge digital graphics, we master all design mediums. Whether you need materials for <?php echo $city_formatted; ?> trade shows, local advertising, or digital campaigns, we deliver designs optimized for each platform.</p>

                            <p><strong>Brand Consistency:</strong> We ensure all your graphic materials maintain consistent brand representation. Our designs work cohesively across all touchpoints, strengthening your brand recognition throughout <?php echo $city_formatted; ?> and beyond.</p>

                            <h4>Our Graphic Design Process in <?php echo $city_formatted; ?></h4>
                            <p>Our proven methodology delivers exceptional design results:</p>
                            <ol style="margin-left: 20px;">
                                <li><strong>Creative Brief:</strong> Understanding your objectives, audience, and <?php echo $city_formatted; ?> market requirements</li>
                                <li><strong>Concept Development:</strong> Creating initial design concepts based on strategic insights</li>
                                <li><strong>Design Creation:</strong> Developing detailed designs with attention to visual hierarchy and brand consistency</li>
                                <li><strong>Client Review:</strong> Presenting designs and incorporating feedback for refinement</li>
                                <li><strong>Final Production:</strong> Preparing print-ready and digital-optimized files</li>
                                <li><strong>Delivery & Support:</strong> Providing all necessary files and ongoing design support</li>
                            </ol>

                            <div class="row" style="margin: 30px 0;">
                                <div class="col-md-6">
                                    <h5>Print Design Services</h5>
                                    <ul style="list-style-type: disc; margin-left: 20px;">
                                        <li>Corporate Brochures</li>
                                        <li>Product Catalogs</li>
                                        <li>Trade Show Materials</li>
                                        <li>Annual Reports</li>
                                        <li>Magazine Advertisements</li>
                                        <li>Packaging Design</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5>Digital Design Services</h5>
                                    <ul style="list-style-type: disc; margin-left: 20px;">
                                        <li>Social Media Templates</li>
                                        <li>Web Graphics</li>
                                        <li>Email Newsletter Design</li>
                                        <li>Digital Advertisements</li>
                                        <li>Presentation Graphics</li>
                                        <li>Infographic Creation</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row" style="margin: 30px 0; background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
                                <div class="col-12">
                                    <h5 style="color: #2c5aa0;">Ready to Enhance Your Visual Communication in <?php echo $city_formatted; ?>?</h5>
                                    <p style="margin-bottom: 15px;">Let's create compelling designs that capture attention and drive results for your business in <?php echo $city_formatted; ?>. Contact ThiyagiDigital today to discuss your graphic design project.</p>
                                    <p style="margin-bottom: 0;"><strong>Serving businesses across <?php echo $city_formatted; ?></strong> with creative graphic design solutions that make an impact.</p>
                                </div>
                            </div>

                            <h4>Frequently Asked Questions</h4>
                            <div class="bi-faq-content-area">
                                <div class="accordion" id="accordionExample_<?php echo rand(100,999); ?>">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                <span>What types of graphic design services do you offer in <?php echo $city_formatted; ?>?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionExample_<?php echo rand(100,999); ?>">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">We offer comprehensive graphic design services in <?php echo $city_formatted; ?> including brochures, flyers, banners, business cards, social media graphics, packaging design, presentations, infographics, and all marketing materials.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                                <span>Do you provide on-site consultations in <?php echo $city_formatted; ?>?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionExample_<?php echo rand(100,999); ?>">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">Yes, we provide on-site consultations for clients in <?php echo $city_formatted; ?>. Our design team can visit your location to understand your requirements and discuss creative concepts in person.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                                <span>What file formats do you deliver for print and digital use?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample_<?php echo rand(100,999); ?>">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">We provide print-ready files (PDF, AI, EPS with CMYK colors and proper bleeds) and digital-optimized formats (PNG, JPG, SVG for web and social media use) to meet all your requirements.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading4">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                <span>How do you ensure designs appeal to the <?php echo $city_formatted; ?> market?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample_<?php echo rand(100,999); ?>">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">Our <?php echo $city_formatted; ?>-based team understands local cultural preferences, business practices, and consumer behavior. We incorporate these insights into our design approach while maintaining professional, contemporary aesthetics.
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