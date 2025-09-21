<?php
// Logo Design City Page
$city = isset($_GET['city']) ? $_GET['city'] : 'Chennai';
$service_title = 'Logo Design';
$city_formatted = ucwords(str_replace('-', ' ', $city));

$page_title = "Logo Design Services in $city_formatted | ThiyagiDigital";
$page_description = "Professional logo design services in $city_formatted. Custom logo creation, brand identity design, and visual branding solutions for businesses in $city_formatted.";
$page_keywords = "logo design $city_formatted, brand logo design services $city_formatted, custom logo creation $city_formatted, business logo design $city_formatted";

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
            <h1 style="color: white"><b>Logo Design Services in <?php echo $city_formatted; ?></b></h1><br>
            <ul>
                <li><a href="/#">Home</a></li>
                <li><a href="/logo-design-service">Logo Design</a></li>
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
                            <img src="assets/img/service/serd1.jpg" alt="Logo Design Services in <?php echo $city_formatted; ?>">
                        </div>
                        <div class="bi-service-details-text headline pera-content">
                            <h2>Professional Logo Design Services in <?php echo $city_formatted; ?></h2>

                            <p>Transform your brand identity with our expert Logo Design Services in <?php echo $city_formatted; ?>. At ThiyagiDigital, we create distinctive, memorable logos that capture your brand essence and make powerful first impressions. Our <?php echo $city_formatted; ?>-based design team understands local market dynamics while delivering globally competitive designs.</p>

                            <p>Our comprehensive logo design process combines strategic brand analysis with creative excellence. We research your industry, study local <?php echo $city_formatted; ?> market trends, analyze competitors, and create unique visual identities that resonate with your target audience while standing out in the competitive <?php echo $city_formatted; ?> business landscape.</p>

                            <p>From startup ventures to established enterprises in <?php echo $city_formatted; ?>, we've helped numerous businesses build strong brand identities through thoughtful logo design. Our expertise spans various industries prevalent in <?php echo $city_formatted; ?>, ensuring your logo communicates effectively with your specific audience.</p>

                            <div class="row" style="margin: 30px 0;">
                                <div class="col-md-6">
                                    <h5>Our Logo Design Services in <?php echo $city_formatted; ?></h5>
                                    <ul style="list-style-type: disc; margin-left: 20px;">
                                        <li>Custom Logo Creation</li>
                                        <li>Brand Identity Design</li>
                                        <li>Logo Redesign Services</li>
                                        <li>Brand Guidelines Development</li>
                                        <li>Multiple Format Delivery</li>
                                        <li>Color Palette Creation</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5>Industries We Serve in <?php echo $city_formatted; ?></h5>
                                    <ul style="list-style-type: disc; margin-left: 20px;">
                                        <li>Technology Companies</li>
                                        <li>Healthcare & Medical</li>
                                        <li>Retail & E-commerce</li>
                                        <li>Financial Services</li>
                                        <li>Education & Training</li>
                                        <li>Real Estate</li>
                                    </ul>
                                </div>
                            </div>

                            <h4>Why Choose Our Logo Design Services in <?php echo $city_formatted; ?>?</h4>

                            <p><strong>Local Market Understanding:</strong> Our <?php echo $city_formatted; ?> presence gives us deep insights into local business culture, consumer preferences, and market dynamics, enabling us to create logos that resonate with your local audience while maintaining universal appeal.</p>

                            <p><strong>Strategic Design Approach:</strong> We don't just create pretty designs; we develop strategic visual identities. Our logo design process in <?php echo $city_formatted; ?> includes thorough research, competitor analysis, and brand positioning to ensure your logo supports your business objectives.</p>

                            <p><strong>Complete Brand Package:</strong> Beyond logo creation, we provide comprehensive brand guidelines, color specifications, typography recommendations, and usage guidelines, ensuring consistent brand application across all your <?php echo $city_formatted; ?> business touchpoints.</p>

                            <p><strong>Scalable Designs:</strong> Our logos are designed to work perfectly across all applications - from business cards to billboards, digital screens to print materials, ensuring your brand looks professional in any context throughout <?php echo $city_formatted; ?> and beyond.</p>

                            <h4>Our Logo Design Process in <?php echo $city_formatted; ?></h4>
                            <p>Our proven design methodology ensures exceptional results:</p>
                            <ol style="margin-left: 20px;">
                                <li><strong>Discovery & Research:</strong> Understanding your business, target audience, and <?php echo $city_formatted; ?> market landscape</li>
                                <li><strong>Concept Development:</strong> Creating multiple design directions based on research insights</li>
                                <li><strong>Design Refinement:</strong> Perfecting chosen concept with client feedback and revisions</li>
                                <li><strong>Brand Guidelines:</strong> Developing comprehensive usage guidelines and brand standards</li>
                                <li><strong>File Delivery:</strong> Providing all logo formats and supporting documentation</li>
                                <li><strong>Ongoing Support:</strong> Assisting with brand implementation across <?php echo $city_formatted; ?> marketing materials</li>
                            </ol>

                            <div class="row" style="margin: 30px 0; background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
                                <div class="col-12">
                                    <h5 style="color: #2c5aa0;">Ready to Create Your Brand Identity in <?php echo $city_formatted; ?>?</h5>
                                    <p style="margin-bottom: 15px;">Let's develop a logo that represents your brand perfectly and drives recognition in <?php echo $city_formatted; ?> and beyond. Contact ThiyagiDigital today to start your logo design project.</p>
                                    <p style="margin-bottom: 0;"><strong>Serving clients across <?php echo $city_formatted; ?></strong> with exceptional logo design and brand identity solutions.</p>
                                </div>
                            </div>

                            <h4>Frequently Asked Questions</h4>
                            <div class="bi-faq-content-area">
                                <div class="accordion" id="accordionExample_<?php echo rand(100,999); ?>">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                <span>How long does logo design take in <?php echo $city_formatted; ?>?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionExample_<?php echo rand(100,999); ?>">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">Logo design in <?php echo $city_formatted; ?> typically takes 1-2 weeks from initial consultation to final delivery. This includes research, concept development, revisions, and brand guidelines preparation.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                                <span>Do you provide face-to-face consultations in <?php echo $city_formatted; ?>?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionExample_<?php echo rand(100,999); ?>">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">Yes, we offer in-person consultations for clients in <?php echo $city_formatted; ?>. We can meet at your office or our studio to discuss your brand vision and logo requirements in detail.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                                <span>What file formats do you provide for logos?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample_<?php echo rand(100,999); ?>">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">We provide comprehensive logo packages including AI, EPS, PDF (vector formats), PNG, JPG (various sizes), and SVG files, ensuring your logo works perfectly across all applications.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading4">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                <span>Do you understand local <?php echo $city_formatted; ?> market preferences?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample_<?php echo rand(100,999); ?>">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">Absolutely! Our <?php echo $city_formatted; ?> team understands local cultural nuances, business preferences, and market dynamics, ensuring your logo resonates with the local audience while maintaining professional standards.
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