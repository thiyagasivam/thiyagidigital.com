<?php
// Removed sitemap auto-update as it's now handled by dynamic sitemap.xml.php
?>


<!Doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="Z9lTCvuf7MLsgjjWtZoGZERzMiQ9qE5fcCCTJEjZzCs" />
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N9FVK3WNZJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-N9FVK3WNZJ');
</script>
	<?php
	// Dynamic SEO meta handling with sensible defaults
	$page_title = $page_title ?? 'ThiyagiDigital — Digital Marketing Company in Chennai';
	$page_description = $page_description ?? 'ThiyagiDigital - Top digital marketing agency in Chennai offering SEO, social media marketing, content marketing, and web development services.';
	$page_keywords = $page_keywords ?? null;
	$page_robots = $page_robots ?? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1
';

	// Build default canonical URL (without query string)
	$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
	$requestUriPath = isset($_SERVER['REQUEST_URI']) ? strtok($_SERVER['REQUEST_URI'], '?') : '/';
	$host = $_SERVER['HTTP_HOST'] ?? 'www.thiyagidigital.com';
	$default_canonical = $scheme . '://' . $host . $requestUriPath;
	$canonical_url = $canonical_url ?? $default_canonical;

	$og_image = $og_image ?? '/assets/img/logo/tdigilogo.png';
	$og_type = $og_type ?? 'website';
	$og_site_name = $og_site_name ?? 'ThiyagiDigital';
	$locale = $locale ?? 'en_US';
	?>

	<title><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?></title>
	<meta name="description" content="<?php echo htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8'); ?>">
	<?php if (!empty($page_keywords)) : ?>
		<meta name="keywords" content="<?php echo htmlspecialchars($page_keywords, ENT_QUOTES, 'UTF-8'); ?>">
	<?php endif; ?>
	<meta name="robots" content="<?php echo htmlspecialchars($page_robots, ENT_QUOTES, 'UTF-8'); ?>">
	<link rel="canonical" href="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">

	<!-- Open Graph -->
	<meta property="og:title" content="<?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?>" />
	<meta property="og:description" content="<?php echo htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8'); ?>" />
	<meta property="og:type" content="<?php echo htmlspecialchars($og_type, ENT_QUOTES, 'UTF-8'); ?>" />
	<meta property="og:url" content="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>" />
	<meta property="og:image" content="<?php echo htmlspecialchars($og_image, ENT_QUOTES, 'UTF-8'); ?>" />
	<meta property="og:site_name" content="<?php echo htmlspecialchars($og_site_name, ENT_QUOTES, 'UTF-8'); ?>" />
	<meta property="og:locale" content="<?php echo htmlspecialchars($locale, ENT_QUOTES, 'UTF-8'); ?>" />

	<!-- Twitter Card -->
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="<?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?>" />
	<meta name="twitter:description" content="<?php echo htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8'); ?>" />
	<meta name="twitter:image" content="<?php echo htmlspecialchars($og_image, ENT_QUOTES, 'UTF-8'); ?>" />

	<?php
	// Optional JSON-LD Schema markup support
	if (!empty($page_schema)) {
		if (is_array($page_schema)) {
			echo '<script type="application/ld+json">' . json_encode($page_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
		} elseif (is_string($page_schema)) {
			echo '<script type="application/ld+json">' . $page_schema . '</script>';
		}
	}
	?>

    <link rel="shortcut icon" href="/assets/img/logo/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/assets/css/flaticon_aina.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/swiper.min.css">
    <link rel="stylesheet" href="/assets/css/meanmenu.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <!-- <div id="preloader"></div> -->
    <div class="cursor"></div>
    <!-- mobile-menu-start -->
    <div class="sidemenu-area sidemenu_1_active">

        <!-- close-btn -->
        <div class="sidemenu-close-btn sidemenu_close_btn">
            <i class="far fa-chevron-left"></i>
        </div>

        <!-- profile -->
        <div class="sidemenu-profile mb-30 is_show">
            <div class="img">
                    <img src="/assets/img/new_home/logo/logo-icon.png" alt="">
            </div>
            <h6 class="name">ThiyagiDigital</h6>
        </div>

        <div class="h2-sidemenu-wrap">
            <div class="mobile_menu"></div>
        </div>

        <!-- mobile-menu -->
        <div class="sidebar-mobile-menu-wrap is_show">
            <div class="mobile_menu">
                                <li><a href="https://in.pinterest.com/thiyagidigital/" target="_blank"><i class="fab fa-pinterest"></i>  pinterest  </a></li>

            </div>
        </div>

        <!-- social-link -->
        <div class="sidemenu-social-link mb-30 is_show">
            <h6 class="title">connect Social</h6>
            <ul>
                <li>
                    <a href="https://www.facebook.com/profile.php?id=61560465773612" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </li>
                 <li>
                    <a href="https://www.instagram.com/thiyagidigital/" target="_blank"><i class="fab fa-instagram"></i></a>
                </li>
                                <li><a href="https://x.com/thiyagidigital" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://in.pinterest.com/thiyagidigital/" target="_blank"><i class="fab fa-pinterest"></i></a></li>

                <!--<li>-->
                <!--    <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>-->
                <!--</li>-->
               
                <!--<li>-->
                <!--    <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>-->
                <!--</li>-->
            </ul>
        </div>

        <!-- contact-info -->
        <div class="sidemenu-contact-info is_show">
            <h6 class="title">Contact Information</h6>
            <div class="info-box-wrap">
                <div class="info-box">
                    <h6 class="title"><i class="fas fa-phone-alt"></i>Phone</h6>
                    <p>+91 9363252875</p>
                </div>
                <div class="info-box">
                    <h6 class="title"><i class="fas fa-envelope"></i>Email</h6>
                    <p>info@thiyagidigital.com</p>
                </div>
                <div class="info-box">
                    <h6 class="title"><i class="fas fa-map-marker-alt"></i>Address</h6>
                    <p>Chennai, Tamil Nadu 600073.</p>
                </div>
            </div>
        </div>

    </div>

    <div class="offcanvas-overlay"></div>
    <!-- mobile-menu-end -->

   <!-- Start of header section
	============================================= -->
	<header id="bi-header" class="bi-header-section header-style-one header-new-clr ">
		<div class="bi-header-content new-bgclr ">
			<div class="bi-header-logo-main-menu d-flex align-items-center justify-content-between ">
				<div class="brand-logo navbar-brand">
						<a href="/#"><img src="/assets/img/logo/tdigilogo.png" alt="ThiyagiDigital">Thiyagidigital</a>

				</div>
				<div class="bi-header-main-menu-cta-area d-flex align-items-center">
					<div class="bi-header-main-navigation">
						<nav class="main-navigation clearfix ul-li">
							<ul id="main-nav" class="nav navbar-nav clearfix">
								
								<li>
									<a href="/#">Home</a>
								</li>
								<li><a href="https://www.thiyagidigital.com/about">About Us</a></li>
								
                                <li class="dropdown">
                                    <a href="#">Services</a>
                                    <ul class="dropdown-menu clearfix">
                                        <li><a href="https://www.thiyagidigital.com/seo-services">Search Engine Optimization</a></li>
                                        <li><a href="https://www.thiyagidigital.com/smm-service">Social Media Marketing</a></li>
                                        <li><a href="https://www.thiyagidigital.com/sem-services">Search Engine Marketing</a></li>
                                        <li><a href="https://www.thiyagidigital.com/web-development-service">Web Development</a></li>
                                        <li><a href="https://www.thiyagidigital.com/content-writing-service">Content Writing</a></li>
										<li><a href="https://www.thiyagidigital.com/email-marketing-service">Email Marketing</a></li>
                                    </ul>
                                </li>
                                <li><a href="https://www.thiyagidigital.com/portfolio">Portfolio</a></li>
								<li><a href="https://www.thiyagidigital.com/testimonial">Testimonial</a></li>
						
								<li><a href="/#">Blog</a></li>
                                <li><a href="https://www.thiyagidigital.com/contact">Contact Us</a></li>

							</ul>
						</nav>
					</div>
					<div class="bi-header-social">
					   	<a href="https://www.facebook.com/profile.php?id=61560465773612" target="_blank"> <i class="fab fa-facebook"></i></a>
						<a href="https://www.instagram.com/thiyagidigital/" target="_blank"> <i class="fab fa-instagram"></i></a>
						<a href="https://x.com/thiyagidigital" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://in.pinterest.com/thiyagidigital/" target="_blank"><i class="fab fa-pinterest"></i></a>
						<!--<a href="#"> <i class="fab fa-linkedin-in" target="_blank"></i></a>-->
						<!--<a href="#"> <i class="fab fa-youtube" target="_blank"></i></a>-->
					</div>
					<div class="bi-header-cta-btn-grp d-flex align-items-center">
						
						<div class="offcanves-btn navSidebar-button">
							<button><i class="fal fa-bars"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="mobile_menu position-relative">
				<div class="mobile_menu_button open_mobile_menu">
					<i class="fal fa-bars"></i>
				</div>
				<div class="mobile_menu_wrap">
					<div class="mobile_menu_overlay open_mobile_menu"></div>
					<div class="mobile_menu_content">
						<div class="mobile_menu_close open_mobile_menu">
							<i class="fal fa-times"></i>
						</div>
						<div class="m-brand-logo">
							<a href="/#"><img src="/assets/img/logo/logo2.png" alt=""></a>
						</div>
						
						<nav class="mobile-main-navigation  clearfix ul-li">
							<ul id="m-main-nav" class="nav navbar-nav clearfix">
								<li>
									<a href="/#">Home</a>
								</li>
								<li><a href="https://www.thiyagidigital.com/about">About Us</a></li>

                                <li class="dropdown">
								   <a href="#">Services</a>
									<ul class="dropdown-menu clearfix">
									    <li><a href="https://www.thiyagidigital.com/seo-services">Search Engine Optimization</a></li>
                                        <li><a href="https://www.thiyagidigital.com/smm-service">Social Media Marketing</a></li>
                                        <li><a href="https://www.thiyagidigital.com/sem-services">Search Engine Marketing</a></li>
                                        <li><a href="https://www.thiyagidigital.com/web-development-service">Web Development</a></li>
                                        <li><a href="https://www.thiyagidigital.com/content-writing-service">Content Writing</a></li>
										<li><a href="https://www.thiyagidigital.com/email-marketing-service">Email Marketing</a></li>
									</ul>
								</li>
                                <li><a href="https://www.thiyagidigital.com/portfolio">Portfolio</a></li>
                                <li><a href="https://www.thiyagidigital.com/testimonial">Testimonial</a></li>
                                <li><a href="https://www.thiyagidigital.com/sitemap">Sitemap</a></li>
								<li><a href="/#">Blog</a></li>
                                <li><a href="https://www.thiyagidigital.com/contact">Contact Us</a></li>

							</ul>
						</nav>
						<div class="bi-mobile-header-social text-center">
						    <a href="https://www.facebook.com/profile.php?id=61560465773612" target="_blank"> <i class="fab fa-facebook">Facebook</i></a>
							<a href="https://www.instagram.com/thiyagidigital/" target="_blank" target="_blank"> <i class="fab fa-instagram">Instagram</i></a>
							<a href="https://x.com/thiyagidigital" target="_blank"><i class="fab fa-twitter"></i> Twitter  </a>
							<a href="https://in.pinterest.com/thiyagidigital/" target="_blank"><i class="fab fa-pinterest"></i>  Pintrest  </a>
							<!--<a href="#"><i class="fab fa-quora" target="_blank"></i> quora </a>-->
							<!--<a href="#"> <i class="fab fa-linkedin-in" target="_blank">Linkedin</i></a>-->
							<!--<a href="#"> <i class="fab fa-youtube" target="_blank">Youtupe</i></a>-->
						</div>
					</div>
				</div>
				<!-- /Mobile-Menu -->
			</div>
		</div>
	</header>
	<!-- Sidebar sidebar Item -->
	<div class="xs-sidebar-group info-group">
		<div class="xs-overlay xs-bg-black">
			<div class="row loader-area">
				<div class="col-3 preloader-wrap">
					<div class="loader-bg"></div>
				</div>
				<div class="col-3 preloader-wrap">
					<div class="loader-bg"></div>
				</div>
				<div class="col-3 preloader-wrap">
					<div class="loader-bg"></div>
				</div>
				<div class="col-3 preloader-wrap">
					<div class="loader-bg"></div>
				</div>
			</div>
		</div>
		<div class="xs-sidebar-widget"  data-background="/assets/img/bg/texture.png">
			<div class="sidebar-widget-container">
                <div class="widget-heading">
					<a href="#" class="close-side-widget text-uppercase">
						<i class="fal fa-times"></i> Close
					</a>
				</div>
				
				<div class="sidebar-textwidget">

					<!-- Sidebar Info Content -->
					<div class="sidebar-info-contents headline pera-content">
						<div class="content-inner">
							<div class="sidebar-logo">
								<a href="/#"><img src="/assets/img/logo/logo2.png" alt=""></a>
							</div>
							<div class="sidebar-menu ul-li-block">
								<ul>
									<li class="dropdown">
										<a href="#"><i class="fa fa-wrench"></i> Services</a>
									<ul class="dropdown-menu clearfix">
									    <li><a href="https://www.thiyagidigital.com/seo-services">Search Engine Optimization</a></li>
                                        <li><a href="https://www.thiyagidigital.com/smm-service">Social Media Marketing</a></li>
                                        <li><a href="https://www.thiyagidigital.com/sem-services">Search Engine Marketing</a></li>
                                        <li><a href="https://www.thiyagidigital.com/web-development-service">Web Development</a></li>
                                        <li><a href="https://www.thiyagidigital.com/content-writing-service">Content Writing</a></li>
										<li><a href="https://www.thiyagidigital.com/email-marketing-service">Email Marketing</a></li>
									</ul>
								</li>
								<li><a href="https://www.thiyagidigital.com/portfolio"><i class="fal fa-briefcase"></i> Portfolio </a></li>
								<li><a href="https://www.thiyagidigital.com/about"><i class="fal fa-home"></i> About Us </a></li>
									<li><a href="https://www.thiyagidigital.com/testimonial"><i class="fal fa-comments-alt"></i> Testimonial </a></li>
									<li><a href="https://www.thiyagidigital.com/sitemap"><i class="fal fa-sitemap"></i> Sitemap </a></li>
									<!-- <li><a href="team"><i class="fal fa-users"></i> Our Team </a></li> -->
									<!-- <li><a href="portfolio.php"><i class="fal fa-briefcase"></i> Portfolio </a></li> -->
									<!-- <li><a href="#"><i class="fal fa-blog"></i> Blog </a></li> -->
									<li><a href="https://www.thiyagidigital.com/contact"><i class="fal fa-envelope"></i> Contact Us</a></li>
								</ul>
							</div>
						
							<div class="sidebar-social ul-li-block">
								<span>Social:</span>
								<ul>
									<li><a href="https://www.facebook.com/profile.php?id=61560465773612"><i class="fab fa-facebook-f" target="_blank"></i> Facebook</a></li>
									<li><a href="https://www.instagram.com/thiyagidigital/"><i class="fab fa-instagram" target="_blank"></i> Instagram</a></li>
									<li><a href="https://x.com/thiyagidigital"><i class="fab fa-twitter" target="_blank"></i> Twitter</a></li>
                                    <!--<li><a href="#"><i class="fab fa-linkedin-in" target="_blank"></i> Linkedin</a></li>-->
                                    <!--<li> <a href="#"> <i class="fab fa-youtube" target="_blank"></i>Youtupe</a></li>-->
									<!--<li><a href="#"><i class="fab fa-quora" target="_blank"></i> quora </a></li>-->
                					<li><a href="https://in.pinterest.com/thiyagidigital/" target="_blank"><i class="fab fa-pinterest"></i>  Pintrest  </a></li>

								</ul>
							</div>
                           
							<div class="sidebar-copyright text-center">
								© Copyright 2025. Thiyagidigital All Rights Reserved. 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	
	

<!-- End of header section
	============================================= -->   