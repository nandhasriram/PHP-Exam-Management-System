<?php
// Database Configuration
$host = 'localhost';            // Database host (e.g., localhost)
$dbname = 'student_grievance_system';  // Database name
$username = 'root';             // MySQL username
$password = '';                 // MySQL password

// Create a connection to the MySQL database using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Uncomment the following line for debugging during development
    // echo "Connected successfully";

} catch (PDOException $e) {
    // In case of connection failure, output the error message
    die("Database connection failed: " . $e->getMessage());
}

// Optional: Close the database connection function
function closeConnection($pdo) {
    $pdo = null;
}
?>
