<?php
/**
 * Test Sitemap Generation - Verify International Cities are Extracted
 */

echo "=== SITEMAP GENERATION TEST ===\n\n";

// Test 1: Extract cities from seo-city.php
echo "1. Extracting cities from seo-city.php...\n";
$content = file_get_contents(__DIR__ . '/seo-city.php');

preg_match_all("/'([^']+)'\s*=>\s*\['name'/", $content, $matches);

if (!empty($matches[1])) {
    $cities = $matches[1];
    $totalCities = count($cities);
    echo "   ✓ Found $totalCities cities\n\n";
    
    // Test 2: Check for key international cities
    echo "2. Verifying international cities:\n";
    $internationalCities = [
        'seoul' => 'South Korea',
        'beijing' => 'China',
        'tokyo' => 'Japan',
        'bangkok' => 'Thailand',
        'london' => 'United Kingdom',
        'paris' => 'France',
        'dubai' => 'UAE',
        'new-york' => 'USA',
        'toronto' => 'Canada',
        'sydney' => 'Australia'
    ];
    
    $found = 0;
    foreach ($internationalCities as $city => $country) {
        if (in_array($city, $cities)) {
            echo "   ✓ $city ($country)\n";
            $found++;
        } else {
            echo "   ✗ $city ($country) - MISSING\n";
        }
    }
    echo "\n   Result: $found/" . count($internationalCities) . " international cities found\n\n";
    
    // Test 3: Sample sitemap URL generation
    echo "3. Sample Sitemap URLs (that will be generated):\n";
    $services = ['seo-services', 'smm-service', 'web-hosting-service', 'ecommerce-development-service'];
    $sampleCities = array_slice($cities, 0, 5);
    
    foreach ($services as $service) {
        foreach ($sampleCities as $city) {
            echo "   - https://www.thiyagidigital.com/$service/$city\n";
        }
    }
    echo "\n";
    
    // Test 4: Verify .htaccess routing
    echo "4. Checking .htaccess for SHORT PATH redirects...\n";
    $htaccessContent = file_get_contents(__DIR__ . '/.htaccess');
    if (strpos($htaccessContent, 'SHORT PATH REDIRECTS') !== false) {
        echo "   ✓ SHORT PATH REDIRECTS section found\n";
        
        $rewriteRules = ['seo/', 'smm/', 'web-hosting/', 'ecommerce-development/'];
        foreach ($rewriteRules as $rule) {
            if (strpos($htaccessContent, 'RewriteRule ^' . $rule) !== false) {
                echo "   ✓ Rewrite rule found for $rule\n";
            }
        }
    }
    echo "\n";
    
    // Test 5: Verify all 31 city files have international cities
    echo "5. Checking all 31 city template files:\n";
    $cityFiles = glob(__DIR__ . '/*-city.php');
    $cityCount = count($cityFiles);
    $filesWithInternational = 0;
    
    foreach ($cityFiles as $file) {
        $filename = basename($file);
        $filecontent = file_get_contents($file);
        
        if (strpos($filecontent, "'london'") !== false || strpos($filecontent, "'dubai'") !== false) {
            $filesWithInternational++;
        }
    }
    
    echo "   ✓ Total city files: $cityCount\n";
    echo "   ✓ Files with international cities: $filesWithInternational\n\n";
    
    echo "=== TEST COMPLETE ===\n";
    echo "Status: " . ($filesWithInternational >= 30 ? "✓ READY FOR SITEMAP GENERATION" : "✗ INCOMPLETE") . "\n";
    
} else {
    echo "   ✗ No cities found in seo-city.php!\n";
}
?>
