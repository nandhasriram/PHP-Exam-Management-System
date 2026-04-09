<?php
// Database connection settings
$host = 'localhost';    // Database host (usually 'localhost')
$dbname = 'ims_jpninfot_db';   // Database name
$username = 'root';    // Database username
$password = '';        // Database password (leave blank if not set)

try {
    // PDO is used to connect to the database
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception for better error handling
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optional: Display a message if connected successfully
    
} catch (PDOException $e) {
    // Display error message in case connection fails
    echo "Connection failed: " . $e->getMessage();
}
?>
