<?php
// Database Configuration Checker
// This file helps diagnose database connection issues

echo "<!DOCTYPE html>";
echo "<html><head><title>Database Configuration Check</title>";
echo "<style>body{font-family:Arial,sans-serif;margin:20px;} .success{color:green;} .error{color:red;} .info{color:blue;} .warning{color:orange;}</style></head><body>";

echo "<h1>🔍 Database Configuration Check</h1>";
echo "<p>This page helps diagnose database connection issues for your blog system.</p>";

// Check PHP version
echo "<h2>📋 System Information</h2>";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
echo "<p><strong>Server Software:</strong> " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "</p>";
echo "<p><strong>Document Root:</strong> " . ($_SERVER['DOCUMENT_ROOT'] ?? 'Unknown') . "</p>";

// Check if PDO MySQL is available
echo "<h2>🔧 PHP Extensions</h2>";
if (extension_loaded('pdo_mysql')) {
    echo "<p class='success'>✅ PDO MySQL extension is loaded</p>";
} else {
    echo "<p class='error'>❌ PDO MySQL extension is NOT loaded</p>";
}

// Database configuration
echo "<h2>🗄️ Database Configuration</h2>";
$dbConfig = [
    'Host' => 'localhost',
    'Database' => 'u662933183_thiyagidigi',
    'Username' => 'u662933183_thiyagidigi',
    'Password' => str_repeat('*', 11) . ' (hidden for security)'
];

foreach ($dbConfig as $key => $value) {
    echo "<p><strong>$key:</strong> $value</p>";
}

// Test connection
echo "<h2>🔗 Connection Test</h2>";
echo "<div style='background:#f5f5f5;padding:15px;border-radius:5px;font-family:monospace;'>";

$hosts = ['localhost', '127.0.0.1', '127.0.0.1:3306'];
$dbname = 'u662933183_thiyagidigi';
$username = 'u662933183_thiyagidigi';
$password = '1K*KtzD#2Oa';

foreach ($hosts as $host) {
    echo "<p><strong>Testing: $host</strong></p>";
    try {
        $pdo = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Test query
        $result = $pdo->query("SELECT VERSION() as version");
        $version = $result->fetch()['version'];
        
        echo "<p class='success'>✅ Connection successful!</p>";
        echo "<p class='info'>📊 MySQL Version: $version</p>";
        
        // Check tables
        $stmt = $pdo->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        echo "<p class='info'>📋 Tables found: " . count($tables) . "</p>";
        
        if (count($tables) > 0) {
            echo "<ul>";
            foreach ($tables as $table) {
                echo "<li>$table</li>";
            }
            echo "</ul>";
        }
        
        break; // Success - no need to test other hosts
        
    } catch(PDOException $e) {
        echo "<p class='error'>❌ Failed: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
    echo "<hr>";
}

echo "</div>";

// Recommendations
echo "<h2>💡 Troubleshooting Tips</h2>";
echo "<ul>";
echo "<li><strong>If all connections failed:</strong> Check with your hosting provider that the database credentials are correct</li>";
echo "<li><strong>Access denied errors:</strong> Verify the username and password with your hosting control panel</li>";
echo "<li><strong>Database not found:</strong> Ensure the database has been created in your hosting control panel</li>";
echo "<li><strong>Permission errors:</strong> Make sure the database user has SELECT, INSERT, UPDATE, DELETE, CREATE permissions</li>";
echo "</ul>";

echo "<h2>📞 Next Steps</h2>";
echo "<p>If the connection test above shows success, your blog should work properly. If not, please:</p>";
echo "<ol>";
echo "<li>Check your hosting control panel for correct database details</li>";
echo "<li>Verify the database user has proper permissions</li>";
echo "<li>Contact your hosting provider if issues persist</li>";
echo "</ol>";

echo "<p style='margin-top:30px;padding:10px;background:#e7f3ff;border-left:4px solid #2196f3;'>";
echo "<strong>🔒 Security Note:</strong> Delete this file (db-check.php) after completing your diagnosis for security reasons.";
echo "</p>";

echo "</body></html>";
?>