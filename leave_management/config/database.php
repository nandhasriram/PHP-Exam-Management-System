<?php
// Database Configuration
$host = 'localhost';       // Hostname (usually 'localhost')
$username = 'root';        // Database username
$password = '';            // Database password (leave empty for default XAMPP/WAMP)
$database = 'leave_management'; // Database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Optional: Uncomment for debugging successful connection
// echo "Database connected successfully";

?>
