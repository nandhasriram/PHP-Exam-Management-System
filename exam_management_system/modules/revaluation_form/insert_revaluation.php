<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "exam_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve constant form data
$application_number = $_POST['application_number'];
$campus = $_POST['campus'];
$name = $_POST['name'];
$roll_number = $_POST['roll_number'];
$program = $_POST['program'];
$branch = $_POST['branch'];
$mobile_no = $_POST['mobile_no'];
$email = $_POST['email'];
$mode = $_POST['mode'];
$challan_date = $_POST['challan_date'];
$bank_details = $_POST['bank_details'];
$amount = $_POST['amount'];
$date = $_POST['date'];

// Handle arrays for multiple rows
$sl_no = $_POST['sl_no']; // Array
$semester_no = $_POST['semester_no']; // Array
$subject_code = $_POST['subject_code']; // Array
$subject_title = $_POST['subject_title']; // Array
$regular_arrear = $_POST['regular_arrear']; // Array

// Prepare for multiple insertions
if (is_array($sl_no)) { 
    for ($i = 0; $i < count($sl_no); $i++) {
        // Escape user inputs to prevent SQL Injection
        $sl_no_clean = $conn->real_escape_string($sl_no[$i]);
        $semester_no_clean = $conn->real_escape_string($semester_no[$i]);
        $subject_code_clean = $conn->real_escape_string($subject_code[$i]);
        $subject_title_clean = $conn->real_escape_string($subject_title[$i]);
        $regular_arrear_clean = $conn->real_escape_string($regular_arrear[$i]);

        // Insert each row into the database
        $sql = "INSERT INTO cms_revaluation_form (application_number, campus, name, roll_number, program, branch, mobile_no, email, mode, sl_no, semester_no, subject_code, subject_title, regular_arrear, challan_date, bank_details, amount, date)
                VALUES ('$application_number', '$campus', '$name', '$roll_number', '$program', '$branch', '$mobile_no', '$email', '$mode', '$sl_no_clean', '$semester_no_clean', '$subject_code_clean', '$subject_title_clean', '$regular_arrear_clean', '$challan_date', '$bank_details', '$amount', '$date')";

        // Execute query for each row
        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    echo "Revaluation form submitted successfully";
} else {
    echo "No valid entries found!";
}

// Close connection
$conn->close();
?>
