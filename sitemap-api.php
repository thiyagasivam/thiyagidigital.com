<?php
// JSON API for Sitemap Data
// Provides sitemap data in JSON format for JavaScript applications

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Base configuration
$baseUrl = 'https://www.thiyagidigital.com/';

// Function to extract ALL city slugs from seo-city.php
function extractCitySlugs($filePath) {
    $citySlugs = [];
    
    if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . $filePath)) {
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

// Get all cities
$cities = extractCitySlugs('seo-city.php');

// Define main pages
$mainPages = [
    ['url' => '', 'title' => 'Home', 'description' => 'Welcome to ThiyagiDigital - Leading digital marketing company'],
    ['url' => 'about', 'title' => 'About Us', 'description' => 'Learn about our company and team'],
    ['url' => 'portfolio', 'title' => 'Portfolio', 'description' => 'View our work and client projects'],
    ['url' => 'testimonial', 'title' => 'Testimonials', 'description' => 'What our clients say about us'],
    ['url' => 'contact', 'title' => 'Contact Us', 'description' => 'Get in touch with our team'],
    ['url' => 'sitemap', 'title' => 'Sitemap', 'description' => 'Complete list of all pages on our website']
];

// Define service pages
$servicePages = [
    ['url' => 'seo-services', 'title' => 'SEO Services', 'description' => 'Search Engine Optimization services'],
    ['url' => 'smm-service', 'title' => 'Social Media Marketing', 'description' => 'SMM services and strategies'],
    ['url' => 'sem-services', 'title' => 'Search Engine Marketing', 'description' => 'SEM and PPC advertising services'],
    ['url' => 'web-development-service', 'title' => 'Web Development', 'description' => 'Custom website development services'],
    ['url' => 'content-writing-service', 'title' => 'Content Writing', 'description' => 'Professional content writing services'],
    ['url' => 'email-marketing-service', 'title' => 'Email Marketing', 'description' => 'Email marketing campaigns and automation']
];

// Define policy pages
$policyPages = [
    ['url' => 'privacy-policy', 'title' => 'Privacy Policy', 'description' => 'Our privacy policy and data protection'],
    ['url' => 'terms-and-conditions', 'title' => 'Terms and Conditions', 'description' => 'Website terms and conditions'],
    ['url' => 'return-refund-policy', 'title' => 'Return & Refund Policy', 'description' => 'Return and refund policy'],
    ['url' => 'shipping-and-delivery', 'title' => 'Shipping and Delivery', 'description' => 'Shipping and delivery information']
];

// Service slugs for city pages
$serviceTypes = [
    ['slug' => 'seo-services', 'name' => 'SEO Services'],
    ['slug' => 'smm-service', 'name' => 'Social Media Marketing'],
    ['slug' => 'sem-services', 'name' => 'Search Engine Marketing'],
    ['slug' => 'web-development-service', 'name' => 'Web Development'],
    ['slug' => 'content-writing-service', 'name' => 'Content Writing'],
    ['slug' => 'email-marketing-service', 'name' => 'Email Marketing']
];

// Generate city service pages
$cityServicePages = [];
foreach ($serviceTypes as $serviceType) {
    foreach ($cities as $city) {
        $cityServicePages[] = [
            'url' => $serviceType['slug'] . '/' . $city['slug'],
            'title' => $serviceType['name'] . ' in ' . $city['name'],
            'description' => 'Professional ' . strtolower($serviceType['name']) . ' services in ' . $city['name'] . ', Tamil Nadu',
            'service' => $serviceType['slug'],
            'city' => $city['slug'],
            'cityName' => $city['name'],
            'serviceName' => $serviceType['name']
        ];
    }
}

// Calculate totals
$totalPages = count($mainPages) + count($servicePages) + count($policyPages) + count($cityServicePages);

// Build complete sitemap data
$sitemapData = [
    'meta' => [
        'baseUrl' => $baseUrl,
        'generated' => date('Y-m-d H:i:s'),
        'totalPages' => $totalPages,
        'totalCities' => count($cities),
        'totalServices' => count($serviceTypes),
        'counts' => [
            'mainPages' => count($mainPages),
            'servicePages' => count($servicePages),
            'policyPages' => count($policyPages),
            'cityServicePages' => count($cityServicePages)
        ]
    ],
    'categories' => [
        'main' => [
            'title' => 'Main Pages',
            'description' => 'Core website pages and navigation',
            'pages' => $mainPages
        ],
        'services' => [
            'title' => 'Service Pages',
            'description' => 'Our digital marketing services',
            'pages' => $servicePages
        ],
        'cities' => [
            'title' => 'City Service Pages',
            'description' => 'Service pages for all covered cities',
            'pages' => $cityServicePages
        ],
        'policies' => [
            'title' => 'Legal & Policy Pages',
            'description' => 'Terms, privacy, and legal information',
            'pages' => $policyPages
        ]
    ],
    'cities' => $cities,
    'services' => $serviceTypes
];

// Handle query parameters for filtering
$category = $_GET['category'] ?? null;
$service = $_GET['service'] ?? null;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : null;

// Filter by category if requested
if ($category && isset($sitemapData['categories'][$category])) {
    $response = [
        'meta' => $sitemapData['meta'],
        'category' => $sitemapData['categories'][$category]
    ];
    
    if ($limit) {
        $response['category']['pages'] = array_slice($response['category']['pages'], 0, $limit);
    }
    
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit;
}

// Filter by service if requested
if ($service) {
    $filteredPages = array_filter($cityServicePages, function($page) use ($service) {
        return $page['service'] === $service;
    });
    
    $response = [
        'meta' => $sitemapData['meta'],
        'service' => $service,
        'pages' => array_values($filteredPages)
    ];
    
    if ($limit) {
        $response['pages'] = array_slice($response['pages'], 0, $limit);
    }
    
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit;
}

// Return complete sitemap data
if ($limit) {
    foreach ($sitemapData['categories'] as &$category) {
        $category['pages'] = array_slice($category['pages'], 0, $limit);
    }
}

echo json_encode($sitemapData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>
