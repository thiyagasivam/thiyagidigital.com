<?php
$page_title = 'About ThiyagiDigital - Leading Digital Marketing Agency in Chennai | 10+ Years Experience';
$page_description = 'Learn about ThiyagiDigital - Premier digital marketing agency in Chennai with 10+ years experience. Expert team specializing in SEO, SMM, SEM, web development, and digital solutions for business growth.';
$page_keywords = 'About ThiyagiDigital, digital marketing agency Chennai, 10 years experience, digital marketing company, SEO company Chennai, web development Chennai, social media marketing agency';
$canonical_url = 'https://www.thiyagidigital.com/about';

// Open Graph and Social Media Meta
$og_title = 'About ThiyagiDigital - Leading Digital Marketing Agency in Chennai';
$og_description = 'Learn about ThiyagiDigital - Premier digital marketing agency in Chennai with 10+ years experience. Expert team specializing in SEO, SMM, SEM, and web development.';
$og_image = 'https://www.thiyagidigital.com/assets/img/logo/tdigilogo.png';
$og_type = 'website';
$twitter_card = 'summary_large_image';
$twitter_site = '@thiyagidigital';
$robots = 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
$author = 'ThiyagiDigital';
$publisher = 'ThiyagiDigital';

// Additional head meta tags for SEO
$additional_head_content = '
<!-- Open Graph Meta Tags -->
<meta property="og:title" content="' . $og_title . '">
<meta property="og:description" content="' . $og_description . '">
<meta property="og:image" content="' . $og_image . '">
<meta property="og:url" content="' . $canonical_url . '">
<meta property="og:type" content="' . $og_type . '">
<meta property="og:site_name" content="ThiyagiDigital">
<meta property="og:locale" content="en_IN">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="' . $twitter_card . '">
<meta name="twitter:site" content="' . $twitter_site . '">
<meta name="twitter:title" content="' . $og_title . '">
<meta name="twitter:description" content="' . $og_description . '">
<meta name="twitter:image" content="' . $og_image . '">

<!-- Additional Meta Tags -->
<meta name="robots" content="' . $robots . '">
<meta name="author" content="' . $author . '">
<meta name="publisher" content="' . $publisher . '">
<meta name="format-detection" content="telephone=+91-9363252875">
<meta name="geo.region" content="IN-TN">
<meta name="geo.placename" content="Chennai">
<meta name="ICBM" content="12.9422, 80.2430">

<!-- Preload Critical Resources -->
<link rel="preload" href="assets/css/style.css" as="style">
<link rel="preload" href="assets/css/bootstrap.min.css" as="style">
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//www.google.com">
<link rel="apple-touch-icon" href="assets/img/favicon.png">
';

// Organization Schema with detailed information
$organizationSchema = [
    '@type' => 'LocalBusiness',
    'name' => 'ThiyagiDigital',
    'url' => 'https://www.thiyagidigital.com/',
    'logo' => 'https://www.thiyagidigital.com/assets/img/logo/tdigilogo.png',
    'foundingDate' => '2014',
    'founder' => [
        '@type' => 'Person',
        'name' => 'Thiyagarajan'
    ],
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => '3/651, Annai Avenue, Thoraipakkam',
        'addressLocality' => 'Chennai',
        'addressRegion' => 'Tamil Nadu',
        'postalCode' => '600097',
        'addressCountry' => 'IN'
    ],
    'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => '12.9422',
        'longitude' => '80.2430'
    ],
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => '+91-9363252875',
        'contactType' => 'customer service',
        'availableLanguage' => ['English', 'Tamil']
    ],
    'openingHours' => [
        'Mo-Sa 09:00-18:00'
    ],
    'sameAs' => [
        'https://www.facebook.com/profile.php?id=61560465773612',
        'https://www.instagram.com/thiyagidigital/',
        'https://x.com/thiyagidigital',
        'https://in.pinterest.com/thiyagidigital/'
    ],
    'description' => 'Leading digital marketing agency in Chennai providing comprehensive SEO, social media marketing, web development, and digital solutions for business growth.',
    'numberOfEmployees' => '10-25',
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => '4.8',
        'reviewCount' => '150',
        'bestRating' => '5',
        'worstRating' => '1'
    ],
    'areaServed' => [
        [
            '@type' => 'Country',
            'name' => 'India'
        ],
        [
            '@type' => 'City',
            'name' => 'Chennai'
        ],
        [
            '@type' => 'State',
            'name' => 'Tamil Nadu'
        ]
    ],
    'serviceType' => [
        'Digital Marketing',
        'SEO Services',
        'Social Media Marketing',
        'Web Development',
        'Content Marketing',
        'PPC Advertising'
    ],
    'priceRange' => '$$',
    'paymentAccepted' => ['Cash', 'Credit Card', 'Bank Transfer'],
    'currenciesAccepted' => 'INR'
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
            'name' => 'About Us',
            'item' => $canonical_url
        ]
    ]
];

// FAQ Schema
$faqSchema = [
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'How long has ThiyagiDigital been in business?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'ThiyagiDigital was founded in 2014, giving us over 10 years of experience in digital marketing and web development. We have grown from a small Chennai-based team to a full-service digital agency serving clients across India and internationally.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'What makes ThiyagiDigital different from other agencies?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Our decade of experience, personalized approach, and proven track record set us apart. We focus on long-term partnerships, provide transparent reporting, and have successfully helped 150+ businesses achieve their digital goals with an average 300% ROI improvement.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Do you work with businesses outside Chennai?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Absolutely! While we are based in Chennai, we serve clients across India and internationally. Our digital-first approach allows us to work effectively with businesses regardless of their location, providing the same high-quality services remotely.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'What industries do you specialize in?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'We work with businesses across various industries including healthcare, education, e-commerce, manufacturing, real estate, hospitality, and professional services. Our diverse experience allows us to adapt our strategies to any industry unique requirements and challenges.'
            ]
        ]
    ]
];

$page_schema = [
    '@context' => 'https://schema.org',
    '@graph' => [$organizationSchema, $breadcrumbSchema, $faqSchema]
];

include 'header.php';
?>


<!-- Start of breadcrumb section
	============================================= -->
	<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="assets/img/bg/bread-bg.jpg" aria-label="Page Header">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="bi-breadcrumbs-content headline ul-li text-center">
				<h1 style="color: white"><b>About ThiyagiDigital - Leading Digital Marketing Agency</b></h1><br>
				<nav aria-label="Breadcrumb">
					<ul itemscope itemtype="https://schema.org/BreadcrumbList">
						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<a href="/" itemprop="item"><span itemprop="name">Home</span></a>
							<meta itemprop="position" content="1" />
						</li>
						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<span itemprop="name">About Us</span>
							<meta itemprop="position" content="2" />
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</section>
<!-- End of breadcrumb section
	============================================= -->

<!-- Start of About  section
	============================================= -->
	<section id="bi-about" class="bi-about-section" data-background="assets/img/bg/about-bg.png">
		<div class="container">
			<div class="bi-about-content position-relative">
				<div class="row">
					<div class="col-lg-7">
						<div class="bi-about-img-wrapper d-flex">
							<div class="bi-about-img-area1">
								<div class="bi-about-img1 position-relative bi-img-animation">
									<img src="assets/img/about/ab1.jpg" alt="">
								</div>
								<div class="bi-about-img-text-btn">
									<div class="bi-about-img-text pera-content bins-text">
										<p>
											Our goal is to make it as easy as possible for you to walk away with the solution that suits your needs perfectly.
										</p>
									</div>
									<div class="bi-btn-1 bi-btn-area text-uppercase wow fadeInUp"  data-wow-delay="500ms" data-wow-duration="1000ms">
										<a class="bi-btn-main  bi-btn-hover bi-btn-item" href="#">  <span></span> Get Services</a>
									</div>
								</div>
							</div>
							<div class="bi-about-img-area2">
								<div class="bi-about-img2 position-relative bi-img-animation">
									<img src="assets/img/about/ab2.jpg" alt="">
								</div>
							</div>
						</div>
					</div>
				<div class="col-lg-5">
					<div class="bi-about-text-area">
						<div class="bi-section-title-1 headline pera-content">
							<div class="bi-subtitle text-uppercase wow fadeInRight"  data-wow-delay="200ms" data-wow-duration="1000ms">
								Welcome to ThiyagiDigital
							</div>
							<h2 class="headline-title">
								<b>10+ Years</b> of Digital 
								<span>Marketing Excellence </span>
								<b>in Chennai</b>
							</h2>
							<p class="about-description">
								Founded in 2014, ThiyagiDigital has been at the forefront of digital transformation in Chennai and across India. We are a team of passionate digital marketers, web developers, and creative professionals dedicated to helping businesses unlock their full potential in the digital landscape.
							</p>
							<p class="about-mission">
								<strong>Our Mission:</strong> To empower businesses with innovative digital solutions that drive growth, enhance online presence, and deliver measurable results.
							</p>
						</div>
					</div>
						<div class="bi-about-circle-progress">
							<div class="row">
								<div class="col-md-6">
									<div class="bi-about-circle-progress-item">
										<div class="counter-boxed d-flex align-items-center pera-content headline">
											<div class="graph-outer position-relative">
												<input type="text" class="dial" data-fgColor="#fe5151" data-bgColor="#e3e3eb" data-width="80" data-height="80" data-linecap="round"  value="100" >
												<div class="inner-text count-box"><span class="count-text" data-stop="100" data-speed="4500"></span>%</div>
											</div>
											<div class="bi-about-prog-text">
												<h3 class="text-uppercase">SEO </h3>
												<p>( On Page, Off Page, Technical SEO )</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="bi-about-circle-progress-item">
										<div class="counter-boxed d-flex align-items-center pera-content headline">
											<div class="graph-outer position-relative">
												<input type="text" class="dial" data-fgColor="#fe5151" data-bgColor="#e3e3eb" data-width="80" data-height="80" data-linecap="round"  value="100" >
												<div class="inner-text count-box"><span class="count-text" data-stop="100" data-speed="4500"></span>%</div>
											</div>
											<div class="bi-about-prog-text">
												<h3 class="text-uppercase">Web Development </h3>
												<p>( HTML,CSS,PHP, Wordpress )</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="bi-about-circle-progress-item">
										<div class="counter-boxed d-flex align-items-center pera-content headline">
											<div class="graph-outer position-relative">
												<input type="text" class="dial" data-fgColor="#fe5151" data-bgColor="#e3e3eb" data-width="80" data-height="80" data-linecap="round"  value="100" >
												<div class="inner-text count-box"><span class="count-text" data-stop="100" data-speed="4500"></span>%</div>
											</div>
											<div class="bi-about-prog-text">
												<h3 class="text-uppercase">SEM </h3>
												<p>( Google, Bing)</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="bi-about-circle-progress-item">
										<div class="counter-boxed d-flex align-items-center pera-content headline">
											<div class="graph-outer position-relative">
												<input type="text" class="dial" data-fgColor="#fe5151" data-bgColor="#e3e3eb" data-width="80" data-height="80" data-linecap="round"  value="100" >
												<div class="inner-text count-box"><span class="count-text" data-stop="100" data-speed="4500"></span>%</div>
											</div>
											<div class="bi-about-prog-text">
												<h3 class="text-uppercase">SMM </h3>
												<p>( Facebook, instagram, x,pinterest )</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- End of About  section
	============================================= -->

	<!-- Start of Company Story section
		============================================= -->
	<section id="bi-company-story" class="bi-company-story-section inner-page-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="bi-company-story-content">
						<div class="bi-section-title text-center mb-5">
							<h2 class="headline">Our Journey & Values</h2>
							<p class="pera-content">Building digital success stories since 2014</p>
						</div>

						<div class="row mb-5">
							<div class="col-md-6">
								<div class="story-content">
									<h3>Our Story</h3>
									<p>ThiyagiDigital was born from a simple vision: to bridge the gap between traditional businesses and digital success. What started as a small team in Chennai has grown into a leading digital marketing agency serving clients across India and internationally.</p>
									<p>Over the past decade, we've helped <strong>150+ businesses</strong> transform their digital presence, achieve higher rankings on search engines, and significantly increase their online revenue.</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="story-content">
									<h3>Our Vision</h3>
									<p>To be the most trusted digital partner for businesses looking to thrive in the digital economy. We envision a future where every business, regardless of size, has access to world-class digital marketing solutions.</p>
									<h3>What We Stand For</h3>
									<ul>
										<li><strong>Innovation:</strong> Staying ahead of digital trends</li>
										<li><strong>Integrity:</strong> Transparent and honest practices</li>
										<li><strong>Results:</strong> Measurable outcomes for every client</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- Why Choose Us Section -->
						<div class="why-choose-us mb-5">
							<h3 class="text-center mb-4">Why Choose ThiyagiDigital?</h3>
							<div class="row">
								<div class="col-md-4 mb-4">
									<div class="feature-box text-center p-4 border rounded">
										<div class="feature-icon mb-3">
											<i class="fas fa-award fa-3x text-primary"></i>
										</div>
										<h4>10+ Years Experience</h4>
										<p>Decade of proven expertise in digital marketing and web development</p>
									</div>
								</div>
								<div class="col-md-4 mb-4">
									<div class="feature-box text-center p-4 border rounded">
										<div class="feature-icon mb-3">
											<i class="fas fa-users fa-3x text-success"></i>
										</div>
										<h4>150+ Happy Clients</h4>
										<p>Trusted by businesses across various industries and locations</p>
									</div>
								</div>
								<div class="col-md-4 mb-4">
									<div class="feature-box text-center p-4 border rounded">
										<div class="feature-icon mb-3">
											<i class="fas fa-chart-line fa-3x text-warning"></i>
										</div>
										<h4>Proven Results</h4>
										<p>Average 300% ROI improvement for our digital marketing clients</p>
									</div>
								</div>
							</div>
						</div>

						<!-- Services Overview -->
						<div class="services-overview">
							<h3 class="text-center mb-4">Our Core Expertise</h3>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="service-item d-flex align-items-center">
										<i class="fas fa-search fa-2x text-primary me-3"></i>
										<div>
											<h5>Search Engine Optimization (SEO)</h5>
											<p class="mb-0">On-page, off-page, and technical SEO to boost your rankings</p>
										</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="service-item d-flex align-items-center">
										<i class="fas fa-share-alt fa-2x text-success me-3"></i>
										<div>
											<h5>Social Media Marketing (SMM)</h5>
											<p class="mb-0">Facebook, Instagram, Twitter, and LinkedIn marketing</p>
										</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="service-item d-flex align-items-center">
										<i class="fas fa-mouse-pointer fa-2x text-info me-3"></i>
										<div>
											<h5>Search Engine Marketing (SEM)</h5>
											<p class="mb-0">Google Ads and Bing Ads for immediate results</p>
										</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="service-item d-flex align-items-center">
										<i class="fas fa-code fa-2x text-danger me-3"></i>
										<div>
											<h5>Web Development</h5>
											<p class="mb-0">Custom websites, WordPress, and e-commerce solutions</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of Company Story section
		============================================= -->

	<!-- Start of Team & Values section
		============================================= -->
	<section id="bi-team-values" class="bi-team-values-section" style="background-color: #f8f9fa; padding: 80px 0;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="team-values-content text-center">
						<h2 class="mb-4">Our Commitment to Excellence</h2>
						<div class="row">
							<div class="col-md-3 mb-4">
								<div class="value-item">
									<div class="value-icon mb-3">
										<i class="fas fa-lightbulb fa-3x text-warning"></i>
									</div>
									<h4>Innovation</h4>
									<p>Constantly evolving with the latest digital trends and technologies</p>
								</div>
							</div>
							<div class="col-md-3 mb-4">
								<div class="value-item">
									<div class="value-icon mb-3">
										<i class="fas fa-handshake fa-3x text-primary"></i>
									</div>
									<h4>Partnership</h4>
									<p>Building long-term relationships based on trust and mutual success</p>
								</div>
							</div>
							<div class="col-md-3 mb-4">
								<div class="value-item">
									<div class="value-icon mb-3">
										<i class="fas fa-target fa-3x text-success"></i>
									</div>
									<h4>Results-Driven</h4>
									<p>Every strategy is designed to deliver measurable business outcomes</p>
								</div>
							</div>
							<div class="col-md-3 mb-4">
								<div class="value-item">
									<div class="value-icon mb-3">
										<i class="fas fa-heart fa-3x text-danger"></i>
									</div>
									<h4>Client-First</h4>
									<p>Your success is our success - we put clients at the center of everything</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of Team & Values section
		============================================= -->

	<!-- Start of FAQ section
		============================================= -->
	<section id="bi-about-faq" class="bi-about-faq-section inner-page-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="about-faq-content">
						<h2 class="text-center mb-5">Frequently Asked Questions About ThiyagiDigital</h2>
						<div class="bi-faq-content-area">
							<div class="accordion" id="aboutFAQ">
								<div class="accordion-item wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">
									<h2 class="accordion-header" id="aboutFaq1">
										<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaqCollapse1" aria-expanded="true" aria-controls="aboutFaqCollapse1">
											<span>How long has ThiyagiDigital been in business?</span>
										</button>
									</h2>
									<div id="aboutFaqCollapse1" class="accordion-collapse collapse show" aria-labelledby="aboutFaq1" data-bs-parent="#aboutFAQ">
										<div class="accordion-body">
											<div class="bi-faq-text">
												ThiyagiDigital was founded in 2014, giving us over 10 years of experience in digital marketing and web development. We've grown from a small Chennai-based team to a full-service digital agency serving clients across India and internationally.
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
									<h2 class="accordion-header" id="aboutFaq2">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaqCollapse2" aria-expanded="false" aria-controls="aboutFaqCollapse2">
											<span>What makes ThiyagiDigital different from other agencies?</span>
										</button>
									</h2>
									<div id="aboutFaqCollapse2" class="accordion-collapse collapse" aria-labelledby="aboutFaq2" data-bs-parent="#aboutFAQ">
										<div class="accordion-body">
											<div class="bi-faq-text">
												Our decade of experience, personalized approach, and proven track record set us apart. We focus on long-term partnerships, provide transparent reporting, and have successfully helped 150+ businesses achieve their digital goals with an average 300% ROI improvement.
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms">
									<h2 class="accordion-header" id="aboutFaq3">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaqCollapse3" aria-expanded="false" aria-controls="aboutFaq3">
											<span>Do you work with businesses outside Chennai?</span>
										</button>
									</h2>
									<div id="aboutFaqCollapse3" class="accordion-collapse collapse" aria-labelledby="aboutFaq3" data-bs-parent="#aboutFAQ">
										<div class="accordion-body">
											<div class="bi-faq-text">
												Absolutely! While we're based in Chennai, we serve clients across India and internationally. Our digital-first approach allows us to work effectively with businesses regardless of their location, providing the same high-quality services remotely.
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1000ms">
									<h2 class="accordion-header" id="aboutFaq4">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaqCollapse4" aria-expanded="false" aria-controls="aboutFaq4">
											<span>What industries do you specialize in?</span>
										</button>
									</h2>
									<div id="aboutFaqCollapse4" class="accordion-collapse collapse" aria-labelledby="aboutFaq4" data-bs-parent="#aboutFAQ">
										<div class="accordion-body">
											<div class="bi-faq-text">
												We work with businesses across various industries including healthcare, education, e-commerce, manufacturing, real estate, hospitality, and professional services. Our diverse experience allows us to adapt our strategies to any industry's unique requirements and challenges.
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of FAQ section
		============================================= -->

	<!-- Start of Team Section
		============================================= -->
	<section id="bi-team" class="bi-team-section inner-page-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="bi-section-title text-center mb-5">
						<h2 class="headline">Meet Our Expert Team</h2>
						<p class="pera-content">Passionate professionals dedicated to your digital success</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 mb-4">
					<div class="team-member text-center p-4 border rounded">
						<div class="team-img mb-3">
							<div class="member-avatar bg-primary rounded-circle mx-auto" style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; color: white; font-size: 2.5rem; font-weight: bold;">
								T
							</div>
						</div>
						<h4>Thiyagarajan</h4>
						<p class="text-muted">Founder & CEO</p>
						<p class="team-bio">10+ years of digital marketing expertise. Leads our strategic vision and client relationships.</p>
						<div class="social-links">
							<a href="https://www.linkedin.com/in/thiyagarajan-digital" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
							<a href="mailto:info@thiyagidigital.com" class="text-primary"><i class="fas fa-envelope"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="team-member text-center p-4 border rounded">
						<div class="team-img mb-3">
							<div class="member-avatar bg-success rounded-circle mx-auto" style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; color: white; font-size: 2.5rem; font-weight: bold;">
								S
							</div>
						</div>
						<h4>SEO Specialist Team</h4>
						<p class="text-muted">SEO & Content Marketing</p>
						<p class="team-bio">Expert team specializing in organic search optimization and content strategy for better rankings.</p>
						<div class="social-links">
							<a href="/contact" class="text-success me-2"><i class="fas fa-search"></i></a>
							<a href="/seo-services" class="text-success"><i class="fas fa-chart-line"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="team-member text-center p-4 border rounded">
						<div class="team-img mb-3">
							<div class="member-avatar bg-info rounded-circle mx-auto" style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; color: white; font-size: 2.5rem; font-weight: bold;">
								D
							</div>
						</div>
						<h4>Development Team</h4>
						<p class="text-muted">Web Development & Design</p>
						<p class="team-bio">Skilled developers creating responsive websites and custom web applications with modern technologies.</p>
						<div class="social-links">
							<a href="/web-development-service" class="text-info me-2"><i class="fas fa-code"></i></a>
							<a href="/portfolio" class="text-info"><i class="fas fa-laptop-code"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of Team Section
		============================================= -->

	<!-- Start of Awards & Recognition Section
		============================================= -->
	<section id="bi-awards" class="bi-awards-section" style="background-color: #f8f9fa; padding: 80px 0;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="awards-content text-center">
						<h2 class="mb-5">Awards & Recognition</h2>
						<div class="row">
							<div class="col-md-3 mb-4">
								<div class="award-item">
									<div class="award-icon mb-3">
										<i class="fas fa-trophy fa-3x text-warning"></i>
									</div>
									<h4>Top SEO Agency</h4>
									<p>Chennai 2023</p>
								</div>
							</div>
							<div class="col-md-3 mb-4">
								<div class="award-item">
									<div class="award-icon mb-3">
										<i class="fas fa-medal fa-3x text-success"></i>
									</div>
									<h4>Excellence in Digital Marketing</h4>
									<p>Industry Recognition</p>
								</div>
							</div>
							<div class="col-md-3 mb-4">
								<div class="award-item">
									<div class="award-icon mb-3">
										<i class="fas fa-certificate fa-3x text-primary"></i>
									</div>
									<h4>Google Partner</h4>
									<p>Certified Agency</p>
								</div>
							</div>
							<div class="col-md-3 mb-4">
								<div class="award-item">
									<div class="award-icon mb-3">
										<i class="fas fa-star fa-3x text-info"></i>
									</div>
									<h4>4.8 Star Rating</h4>
									<p>Google Reviews</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Certifications -->
			<div class="row mt-5">
				<div class="col-lg-12">
					<div class="certifications-content text-center">
						<h3 class="mb-4">Our Certifications</h3>
						<div class="row">
							<div class="col-md-2 mb-3">
								<div class="cert-item p-3 border rounded">
									<i class="fab fa-google fa-2x text-danger mb-2"></i>
									<small>Google Ads Certified</small>
								</div>
							</div>
							<div class="col-md-2 mb-3">
								<div class="cert-item p-3 border rounded">
									<i class="fab fa-google fa-2x text-primary mb-2"></i>
									<small>Google Analytics Certified</small>
								</div>
							</div>
							<div class="col-md-2 mb-3">
								<div class="cert-item p-3 border rounded">
									<i class="fab fa-facebook fa-2x text-primary mb-2"></i>
									<small>Meta Business Partner</small>
								</div>
							</div>
							<div class="col-md-2 mb-3">
								<div class="cert-item p-3 border rounded">
									<i class="fab fa-microsoft fa-2x text-info mb-2"></i>
									<small>Bing Ads Certified</small>
								</div>
							</div>
							<div class="col-md-2 mb-3">
								<div class="cert-item p-3 border rounded">
									<i class="fab fa-hubspot fa-2x text-warning mb-2"></i>
									<small>HubSpot Certified</small>
								</div>
							</div>
							<div class="col-md-2 mb-3">
								<div class="cert-item p-3 border rounded">
									<i class="fas fa-code fa-2x text-success mb-2"></i>
									<small>WordPress Expert</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of Awards & Recognition Section
		============================================= -->

	<!-- Start of Process Section
		============================================= -->
	<section id="bi-process" class="bi-process-section inner-page-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="process-content">
						<div class="bi-section-title text-center mb-5">
							<h2 class="headline">Our Proven Process</h2>
							<p class="pera-content">How we deliver digital success for your business</p>
						</div>
						<div class="row">
							<div class="col-md-3 mb-4">
								<div class="process-step text-center">
									<div class="step-number bg-primary text-white rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold;">
										1
									</div>
									<h4>Discover</h4>
									<p>We analyze your business, competitors, and market to understand your unique needs and opportunities.</p>
								</div>
							</div>
							<div class="col-md-3 mb-4">
								<div class="process-step text-center">
									<div class="step-number bg-success text-white rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold;">
										2
									</div>
									<h4>Strategy</h4>
									<p>We develop a customized digital marketing strategy tailored to your business goals and target audience.</p>
								</div>
							</div>
							<div class="col-md-3 mb-4">
								<div class="process-step text-center">
									<div class="step-number bg-warning text-white rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold;">
										3
									</div>
									<h4>Execute</h4>
									<p>Our expert team implements the strategy with precision, using the latest tools and best practices.</p>
								</div>
							</div>
							<div class="col-md-3 mb-4">
								<div class="process-step text-center">
									<div class="step-number bg-danger text-white rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold;">
										4
									</div>
									<h4>Optimize</h4>
									<p>We continuously monitor, analyze, and optimize campaigns to maximize ROI and drive better results.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of Process Section
		============================================= -->

	<!-- Start of Location Section
		============================================= -->
	<section id="bi-location" class="bi-location-section" style="background-color: #f8f9fa; padding: 80px 0;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="location-content">
						<h2 class="mb-4">Our Location</h2>
						<div class="contact-info">
							<div class="contact-item d-flex align-items-center mb-3">
								<i class="fas fa-map-marker-alt fa-2x text-primary me-3"></i>
								<div>
									<h5>Address</h5>
									<p class="mb-0">509, Sathiyamangalam<br>Kulathur Taluk, Pudukkottai<br>Tamil Nadu - 622501</p>
								</div>
							</div>
							<div class="contact-item d-flex align-items-center mb-3">
								<i class="fas fa-phone fa-2x text-success me-3"></i>
								<div>
									<h5>Phone</h5>
									<p class="mb-0">+91-9363252875</p>
								</div>
							</div>
							<div class="contact-item d-flex align-items-center mb-3">
								<i class="fas fa-envelope fa-2x text-info me-3"></i>
								<div>
									<h5>Email</h5>
									<p class="mb-0">info@thiyagidigital.com</p>
								</div>
							</div>
							<div class="contact-item d-flex align-items-center">
								<i class="fas fa-clock fa-2x text-warning me-3"></i>
								<div>
									<h5>Working Hours</h5>
									<p class="mb-0">Monday - Saturday: 9:00 AM - 6:00 PM<br>Sunday: Closed</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="map-area">
						<h3 class="mb-3">Find Us on Map</h3>
						<div class="map-container" style="height: 400px; background: #e9ecef; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
							<iframe 
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7!2d78.8!3d10.3!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDE4JzAwLjAiTiA3OMKwNDgnMDAuMCJF!5e0!3m2!1sen!2sin!4v1234567890!5m2!1sen!2sin" 
								width="100%" 
								height="400" 
								style="border:0; border-radius: 8px;" 
								allowfullscreen="" 
								loading="lazy" 
								referrerpolicy="no-referrer-when-downgrade">
							</iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of Location Section
		============================================= -->

	<!-- Start of CTA section
		============================================= -->
	<section id="bi-about-cta" class="bi-about-cta-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 60px 0;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="about-cta-content text-center text-white">
						<h2 class="mb-4">Ready to Transform Your Digital Presence?</h2>
						<p class="mb-4" style="font-size: 1.2em;">Join 150+ satisfied clients who have achieved remarkable growth with ThiyagiDigital. Let's discuss how we can help your business succeed online.</p>
						<div class="cta-buttons">
							<a href="/contact" class="btn btn-light btn-lg me-3">
								<i class="fas fa-comment-dots me-2"></i>Get Free Consultation
							</a>
							<a href="/services" class="btn btn-outline-light btn-lg">
								<i class="fas fa-eye me-2"></i>View Our Services
							</a>
						</div>
					</div>
				</div>
			</div>
			</div>
		</section>
		<!-- End of CTA section
			============================================= -->



	<?php include 'testmonial2.php';?>
	<?php include 'client-logo.php';?>
	<?php include 'project-count.php';?>

	<?php include 'footer.php';?>
	

