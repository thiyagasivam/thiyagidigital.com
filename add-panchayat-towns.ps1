# PowerShell script to add missing panchayat towns to remaining service files
$files = @(
    "wordpress-development-city.php",
    "link-building-city.php",
    "sms-marketing-city.php",
    "affiliate-marketing-city.php",
    "ecommerce-marketing-city.php",
    "amazon-marketing-city.php",
    "basic-website-designing-city.php",
    "woocommerce-development-city.php",
    "shopify-development-city.php",
    "magento-development-city.php",
    "opencart-development-city.php",
    "web-hosting-city.php",
    "domain-registration-city.php",
    "cloud-hosting-city.php",
    "ecommerce-development-city.php",
    "logo-design-city.php",
    "graphic-design-city.php",
    "online-store-setup-city.php",
    "cms-website-designing-city.php",
    "responsive-website-designing-service-city.php",
    "sem-services-city.php",
    "ui-ux-design-service-city.php",
    "vps-hosting-service-city.php",
    "website-redesigning-service-city.php",
    "website-updates-maintenance-service-city.php"
)

$basePath = "c:\xampp\htdocs\Live Pages\thiyagidigital\"

foreach ($file in $files) {
    $fullPath = Join-Path $basePath $file
    if (Test-Path $fullPath) {
        Write-Host "Processing $file..." -ForegroundColor Green
        
        # Add Kanyakumari
        $content = Get-Content $fullPath -Raw
        $content = $content -replace "(\s*)'kanchipuram' => \['name' => 'Kanchipuram', 'state' => 'Tamil Nadu'\],\s*'ooty' => \['name' => 'Ooty', 'state' => 'Tamil Nadu'\],", "`$1'kanchipuram' => ['name' => 'Kanchipuram', 'state' => 'Tamil Nadu'],`r`n`$1'kanyakumari' => ['name' => 'Kanyakumari', 'state' => 'Tamil Nadu'],`r`n`$1'ooty' => ['name' => 'Ooty', 'state' => 'Tamil Nadu'],"
        
        # Add Thiruninravur
        $content = $content -replace "(\s*)'thirumangalam' => \['name' => 'Thirumangalam', 'state' => 'Tamil Nadu'\],\s*'usilampatti' => \['name' => 'Usilampatti', 'state' => 'Tamil Nadu'\],", "`$1'thirumangalam' => ['name' => 'Thirumangalam', 'state' => 'Tamil Nadu'],`r`n`$1'thiruninravur' => ['name' => 'Thiruninravur', 'state' => 'Tamil Nadu'],`r`n`$1'usilampatti' => ['name' => 'Usilampatti', 'state' => 'Tamil Nadu'],"
        
        # Add Thuckalay
        $content = $content -replace "(\s*)'lalgudi' => \['name' => 'Lalgudi', 'state' => 'Tamil Nadu'\],\s*'thuraiyur' => \['name' => 'Thuraiyur', 'state' => 'Tamil Nadu'\],", "`$1'lalgudi' => ['name' => 'Lalgudi', 'state' => 'Tamil Nadu'],`r`n`$1'thuckalay' => ['name' => 'Thuckalay', 'state' => 'Tamil Nadu'],`r`n`$1'thuraiyur' => ['name' => 'Thuraiyur', 'state' => 'Tamil Nadu'],"
        
        Set-Content -Path $fullPath -Value $content -NoNewline
        Write-Host "✅ Updated $file" -ForegroundColor Green
    } else {
        Write-Host "❌ File not found: $file" -ForegroundColor Red
    }
}

Write-Host "`n🎉 Batch processing complete!" -ForegroundColor Cyan