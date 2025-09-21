<?php
$page_title = 'VPS Hosting Services in {city} | ThiyagiDigital';
$page_description = 'Powerful VPS hosting services in {city}. Virtual private servers with root access, SSD storage, and scalable resources by ThiyagiDigital.';
$page_keywords = 'VPS hosting {city}, virtual private server {city}, dedicated server hosting {city}';

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
				<h1 style="color: white"><b>Best VPS Hosting Services in <?php echo $city; ?></b></h1><br>
				<ul>
					<li><a href="/#">Home</a></li>
					<li>Services</li>
					<li>VPS Hosting</li>
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
								<h2>VPS Hosting Services in <?php echo $city; ?></h2>

								<p>Experience dedicated server performance with affordable VPS Hosting Services in <?php echo $city; ?> from ThiyagiDigital. We provide virtual private servers that offer guaranteed resources, full control, and scalable solutions for businesses across <?php echo $city; ?> seeking reliable hosting infrastructure.</p>

								<p>Our <?php echo $city; ?>-based VPS hosting solutions combine powerful hardware with local technical support to deliver consistent performance and reliability. From guaranteed CPU cores and RAM to SSD storage and full root access, we provide the resources your applications need to perform optimally.</p>

								<p>What makes us the preferred VPS hosting provider in <?php echo $city; ?> is our commitment to performance, reliability, and customer support. We offer both managed and unmanaged options, flexible configurations, and local technical assistance to ensure your VPS meets your specific requirements.</p>

                                <h4>Why Choose Our VPS Hosting Services in <?php echo $city; ?>?</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                            <li><strong>Local Technical Support:</strong> <?php echo $city; ?>-based server experts</li>
                                            <li><strong>Guaranteed Resources:</strong> Dedicated CPU and RAM</li>
                                            <li><strong>Full Root Access:</strong> Complete server control</li>
                                            <li><strong>SSD Storage:</strong> High-performance storage</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                            <li><strong>Scalable Plans:</strong> Upgrade resources easily</li>
                                            <li><strong>OS Choice:</strong> Linux and Windows options</li>
                                            <li><strong>99.9% Uptime:</strong> Reliable infrastructure</li>
                                            <li><strong>24/7 Monitoring:</strong> Proactive server management</li>
                                        </ul>
                                    </div>
                                </div>

                                <p>Power your applications with <?php echo $city; ?>'s premier VPS hosting services at ThiyagiDigital. From server setup and configuration to ongoing management and optimization, we're committed to providing VPS solutions that deliver consistent performance and reliability.</p>

								<h4>Frequently Asked Questions - VPS Hosting in <?php echo $city; ?></h4>
								<div class="bi-faq-content-area">
									<div class="accordion" id="accordionExample_city">
										<div class="accordion-item wow fadeInUp"  data-wow-delay="200ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading_city1">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city1" aria-expanded="true" aria-controls="collapse_city1">
													<span>Why choose VPS hosting services in <?php echo $city; ?>?</span>
												</button>
											</h2>
											<div id="collapse_city1" class="accordion-collapse collapse show" aria-labelledby="heading_city1" data-bs-parent="#accordionExample_city">
												<div class="accordion-body ">
													<div class="bi-faq-text">Our <?php echo $city; ?>-based VPS hosting services offer local technical support, better performance for regional users, competitive pricing, and personalized server management for businesses requiring dedicated resources.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="300ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading_city2">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city2" aria-expanded="false" aria-controls="collapse_city2">
													<span>What VPS plans are available for <?php echo $city; ?> businesses?</span>
												</button>
											</h2>
											<div id="collapse_city2" class="accordion-collapse collapse" aria-labelledby="heading_city2" data-bs-parent="#accordionExample_city">
												<div class="accordion-body ">
													<div class="bi-faq-text">We offer various VPS plans with different CPU cores, RAM, storage, and bandwidth options suitable for small websites to high-traffic applications. All plans include root access and choice of operating systems.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="400ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading_city3">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city3" aria-expanded="false" aria-controls="collapse_city3">
													<span>Do you provide VPS management services for <?php echo $city; ?> clients?</span>
												</button>
											</h2>
											<div id="collapse_city3" class="accordion-collapse collapse" aria-labelledby="heading_city3" data-bs-parent="#accordionExample_city">
												<div class="accordion-body ">
													<div class="bi-faq-text">Yes, we offer managed VPS services including server setup, security hardening, software updates, monitoring, backups, and technical support for <?php echo $city; ?> businesses who prefer hands-off server management.
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
			<h3 class="text-center mb-4">VPS Hosting Services in Major Cities</h3>
			<div class="cities-grid">
				<?php foreach($major_cities as $major_city): ?>
					<a href="/vps-hosting/<?php echo strtolower(str_replace(' ', '-', $major_city)); ?>" 
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
