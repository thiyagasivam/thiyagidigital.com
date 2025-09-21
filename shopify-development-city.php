<?php
$page_title = 'Shopify Development Services in {city} | ThiyagiDigital';
$page_description = 'Expert Shopify development services in {city}. Custom Shopify themes, app development, store setup, and optimization by ThiyagiDigital.';
$page_keywords = 'Shopify development {city}, Shopify store setup {city}, custom Shopify themes {city}';

// Get city from URL parameter
$city = isset($_GET['city']) ? ucwords(str_replace('-', ' ', $_GET['city'])) : 'Chennai';

// Replace placeholders in title and meta
$page_title = str_replace('{city}', $city, $page_title);
$page_description = str_replace('{city}', $city, $page_description);
$page_keywords = str_replace('{city}', $city, $page_keywords);

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

<!-- Start of breadcrumb section
	============================================= -->
	<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="assets/img/bg/bread-bg.jpg">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="bi-breadcrumbs-content headline ul-li text-center">
				<h1 style="color: white"><b>Best Shopify Development Services in <?php echo $city; ?></b></h1><br>
				<ul>
					<li><a href="/#">Home</a></li>
					<li>Services</li>
					<li>Shopify Development</li>
					<li style="color: white"><?php echo $city; ?></li>
				</ul>
			</div>
		</div>
	</section>	
<!-- End of breadcrumb section
	============================================= -->

<!-- Start of Service Details section
	============================================= -->
	<section id="bi-service-details" class="bi-service-details-section inner-page-padding">
		<div class="container">
			<div class="bi-service-details-content">
				<div class="row">
					<div class="col-lg-8">
						<div class="bi-service-details-text-area">
							<div class="bi-service-details-img">
								<img src="assets/img/service/serd1.jpg" alt="">
							</div>
							<div class="bi-service-details-text headline pera-content">
								<h2>Shopify Development Services in <?php echo $city; ?></h2>

								<p>Launch your e-commerce success story with professional Shopify Development services in <?php echo $city; ?> from ThiyagiDigital. We specialize in creating high-converting, scalable online stores that drive sales and provide exceptional customer experiences for businesses across <?php echo $city; ?>.</p>

								<p>Our <?php echo $city; ?>-based Shopify development team combines technical expertise with local market insights to deliver e-commerce solutions that resonate with your target audience. From custom theme development to complex integrations, we create stores that stand out and perform excellently.</p>

								<p>What sets us apart as the leading Shopify development agency in <?php echo $city; ?> is our commitment to quality, performance, and results. We focus on creating stores that are visually stunning, conversion-optimized, and built for long-term success in the competitive e-commerce landscape.</p>

                                <h4>Why Choose Our Shopify Development Services in <?php echo $city; ?>?</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                            <li><strong>Local Market Knowledge:</strong> Understanding of <?php echo $city; ?> consumer behavior</li>
                                            <li><strong>Custom Theme Design:</strong> Unique brand-focused designs</li>
                                            <li><strong>Mobile Optimization:</strong> Perfect across all devices</li>
                                            <li><strong>Fast Loading Speed:</strong> Optimized for performance</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                            <li><strong>App Integration:</strong> Enhanced functionality</li>
                                            <li><strong>Payment Gateway Setup:</strong> Multiple payment options</li>
                                            <li><strong>SEO Optimization:</strong> Better search visibility</li>
                                            <li><strong>Ongoing Support:</strong> Maintenance and updates</li>
                                        </ul>
                                    </div>
                                </div>

                                <p>Transform your business with <?php echo $city; ?>'s premier Shopify development services at ThiyagiDigital. From concept to launch and beyond, we're dedicated to delivering e-commerce solutions that drive growth and maximize your online potential in the digital marketplace.</p>

								<h4>Frequently Asked Questions - Shopify Development in <?php echo $city; ?></h4>
								<div class="bi-faq-content-area">
									<div class="accordion" id="accordionExample_city">
										<div class="accordion-item wow fadeInUp"  data-wow-delay="200ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading_city1">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city1" aria-expanded="true" aria-controls="collapse_city1">
													<span>Why choose Shopify development services in <?php echo $city; ?>?</span>
												</button>
											</h2>
											<div id="collapse_city1" class="accordion-collapse collapse show" aria-labelledby="heading_city1" data-bs-parent="#accordionExample_city">
												<div class="accordion-body ">
													<div class="bi-faq-text">Our <?php echo $city; ?>-based Shopify development services offer local market expertise, personalized support, competitive pricing, and deep understanding of regional business needs for superior project outcomes.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="300ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading_city2">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city2" aria-expanded="false" aria-controls="collapse_city2">
													<span>What's the cost of Shopify development in <?php echo $city; ?>?</span>
												</button>
											</h2>
											<div id="collapse_city2" class="accordion-collapse collapse" aria-labelledby="heading_city2" data-bs-parent="#accordionExample_city">
												<div class="accordion-body ">
													<div class="bi-faq-text">Shopify development costs vary based on complexity and requirements. Basic stores start affordably, while custom solutions are priced competitively. We provide detailed quotes after understanding your needs.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="400ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading_city3">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city3" aria-expanded="false" aria-controls="collapse_city3">
													<span>Do you provide Shopify store maintenance in <?php echo $city; ?>?</span>
												</button>
											</h2>
											<div id="collapse_city3" class="accordion-collapse collapse" aria-labelledby="heading_city3" data-bs-parent="#accordionExample_city">
												<div class="accordion-body ">
													<div class="bi-faq-text">Yes, we offer comprehensive Shopify maintenance services including theme updates, app management, performance optimization, security monitoring, and technical support for <?php echo $city; ?> businesses.
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
								<?php include 'callservice-sidebar.php';?>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- End of Service Details section
	============================================= -->

	<!-- Cities Selection Section -->
	<section class="cities-section">
		<div class="container">
			<h3 class="text-center mb-4">Shopify Development Services in Major Cities</h3>
			<div class="cities-grid">
				<?php foreach($major_cities as $major_city): ?>
					<a href="/shopify-development/<?php echo strtolower(str_replace(' ', '-', $major_city)); ?>" 
					   class="city-link <?php echo ($city == $major_city) ? 'active' : ''; ?>">
						<?php echo $major_city; ?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php include 'testmonial2.php';?>
	<?php include 'client-logo.php';?>
	<?php include 'project-count.php';?>
	<?php include 'certify-partner.php';?>

	<?php include 'footer.php';?>
