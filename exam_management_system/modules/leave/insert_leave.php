<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "exam_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$type_of_leave = $_POST['type_of_leave'];
$available_leave = $_POST['available_leave'];
$balance_leave = $_POST['balance_leave'];
$name = $_POST['name'];
$roll_no = $_POST['roll_no'];
$program = $_POST['program'];
$department = $_POST['department'];
$hostel_address = $_POST['hostel_address'];
$hall_no = $_POST['hall_no'];
$days_from = $_POST['days_from'];
$days_to = $_POST['days_to'];
$prefix_date = $_POST['prefix_date'];
$suffix_date = $_POST['suffix_date'];
$purpose_of_leave = $_POST['purpose_of_leave'];
$address = $_POST['address'];
$contact_no = $_POST['contact_no'];
$date = $_POST['date'];

// Insert query
$sql = "INSERT INTO cms_leave (type_of_leave, available_leave, balance_leave, name, roll_no, program, department, hostel_address, hall_no, days_from, days_to, prefix_date, suffix_date, purpose_of_leave, address, contact_no, date)
        VALUES ('$type_of_leave', '$available_leave', '$balance_leave', '$name', '$roll_no', '$program', '$department', '$hostel_address', '$hall_no', '$days_from', '$days_to', '$prefix_date', '$suffix_date', '$purpose_of_leave', '$address', '$contact_no', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "New leave application record added successfully!";
    echo '<button onclick="window.location.href=\'leave.php\';">Back to Form Page</button>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
