<?php
// Simple password test
echo "Password Test Results:\n";
echo "===================\n";

$correct = 'admin123';
$test1 = 'admin123';
$test2 = ' admin123';
$test3 = 'admin123 ';

echo "Test 1 - Exact match: " . ($correct === $test1 ? 'PASS' : 'FAIL') . "\n";
echo "Test 2 - Leading space: " . ($correct === $test2 ? 'PASS' : 'FAIL') . "\n";
echo "Test 3 - Trailing space: " . ($correct === $test3 ? 'PASS' : 'FAIL') . "\n";

echo "\nPassword lengths:\n";
echo "Correct: " . strlen($correct) . " chars\n";
echo "Test1: " . strlen($test1) . " chars\n";
echo "Test2: " . strlen($test2) . " chars\n";
echo "Test3: " . strlen($test3) . " chars\n";

echo "\nPOST simulation:\n";
$_POST['pass'] = 'admin123';
$entered = $_POST['pass'] ?? '';
echo "POST pass: '$entered'\n";
echo "Match: " . ($correct === $entered ? 'YES' : 'NO') . "\n";
?>