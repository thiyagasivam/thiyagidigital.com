<?php
// Dynamic Sitemap XML Generator
// This file generates a comprehensive sitemap with all URLs automatically

// Set headers for XML output
header('Content-Type: application/xml; charset=utf-8');
header('X-Robots-Tag: noindex');

// Base configuration
$baseUrl = 'https://www.thiyagidigital.com/';
$today = date('Y-m-d');

// Function to extract ALL city slugs from seo-city.php
function extractCitySlugs($filePath) {
    $citySlugs = [];
    
    if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . $filePath)) {
        error_log('[Dynamic Sitemap] City file not found: ' . $filePath);
        return $citySlugs;
    }
    
    $content = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . $filePath);
    
    // Match all city array keys: 'city-name' => ['name' => ...
    preg_match_all("/'([^']+)'\s*=>\s*\['name'/", $content, $matches);
    
    if (!empty($matches[1])) {
        $citySlugs = $matches[1];
        error_log('[Dynamic Sitemap] Extracted ' . count($citySlugs) . ' cities from ' . $filePath);
    } else {
        error_log('[Dynamic Sitemap] No cities found in ' . $filePath);
        // Fallback to basic cities if parsing fails
        $citySlugs = [
            'chennai', 'madurai', 'coimbatore', 'tiruchirappalli', 'salem', 'tirunelveli', 
            'vellore', 'tiruppur', 'erode', 'thoothukudi', 'dindigul', 'thanjavur', 
            'nagercoil', 'hosur', 'avadi', 'kumbakonam', 'cuddalore', 'karur', 'sivakasi', 'tambaram'
        ];
    }
    
    return $citySlugs;
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// 1. HOMEPAGE
echo '  <url>' . "\n";
echo '    <loc>' . htmlspecialchars($baseUrl) . '</loc>' . "\n";
echo '    <lastmod>' . $today . '</lastmod>' . "\n";
echo '    <changefreq>daily</changefreq>' . "\n";
echo '    <priority>1.0</priority>' . "\n";
echo '  </url>' . "\n\n";

// 2. AUTO-DISCOVER ALL PUBLIC PHP PAGES
echo '  <!-- All Public Pages -->' . "\n";
$filesAbs = glob(__DIR__ . DIRECTORY_SEPARATOR . '*.php');
$files = array_map('basename', $filesAbs);

// Exclude internal/utility files
$excludedFiles = [
    'sitemap-functions.php', 'sitemap-generator.php', 'sitemap.xml.php', '404.php', 'config.php',
    'header.php', 'footer.php', 'mailer.php', 'smailer.php',
    // Partial components
    'callbox.php', 'callservice-sidebar.php', 'client-logo.php', 'mainservice-sidebar.php', 
    'marquee.php', 'project-count.php', 'certify-partner.php', 'sideform.php', 'testmonial2.php', 'new-index.php',
    // City templates (handled as pretty URLs below)
    'seo-city.php', 'smm-city.php', 'sem-city.php', 'web-development-city.php', 
    'content-writing-city.php', 'email-marketing-city.php',
    // New service city templates
    'woocommerce-development-city.php', 'shopify-development-city.php', 'magento-development-city.php', 
    'opencart-development-city.php', 'web-hosting-city.php', 'domain-registration-city.php',
    'cloud-hosting-city.php', 'vps-hosting-city.php', 'ecommerce-development-city.php',
    'online-store-setup-city.php', 'logo-design-city.php', 'graphic-design-city.php'
];

$publicPages = array_diff($files, $excludedFiles);
sort($publicPages);

foreach ($publicPages as $page) {
    $pageName = str_replace('.php', '', $page);
    if ($pageName === 'index' || $pageName === 'thankyou') continue;
    
    $loc = $baseUrl . $pageName; // Clean URLs without .php extension
    $lastmod = $today; // Use current date for all pages
    
    echo '  <url>' . "\n";
    echo '    <loc>' . htmlspecialchars($loc) . '</loc>' . "\n";
    echo '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
    echo '    <changefreq>daily</changefreq>' . "\n";
    echo '    <priority>1.0</priority>' . "\n";
    echo '  </url>' . "\n";
}

// 3. SERVICE PAGES (Main service pages)
echo "\n  <!-- Main Service Pages -->\n";
$mainServices = [
    'services' => 'All Services',
    'seo-services' => 'Search Engine Optimization',
    'smm-service' => 'Social Media Marketing', 
    'sem-services' => 'Search Engine Marketing',
    'web-development-service' => 'Web Development',
    'content-writing-service' => 'Content Writing',
    'email-marketing-service' => 'Email Marketing',
    // Development Services
    'woocommerce-development-service' => 'WooCommerce Development',
    'shopify-development-service' => 'Shopify Development',
    'magento-development-service' => 'Magento Development',
    'opencart-development-service' => 'OpenCart Development',
    'wordpress-development-service' => 'WordPress Development',
    'cms-website-designing-service' => 'CMS Website Designing',
    'basic-website-designing-service' => 'Basic Website Designing',
    'responsive-website-designing-service' => 'Responsive Website Designing',
    'website-redesigning-service' => 'Website Redesigning',
    'website-updates-maintenance-service' => 'Website Updates & Maintenance',
    // Hosting & Domain Services
    'web-hosting-service' => 'Web Hosting',
    'domain-registration-service' => 'Domain Registration',
    'cloud-hosting-service' => 'Cloud Hosting',
    'vps-hosting-service' => 'VPS Hosting',
    // eCommerce Services
    'ecommerce-development-service' => 'eCommerce Development',
    'ecommerce-marketing-service' => 'eCommerce Marketing',
    'online-store-setup-service' => 'Online Store Setup',
    // Marketing Services
    'affiliate-marketing-service' => 'Affiliate Marketing',
    'amazon-marketing-service' => 'Amazon Marketing',
    'link-building-service' => 'Link Building',
    'sms-marketing-service' => 'SMS Marketing',
    // Design Services
    'logo-design-service' => 'Logo Design',
    'graphic-design-service' => 'Graphic Design',
    'ui-ux-design-service' => 'UI/UX Design'
];

foreach ($mainServices as $serviceSlug => $serviceName) {
    if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . $serviceSlug . '.php')) {
        $loc = $baseUrl . $serviceSlug;
        $lastmod = $today; // Use current date for all pages
        
        echo '  <url>' . "\n";
        echo '    <loc>' . htmlspecialchars($loc) . '</loc>' . "\n";
        echo '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
        echo '    <changefreq>daily</changefreq>' . "\n";
        echo '    <priority>1.0</priority>' . "\n";
        echo '  </url>' . "\n";
    }
}

// 4. ALL CITY SERVICE COMBINATIONS
echo "\n  <!-- All City Service Pages -->\n";

// Service URL patterns for city pages
$serviceCityPatterns = [
    'seo-services' => 'SEO Services',
    'smm-service' => 'Social Media Marketing',
    'sem-services' => 'Search Engine Marketing', 
    'web-development-service' => 'Web Development',
    'content-writing-service' => 'Content Writing',
    'email-marketing-service' => 'Email Marketing',
    // Development Services
    'woocommerce-development-service' => 'WooCommerce Development',
    'shopify-development-service' => 'Shopify Development',
    'magento-development-service' => 'Magento Development',
    'opencart-development-service' => 'OpenCart Development',
    'wordpress-development-service' => 'WordPress Development',
    'cms-website-designing-service' => 'CMS Website Designing',
    'basic-website-designing-service' => 'Basic Website Designing',
    'responsive-website-designing-service' => 'Responsive Website Designing',
    'website-redesigning-service' => 'Website Redesigning',
    'website-updates-maintenance-service' => 'Website Updates & Maintenance',
    // Hosting & Domain Services
    'web-hosting-service' => 'Web Hosting',
    'domain-registration-service' => 'Domain Registration',
    'cloud-hosting-service' => 'Cloud Hosting',
    'vps-hosting-service' => 'VPS Hosting',
    // eCommerce Services
    'ecommerce-development-service' => 'eCommerce Development',
    'ecommerce-marketing-service' => 'eCommerce Marketing',
    'online-store-setup-service' => 'Online Store Setup',
    // Marketing Services
    'affiliate-marketing-service' => 'Affiliate Marketing',
    'amazon-marketing-service' => 'Amazon Marketing',
    'link-building-service' => 'Link Building',
    'sms-marketing-service' => 'SMS Marketing',
    // Design Services
    'logo-design-service' => 'Logo Design',
    'graphic-design-service' => 'Graphic Design',
    'ui-ux-design-service' => 'UI/UX Design'
];

// Extract ALL cities from seo-city.php
$citySlugs = extractCitySlugs('seo-city.php');
if (empty($citySlugs)) {
    // Fallback cities if parsing fails
    $citySlugs = [
        'chennai', 'madurai', 'coimbatore', 'tiruchirappalli', 'salem', 'tirunelveli', 
        'vellore', 'tiruppur', 'erode', 'thoothukudi', 'dindigul', 'thanjavur', 
        'nagercoil', 'hosur', 'avadi', 'kumbakonam', 'cuddalore', 'karur', 'sivakasi', 'tambaram'
    ];
}

// Generate all service x city combinations
foreach ($serviceCityPatterns as $pattern => $serviceName) {
    echo "  <!-- " . $serviceName . " in Cities -->\n";
    
    foreach ($citySlugs as $citySlug) {
        $loc = $baseUrl . $pattern . '/' . $citySlug;
        
        echo '  <url>' . "\n";
        echo '    <loc>' . htmlspecialchars($loc) . '</loc>' . "\n";
        echo '    <lastmod>' . $today . '</lastmod>' . "\n";
        echo '    <changefreq>daily</changefreq>' . "\n";
        echo '    <priority>1.0</priority>' . "\n";
        echo '  </url>' . "\n";
    }
    echo "\n";
}

// 5. ADDITIONAL STATIC URLS (if any)
echo "  <!-- Additional Important Pages -->\n";
$additionalUrls = [
    'sitemap.php' => ['priority' => '1.0', 'changefreq' => 'daily'],
    // Add more static URLs here as needed
];

foreach ($additionalUrls as $url => $settings) {
    if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . $url)) {
        $loc = $baseUrl . $url;
        $lastmod = $today; // Use current date for all pages
        
        echo '  <url>' . "\n";
        echo '    <loc>' . htmlspecialchars($loc) . '</loc>' . "\n";
        echo '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
        echo '    <changefreq>daily</changefreq>' . "\n";
        echo '    <priority>1.0</priority>' . "\n";
        echo '  </url>' . "\n";
    }
}

echo '</urlset>' . "\n";

// Log generation for debugging
$totalUrls = count($publicPages) + count($mainServices) + (count($serviceCityPatterns) * count($citySlugs));
error_log('[Dynamic Sitemap] Generated ' . $totalUrls . ' URLs at ' . date('Y-m-d H:i:s'));
?>
