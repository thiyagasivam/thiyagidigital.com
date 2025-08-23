<?php
// Simple sitemap test
echo "<!DOCTYPE html>";
echo "<html><head><title>Sitemap Test</title></head><body>";
echo "<h1>Sitemap Test</h1>";

// Test city extraction
function extractCitySlugs($filePath) {
    $citySlugs = [];
    
    if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . $filePath)) {
        echo "<p>File not found: $filePath</p>";
        return $citySlugs;
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

$cities = extractCitySlugs('seo-city.php');
echo "<p>Cities found: " . count($cities) . "</p>";

if (count($cities) > 0) {
    echo "<p>First city: " . $cities[0]['name'] . "</p>";
}

echo "</body></html>";
?>
