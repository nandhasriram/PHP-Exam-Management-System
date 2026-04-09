   <?php
/*

$mysql_hostname = "localhost";
$mysql_user = "jpninfot_user";
$mysql_pass = "prakash2312";
$mysql_database = "jpninfot_fee_management"; 
//$dbname = 'jpninfot_fee_management';   // Database name jpninfot_user
//$username = 'jpninfot_user';    // Database username
//$password = 'prakash2312'; 
//*/
//echo "t1";
 ///*
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_database = "fee_management"; 
//*/

//$db = mysql_connect($mysql_hostname, $mysql_user, $mysql_pass) or die("Opps some thing went wrong");
//mysql_select_db($mysql_database, $db) or die("Opps some thing went wrong");

//$servername = "localhost";
//$username = "username";
//$password = "password";

//$mysqli = new mysqli("localhost","my_user","my_password","my_db");

// Create connection
$mysqli = new mysqli($mysql_hostname, $mysql_user, $mysql_pass,$mysql_database);

//$con=mysqli_connect("localhost","root","","jpninfot_db") or die(mysqli_error());
// Check connection
//if ($mysqli->connect_error) {
  //  die("Connection failed: " .$mysqli->connect_error);
//} 
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
} 
           
	    ?>  

