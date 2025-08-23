<?php
// Dynamic HTML Sitemap Page
// Automatically discovers and displays all website pages

// Page SEO settings
$page_title = 'HTML Sitemap - All Pages | ThiyagiDigital';
$page_description = 'Complete HTML sitemap listing all pages on ThiyagiDigital website including services, city pages, and information pages.';
$page_keywords = 'sitemap, all pages, website structure, navigation, ThiyagiDigital';
$page_robots = 'index, follow';
$canonical_url = 'https://www.thiyagidigital.com/sitemap';

// Include header
include 'header.php';

// Base configuration
$baseUrl = 'https://www.thiyagidigital.com/';

// Function to extract ALL city slugs from seo-city.php
function extractCitySlugs($filePath) {
    $citySlugs = [];
    
    if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . $filePath)) {
        // Return fallback cities if file not found
        return [
            ['slug' => 'chennai', 'name' => 'Chennai'],
            ['slug' => 'madurai', 'name' => 'Madurai'],
            ['slug' => 'coimbatore', 'name' => 'Coimbatore']
        ];
    }
    
    $content = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . $filePath);
    
    // Match all city array keys: 'city-name' => ['name' => ...
    preg_match_all("/'([^']+)'\s*=>\s*\['name'\s*=>\s*'([^']+)'/", $content, $matches);
    
    if (!empty($matches[1]) && !empty($matches[2])) {
        for ($i = 0; $i < count($matches[1]); $i++) {
            $citySlugs[] = [
                'slug' => $matches[1][$i],
                'name' => $matches[2][$i]
            ];
        }
    }
    
    return $citySlugs;
}

// Get all cities
$cities = extractCitySlugs('seo-city.php');

// Define main pages
$mainPages = [
    ['url' => '', 'title' => 'Home', 'description' => 'Welcome to ThiyagiDigital - Leading digital marketing company'],
    ['url' => 'about', 'title' => 'About Us', 'description' => 'Learn about our company and team'],
    ['url' => 'portfolio', 'title' => 'Portfolio', 'description' => 'View our work and client projects'],
    ['url' => 'testimonial', 'title' => 'Testimonials', 'description' => 'What our clients say about us'],
    ['url' => 'contact', 'title' => 'Contact Us', 'description' => 'Get in touch with our team']
];

// Define service pages
$servicePages = [
    ['url' => 'seo-services', 'title' => 'SEO Services', 'description' => 'Search Engine Optimization services'],
    ['url' => 'smm-service', 'title' => 'Social Media Marketing', 'description' => 'SMM services and strategies'],
    ['url' => 'sem-services', 'title' => 'Search Engine Marketing', 'description' => 'SEM and PPC advertising services'],
    ['url' => 'web-development-service', 'title' => 'Web Development', 'description' => 'Custom website development services'],
    ['url' => 'content-writing-service', 'title' => 'Content Writing', 'description' => 'Professional content writing services'],
    ['url' => 'email-marketing-service', 'title' => 'Email Marketing', 'description' => 'Email marketing campaigns and automation']
];

// Define policy pages
$policyPages = [
    ['url' => 'privacy-policy', 'title' => 'Privacy Policy', 'description' => 'Our privacy policy and data protection'],
    ['url' => 'terms-and-conditions', 'title' => 'Terms and Conditions', 'description' => 'Website terms and conditions'],
    ['url' => 'return-refund-policy', 'title' => 'Return & Refund Policy', 'description' => 'Return and refund policy'],
    ['url' => 'shipping-and-delivery', 'title' => 'Shipping and Delivery', 'description' => 'Shipping and delivery information']
];

// Service slugs for city pages
$serviceTypes = [
    ['slug' => 'seo-services', 'name' => 'SEO Services'],
    ['slug' => 'smm-service', 'name' => 'Social Media Marketing'],
    ['slug' => 'sem-services', 'name' => 'Search Engine Marketing'],
    ['slug' => 'web-development-service', 'name' => 'Web Development'],
    ['slug' => 'content-writing-service', 'name' => 'Content Writing'],
    ['slug' => 'email-marketing-service', 'name' => 'Email Marketing']
];
?>

<div id="smooth-wrapper">
    <div id="smooth-content">
        <main>
            <!-- Breadcrumb Section -->
            <section class="breadcrumb-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 80px 0 60px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content text-center">
                                <h1 class="breadcrumb-title text-white mb-3">HTML Sitemap</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Sitemap</li>
                                    </ol>
                                </nav>
                                <p class="text-white mt-3">Complete list of all pages on our website</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Sitemap Content -->
            <section class="sitemap-section py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sitemap-intro text-center mb-5">
                                <h2>Website Structure</h2>
                                <p class="lead">Navigate through our complete website structure. All pages are organized by category for easy browsing.</p>
                                <div class="stats-row mt-4">
                                    <div class="row text-center">
                                        <div class="col-md-3">
                                            <div class="stat-item">
                                                <h3 class="text-primary"><?php echo count($mainPages); ?></h3>
                                                <p>Main Pages</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="stat-item">
                                                <h3 class="text-primary"><?php echo count($servicePages); ?></h3>
                                                <p>Service Pages</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="stat-item">
                                                <h3 class="text-primary"><?php echo count($cities); ?></h3>
                                                <p>Cities Covered</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="stat-item">
                                                <h3 class="text-primary"><?php echo count($cities) * count($serviceTypes); ?></h3>
                                                <p>City Service Pages</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Main Pages Section -->
                        <div class="col-lg-6 mb-5">
                            <div class="sitemap-category">
                                <h3 class="category-title">
                                    <i class="fas fa-home text-primary me-2"></i>
                                    Main Pages
                                </h3>
                                <div class="category-content">
                                    <ul class="sitemap-list">
                                        <?php foreach ($mainPages as $page): ?>
                                        <li>
                                            <a href="<?php echo htmlspecialchars($baseUrl . $page['url']); ?>" class="sitemap-link">
                                                <strong><?php echo htmlspecialchars($page['title']); ?></strong>
                                                <small class="text-muted d-block"><?php echo htmlspecialchars($page['description']); ?></small>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Service Pages Section -->
                        <div class="col-lg-6 mb-5">
                            <div class="sitemap-category">
                                <h3 class="category-title">
                                    <i class="fas fa-cogs text-primary me-2"></i>
                                    Service Pages
                                </h3>
                                <div class="category-content">
                                    <ul class="sitemap-list">
                                        <?php foreach ($servicePages as $service): ?>
                                        <li>
                                            <a href="<?php echo htmlspecialchars($baseUrl . $service['url']); ?>" class="sitemap-link">
                                                <strong><?php echo htmlspecialchars($service['title']); ?></strong>
                                                <small class="text-muted d-block"><?php echo htmlspecialchars($service['description']); ?></small>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- City Service Pages Section -->
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div class="sitemap-category">
                                <h3 class="category-title">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    City Service Pages
                                    <span class="badge bg-primary ms-2"><?php echo count($cities) * count($serviceTypes); ?> pages</span>
                                </h3>
                                <p class="text-muted">Our services are available across <?php echo count($cities); ?> cities in Tamil Nadu.</p>
                                
                                <!-- Service Type Tabs -->
                                <ul class="nav nav-tabs" id="serviceTab" role="tablist">
                                    <?php foreach ($serviceTypes as $index => $serviceType): ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php echo $index === 0 ? 'active' : ''; ?>" 
                                                id="<?php echo $serviceType['slug']; ?>-tab" 
                                                data-bs-toggle="tab" 
                                                data-bs-target="#<?php echo $serviceType['slug']; ?>" 
                                                type="button" role="tab">
                                            <?php echo htmlspecialchars($serviceType['name']); ?>
                                            <span class="badge bg-secondary ms-1"><?php echo count($cities); ?></span>
                                        </button>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>

                                <div class="tab-content mt-3" id="serviceTabContent">
                                    <?php foreach ($serviceTypes as $index => $serviceType): ?>
                                    <div class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?>" 
                                         id="<?php echo $serviceType['slug']; ?>" role="tabpanel">
                                        <div class="city-grid">
                                            <div class="row">
                                                <?php 
                                                $cityCount = 0;
                                                foreach ($cities as $city): 
                                                    if ($cityCount % 4 === 0 && $cityCount > 0) echo '</div><div class="row">';
                                                ?>
                                                <div class="col-md-3 mb-2">
                                                    <a href="<?php echo htmlspecialchars($baseUrl . $serviceType['slug'] . '/' . $city['slug']); ?>" 
                                                       class="city-link d-block p-2 border rounded hover-effect">
                                                        <i class="fas fa-map-pin text-primary me-2"></i>
                                                        <?php echo htmlspecialchars($serviceType['name'] . ' in ' . $city['name']); ?>
                                                    </a>
                                                </div>
                                                <?php 
                                                $cityCount++;
                                                endforeach; 
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Policy Pages Section -->
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div class="sitemap-category">
                                <h3 class="category-title">
                                    <i class="fas fa-file-alt text-primary me-2"></i>
                                    Legal & Policy Pages
                                </h3>
                                <div class="category-content">
                                    <div class="row">
                                        <?php foreach ($policyPages as $policy): ?>
                                        <div class="col-md-6 mb-3">
                                            <a href="<?php echo htmlspecialchars($baseUrl . $policy['url']); ?>" class="sitemap-link d-block p-3 border rounded">
                                                <strong><?php echo htmlspecialchars($policy['title']); ?></strong>
                                                <small class="text-muted d-block"><?php echo htmlspecialchars($policy['description']); ?></small>
                                            </a>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sitemap-footer text-center p-4 bg-light rounded">
                                <h4>Need Help Finding Something?</h4>
                                <p class="mb-3">Can't find what you're looking for? Our team is here to help!</p>
                                <a href="/contact" class="btn btn-primary me-3">Contact Us</a>
                                <a href="/sitemap.xml" class="btn btn-outline-secondary" target="_blank">XML Sitemap</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<style>
.sitemap-category {
    background: #f8f9fa;
    padding: 2rem;
    border-radius: 10px;
    height: 100%;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.category-title {
    color: #333;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #667eea;
}

.sitemap-list {
    list-style: none;
    padding: 0;
}

.sitemap-list li {
    margin-bottom: 1rem;
    padding: 0.75rem;
    background: white;
    border-radius: 5px;
    border-left: 3px solid #667eea;
    transition: all 0.3s ease;
}

.sitemap-list li:hover {
    transform: translateX(5px);
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.sitemap-link {
    text-decoration: none;
    color: inherit;
}

.sitemap-link:hover {
    color: #667eea;
    text-decoration: none;
}

.city-link {
    text-decoration: none;
    color: #333;
    transition: all 0.3s ease;
    font-size: 0.9rem;
}

.city-link:hover {
    background-color: #667eea;
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.hover-effect:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.stat-item h3 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.nav-tabs .nav-link {
    border: none;
    color: #666;
    font-weight: 500;
}

.nav-tabs .nav-link.active {
    background-color: #667eea;
    color: white;
    border-radius: 5px 5px 0 0;
}

.tab-content {
    background: white;
    padding: 2rem;
    border-radius: 0 0 10px 10px;
    border: 1px solid #dee2e6;
    border-top: none;
}

.breadcrumb-item a {
    text-decoration: none;
}

.breadcrumb-item a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .sitemap-category {
        margin-bottom: 2rem;
    }
    
    .stat-item h3 {
        font-size: 2rem;
    }
    
    .nav-tabs {
        flex-wrap: wrap;
    }
    
    .nav-tabs .nav-link {
        font-size: 0.875rem;
        padding: 0.5rem 0.75rem;
    }
}
</style>

<script>
// Add some interactive functionality
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth scrolling to anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    // Add loading animation for city links
    document.querySelectorAll('.city-link').forEach(link => {
        link.addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
        });
    });
});
</script>

<?php include 'footer.php'; ?>
