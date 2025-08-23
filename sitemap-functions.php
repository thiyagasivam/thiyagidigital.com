<?php
// sitemap-functions.php

function generateSitemapXML($baseUrl) {
    // Discover PHP files (absolute) and filter to public pages only
    $filesAbs = glob(__DIR__ . DIRECTORY_SEPARATOR . '*.php');
    $files = array_map('basename', $filesAbs);
    $excludedFiles = [
        // internals/utilities
        'sitemap-functions.php','sitemap-generator.php','sitemap.php','404.php','config.php','header.php','footer.php','mailer.php','smailer.php',
        // partials/components (not standalone pages)
        'callbox.php','callservice-sidebar.php','client-logo.php','mainservice-sidebar.php','marquee.php','project-count.php','certify-partner.php','sideform.php','testmonial2.php','new-index.php',
        // dynamic city templates (handled separately as pretty URLs)
        'seo-city.php','smm-city.php','sem-city.php','web-development-city.php','content-writing-city.php','email-marketing-city.php',
        // utility
        'sitemap-functions.php'
    ];
    $pages = array_values(array_diff($files, $excludedFiles));

    // Service city URL patterns and a curated set of popular cities
    $serviceCityPatterns = [
        'seo-services',
        'smm-service',
        'sem-services',
        'web-development-service',
        'content-writing-service',
        'email-marketing-service',
    ];
    $citySlugs = extractCitySlugs('seo-city.php');
    if (empty($citySlugs)) {
        // Fallback to a curated subset if parsing fails
        $citySlugs = [
            'chennai','madurai','coimbatore','tiruchirappalli','salem','tirunelveli','vellore','tiruppur','erode','thoothukudi','dindigul','thanjavur','nagercoil','hosur','avadi','kumbakonam','cuddalore','karur','sivakasi','tambaram'
        ];
    }

    // Start XML
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    // Add homepage first
    $xml .= '<url>';
    $xml .= '<loc>' . htmlspecialchars($baseUrl) . '</loc>';
    $xml .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
    $xml .= '<changefreq>daily</changefreq>';
    $xml .= '<priority>1.0</priority>';
    $xml .= '</url>';

    // Add other public pages (use .php URLs)
    foreach ($pages as $page) {
        $pageName = str_replace('.php', '', $page);
        if ($pageName === 'index' || $pageName === 'thankyou') continue; // skip duplicates/utility
        $loc = $baseUrl . $pageName . '.php';
        $lastmod = @filemtime(__DIR__ . DIRECTORY_SEPARATOR . $page) ?: time();
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars($loc) . '</loc>';
        $xml .= '<lastmod>' . date('Y-m-d', $lastmod) . '</lastmod>';
        $xml .= '<changefreq>weekly</changefreq>';
        $xml .= '<priority>0.8</priority>';
        $xml .= '</url>';
    }

    // Add city URLs for each service
    $today = date('Y-m-d');
    foreach ($serviceCityPatterns as $pattern) {
        foreach ($citySlugs as $slug) {
            $loc = $baseUrl . $pattern . '/' . $slug;
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($loc) . '</loc>';
            $xml .= '<lastmod>' . $today . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.7</priority>';
            $xml .= '</url>';
        }
    }

    $xml .= '</urlset>';

    // Save to file using absolute path
    $sitemapFile = __DIR__ . DIRECTORY_SEPARATOR . 'sitemap.xml';
    $ok = @file_put_contents($sitemapFile, $xml, LOCK_EX);
    if ($ok === false) {
        error_log('[sitemap] Failed to write sitemap.xml at ' . $sitemapFile);
    }
    return $xml;
}

function generateHTMLSitemap($baseUrl) {
    // Get all PHP files and filter to public pages
    $filesAbs = glob(__DIR__ . DIRECTORY_SEPARATOR . '*.php');
    $files = array_map('basename', $filesAbs);
    $excludedFiles = [
        'sitemap-functions.php','sitemap-generator.php','sitemap.php','404.php','config.php','header.php','footer.php','mailer.php','smailer.php',
        'callbox.php','callservice-sidebar.php','client-logo.php','mainservice-sidebar.php','marquee.php','project-count.php','certify-partner.php','sideform.php','testmonial2.php','new-index.php',
        'seo-city.php','smm-city.php','sem-city.php','web-development-city.php','content-writing-city.php','email-marketing-city.php',
    ];
    $pages = array_values(array_diff($files, $excludedFiles));

    // City URL patterns
    $serviceCityPatterns = [
        'Search Engine Optimization' => 'seo-services',
        'Social Media Marketing' => 'smm-service',
        'Search Engine Marketing' => 'sem-services',
        'Web Development' => 'web-development-service',
        'Content Writing' => 'content-writing-service',
        'Email Marketing' => 'email-marketing-service',
    ];
    $citySlugs = extractCitySlugs('seo-city.php');
    if (empty($citySlugs)) {
        $citySlugs = [
            'chennai','madurai','coimbatore','tiruchirappalli','salem','tirunelveli','vellore','tiruppur','erode','thoothukudi','dindigul','thanjavur','nagercoil','hosur','avadi','kumbakonam','cuddalore','karur','sivakasi','tambaram'
        ];
    }

    // Start PHP file with output buffering
    ob_start();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HTML Sitemap - ThiyagiDigital</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; max-width: 980px; margin: 0 auto; padding: 20px; }
            h1 { color: #333; }
            h2 { margin-top: 30px; }
            .sitemap-list { list-style-type: none; padding: 0; columns: 2; column-gap: 40px; }
            .sitemap-list li { margin-bottom: 10px; break-inside: avoid; }
            .sitemap-list a { color: #0066cc; text-decoration: none; }
            .sitemap-list a:hover { text-decoration: underline; }
        </style>
    </head>
    <body>
        <h1>ThiyagiDigital Sitemap</h1>
        <h2>Pages</h2>
        <ul class="sitemap-list">
            <li><a href="<?= htmlspecialchars($baseUrl) ?>">Homepage</a></li>
            <?php foreach ($pages as $page): 
                $pageName = str_replace('.php', '', $page);
                if ($pageName === 'index' || $pageName === 'thankyou') continue;
                $pageTitle = ucwords(str_replace('-', ' ', $pageName));
                $href = $baseUrl . $pageName . '.php';
            ?>
                <li><a href="<?= htmlspecialchars($href) ?>"><?= $pageTitle ?></a></li>
            <?php endforeach; ?>
        </ul>

        <h2>City Service Pages</h2>
        <?php foreach ($serviceCityPatterns as $serviceLabel => $pattern): ?>
            <h3><?= htmlspecialchars($serviceLabel) ?></h3>
            <ul class="sitemap-list">
            <?php foreach ($citySlugs as $slug): 
                $labelCity = ucwords(str_replace('-', ' ', $slug));
                $href = $baseUrl . $pattern . '/' . $slug;
            ?>
                <li><a href="<?= htmlspecialchars($href) ?>"><?= htmlspecialchars($serviceLabel . ' in ' . $labelCity) ?></a></li>
            <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    </body>
    </html>
    <?php

    // Get the buffered content
    $html = ob_get_clean();

    // Save to PHP file (absolute)
    $htmlSitemapFile = __DIR__ . DIRECTORY_SEPARATOR . 'sitemap.php';
    $ok = @file_put_contents($htmlSitemapFile, $html, LOCK_EX);
    if ($ok === false) {
        error_log('[sitemap] Failed to write sitemap.php at ' . $htmlSitemapFile);
    }

    return $html;
}

function updateSitemaps() {
    $baseUrl = 'https://www.thiyagidigital.com/';
    $sitemapFile = __DIR__ . DIRECTORY_SEPARATOR . 'sitemap.xml';
    $htmlSitemapFile = __DIR__ . DIRECTORY_SEPARATOR . 'sitemap.php';

    // Only update if sitemap doesn't exist or is older than 1 day
    if (!file_exists($sitemapFile) || (time() - @filemtime($sitemapFile)) > 86400) {
        generateSitemapXML($baseUrl);
    }

    if (!file_exists($htmlSitemapFile) || (time() - @filemtime($htmlSitemapFile)) > 86400) {
        generateHTMLSitemap($baseUrl);
    }
}

// Extract city slugs from a city template file by parsing the $supportedCities array keys
function extractCitySlugs($filePath) {
    if (!file_exists($filePath)) {
        return [];
    }
    $content = @file_get_contents($filePath);
    if ($content === false) {
        return [];
    }
    $slugs = [];
    // Find the $supportedCities array block
    if (preg_match('/\$supportedCities\s*=\s*\[(.*?)\];/s', $content, $m)) {
        $arrayBody = $m[1];
        // Match keys like 'chennai' => [
        if (preg_match_all("/'([a-z0-9.-]+(?:-[a-z0-9.-]+)*)'\s*=>\s*\[/i", $arrayBody, $mm)) {
            $slugs = array_unique($mm[1]);
        }
    }
    sort($slugs);
    return $slugs;
}