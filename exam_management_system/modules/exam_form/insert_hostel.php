<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "exam_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$roll_no = $_POST['roll_no'];
$program = $_POST['program'];
$course_branch = $_POST['course_branch'];
$mobile_number = $_POST['mobile_number'];
$blood_group = $_POST['blood_group'];
$date_of_birth = $_POST['date_of_birth'];
$age = $_POST['age'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$father_number = $_POST['father_number'];
$mother_number = $_POST['mother_number'];
$guardian_name = $_POST['guardian_name'];
$address = $_POST['address'];
$amount = $_POST['amount'];
$dd_no = $_POST['dd_no'];
$bank = $_POST['bank'];


// Insert query
$sql = "INSERT INTO cms_hostel (name, roll_no, program, course_branch, mobile_number, blood_group, date_of_birth, age, father_name, mother_name, father_number, mother_number, guardian_name, address, amount, dd_no, bank)
        VALUES ('$name', '$roll_no', '$program', '$course_branch', '$mobile_number', '$blood_group', '$date_of_birth', '$age', '$father_name', '$mother_name', '$father_number', '$mother_number', '$guardian_name', '$address', '$amount', '$dd_no', '$bank')";

if ($conn->query($sql) === TRUE) {
    echo "New hostel record added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
