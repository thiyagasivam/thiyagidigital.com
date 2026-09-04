<?php
/**
 * Sitemap XML Generator - Standalone Version
 * This generates the complete sitemap with all cities and saves it
 */

// Base configuration
$baseUrl = 'https://www.thiyagidigital.com/';
$today = date('Y-m-d');
$outputFile = __DIR__ . '/sitemap.xml';

// Function to extract ALL city slugs
function extractCitySlugs($filePath) {
    $citySlugs = [];
    
    if (!file_exists($filePath)) {
        echo "[ERROR] City file not found: $filePath\n";
        return $citySlugs;
    }
    
    $content = file_get_contents($filePath);
    
    // Match all city array keys: 'city-name' => ['name' => ...
    preg_match_all("/'([^']+)'\s*=>\s*\['name'/", $content, $matches);
    
    if (!empty($matches[1])) {
        $citySlugs = array_unique($matches[1]); // Remove duplicates
        echo "[INFO] Extracted " . count($citySlugs) . " unique cities from seo-city.php\n";
    }
    
    return $citySlugs;
}

echo "Starting Sitemap Generation...\n";
echo "================================\n\n";

// Start building sitemap XML
$xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// 1. HOMEPAGE
$xml .= '  <url>' . "\n";
$xml .= '    <loc>' . htmlspecialchars($baseUrl) . '</loc>' . "\n";
$xml .= '    <lastmod>' . $today . '</lastmod>' . "\n";
$xml .= '    <changefreq>daily</changefreq>' . "\n";
$xml .= '    <priority>1.0</priority>' . "\n";
$xml .= '  </url>' . "\n\n";

echo "✓ Homepage added\n";

// 2. MAIN SERVICE PAGES
$mainServices = [
    'services', 'seo-services', 'smm-service', 'sem-services', 'web-development-service',
    'content-writing-service', 'email-marketing-service', 'woocommerce-development-service',
    'shopify-development-service', 'magento-development-service', 'opencart-development-service',
    'wordpress-development-service', 'cms-website-designing-service', 'basic-website-designing-service',
    'responsive-website-designing-service', 'website-redesigning-service', 'website-updates-maintenance-service',
    'web-hosting-service', 'domain-registration-service', 'cloud-hosting-service', 'vps-hosting-service',
    'ecommerce-development-service', 'ecommerce-marketing-service', 'online-store-setup-service',
    'affiliate-marketing-service', 'amazon-marketing-service', 'link-building-service', 'sms-marketing-service',
    'logo-design-service', 'graphic-design-service', 'ui-ux-design-service'
];

$xml .= "  <!-- Main Service Pages -->\n";
foreach ($mainServices as $service) {
    if (file_exists(__DIR__ . '/' . $service . '.php')) {
        $xml .= '  <url>' . "\n";
        $xml .= '    <loc>' . htmlspecialchars($baseUrl . $service) . '</loc>' . "\n";
        $xml .= '    <lastmod>' . $today . '</lastmod>' . "\n";
        $xml .= '    <changefreq>daily</changefreq>' . "\n";
        $xml .= '    <priority>1.0</priority>' . "\n";
        $xml .= '  </url>' . "\n";
    }
}
echo "✓ Added " . count($mainServices) . " main service pages\n";

// 3. EXTRACT ALL CITIES
echo "\nExtracting international cities...\n";
$citySlugs = extractCitySlugs(__DIR__ . '/seo-city.php');

if (empty($citySlugs)) {
    echo "[ERROR] No cities found! Using fallback cities.\n";
    $citySlugs = ['chennai', 'bangalore', 'hyderabad', 'delhi', 'mumbai', 'pune', 'kolkata'];
}

// 3. CITY SERVICE COMBINATIONS
echo "\nGenerating city service combinations...\n";
$serviceCityPatterns = [
    'seo-services', 'smm-service', 'sem-services', 'web-development-service', 'content-writing-service',
    'email-marketing-service', 'woocommerce-development-service', 'shopify-development-service',
    'magento-development-service', 'opencart-development-service', 'wordpress-development-service',
    'cms-website-designing-service', 'basic-website-designing-service', 'responsive-website-designing-service',
    'website-redesigning-service', 'website-updates-maintenance-service', 'web-hosting-service',
    'domain-registration-service', 'cloud-hosting-service', 'vps-hosting-service', 'ecommerce-development-service',
    'ecommerce-marketing-service', 'online-store-setup-service', 'affiliate-marketing-service',
    'amazon-marketing-service', 'link-building-service', 'sms-marketing-service', 'logo-design-service',
    'graphic-design-service', 'ui-ux-design-service'
];

$xml .= "\n  <!-- City Service Combinations -->\n";
$cityServiceCount = 0;

foreach ($serviceCityPatterns as $service) {
    foreach ($citySlugs as $city) {
        $xml .= '  <url>' . "\n";
        $xml .= '    <loc>' . htmlspecialchars($baseUrl . $service . '/' . $city) . '</loc>' . "\n";
        $xml .= '    <lastmod>' . $today . '</lastmod>' . "\n";
        $xml .= '    <changefreq>daily</changefreq>' . "\n";
        $xml .= '    <priority>0.9</priority>' . "\n";
        $xml .= '  </url>' . "\n";
        $cityServiceCount++;
    }
}

echo "✓ Generated " . $cityServiceCount . " city service combinations (" . count($citySlugs) . " cities × " . count($serviceCityPatterns) . " services)\n";

// 4. STATIC PAGES
$staticPages = ['about', 'contact', 'portfolio', 'faq', 'testimonial', 'privacy-policy', 'terms-and-conditions', 'return-refund-policy', 'shipping-and-delivery'];

$xml .= "\n  <!-- Static Pages -->\n";
$staticCount = 0;
foreach ($staticPages as $page) {
    if (file_exists(__DIR__ . '/' . $page . '.php')) {
        $xml .= '  <url>' . "\n";
        $xml .= '    <loc>' . htmlspecialchars($baseUrl . $page) . '</loc>' . "\n";
        $xml .= '    <lastmod>' . $today . '</lastmod>' . "\n";
        $xml .= '    <changefreq>daily</changefreq>' . "\n";
        $xml .= '    <priority>0.8</priority>' . "\n";
        $xml .= '  </url>' . "\n";
        $staticCount++;
    }
}
echo "✓ Added " . $staticCount . " static pages\n";

// Close XML
$xml .= '</urlset>' . "\n";

// Write to file
$bytesWritten = file_put_contents($outputFile, $xml);

if ($bytesWritten !== false) {
    echo "\n✓ Sitemap successfully generated!\n";
    echo "  File: $outputFile\n";
    echo "  Size: " . round($bytesWritten / 1024, 2) . " KB\n";
    
    // Calculate statistics
    $totalUrls = 1 + count($mainServices) + $cityServiceCount + $staticCount;
    echo "  Total URLs: $totalUrls\n";
    
    // Sample output
    echo "\nSample URLs in sitemap:\n";
    preg_match_all("/<loc>(.*?)<\/loc>/", $xml, $matches);
    $sampleUrls = array_slice($matches[1], 0, 10);
    foreach ($sampleUrls as $url) {
        echo "  - " . htmlspecialchars_decode($url) . "\n";
    }
    
    echo "\n✓ Sitemap generation complete!\n";
} else {
    echo "[ERROR] Failed to write sitemap to $outputFile\n";
}
?>
