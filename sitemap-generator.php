<?php
// sitemap-generator.php — manual trigger to rebuild XML and HTML sitemaps
require_once __DIR__ . DIRECTORY_SEPARATOR . 'sitemap-functions.php';

$baseUrl = 'https://www.thiyagidigital.com/';
$xml = generateSitemapXML($baseUrl);
$html = generateHTMLSitemap($baseUrl);

// Simple HTML response
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap Regenerated</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; line-height: 1.6; padding: 0 16px; }
        code { background: #f5f5f5; padding: 2px 6px; border-radius: 4px; }
        .links a { display: inline-block; margin-right: 16px; }
        pre { background: #f9f9f9; padding: 12px; overflow: auto; border: 1px solid #eee; border-radius: 4px; }
        details { margin-top: 16px; }
    </style>
</head>
<body>
    <h1>Sitemap regenerated</h1>
    <p class="links">
        <a href="<?= htmlspecialchars($baseUrl) ?>sitemap.xml" target="_blank">View XML</a>
        <a href="<?= htmlspecialchars($baseUrl) ?>sitemap.php" target="_blank">View HTML</a>
    </p>
    <details>
        <summary>Preview XML (first 2KB)</summary>
        <pre><?= htmlspecialchars(substr($xml, 0, 2048)) ?><?= strlen($xml) > 2048 ? "\n..." : '' ?></pre>
    </details>
    <p>If you still don’t see the XML, ensure the web server can write to <code><?= htmlspecialchars(__DIR__) ?></code> and try refreshing once. The sitemap also auto-updates daily when any page loads.</p>
</body>
</html>