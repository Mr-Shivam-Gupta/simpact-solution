<?php
$host = 'localhost'; // Database host (usually 'localhost' or '127.0.0.1')
$dbname = 'api-angular'; // Database name
$username = 'angular'; // Database username
$password = 'ek2^P41b4'; // Database password

try {
    // Establish a database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Connection failed: " . $e->getMessage();
    die(); // Stop execution if the connection fails
}
?>
