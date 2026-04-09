<?php
// Database configuration settings
$host = 'localhost';         // Database host (usually 'localhost')
$dbname = 'tablesqlstud';    // Replace with your database name
$username = 'root';  // Replace with your database username
$password = '';  // Replace with your database password

try {
    // Create a new PDO instance with database settings
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Set error mode to throw exceptions for better error handling
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Uncomment this line if you want to see a connection success message for testing
    // echo "Database connection established successfully.";

} catch (PDOException $e) {
    // Display connection error message if the connection fails
    echo "Connection failed: " . $e->getMessage();
    exit();  // Terminate the script if the connection fails
}
?>
