<?php
// sitemap-functions.php

function generateSitemapXML($baseUrl) {
    // Get all PHP files in the directory (excluding special files)
    $files = glob('*.php');
    $excludedFiles = [
        'sitemap-functions.php', 
        'sitemap.php', 
        '404.php', 
        'config.php',
        'header.php',
        'footer.php'
    ];
    $pages = array_diff($files, $excludedFiles);
    
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
    
    // Add other pages
    foreach ($pages as $page) {
        $pageName = str_replace('.php', '', $page);
        if ($pageName === 'index') continue;
        
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars($baseUrl . $pageName) . '</loc>';
        $xml .= '<lastmod>' . date('Y-m-d', filemtime($page)) . '</lastmod>';
        $xml .= '<changefreq>daily</changefreq>';
        $xml .= '<priority>1.0</priority>';
        $xml .= '</url>';
    }
    
    $xml .= '</urlset>';
    
    // Save to file
    file_put_contents('sitemap.xml', $xml);
}

function generateHTMLSitemap($baseUrl) {
    // Get all PHP files in the directory
    $files = glob('*.php');
    $excludedFiles = [
        'sitemap-functions.php',
        'sitemap.php',
        '404.php',
        'config.php',
        'header.php',
        'footer.php'
    ];
    $pages = array_diff($files, $excludedFiles);
    
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
            body { font-family: Arial, sans-serif; line-height: 1.6; max-width: 800px; margin: 0 auto; padding: 20px; }
            h1 { color: #333; }
            .sitemap-list { list-style-type: none; padding: 0; }
            .sitemap-list li { margin-bottom: 10px; }
            .sitemap-list a { color: #0066cc; text-decoration: none; }
            .sitemap-list a:hover { text-decoration: underline; }
        </style>
    </head>
    <body>
        <h1>ThiyagiDigital Sitemap</h1>
        <ul class="sitemap-list">
            <li><a href="<?= htmlspecialchars($baseUrl) ?>">Homepage</a></li>
            <?php foreach ($pages as $page): 
                $pageName = str_replace('.php', '', $page);
                if ($pageName === 'index') continue;
                $pageTitle = ucwords(str_replace('-', ' ', $pageName));
            ?>
                <li><a href="<?= htmlspecialchars($baseUrl . $pageName) ?>"><?= $pageTitle ?></a></li>
            <?php endforeach; ?>
        </ul>
    </body>
    </html>
    <?php
    
    // Get the buffered content
    $html = ob_get_clean();
    
    // Save to PHP file
    file_put_contents('sitemap.php', $html);
    
    return $html;
}

function updateSitemaps() {
    $baseUrl = 'https://www.thiyagidigital.com/';
    $sitemapFile = 'sitemap.xml';
    $htmlSitemapFile = 'sitemap.php';  // Changed from sitemap.html to sitemap.php
    
    // Only update if sitemap doesn't exist or is older than 1 day
    if (!file_exists($sitemapFile) || (time() - filemtime($sitemapFile)) > 86400) {
        generateSitemapXML($baseUrl);
    }
    
    if (!file_exists($htmlSitemapFile) || (time() - filemtime($htmlSitemapFile)) > 86400) {
        generateHTMLSitemap($baseUrl);
    }
}