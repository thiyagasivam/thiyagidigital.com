<?php
// City-specific SMS Marketing page
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
    header("Location: sms-marketing-service.php");
    exit();
}

// State mapping for cities
$cityStateMapping = [
    'chennai' => 'Tamil Nadu', 'mumbai' => 'Maharashtra', 'delhi' => 'Delhi', 'bangalore' => 'Karnataka',
    'hyderabad' => 'Telangana', 'kolkata' => 'West Bengal', 'pune' => 'Maharashtra', 'ahmedabad' => 'Gujarat',
    // Add more mappings as needed - abbreviated for space
];

$state = isset($cityStateMapping[$city_lower]) ? $cityStateMapping[$city_lower] : '';

$page_title = "SMS Marketing Services in $city | ThiyagiDigital";
$page_description = "Professional SMS marketing services in $city. Bulk SMS campaigns, text message marketing, and automated SMS solutions for $city businesses.";
$page_keywords = "SMS marketing $city, bulk SMS services $city, text message marketing $city, SMS campaigns $city";

include 'header.php';
?>

<!-- Start of breadcrumb section
	============================================= -->
	<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="assets/img/bg/bread-bg.jpg">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="bi-breadcrumbs-content headline ul-li text-center">
				<h1 style="color: white"><b>Best SMS Marketing Services in <?php echo $city; ?></b></h1><br>
				<ul>
					<li><a href="/#">Home</a></li>
					<li>SMS Marketing Services</li>
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
								<img src="assets/img/service/serd1.jpg" alt="SMS Marketing Services in <?php echo $city; ?>">
							</div>
							<div class="bi-service-details-text headline pera-content">
								<h2>SMS Marketing Services in <?php echo $city; ?></h2>

								<p>Connect directly with your <?php echo $city; ?> customers through our powerful SMS Marketing services at ThiyagiDigital. We specialize in creating targeted text messaging campaigns for <?php echo $city; ?> businesses that deliver instant communication, drive immediate action, and build lasting customer relationships with exceptional open rates.</p>

								<p>Our SMS marketing experts understand the unique communication preferences of <?php echo $city; ?> consumers. With text messages boasting a 98% open rate and 90% being read within 3 minutes, SMS marketing provides unparalleled reach to your <?php echo $city; ?> audience. From promotional campaigns and flash sales to appointment reminders and customer service updates, we create comprehensive SMS strategies tailored for the <?php echo $city; ?> market.</p>

								<p>What sets our SMS Marketing services apart in <?php echo $city; ?> is our focus on compliance, personalization, and automation. We ensure all campaigns adhere to Indian SMS marketing regulations while delivering personalized messages that resonate with your <?php echo $city; ?> audience. Our advanced automation features allow for triggered campaigns, drip sequences, and behavioral-based messaging specifically designed for <?php echo $city; ?> businesses.</p>

                                <h4>"Instant Communication with Your <?php echo $city; ?> Customers"</h4>

                                <p>With features like bulk SMS broadcasting, automated drip campaigns, two-way messaging, and detailed analytics, our SMS Marketing services in <?php echo $city; ?> go beyond simple text blasts. We create integrated campaigns that work seamlessly with your email marketing, social media, and overall digital marketing strategy to maximize customer engagement in the <?php echo $city; ?> market.</p>

                                <p>Partner with us to harness the power of SMS marketing for your <?php echo $city; ?> business growth. From campaign strategy to execution and optimization, we are committed to delivering SMS Marketing services that drive immediate action, increase customer loyalty, and boost your bottom line in <?php echo $city; ?>. Let's create text campaigns that your <?php echo $city; ?> customers actually want to receive.</p>

								<h4>Frequently Asked Questions about SMS Marketing in <?php echo $city; ?></h4>
								<div class="bi-faq-content-area">
									<div class="accordion" id="accordionExample_31">
										<div class="accordion-item wow fadeInUp"  data-wow-delay="200ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading10">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
													<span>Why choose SMS marketing for <?php echo $city; ?> businesses?</span>
												</button>
											</h2>
											<div id="collapse10" class="accordion-collapse collapse show" aria-labelledby="heading10" data-bs-parent="#accordionExample_31">
												<div class="accordion-body ">
													<div class="bi-faq-text">SMS marketing in <?php echo $city; ?> offers 98% open rates, instant delivery, high mobile penetration, cost-effectiveness, and direct customer communication, making it perfect for reaching <?php echo $city; ?> consumers immediately.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="300ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading12">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
													<span>How do you ensure SMS compliance in <?php echo $city; ?>?</span>
												</button>
											</h2>
											<div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample_31">
												<div class="accordion-body ">
													<div class="bi-faq-text">We strictly follow Indian SMS marketing regulations, implement proper DND compliance, provide clear opt-out options, respect sending time restrictions, and maintain compliance with TRAI guidelines for <?php echo $city; ?> businesses.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="400ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading13">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
													<span>Can you target specific areas within <?php echo $city; ?>?</span>
												</button>
											</h2>
											<div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#accordionExample_31">
												<div class="accordion-body ">
													<div class="bi-faq-text">Yes, we can segment your <?php echo $city; ?> audience by locality, demographics, purchase behavior, and other criteria to deliver highly targeted SMS campaigns to specific areas and customer groups in <?php echo $city; ?>.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="500ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading14">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
													<span>What SMS marketing analytics do you provide for <?php echo $city; ?> campaigns?</span>
												</button>
											</h2>
											<div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading14" data-bs-parent="#accordionExample_31">
												<div class="accordion-body ">
													<div class="bi-faq-text">We provide comprehensive <?php echo $city; ?>-specific reports including delivery rates, open rates, click-through rates, conversion tracking, ROI analysis, and local market insights to optimize your SMS campaigns for maximum effectiveness in <?php echo $city; ?>.
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