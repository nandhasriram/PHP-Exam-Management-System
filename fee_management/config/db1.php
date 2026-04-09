<?php  
// Database connection settings
$host = 'localhost';    // Database host (usually 'localhost')
$dbname = 'fee_management';   // Database name
$username = 'root';    // Database username
$password = '';        // Database password (leave blank if not set) 
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_database = "ims_jpninfot_db"; 

    // PDO is used to connect to the database
    $conn = new mysqli($mysql_hostname, $mysql_user, $mysql_pass, $mysql_database);
   // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception for better error handling
   //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optional: Display a message if connected successfully
    


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
    // Display error message in case connection fails
   // echo "Connection failed: " . $e->getMessage();

?>
