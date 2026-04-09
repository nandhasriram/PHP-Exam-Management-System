<?php
// Database connection settings
$host = 'localhost';    // Database host (usually 'localhost')
$dbname = 'scholarship_management';   // Database name
$username = 'root';    // Database username
$password = '';        // Database password (leave blank if not set)

// Create a connection to the database
try {
    // PDO is used to connect to the database
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception for better error handling
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Display a message if connected successfully (Optional for debugging)
    // echo "Connected successfully";
} catch (PDOException $e) {
    // Display error message in case connection fails
    echo "Connection failed: " . $e->getMessage();
}
?>
