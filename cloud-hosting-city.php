<?php
$page_title = 'Cloud Hosting Services in {city} | ThiyagiDigital';
$page_description = 'Scalable cloud hosting services in {city}. Reliable cloud infrastructure, auto-scaling, and 24/7 support by ThiyagiDigital.';
$page_keywords = 'cloud hosting {city}, cloud server hosting {city}, scalable hosting {city}';

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
				<h1 style="color: white"><b>Best Cloud Hosting Services in <?php echo $city; ?></b></h1><br>
				<ul>
					<li><a href="/#">Home</a></li>
					<li>Services</li>
					<li>Cloud Hosting</li>
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
								<h2>Cloud Hosting Services in <?php echo $city; ?></h2>

								<p>Scale your business to new heights with advanced Cloud Hosting Services in <?php echo $city; ?> from ThiyagiDigital. We provide flexible, scalable cloud infrastructure that adapts to your business needs, ensuring optimal performance and cost-effectiveness for businesses across <?php echo $city; ?>.</p>

								<p>Our <?php echo $city; ?>-based cloud hosting solutions combine cutting-edge technology with local support to deliver enterprise-grade infrastructure. From automatic scaling to load balancing, we ensure your applications perform excellently regardless of traffic fluctuations or resource demands.</p>

								<p>What makes us the preferred cloud hosting provider in <?php echo $city; ?> is our commitment to scalability, reliability, and performance. We offer pay-as-you-use pricing, 99.99% uptime SLA, advanced security, and local technical support to ensure your cloud journey is successful and cost-effective.</p>

                                <h4>Why Choose Our Cloud Hosting Services in <?php echo $city; ?>?</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                            <li><strong>Local Expertise:</strong> <?php echo $city; ?>-based cloud specialists</li>
                                            <li><strong>Auto-Scaling:</strong> Resources adjust automatically</li>
                                            <li><strong>High Availability:</strong> 99.99% uptime guarantee</li>
                                            <li><strong>Cost Optimization:</strong> Pay-as-you-use pricing</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                            <li><strong>Global CDN:</strong> Faster content delivery</li>
                                            <li><strong>Advanced Security:</strong> Enterprise-grade protection</li>
                                            <li><strong>Real-time Monitoring:</strong> Proactive issue detection</li>
                                            <li><strong>24/7 Support:</strong> Round-the-clock assistance</li>
                                        </ul>
                                    </div>
                                </div>

                                <p>Experience the future of hosting with <?php echo $city; ?>'s leading cloud hosting services at ThiyagiDigital. From migration and setup to ongoing optimization and support, we're committed to delivering cloud solutions that drive your business growth and success.</p>

								<h4>Frequently Asked Questions - Cloud Hosting in <?php echo $city; ?></h4>
								<div class="bi-faq-content-area">
									<div class="accordion" id="accordionExample_city">
										<div class="accordion-item wow fadeInUp"  data-wow-delay="200ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading_city1">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city1" aria-expanded="true" aria-controls="collapse_city1">
													<span>Why choose cloud hosting services in <?php echo $city; ?>?</span>
												</button>
											</h2>
											<div id="collapse_city1" class="accordion-collapse collapse show" aria-labelledby="heading_city1" data-bs-parent="#accordionExample_city">
												<div class="accordion-body ">
													<div class="bi-faq-text">Our <?php echo $city; ?>-based cloud hosting services offer local technical support, better latency for regional users, competitive pricing, and personalized service for businesses looking to scale efficiently.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="300ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading_city2">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city2" aria-expanded="false" aria-controls="collapse_city2">
													<span>How quickly can I scale cloud resources in <?php echo $city; ?>?</span>
												</button>
											</h2>
											<div id="collapse_city2" class="accordion-collapse collapse" aria-labelledby="heading_city2" data-bs-parent="#accordionExample_city">
												<div class="accordion-body ">
													<div class="bi-faq-text">Cloud resources can be scaled instantly based on demand. Auto-scaling happens in real-time, while manual scaling can be done within minutes through our control panel or API.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="400ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading_city3">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city3" aria-expanded="false" aria-controls="collapse_city3">
													<span>Do you provide cloud migration support for <?php echo $city; ?> businesses?</span>
												</button>
											</h2>
											<div id="collapse_city3" class="accordion-collapse collapse" aria-labelledby="heading_city3" data-bs-parent="#accordionExample_city">
												<div class="accordion-body ">
													<div class="bi-faq-text">Yes, we provide comprehensive cloud migration services including assessment, planning, execution, and post-migration optimization for <?php echo $city; ?> businesses moving to cloud infrastructure.
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
			<h3 class="text-center mb-4">Cloud Hosting Services in Major Cities</h3>
			<div class="cities-grid">
				<?php foreach($major_cities as $major_city): ?>
					<a href="/cloud-hosting/<?php echo strtolower(str_replace(' ', '-', $major_city)); ?>" 
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