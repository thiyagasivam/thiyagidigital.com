<?php
/**
 * COMPREHENSIVE ERROR ANALYSIS
 * Analyzes all 404 error fixes for potential issues
 */

echo "╔════════════════════════════════════════════════════════════════════╗\n";
echo "║              COMPREHENSIVE ERROR ANALYSIS REPORT                    ║\n";
echo "║              404 Error Fixes - Full Validation                      ║\n";
echo "╚════════════════════════════════════════════════════════════════════╝\n\n";

$errors = [];
$warnings = [];
$successes = [];

// ============================================================================
// SECTION 1: PHP SYNTAX VALIDATION
// ============================================================================
echo "【1】CHECKING PHP SYNTAX IN ALL CITY FILES\n";
echo str_repeat("─", 70) . "\n\n";

$cityFiles = glob(__DIR__ . '/*-city.php');
$phpSyntaxErrors = 0;

foreach ($cityFiles as $file) {
    $filename = basename($file);
    
    // Use PHP CLI to check syntax
    $output = shell_exec("php -l \"$file\" 2>&1");
    
    if (strpos($output, 'No syntax errors') === false) {
        $phpSyntaxErrors++;
        $errors[] = "PHP Syntax Error in $filename:\n  $output";
        echo "  ✗ $filename\n";
        echo "    Error: " . trim($output) . "\n";
    } else {
        $successes[] = "$filename - Syntax OK";
        echo "  ✓ $filename\n";
    }
}

echo "\nResult: " . (count($cityFiles) - $phpSyntaxErrors) . "/" . count($cityFiles) . " files have valid syntax\n\n";

// ============================================================================
// SECTION 2: CITY ARRAY VALIDATION
// ============================================================================
echo "【2】VALIDATING CITY ARRAY STRUCTURE\n";
echo str_repeat("─", 70) . "\n\n";

$cityValidationIssues = 0;

foreach ($cityFiles as $file) {
    $filename = basename($file);
    $content = file_get_contents($file);
    
    // Check 1: Array merge statement exists
    if (strpos($content, 'array_merge($supportedCities, $newCities)') === false) {
        $warnings[] = "$filename: array_merge statement not found (may use different pattern)";
        echo "  ⚠ $filename - array_merge not found\n";
        $cityValidationIssues++;
    }
    
    // Check 2: Closing bracket exists
    if (!preg_match("/\]\s*;\s*\/\/\s*Merge/", $content)) {
        if (strpos($content, "]\n;") === false && strpos($content, "]\r\n;") === false) {
            $warnings[] = "$filename: Array might not be properly closed";
            echo "  ⚠ $filename - Array closure may be incomplete\n";
            $cityValidationIssues++;
        }
    }
    
    // Check 3: City validation logic exists (handle different variable names)
    $hasValidation = (strpos($content, 'array_key_exists($citySlug, $supportedCities)') !== false ||
                      strpos($content, 'array_key_exists($city_lower, $supportedCities)') !== false ||
                      strpos($content, 'array_key_exists($city, $supportedCities)') !== false ||
                      preg_match('/if \(!array_key_exists\(\$[a-zA-Z_]+,\s*\$supportedCities\)/', $content));
    
    if (!$hasValidation) {
        $errors[] = "$filename: Missing array_key_exists validation";
        echo "  ✗ $filename - Missing city validation\n";
    } else {
        echo "  ✓ $filename - Array structure OK\n";
    }
}

echo "\nArray validation issues: $cityValidationIssues warnings\n\n";

// ============================================================================
// SECTION 3: INTERNATIONAL CITIES VERIFICATION
// ============================================================================
echo "【3】VERIFYING INTERNATIONAL CITIES IN ALL FILES\n";
echo str_repeat("─", 70) . "\n\n";

$requiredCities = [
    'seoul' => 'South Korea',
    'beijing' => 'China',
    'tokyo' => 'Japan',
    'london' => 'United Kingdom',
    'paris' => 'France',
    'dubai' => 'UAE',
    'new-york' => 'USA',
    'toronto' => 'Canada',
    'cairo' => 'Egypt',
    'bangkok' => 'Thailand'
];

$filesWithAllCities = 0;

foreach ($cityFiles as $file) {
    $filename = basename($file);
    $content = file_get_contents($file);
    
    $missingCities = [];
    foreach ($requiredCities as $city => $country) {
        if (strpos($content, "'$city'") === false) {
            $missingCities[] = "$city ($country)";
        }
    }
    
    if (empty($missingCities)) {
        echo "  ✓ $filename - All 10 international cities present\n";
        $filesWithAllCities++;
    } else {
        $warnings[] = "$filename: Missing cities - " . implode(', ', $missingCities);
        echo "  ⚠ $filename - Missing: " . implode(', ', $missingCities) . "\n";
    }
}

echo "\nFiles with complete international cities: $filesWithAllCities/" . count($cityFiles) . "\n\n";

// ============================================================================
// SECTION 4: .HTACCESS VALIDATION
// ============================================================================
echo "【4】VALIDATING .HTACCESS CONFIGURATION\n";
echo str_repeat("─", 70) . "\n\n";

$htaccessFile = __DIR__ . '/.htaccess';
if (file_exists($htaccessFile)) {
    $htaccessContent = file_get_contents($htaccessFile);
    echo "  ✓ .htaccess file exists\n";
    
    // Check for required rewrite rules
    $requiredRules = [
        '^seo/([a-z-]+)/?$' => 'SEO short path',
        '^smm/([a-z-]+)/?$' => 'SMM short path',
        '^web-hosting/([a-z-]+)/?$' => 'Web Hosting short path',
        '^ecommerce-development/([a-z-]+)/?$' => 'Ecommerce Development short path',
        '^email-marketing/([a-z-]+)/?$' => 'Email Marketing short path',
        '^sem/([a-z-]+)/?$' => 'SEM short path',
        '^web-development/([a-z-]+)/?$' => 'Web Development short path'
    ];
    
    $missingRules = [];
    foreach ($requiredRules as $pattern => $description) {
        if (strpos($htaccessContent, $pattern) === false) {
            $missingRules[] = $description;
            $errors[] = ".htaccess: Missing rewrite rule for $description";
            echo "  ✗ Missing: $description\n";
        } else {
            echo "  ✓ $description - Found\n";
        }
    }
    
    // Check for SHORT PATH REDIRECTS section marker
    if (strpos($htaccessContent, 'SHORT PATH REDIRECTS') !== false) {
        echo "  ✓ SHORT PATH REDIRECTS section identified\n";
    } else {
        $warnings[] = ".htaccess: SHORT PATH REDIRECTS section marker not found";
        echo "  ⚠ SHORT PATH REDIRECTS section marker not found\n";
    }
    
    echo "\nMissing rules: " . count($missingRules) . "\n";
} else {
    $errors[] = ".htaccess file not found!";
    echo "  ✗ .htaccess file NOT FOUND!\n";
}

echo "\n";

// ============================================================================
// SECTION 5: SITEMAP VALIDATION
// ============================================================================
echo "【5】VALIDATING SITEMAP.XML STRUCTURE\n";
echo str_repeat("─", 70) . "\n\n";

$sitemapFile = __DIR__ . '/sitemap.xml';
if (file_exists($sitemapFile)) {
    $sitemapContent = file_get_contents($sitemapFile);
    $sitemapSize = filesize($sitemapFile);
    echo "  ✓ sitemap.xml exists (Size: " . round($sitemapSize / 1024 / 1024, 2) . " MB)\n";
    
    // Check XML structure
    if (strpos($sitemapContent, '<?xml version=') !== false) {
        echo "  ✓ XML declaration present\n";
    } else {
        $errors[] = "sitemap.xml: Missing XML declaration";
        echo "  ✗ XML declaration missing\n";
    }
    
    if (strpos($sitemapContent, '<urlset xmlns=') !== false) {
        echo "  ✓ URLset element present\n";
    } else {
        $errors[] = "sitemap.xml: Missing urlset element";
        echo "  ✗ URLset element missing\n";
    }
    
    if (strpos($sitemapContent, '</urlset>') !== false) {
        echo "  ✓ URLset properly closed\n";
    } else {
        $errors[] = "sitemap.xml: URLset not properly closed";
        echo "  ✗ URLset not closed\n";
    }
    
    // Count URLs
    preg_match_all('/<url>/', $sitemapContent, $urlMatches);
    $urlCount = count($urlMatches[0]);
    echo "  ✓ Total URLs in sitemap: $urlCount\n";
    
    if ($urlCount < 1000) {
        $warnings[] = "sitemap.xml: Only $urlCount URLs (expected 40,000+)";
        echo "  ⚠ WARNING: Expected 40,000+ URLs, found $urlCount\n";
    }
    
    // Check for international cities in sitemap
    $citySamples = ['seoul', 'london', 'dubai', 'new-york', 'cairo'];
    $citiesInSitemap = 0;
    foreach ($citySamples as $city) {
        if (strpos($sitemapContent, '/' . $city . '</loc>') !== false) {
            $citiesInSitemap++;
        }
    }
    
    if ($citiesInSitemap === count($citySamples)) {
        echo "  ✓ International cities found in sitemap\n";
    } else {
        $warnings[] = "sitemap.xml: Only $citiesInSitemap/" . count($citySamples) . " international cities found";
        echo "  ⚠ International cities: $citiesInSitemap/" . count($citySamples) . " found\n";
    }
    
} else {
    $errors[] = "sitemap.xml file not found!";
    echo "  ✗ sitemap.xml file NOT FOUND!\n";
}

echo "\n";

// ============================================================================
// SECTION 6: URL ROUTING LOGIC CHECK
// ============================================================================
echo "【6】VALIDATING URL ROUTING LOGIC\n";
echo str_repeat("─", 70) . "\n\n";

// Check a sample city file for routing logic
$seoFile = __DIR__ . '/seo-city.php';
if (file_exists($seoFile)) {
    $content = file_get_contents($seoFile);
    
    // Check for city parameter retrieval
    if (strpos($content, 'isset($_GET[\'city\'])') !== false || strpos($content, 'isset($_GET["city"])') !== false) {
        echo "  ✓ City parameter retrieval implemented\n";
    } else {
        $errors[] = "seo-city.php: City parameter retrieval not found";
        echo "  ✗ City parameter retrieval missing\n";
    }
    
    // Check for lowercase conversion
    if (strpos($content, 'strtolower') !== false) {
        echo "  ✓ City parameter converted to lowercase\n";
    } else {
        $warnings[] = "seo-city.php: City parameter not converted to lowercase";
        echo "  ⚠ City parameter should be lowercase\n";
    }
    
    // Check for redirect on invalid city
    if (strpos($content, 'header(\'Location:') !== false || strpos($content, 'header("Location:') !== false) {
        echo "  ✓ Redirect on invalid city implemented\n";
    } else {
        $errors[] = "seo-city.php: Missing redirect on invalid city";
        echo "  ✗ Redirect on invalid city missing\n";
    }
}

echo "\n";

// ============================================================================
// SECTION 7: CRITICAL FILE CHECKS
// ============================================================================
echo "【7】CHECKING CRITICAL FILES\n";
echo str_repeat("─", 70) . "\n\n";

$criticalFiles = [
    '.htaccess' => 'Apache routing configuration',
    'seo-city.php' => 'SEO city template',
    'smm-city.php' => 'SMM city template',
    'sitemap.xml' => 'XML sitemap',
    'header.php' => 'Header include',
    'footer.php' => 'Footer include',
    'index.php' => 'Homepage'
];

$missingFiles = 0;
foreach ($criticalFiles as $file => $description) {
    if (file_exists(__DIR__ . '/' . $file)) {
        echo "  ✓ $file ($description)\n";
    } else {
        $missingFiles++;
        $errors[] = "Missing critical file: $file";
        echo "  ✗ $file - MISSING!\n";
    }
}

echo "\nMissing files: $missingFiles\n\n";

// ============================================================================
// SECTION 8: CITY DATA COMPLETENESS
// ============================================================================
echo "【8】CITY DATA COMPLETENESS CHECK\n";
echo str_repeat("─", 70) . "\n\n";

$seoContent = file_get_contents(__DIR__ . '/seo-city.php');
preg_match_all("/'([^']+)'\s*=>\s*\['name'/", $seoContent, $matches);
$totalCities = count(array_unique($matches[1]));

echo "  ✓ Total cities in seo-city.php: $totalCities\n";

if ($totalCities >= 1000) {
    echo "  ✓ City count exceeds 1000 (comprehensive coverage)\n";
} else if ($totalCities >= 500) {
    echo "  ⚠ City count is " . $totalCities . " (could be extended for better coverage)\n";
} else {
    $errors[] = "City data incomplete: Only $totalCities cities";
    echo "  ✗ City count is too low: $totalCities\n";
}

echo "\n";

// ============================================================================
// FINAL SUMMARY
// ============================================================================
echo "╔════════════════════════════════════════════════════════════════════╗\n";
echo "║                         ANALYSIS SUMMARY                           ║\n";
echo "╚════════════════════════════════════════════════════════════════════╝\n\n";

echo "ERRORS FOUND: " . count($errors) . "\n";
if (!empty($errors)) {
    echo str_repeat("─", 70) . "\n";
    foreach ($errors as $i => $error) {
        echo ($i + 1) . ". ❌ " . $error . "\n";
    }
    echo "\n";
}

echo "WARNINGS: " . count($warnings) . "\n";
if (!empty($warnings)) {
    echo str_repeat("─", 70) . "\n";
    foreach ($warnings as $i => $warning) {
        echo ($i + 1) . ". ⚠ " . $warning . "\n";
    }
    echo "\n";
}

echo "SUCCESSFUL CHECKS: " . count($successes) . "\n";

echo "\n";
echo "════════════════════════════════════════════════════════════════════\n";

if (empty($errors)) {
    echo "✓ NO CRITICAL ERRORS FOUND\n";
    echo "  All systems operational - ready for Google Search Console resubmission\n";
} else {
    echo "✗ " . count($errors) . " CRITICAL ERRORS DETECTED\n";
    echo "  Please review and fix the errors listed above\n";
}

echo "════════════════════════════════════════════════════════════════════\n";
echo "\nRecommendations:\n";
echo "1. Submit sitemap to Google Search Console: sitemap.xml\n";
echo "2. Request URL indexing for sample cities\n";
echo "3. Monitor 404 error removal over 7-14 days\n";
echo "4. Check Search Console Coverage tab for indexing progress\n";
?>
