
<?php
$page_title = 'Client Testimonials | ThiyagiDigital';
$page_description = 'Read client testimonials and success stories from ThiyagiDigital SEO, SMM, SEM, and web development projects.';
$page_keywords = 'client testimonials, customer reviews, digital marketing success stories, ThiyagiDigital reviews, Google reviews';
$canonical_url = 'https://www.thiyagidigital.com/testimonial';

// Structured Data Schema for Organization and Reviews
$organizationSchema = [
    '@type' => 'Organization',
    'name' => 'ThiyagiDigital',
    'url' => 'https://www.thiyagidigital.com/',
    'logo' => 'https://www.thiyagidigital.com/assets/img/logo/tdigilogo.png',
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => '4.8',
        'reviewCount' => '15',
        'bestRating' => '5',
        'worstRating' => '1'
    ],
    'review' => [
        [
            '@type' => 'Review',
            'author' => [
                '@type' => 'Person',
                'name' => 'Manimaran'
            ],
            'reviewRating' => [
                '@type' => 'Rating',
                'ratingValue' => '5',
                'bestRating' => '5'
            ],
            'reviewBody' => 'Thiyagi Digital is one of best agencies in my opinions they maintain high work as per commitment. Deadlines are made on time. They always available to help and solve my problem.',
            'datePublished' => '2024-10-15'
        ],
        [
            '@type' => 'Review',
            'author' => [
                '@type' => 'Person',
                'name' => 'Sivaguru'
            ],
            'reviewRating' => [
                '@type' => 'Rating',
                'ratingValue' => '5',
                'bestRating' => '5'
            ],
            'reviewBody' => 'Thiyagi Digital transformed our website into a modern, user-friendly platform. Their attention to detail and professionalism were outstanding.',
            'datePublished' => '2024-09-22'
        ],
        [
            '@type' => 'Review',
            'author' => [
                '@type' => 'Person',
                'name' => 'Fahad Mohamed'
            ],
            'reviewRating' => [
                '@type' => 'Rating',
                'ratingValue' => '4',
                'bestRating' => '5'
            ],
            'reviewBody' => 'Thiyagi Digital has been one of the best service provider for the digital growth of our business. They have helped us and got us covered with all the services required digitally. Would strongly recommend to my friends and business associates.',
            'datePublished' => '2024-08-10'
        ]
    ]
];

// Breadcrumb Schema
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
            'name' => 'Client Testimonials',
            'item' => $canonical_url
        ]
    ]
];

$page_schema = [
    '@context' => 'https://schema.org',
    '@graph' => [$organizationSchema, $breadcrumbSchema]
];

include 'header.php';
?>
	
<!-- Start of breadcrumb section
	============================================= -->
	<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="/assets/img/bg/bread-bg.jpg">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="bi-breadcrumbs-content headline ul-li text-center">
				<h1 style="color: white"><b>Client Testimonials - Digital Marketing Success Stories</b></h1><br>
				<ul>
					<li><a href="/#">Home</a></li>
					<li>Our Testimonials</li>
				</ul>
			</div>
		</div>
	</section>	
<!-- End of breadcrumb section
	============================================= -->

<!-- Start of Service Details section
	============================================= -->
	<section id="bi-testimonials" class="bi-testimonials-section inner-page-padding">
		<div class="container">
			<div class="bi-testimonials-content">
				<div class="row">
					<div class="col-lg-8">
						<div class="bi-testimonials-text-area">
							<div class="bi-testimonials-header text-center mb-5">
								<h2 class="headline">What Our Clients Say About Us</h2>
								<p class="text-muted">Read genuine testimonials from our satisfied clients who have experienced remarkable growth with ThiyagiDigital's digital marketing services.</p>
							</div>

							<!-- Google Reviews Section -->
							<div class="google-reviews-section mb-5">
								<div class="section-header d-flex align-items-center mb-4">
									<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/768px-Google_%22G%22_logo.svg.png" alt="Google" width="24" height="24" class="me-2">
									<h3 class="mb-0">Google My Business Reviews</h3>
									<div class="ms-auto">
										<div class="rating-display">
											<span class="rating-stars">
												<i class="fas fa-star text-warning"></i>
												<i class="fas fa-star text-warning"></i>
												<i class="fas fa-star text-warning"></i>
												<i class="fas fa-star text-warning"></i>
												<i class="fas fa-star text-warning"></i>
											</span>
											<span class="rating-text ms-2">5.0 (15+ Reviews)</span>
										</div>
									</div>
								</div>

								<div class="row">
									<!-- Google Review 1 -->
									<div class="col-md-6 mb-4">
										<div class="review-card border rounded p-4 h-100">
											<div class="reviewer-info mb-3">
												<div class="d-flex align-items-center">
													<div class="reviewer-avatar bg-primary rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
														M
													</div>
													<div>
														<h5 class="mb-0">Manimaran</h5>
														<div class="rating-stars small">
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
														</div>
													</div>
												</div>
											</div>
											<p class="review-text">"Thiyagi Digital is one of best agencies in my opinions they maintain high work as per commitment. Deadlines are made on time. They always available to help and solve my problem."</p>
											<small class="text-muted">Posted on Google</small>
										</div>
									</div>

									<!-- Google Review 2 -->
									<div class="col-md-6 mb-4">
										<div class="review-card border rounded p-4 h-100">
											<div class="reviewer-info mb-3">
												<div class="d-flex align-items-center">
													<div class="reviewer-avatar bg-success rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
														S
													</div>
													<div>
														<h5 class="mb-0">Sivaguru</h5>
														<div class="rating-stars small">
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
														</div>
													</div>
												</div>
											</div>
											<p class="review-text">"Thiyagi Digital transformed our website into a modern, user-friendly platform. Their attention to detail and professionalism were outstanding."</p>
											<small class="text-muted">Posted on Google</small>
										</div>
									</div>

									<!-- Google Review 3 -->
									<div class="col-md-6 mb-4">
										<div class="review-card border rounded p-4 h-100">
											<div class="reviewer-info mb-3">
												<div class="d-flex align-items-center">
													<div class="reviewer-avatar bg-info rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
														R
													</div>
													<div>
														<h5 class="mb-0">Rengadurai</h5>
														<div class="rating-stars small">
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="far fa-star text-warning"></i>
														</div>
													</div>
												</div>
											</div>
											<p class="review-text">"We needed good audience for our workshop and I consulted Thiyagi Digital. I liked the way they took up the things. I am really happy with the overall service. I would highly recommend them."</p>
											<small class="text-muted">Posted on Google</small>
										</div>
									</div>

									<!-- Google Review 4 -->
									<div class="col-md-6 mb-4">
										<div class="review-card border rounded p-4 h-100">
											<div class="reviewer-info mb-3">
												<div class="d-flex align-items-center">
													<div class="reviewer-avatar bg-warning rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
														K
													</div>
													<div>
														<h5 class="mb-0">Kannan Mech</h5>
														<div class="rating-stars small">
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="far fa-star text-warning"></i>
														</div>
													</div>
												</div>
											</div>
											<p class="review-text">"I was really impressed with how quickly the Thiyagi Digital team adapted to our project's changing needs. They were flexible and solution-oriented."</p>
											<small class="text-muted">Posted on Google</small>
										</div>
									</div>

									<!-- Google Review 5 -->
									<div class="col-md-6 mb-4">
										<div class="review-card border rounded p-4 h-100">
											<div class="reviewer-info mb-3">
												<div class="d-flex align-items-center">
													<div class="reviewer-avatar bg-danger rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
														F
													</div>
													<div>
														<h5 class="mb-0">Fahad Mohamed</h5>
														<div class="rating-stars small">
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="far fa-star text-warning"></i>
														</div>
													</div>
												</div>
											</div>
											<p class="review-text">"Thiyagi Digital has been one of the best service provider for the digital growth of our business. They have helped us and got us covered with all the services required digitally. Would strongly recommend to my friends and business associates."</p>
											<small class="text-muted">Posted on Google</small>
										</div>
									</div>

									<!-- Google Review 6 -->
									<div class="col-md-6 mb-4">
										<div class="review-card border rounded p-4 h-100">
											<div class="reviewer-info mb-3">
												<div class="d-flex align-items-center">
													<div class="reviewer-avatar bg-secondary rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
														S
													</div>
													<div>
														<h5 class="mb-0">Suresh A</h5>
														<div class="rating-stars small">
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="fas fa-star text-warning"></i>
															<i class="far fa-star text-warning"></i>
														</div>
													</div>
												</div>
											</div>
											<p class="review-text">"I highly recommend Thiyagi Digital if you're looking to make your brand shine and capture the attention of your digital audience."</p>
											<small class="text-muted">Posted on Google</small>
										</div>
									</div>
								</div>

								<!-- Call to Action -->
								<div class="text-center mt-4">
									<a href="https://g.page/r/CRVJxJQqJJq5EBM/review" target="_blank" class="btn btn-primary">
										<i class="fab fa-google me-2"></i>Write a Review on Google
									</a>
								</div>
							</div>

							<!-- Success Stories Section -->
							<div class="success-stories-section">
								<h3 class="mb-4">Client Success Stories</h3>
								<div class="row">
									<div class="col-md-4 mb-4">
										<div class="success-card text-center p-4 border rounded">
											<div class="success-number display-4 text-primary font-weight-bold mb-2">150+</div>
											<h5>Happy Clients</h5>
											<p class="text-muted">Businesses we've helped grow online</p>
										</div>
									</div>
									<div class="col-md-4 mb-4">
										<div class="success-card text-center p-4 border rounded">
											<div class="success-number display-4 text-success font-weight-bold mb-2">300%</div>
											<h5>Average ROI</h5>
											<p class="text-muted">Return on investment for our clients</p>
										</div>
									</div>
									<div class="col-md-4 mb-4">
										<div class="success-card text-center p-4 border rounded">
											<div class="success-number display-4 text-warning font-weight-bold mb-2">5.0</div>
											<h5>Google Rating</h5>
											<p class="text-muted">Average rating from our clients</p>
										</div>
									</div>
								</div>
								</div>

								<!-- Testimonial FAQ Section -->
								<div class="testimonial-faq-section mt-5">
									<h3 class="mb-4">Frequently Asked Questions About Our Services</h3>
									<div class="bi-faq-content-area">
										<div class="accordion" id="testimonialFAQ">
											<div class="accordion-item wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">
												<h2 class="accordion-header" id="faq1">
													<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
														<span>How do you ensure client satisfaction?</span>
													</button>
												</h2>
												<div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#testimonialFAQ">
													<div class="accordion-body">
														<div class="bi-faq-text">
															We maintain regular communication, provide detailed progress reports, meet all deadlines, and offer 24/7 support to address any concerns immediately. Our client-first approach ensures every project exceeds expectations.
														</div>
													</div>
												</div>
											</div>
											<div class="accordion-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
												<h2 class="accordion-header" id="faq2">
													<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
														<span>What makes ThiyagiDigital different from other agencies?</span>
													</button>
												</h2>
												<div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#testimonialFAQ">
													<div class="accordion-body">
														<div class="bi-faq-text">
															Our personalized approach, proven track record with 150+ successful projects, dedicated account management, and comprehensive digital solutions under one roof set us apart. We focus on long-term partnerships rather than short-term gains.
														</div>
													</div>
												</div>
											</div>
											<div class="accordion-item wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms">
												<h2 class="accordion-header" id="faq3">
													<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faq3">
														<span>Do you provide ongoing support after project completion?</span>
													</button>
												</h2>
												<div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#testimonialFAQ">
													<div class="accordion-body">
														<div class="bi-faq-text">
															Yes, we provide comprehensive ongoing support including maintenance, updates, performance monitoring, and strategic guidance. Our relationship doesn't end with project delivery - we're your long-term digital growth partners.
														</div>
													</div>
												</div>
											</div>
											<div class="accordion-item wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1000ms">
												<h2 class="accordion-header" id="faq4">
													<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
														<span>How can I leave a review for ThiyagiDigital?</span>
													</button>
												</h2>
												<div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#testimonialFAQ">
													<div class="accordion-body">
														<div class="bi-faq-text">
															You can leave a review on our Google My Business page by clicking the "Write a Review on Google" button above, or contact us directly to share your experience. We value all feedback and use it to continuously improve our services.
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Ready to Get Started CTA -->
								<div class="cta-section mt-5 p-4 bg-primary text-white rounded">
									<div class="row align-items-center">
										<div class="col-md-8">
											<h3 class="mb-2 text-white">Ready to Join Our Success Stories?</h3>
											<p class="mb-0 text-light">Let's create remarkable results for your business too. Get started with a free consultation today!</p>
										</div>
										<div class="col-md-4 text-md-end mt-3 mt-md-0">
											<a href="/contact" class="btn btn-light btn-lg">
												<i class="fas fa-rocket me-2"></i>Start Your Project
											</a>
										</div>
									</div>
								</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="bi-single-sidebar">							
							<div class="container">
								<?php include 'sideform.php';?>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- End of Service Details section
	============================================= -->	
	<?php include 'testmonial2.php';?>
	<?php include 'client-logo.php';?>
	<?php include 'project-count.php';?>

	<?php include 'certify-partner.php';?>

	<?php include 'footer.php';?>
