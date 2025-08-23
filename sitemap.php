<?php
require_once 'sitemap-functions.php';
$baseUrl = 'https://www.thiyagidigital.com/';

// Discover public pages (exclude internals/partials)
$files = glob('*.php');
$excluded = [
    'sitemap-functions.php','sitemap-generator.php','sitemap.php','404.php','config.php','header.php','footer.php','mailer.php','smailer.php',
    'callbox.php','callservice-sidebar.php','client-logo.php','mainservice-sidebar.php','marquee.php','project-count.php','certify-partner.php','sideform.php','testmonial2.php','new-index.php',
    // dynamic city templates are listed as pretty URLs below
    'seo-city.php','smm-city.php','sem-city.php','web-development-city.php','content-writing-city.php','email-marketing-city.php',
];
$pages = array_values(array_diff($files, $excluded));
sort($pages);

// City patterns and slugs
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
sort($citySlugs);
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
    <link rel="canonical" href="<?= htmlspecialchars($baseUrl) ?>sitemap.php">
    <meta name="robots" content="noindex, follow">
    <meta name="description" content="Browse all public pages and city service pages for ThiyagiDigital.">
    <meta property="og:title" content="HTML Sitemap - ThiyagiDigital">
    <meta property="og:description" content="All site pages and city-specific service URLs in one place.">
    <meta property="og:url" content="<?= htmlspecialchars($baseUrl) ?>sitemap.php">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="ThiyagiDigital">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="HTML Sitemap - ThiyagiDigital">
    <meta name="twitter:description" content="All site pages and city-specific service URLs in one place.">
    
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
            <li><a href="<?= htmlspecialchars($href) ?>"><?= htmlspecialchars($pageTitle) ?></a></li>
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
