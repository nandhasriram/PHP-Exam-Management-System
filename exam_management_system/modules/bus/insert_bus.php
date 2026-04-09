<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "exam_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$admission_no = $_POST['admission_no'];
$section = $_POST['section'];
$roll_no = $_POST['roll_no'];
$session = $_POST['session'];
$address = $_POST['address'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$father_no = $_POST['father_no'];
$mother_no = $_POST['mother_no'];
$guardian_name = $_POST['guardian_name'];
$guardian_no = $_POST['guardian_no'];
$pickup_point = $_POST['pickup_point'];
$drop_point = $_POST['drop_point'];
$area = $_POST['area'];
$bus_rout_no = $_POST['bus_rout_no'];
$bus_incharge = $_POST['bus_incharge'];

// Insert query
$sql = "INSERT INTO cms_bus (name, admission_no, section, roll_no, session, address, father_name, mother_name, father_no, mother_no, guardian_name, guardian_no, pickup_point, drop_point, area, bus_rout_no, bus_incharge)
        VALUES ('$name', '$admission_no', '$section', '$roll_no', '$session', '$address', '$father_name', '$mother_name', '$father_no', '$mother_no', '$guardian_name', '$guardian_no', '$pickup_point', '$drop_point', '$area', '$bus_rout_no', '$bus_incharge')";

if ($conn->query($sql) === TRUE) {
    echo "New bus record added successfully!";
    echo '<button onclick="window.location.href=\'bus.php\';">Back to form page</button>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
