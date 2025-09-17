<?php
// City-specific Basic Website Designing page
$city = isset($_GET['city']) ? ucwords(str_replace('-', ' ', $_GET['city'])) : 'Chennai';
$city_lower = strtolower(str_replace(' ', '-', $city));

// Supported cities array (comprehensive list)
$supportedCities = [
    'chennai', 'mumbai', 'delhi', 'bangalore', 'hyderabad', 'kolkata', 'pune', 'ahmedabad', 'surat', 'jaipur',
    'lucknow', 'kanpur', 'nagpur', 'indore', 'thane', 'bhopal', 'visakhapatnam', 'pimpri-chinchwad', 'patna', 'vadodara',
    'ghaziabad', 'ludhiana', 'agra', 'nashik', 'faridabad', 'meerut', 'rajkot', 'kalyan-dombivli', 'vasai-virar', 'varanasi',
    'srinagar', 'aurangabad', 'dhanbad', 'amritsar', 'navi-mumbai', 'allahabad', 'howrah', 'ranchi', 'gwalior', 'jabalpur',
    'coimbatore', 'vijayawada', 'jodhpur', 'madurai', 'raipur', 'kota', 'guntur', 'jamshedpur', 'loni', 'siliguri',
    'aligarh', 'ghaziabad', 'solapur', 'ranchi', 'salem', 'mira-bhayandar', 'thiruvananthapuram', 'bhiwandi', 'saharanpur', 'guntur',
    'amravati', 'bikaner', 'noida', 'jalgaon', 'nelson-mandela-bay', 'nellore', 'kurnool', 'ujjain', 'tiruchirappalli', 'malegaon',
    'gaya', 'jamnagar', 'ujjain', 'sangli', 'nanded', 'mango', 'tumkur', 'bilaspur', 'mathura', 'moradabad', 'kamarhati',
    'durgapur', 'bareilly', 'tiruppur', 'sahiwal', 'muzaffarpur', 'ahmednagar', 'kollam', 'rajahmundry', 'kukatpally',
    'dehradun', 'bhilai', 'cuttack', 'bellary', 'sambalpur', 'jhansi', 'erode', 'belgaum', 'ambattur', 'tirunelveli',
    'mangalore', 'gulbarga', 'thrissur', 'karnal', 'akola', 'latur', 'dhule', 'korba', 'bhavnagar', 'deva-sharif',
    'raichur', 'patiala', 'bijapur', 'rampur', 'shivamogga', 'chandrapur', 'junagadh', 'thrissur', 'alwar', 'bardhaman',
    'kulti', 'nizamabad', 'parbhani', 'tumkur', 'khammam', 'ozhukarai', 'bihar-sharif', 'panipat', 'darbhanga',
    'bally', 'aizawl', 'dewas', 'ichalkaranji', 'tirupati', 'karnal', 'bathinda', 'jalna', 'eluru', 'kirari-suleman-nagar',
    'barabanki', 'purnia', 'satna', 'mau', 'sonipat', 'farrukhabad', 'sagar', 'rourkela', 'durg', 'imphal',
    'ratlam', 'hapur', 'arrah', 'anantapur', 'karimnagar', 'etawah', 'ambernath', 'north-dumdum', 'bharatpur', 'begusarai',
    'new-delhi', 'gandhidham', 'baranagar', 'tiruvottiyur', 'puducherry', 'sikar', 'thoothukudi', 'rewa', 'mirzapur', 'raichur',
    'pali', 'ramagundam', 'haridwar', 'vijayanagaram', 'katihar', 'nagarcoil', 'sri-ganganagar', 'karawal-nagar', 'mango',
    'thanjavur', 'bulandshahr', 'uluberia', 'murwara', 'sambhal', 'singrauli', 'nadiad', 'secunderabad', 'naihati', 'yamunanagar',
    'bidhannagar', 'pallavaram', 'bidar', 'munger', 'panchkula', 'burhanpur', 'raurkela', 'kharagpur', 'dindigul', 'gandhinagar',
    'hospet', 'nangloi-jat', 'malda', 'ongole', 'deoghar', 'chapra', 'haldia', 'khandwa', 'nandyal', 'chittoor',
    'morena', 'amroha', 'anand', 'bhind', 'bhalswa-jahangirpuri', 'madhyamgram', 'bhiwani', 'navi-mumbai', 'baharampur', 'ambala',
    'morbi', 'fatehpur', 'rae-bareli', 'khora-ghaziabad', 'ayodhya', 'hindupur', 'sasaram', 'hajipur', 'nokha', 'itarsi',
    'delhi-cantonment', 'karaikudi', 'dibrugarh', 'kishanganj', 'stambha', 'raiganj', 'srikakulam', 'veraval', 'kapra',
    'akbarpur', 'machilipatnam', 'udupi', 'ballia', 'puri', 'shahjahanpur', 'seoni', 'bellampalli', 'chinsurah', 'alappuzha',
    'kottayam', 'machilipatnam', 'karaikudi', 'kendujhar', 'shivpuri', 'jaunpur', 'bikram', 'kishanganj', 'raigarh',
    'baharampur', 'unnao', 'macherla', 'robertsganj', 'vrindavan', 'siwan', 'bhagalpur', 'suryapet', 'khora', 'thanesar',
    'borivali', 'meerut', 'adilabad', 'asansol', 'pudukkottai', 'jhunjhunu', 'sirohi', 'parbhani', 'hassan', 'madhya-pradesh',
    'rajnandgaon', 'chittorgarh', 'palwal', 'sirsa', 'karimganj', 'washim', 'firozpur', 'mughalsarai', 'bankura', 'patan',
    'khanna', 'mandsaur', 'rudrapur', 'malappuram', 'revelganj', 'bagaha', 'lakhimpur', 'shivamogga', 'palakkad', 'kolar',
    'balangir', 'buxar', 'jehanabad', 'aurangabad', 'baddi', 'medak', 'karwar', 'kozhikode', 'kottapalli', 'malout',
    'baramula', 'sheopur', 'gadag', 'sagar', 'umarkhed', 'muvattupuzha', 'neyveli', 'budaun', 'sitapur', 'hardoi',
    'amethi', 'jammu', 'jhalawar', 'sujangarh', 'pratapgarh', 'rajgarh', 'guna', 'pondicherry', 'cuddalore', 'kumbakonam',
    'lalitpur', 'chandausi', 'ballabgarh', 'palani', 'chilakaluripet', 'mahbubnagar', 'medininagar', 'chirkunda', 'shillong',
    'jorhat', 'tezpur', 'dharapuram', 'chhindwara', 'shahdara', 'purnea', 'pipili', 'faizabad', 'dhamtari', 'anantnag',
    'leh', 'kathua', 'udhampur', 'samba', 'kishtwar', 'doda', 'ramban', 'reasi', 'poonch', 'rajouri',
    'bandipora', 'baramulla', 'kupwara', 'ganderbal', 'kulgam', 'shopian', 'budgam', 'pulwama', 'kohima', 'dimapur',
    'mokokchung', 'tuensang', 'wokha', 'zunheboto', 'phek', 'kiphire', 'longleng', 'mon', 'peren', 'noklak'
];

// Check if city is supported
if (!in_array($city_lower, $supportedCities)) {
    header("Location: basic-website-designing-service.php");
    exit();
}

$page_title = "Basic Website Designing Services in $city | ThiyagiDigital";
$page_description = "Professional basic website designing services in $city. Affordable, responsive, and functional website design solutions for $city businesses.";
$page_keywords = "basic website design $city, affordable website design $city, simple website design $city, startup website $city";

include 'header.php';
?>

<!-- Start of breadcrumb section
	============================================= -->
	<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="assets/img/bg/bread-bg.jpg">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="bi-breadcrumbs-content headline ul-li text-center">
				<h1 style="color: white"><b>Best Basic Website Designing Services in <?php echo $city; ?></b></h1><br>
				<ul>
					<li><a href="/#">Home</a></li>
					<li>Basic Website Designing Services</li>
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
								<img src="assets/img/service/serd1.jpg" alt="Basic Website Designing Services in <?php echo $city; ?>">
							</div>
							<div class="bi-service-details-text headline pera-content">
								<h2>Basic Website Designing Services in <?php echo $city; ?></h2>

								<p>Establish your online presence in <?php echo $city; ?> with our affordable and professional Basic Website Designing services at ThiyagiDigital. We specialize in creating simple, elegant, and functional websites for <?php echo $city; ?> businesses that effectively represent your brand online without overwhelming complexity or excessive costs, perfect for startups and small businesses in <?php echo $city; ?>.</p>

								<p>Our basic website design approach focuses on essential elements that matter most to <?php echo $city; ?> businesses. From clean layouts and intuitive navigation to mobile responsiveness and fast loading speeds, we create websites that deliver excellent user experience while maintaining simplicity and functionality that serves your core business objectives in the <?php echo $city; ?> market.</p>

								<p>What sets our Basic Website Designing services apart in <?php echo $city; ?> is our commitment to quality despite affordability. Every website we create includes responsive design, SEO-friendly structure optimized for <?php echo $city; ?> searches, contact forms, social media integration, and basic analytics setup. We ensure your website looks professional, functions smoothly, and represents your brand effectively across all devices for <?php echo $city; ?> customers.</p>

                                <h4>"Simple, Professional, Effective Online Presence for <?php echo $city; ?> Businesses"</h4>

                                <p>With features like mobile optimization, fast loading speeds, contact integration, gallery sections, and social media connectivity, our Basic Website Designing services in <?php echo $city; ?> provide everything needed for a successful online presence. We focus on clean code, user-friendly interfaces, and conversion-optimized layouts that help turn <?php echo $city; ?> visitors into customers.</p>

                                <p>Partner with us to launch your professional <?php echo $city; ?> website without breaking the budget. From concept to completion, we are committed to delivering Basic Website Designing services that establish credibility, attract <?php echo $city; ?> customers, and grow your business online. Let's create a website that perfectly represents your brand and achieves your business goals efficiently and affordably in the <?php echo $city; ?> market.</p>

								<h4>Frequently Asked Questions about Basic Website Designing in <?php echo $city; ?></h4>
								<div class="bi-faq-content-area">
									<div class="accordion" id="accordionExample_31">
										<div class="accordion-item wow fadeInUp"  data-wow-delay="200ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading10">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
													<span>What makes basic website design suitable for <?php echo $city; ?> businesses?</span>
												</button>
											</h2>
											<div id="collapse10" class="accordion-collapse collapse show" aria-labelledby="heading10" data-bs-parent="#accordionExample_31">
												<div class="accordion-body ">
													<div class="bi-faq-text">Basic websites are perfect for <?php echo $city; ?> startups and small businesses needing professional online presence, cost-effective solutions, quick launch timelines, and essential features without complex functionality.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="300ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading12">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
													<span>Do you optimize basic websites for local <?php echo $city; ?> searches?</span>
												</button>
											</h2>
											<div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample_31">
												<div class="accordion-body ">
													<div class="bi-faq-text">Yes, we include local SEO optimization for <?php echo $city; ?> with location-specific keywords, Google My Business integration, local business schema, and <?php echo $city; ?>-focused content optimization.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="400ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading13">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
													<span>What ongoing support do you provide for <?php echo $city; ?> basic websites?</span>
												</button>
											</h2>
											<div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#accordionExample_31">
												<div class="accordion-body ">
													<div class="bi-faq-text">We provide <?php echo $city; ?> businesses with ongoing technical support, content updates, security maintenance, backup services, and local hosting support to ensure optimal performance.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="500ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading14">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
													<span>Can basic websites compete with larger <?php echo $city; ?> competitors?</span>
												</button>
											</h2>
											<div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading14" data-bs-parent="#accordionExample_31">
												<div class="accordion-body ">
													<div class="bi-faq-text">Yes, well-designed basic websites can effectively compete in <?php echo $city; ?> by focusing on local SEO, fast loading, mobile optimization, clear messaging, and strong local customer engagement strategies.
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
	</section>
<!-- End of Service Details section
	============================================= -->

	<!-- Cities Tabs Section -->
	<?php include 'cities-tabs.php';?>

	<?php include 'testmonial2.php';?>
	<?php include 'client-logo.php';?>
	<?php include 'project-count.php';?>

	<?php include 'certify-partner.php';?>

	<?php include 'footer.php';?>