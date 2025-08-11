<?php
// sitemap-generator.php

function generateSitemapXML($baseUrl) {
    // Get all PHP files in the directory (excluding this file and special files)
    $files = glob('*.php');
    $excludedFiles = ['sitemap-generator.php', 'sitemap.php', '404.php', 'config.php'];
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
        if ($pageName === 'index') continue; // Skip index since we added homepage
        
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
    
    return $xml;
}