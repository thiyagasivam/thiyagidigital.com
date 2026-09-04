<?php
// Dynamic Sitemap XML Generator - Part 2
// This file generates the remaining URLs (overflow from sitemap1.xml.php)

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
        error_log('[Dynamic Sitemap 2] City file not found: ' . $filePath);
        return $citySlugs;
    }
    
    $content = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . $filePath);
    
    // Match all city array keys: 'city-name' => ['name' => ...
    preg_match_all("/'([^']+)'\s*=>\s*\['name'/", $content, $matches);
    
    if (!empty($matches[1])) {
        $citySlugs = $matches[1];
        error_log('[Dynamic Sitemap 2] Extracted ' . count($citySlugs) . ' cities from ' . $filePath);
    } else {
        error_log('[Dynamic Sitemap 2] No cities found in ' . $filePath);
    }
    
    return $citySlugs;
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

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

// Calculate which service to start from
// sitemap1.xml.php has approximately:
// 1 (homepage) + ~50 (public pages) + 31 (main services) + ~50k (cities from first services)
// So sitemap2 will have the overflow of city-service combinations

$urlCount = 0;
$sitemap1UrlLimit = 50000;
$startIndex = 0;

// Calculate how many city URLs sitemap1 captured
// Approximate: 1 + 50 + 31 = 82 non-city URLs, leaving ~49918 city slots
$nonCityUrls = 1 + count(glob(__DIR__ . DIRECTORY_SEPARATOR . '*.php', GLOB_NOSORT)) + count($serviceCityPatterns); // Rough estimate
$remainingCapacity = $sitemap1UrlLimit - $nonCityUrls;

// Generate REMAINING city service combinations
$cityIndex = 0;
foreach ($serviceCityPatterns as $pattern => $serviceName) {
    foreach ($citySlugs as $citySlug) {
        $cityIndex++;
        
        // Skip URLs that were included in sitemap1
        if ($cityIndex <= $remainingCapacity) {
            continue;
        }
        
        $urlCount++;
        $loc = $baseUrl . $pattern . '/' . $citySlug;
        
        echo '  <url>' . "\n";
        echo '    <loc>' . htmlspecialchars($loc) . '</loc>' . "\n";
        echo '    <lastmod>' . $today . '</lastmod>' . "\n";
        echo '    <changefreq>daily</changefreq>' . "\n";
        echo '    <priority>1.0</priority>' . "\n";
        echo '  </url>' . "\n";
    }
}

echo '</urlset>' . "\n";

// Log generation for debugging
error_log('[Dynamic Sitemap 2] Generated ' . $urlCount . ' overflow URLs at ' . date('Y-m-d H:i:s'));
?>
