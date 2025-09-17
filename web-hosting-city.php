<?php
$page_title = 'Web Hosting Services in {city} | ThiyagiDigital';
$page_description = 'Reliable web hosting services in {city}. Fast, secure hosting solutions with 24/7 support by ThiyagiDigital.';
$page_keywords = 'web hosting {city}, website hosting services {city}, shared hosting {city}';

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
    'Ghaziabad', 'Ludhiana', 'Agra', 'Nashik', 'Faridabad', 'Meerut', 'Rajkot', 'Kalyan-Dombivli', 'Vasai-Virar', 'Varanasi'
];

include 'header.php';
?>

<!-- Start of breadcrumb section
	============================================= -->
	<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="assets/img/bg/bread-bg.jpg">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="bi-breadcrumbs-content headline ul-li text-center">
				<h1 style="color: white"><b>Best Web Hosting Services in <?php echo $city; ?></b></h1><br>
				<ul>
					<li><a href="/#">Home</a></li>
					<li>Services</li>
					<li>Web Hosting</li>
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
								<h2>Web Hosting Services in <?php echo $city; ?></h2>

								<p>Establish a strong online presence with reliable Web Hosting Services in <?php echo $city; ?> from ThiyagiDigital. We provide fast, secure, and scalable hosting solutions that ensure your website performs optimally for businesses across <?php echo $city; ?>, delivering exceptional uptime and performance.</p>

								<p>Our <?php echo $city; ?>-based web hosting services combine cutting-edge technology with local support to provide hosting solutions that meet the specific needs of regional businesses. From small business websites to complex applications, we ensure your online presence is always available and performing at its best.</p>

								<p>What makes us the preferred hosting provider in <?php echo $city; ?> is our commitment to reliability, performance, and customer support. We offer 24/7 monitoring, automatic backups, robust security measures, and local technical support to ensure your website delivers exceptional experiences to your customers.</p>

                                <h4>Why Choose Our Web Hosting Services in <?php echo $city; ?>?</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                            <li><strong>Local Support:</strong> <?php echo $city; ?>-based technical assistance</li>
                                            <li><strong>High Performance:</strong> SSD storage and optimized servers</li>
                                            <li><strong>99.9% Uptime:</strong> Reliable hosting infrastructure</li>
                                            <li><strong>Security First:</strong> Advanced protection measures</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                            <li><strong>Daily Backups:</strong> Automatic data protection</li>
                                            <li><strong>Free SSL:</strong> Secure connection for visitors</li>
                                            <li><strong>Scalable Plans:</strong> Grows with your business</li>
                                            <li><strong>24/7 Monitoring:</strong> Proactive issue resolution</li>
                                        </ul>
                                    </div>
                                </div>

                                <p>Power your online success with <?php echo $city; ?>'s trusted web hosting services at ThiyagiDigital. From setup and migration to ongoing maintenance and support, we're dedicated to providing hosting solutions that keep your website running smoothly and efficiently.</p>

								<h4>Frequently Asked Questions - Web Hosting in <?php echo $city; ?></h4>
								<div class="bi-faq-content-area">
									<div class="accordion" id="accordionExample_city">
										<div class="accordion-item wow fadeInUp"  data-wow-delay="200ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading_city1">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city1" aria-expanded="true" aria-controls="collapse_city1">
													<span>Why choose web hosting services in <?php echo $city; ?>?</span>
												</button>
											</h2>
											<div id="collapse_city1" class="accordion-collapse collapse show" aria-labelledby="heading_city1" data-bs-parent="#accordionExample_city">
												<div class="accordion-body ">
													<div class="bi-faq-text">Our <?php echo $city; ?>-based web hosting services offer local technical support, better server response times for regional visitors, competitive pricing, and personalized service for local businesses.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="300ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading_city2">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city2" aria-expanded="false" aria-controls="collapse_city2">
													<span>What hosting plans are available in <?php echo $city; ?>?</span>
												</button>
											</h2>
											<div id="collapse_city2" class="accordion-collapse collapse" aria-labelledby="heading_city2" data-bs-parent="#accordionExample_city">
												<div class="accordion-body ">
													<div class="bi-faq-text">We offer shared hosting, VPS hosting, dedicated servers, and cloud hosting plans with various specifications and pricing options suitable for different business sizes and requirements in <?php echo $city; ?>.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="400ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading_city3">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city3" aria-expanded="false" aria-controls="collapse_city3">
													<span>Do you provide hosting support for <?php echo $city; ?> businesses?</span>
												</button>
											</h2>
											<div id="collapse_city3" class="accordion-collapse collapse" aria-labelledby="heading_city3" data-bs-parent="#accordionExample_city">
												<div class="accordion-body ">
													<div class="bi-faq-text">Yes, we provide dedicated 24/7 technical support for <?php echo $city; ?> businesses including server management, troubleshooting, security monitoring, and website maintenance assistance.
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
			<h3 class="text-center mb-4">Web Hosting Services in Major Cities</h3>
			<div class="cities-grid">
				<?php foreach($major_cities as $major_city): ?>
					<a href="/web-hosting/<?php echo strtolower(str_replace(' ', '-', $major_city)); ?>" 
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