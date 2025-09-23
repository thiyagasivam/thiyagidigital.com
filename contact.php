<?php
$page_title = 'Contact ThiyagiDigital | Get a Free Marketing Plan';
$page_description = 'Contact ThiyagiDigital for SEO, SMM, SEM, content writing, and web development in Chennai. Get a free marketing plan today.';
include 'header.php';
?>
<!-- Start of breadcrumb section
	============================================= -->
	<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="assets/img/bg/bread-bg.jpg">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="bi-breadcrumbs-content headline ul-li text-center">
				<h1 style="color:white">Contact ThiyagiDigital - Best Digital Marketing Agency Chennai</h1><br>
				<ul>
					<li><a href="/#">Home</a></li>
					<li>Contact</li>
				</ul>
			</div>
		</div>
	</section>	
<!-- Start of breadcrumb section
	============================================= -->

<!-- Start of contact info section
	============================================= -->
	<section id="bi-contact-info" class="bi-contact-info-section inner-page-padding">
		<div class="container">
			<div class="bi-contact-info-content">
				<div class="row justify-content-center">
					<div class="col-lg-4 col-md-6">
						<div class="bi-contact-info-item position-relative">
							<span class="info-bg position-absolute" data-background="assets/img/bg/ci-bg1.png"></span>
							<div class="inner-icon d-flex justify-content-center align-items-center">
								<img src="assets/img/icon/ci2.png" alt="">
							</div>
							<div class="inner-text headline pera-content">
								<h3>Email Address</h3>
								<a href="#">info@thiyagidigital.com</a>
								<a href="#">support@thiyagidigital.com</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="bi-contact-info-item position-relative">
							<span class="info-bg position-absolute" data-background="assets/img/bg/ci-bg1.png"></span>
							<div class="inner-icon d-flex justify-content-center align-items-center">
								<img src="assets/img/icon/ci1.png" alt="">
							</div>
							<div class="inner-text headline pera-content">
								<h3>Phone Number</h3>
								<a href="#">+91 9363252875</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="bi-contact-info-item position-relative">
							<span class="info-bg position-absolute" data-background="assets/img/bg/ci-bg1.png"></span>
							<div class="inner-icon d-flex justify-content-center align-items-center">
								<img src="assets/img/icon/ci3.png" alt="">
							</div>
							<div class="inner-text headline pera-content">
								<h3>Location / Address</h3>
								<a href="#">3/651,Annai Avenue,</a>
								<a href="#">Thoraipakkam, Chennai, Tamil Nadu 600097.</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
<!-- End of contact info section
	============================================= -->

<!-- Start of contact Form section
	============================================= -->
	<section id="bi-contact-form" class="bi-contact-form-section">
		<div class="bi-contact-map">
			<!-- <div class="bi-contact-map-content d-flex flex-wrap">
				<div class="google-map">
					<iframe
					width="850"
					height="635"
					frameborder="0"
					style="border:0"
					src="https://www.google.com/maps/place/KUDIL/@12.9098838,80.1715965,16z/data=!4m20!1m13!4m12!1m4!2m2!1d80.176346!2d12.9078129!4e1!1m6!1m2!1s0x3a525ea4fdd8ab01:0x4bc2181abafa288d!2sKUDIL,+Vignarajapuram+Main+Road,+Gandhi+Nagar,+Vengaivasal,+Medavakkam,+Chennai,+Tamil+Nadu!2m2!1d80.177897!2d12.910924!3m5!1s0x3a525ea4fdd8ab01:0x4bc2181abafa288d!8m2!3d12.9109282!4d80.1778975!16s%2Fg%2F11c3k93m5n?entry=ttu">
				</iframe>
			</div> -->
			<div class="bi-team-details-contact-info headline pera-content">
				<div class="bi-team-details-contact-title">
					<div class="bi-section-title-1 headline pera-content">
						<div class="bi-subtitle text-uppercase wow fadeInRight"  data-wow-delay="200ms" data-wow-duration="1000ms">
							Welcome Thiyagi Digital
						</div>
						<h2 class="headline-title">
							Keep In Touch
						</h2>
					</div>
					<p>Let’s talk about your business. Fill the form, and we will reach out to you.</p>
					<div class="bi-team-details-contact-form">
						<form method="post" action="mailer.php" id="contactForm">
							<div class="row">
								<div class="col-md-6">
									<input type="text" name="name" placeholder="Name*" required>
								</div>
								<div class="col-md-6">
									<input type="tel" name="phone" placeholder="Phone No.*" required>
								</div>
								<div class="col-md-6">
									<input type="email" name="email" placeholder="Email*" required>
								</div>
								<div class="col-md-6">
								<select id="service" name="service" placeholder="Choose A Service" required>
                                <option value="">Choose A Service*</option>
								<option value="SEO Services">SEO Services</option>
								<option value="Social Media Marketing">Social Media Marketing</option>
								<option value="Search Engine Marketing">Search Engine Marketing</option>
								<option value="Web Development">Web Development</option>
								<option value="Content Writing">Content Writing</option>
								<option value="Email Marketing">Email Marketing</option>
								<option value="WordPress Development">WordPress Development</option>
								<option value="eCommerce Development">eCommerce Development</option>
								<option value="Logo Design">Logo Design</option>
								<option value="Graphic Design">Graphic Design</option>
								<option value="Web Hosting">Web Hosting</option>
								<option value="Other">Other</option>
								</select>
                               </div>
							   <div class="col-md-12">
								<textarea name="message" rows="4" placeholder="Your Message (Optional)"></textarea>
							   </div>
								<div class="col-md-12">
									<div class="bi-submit-btn">
										<button type="submit" id="submitBtn">Send Message</button>
									</div>
								</div>
							</div>
						</form>
						
						<script>
						document.getElementById('contactForm').addEventListener('submit', function(e) {
							const submitBtn = document.getElementById('submitBtn');
							const name = document.querySelector('input[name="name"]').value.trim();
							const email = document.querySelector('input[name="email"]').value.trim();
							const phone = document.querySelector('input[name="phone"]').value.trim();
							const service = document.querySelector('select[name="service"]').value;
							
							// Basic validation
							if (!name || !email || !phone || !service) {
								alert('Please fill in all required fields (marked with *)');
								e.preventDefault();
								return;
							}
							
							// Email validation
							const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
							if (!emailRegex.test(email)) {
								alert('Please enter a valid email address');
								e.preventDefault();
								return;
							}
							
							// Phone validation (basic)
							const phoneRegex = /^[\+]?[\d\s\-\(\)]{10,}$/;
							if (!phoneRegex.test(phone)) {
								alert('Please enter a valid phone number');
								e.preventDefault();
								return;
							}
							
							// Disable submit button to prevent double submission
							submitBtn.disabled = true;
							submitBtn.innerHTML = 'Sending...';
							
							// Form will submit normally to mailer.php
							// mailer.php will handle the redirect to thankyou.php
						});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>		
<!-- End of  contact Form section
	============================================= -->	
<br>


<?php include 'footer.php';?>
