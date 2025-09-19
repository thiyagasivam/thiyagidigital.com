<?php
// Simple image generator for blog featured images
function generateBlogImage($filename, $title, $width = 800, $height = 400) {
    $image = imagecreatetruecolor($width, $height);
    
    // Create gradient background
    $colors = [
        ['start' => [102, 126, 234], 'end' => [118, 75, 162]], // Blue to Purple
        ['start' => [29, 161, 242], 'end' => [37, 117, 252]], // Twitter Blue
        ['start' => [255, 105, 0], 'end' => [255, 0, 150]],   // Orange to Pink
        ['start' => [0, 176, 80], 'end' => [146, 208, 80]],   // Green gradient
        ['start' => [255, 193, 7], 'end' => [255, 87, 34]]    // Yellow to Orange
    ];
    
    $colorSet = $colors[crc32($title) % count($colors)];
    
    for ($y = 0; $y < $height; $y++) {
        $ratio = $y / $height;
        $r = $colorSet['start'][0] + ($colorSet['end'][0] - $colorSet['start'][0]) * $ratio;
        $g = $colorSet['start'][1] + ($colorSet['end'][1] - $colorSet['start'][1]) * $ratio;
        $b = $colorSet['start'][2] + ($colorSet['end'][2] - $colorSet['start'][2]) * $ratio;
        
        $color = imagecolorallocate($image, $r, $g, $b);
        imageline($image, 0, $y, $width, $y, $color);
    }
    
    // Add overlay pattern
    $overlay = imagecolorallocatealpha($image, 255, 255, 255, 100);
    for ($x = 0; $x < $width; $x += 40) {
        for ($y = 0; $y < $height; $y += 40) {
            imagefilledellipse($image, $x, $y, 20, 20, $overlay);
        }
    }
    
    // Add text
    $white = imagecolorallocate($image, 255, 255, 255);
    $textColor = imagecolorallocatealpha($image, 255, 255, 255, 30);
    
    // Title text (centered)
    $fontSize = 24;
    $font = __DIR__ . '/../../assets/fonts/RecoletaAlt-Bold.ttf';
    
    if (!file_exists($font)) {
        // Use built-in font if custom font not available
        $wrappedTitle = wordwrap($title, 40, "\n");
        $lines = explode("\n", $wrappedTitle);
        $lineHeight = 30;
        $startY = ($height - (count($lines) * $lineHeight)) / 2;
        
        foreach ($lines as $i => $line) {
            $textWidth = strlen($line) * 12; // Approximate width
            $x = ($width - $textWidth) / 2;
            $y = $startY + ($i * $lineHeight);
            imagestring($image, 5, $x, $y, $line, $white);
        }
    } else {
        // Use custom font
        $bbox = imagettfbbox($fontSize, 0, $font, $title);
        $textWidth = $bbox[4] - $bbox[6];
        $textHeight = $bbox[1] - $bbox[7];
        $x = ($width - $textWidth) / 2;
        $y = ($height - $textHeight) / 2 + $textHeight;
        imagettftext($image, $fontSize, 0, $x, $y, $white, $font, $title);
    }
    
    // Add brand watermark
    $brandText = "ThiyagiDigital";
    $brandColor = imagecolorallocatealpha($image, 255, 255, 255, 50);
    imagestring($image, 3, $width - 150, $height - 25, $brandText, $brandColor);
    
    // Save image
    $filepath = __DIR__ . '/' . $filename;
    imagejpeg($image, $filepath, 90);
    imagedestroy($image);
    
    return $filepath;
}

// Generate images for sample blog posts
$blogImages = [
    ['seo-strategies-2025.jpg', 'Top SEO Strategies 2025'],
    ['social-media-branding.jpg', 'Social Media Brand Building'],
    ['ecommerce-development.jpg', 'E-commerce Development Guide'],
    ['content-marketing-small-business.jpg', 'Content Marketing for Small Business'],
    ['mobile-first-design.jpg', 'Mobile-First Website Design']
];

// Create images directory if it doesn't exist
if (!is_dir(__DIR__)) {
    mkdir(__DIR__, 0755, true);
}

echo "<h2>Generating Blog Featured Images</h2>\n";

foreach ($blogImages as $imageData) {
    $filepath = generateBlogImage($imageData[0], $imageData[1]);
    echo "<p>Generated: " . $imageData[0] . "</p>\n";
}

echo "<p><strong>All blog featured images have been generated successfully!</strong></p>";
echo "<p><a href='../index.php'>View Blog Index</a></p>";
?>