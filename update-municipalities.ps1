# PowerShell script to add missing municipalities to all remaining city service pages

$files = @(
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
    $filePath = $basePath + $file
    Write-Host "Updating $file..."
    
    # Read file content
    $content = Get-Content $filePath -Raw
    
    # Add Neyveli after Nagercoil
    $content = $content -replace "    'nagercoil' => \['name' => 'Nagercoil', 'state' => 'Tamil Nadu'\],`r`n    'hosur' => \['name' => 'Hosur', 'state' => 'Tamil Nadu'\],", "    'nagercoil' => ['name' => 'Nagercoil', 'state' => 'Tamil Nadu'],`r`n    'neyveli' => ['name' => 'Neyveli', 'state' => 'Tamil Nadu'],`r`n    'hosur' => ['name' => 'Hosur', 'state' => 'Tamil Nadu'],"
    
    # Add Udhagamandalam after Ooty  
    $content = $content -replace "    'ooty' => \['name' => 'Ooty', 'state' => 'Tamil Nadu'\],`r`n    'nagapattinam' => \['name' => 'Nagapattinam', 'state' => 'Tamil Nadu'\],", "    'ooty' => ['name' => 'Ooty', 'state' => 'Tamil Nadu'],`r`n    'udhagamandalam' => ['name' => 'Udhagamandalam', 'state' => 'Tamil Nadu'],`r`n    'nagapattinam' => ['name' => 'Nagapattinam', 'state' => 'Tamil Nadu'],"
    
    # Write back to file
    Set-Content $filePath -Value $content -NoNewline
    Write-Host "✅ Updated $file"
}

Write-Host "🎉 All remaining files updated successfully!"