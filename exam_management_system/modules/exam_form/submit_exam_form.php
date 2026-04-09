<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "exam_management");

// Check connection
if ($conn->connect_error) {
    die("<h1>Connection failed:</h1> " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect student details
    $session_time = $_POST['session_time'] ?? "Not Selected";
    $college_name = htmlspecialchars($_POST['college_name']);
    $center_code = htmlspecialchars($_POST['center_code']);
    $register_number = htmlspecialchars($_POST['register_number']);
    $admission_year = htmlspecialchars($_POST['admission_year']);
    $student_name = htmlspecialchars($_POST['student_name']);
    $father_name = htmlspecialchars($_POST['father_name']);
    $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
    $course = htmlspecialchars($_POST['course']);
    $medium = isset($_POST['medium']) ? implode(", ", (array)$_POST['medium']) : "Not Selected";
    $sex = $_POST['sex'] ?? "Not Selected";
    $community = isset($_POST['community']) ? implode(", ", (array)$_POST['community']) : "Not Selected";
    $temporary_address = htmlspecialchars($_POST['temporary_address']);
    $permanent_address = htmlspecialchars($_POST['permanent_address']);
    $pin_code = htmlspecialchars($_POST['pin_code']);
    $contact_number = htmlspecialchars($_POST['contact_number']);
    $bank_name = htmlspecialchars($_POST['bank_name']);
    $d_d_number = htmlspecialchars($_POST['d_d_number']);
    $d_d_date = htmlspecialchars($_POST['d_d_date']);
    $amount = htmlspecialchars($_POST['amount']);

    // Prepare and execute student insert query
    $stmt = $conn->prepare("INSERT INTO cms_exam_form 
        (session_time, college_name, center_code, register_number, admission_year, student_name, father_name, 
         date_of_birth, course, medium, sex, community, temporary_address, permanent_address, pin_code, 
         contact_number, bank_name, d_d_number, d_d_date, amount) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssssssssssssssss", $session_time, $college_name, $center_code, $register_number,
        $admission_year, $student_name, $father_name, $date_of_birth, $course, $medium, $sex, $community,
        $temporary_address, $permanent_address, $pin_code, $contact_number, $bank_name, $d_d_number, 
        $d_d_date, $amount);

    if ($stmt->execute()) {
        $id = $stmt->insert_id; // Get last inserted student ID
        $stmt->close();

        // Insert subjects data
        if (isset($_POST['semester'], $_POST['subject_code'], $_POST['subject'])) {
            $semesters = $_POST['semester'];
            $subject_codes = $_POST['subject_code'];
            $subjects = $_POST['subject'];

            $subject_stmt = $conn->prepare("INSERT INTO cms_exam_subjects (id, semester, subject_code, subject) VALUES (?, ?, ?, ?)");

            for ($i = 0; $i < count($semesters); $i++) {
                if (!empty($subject_codes[$i]) && !empty($subjects[$i])) {
                    $semester = htmlspecialchars($semesters[$i]);
                    $subject_code = htmlspecialchars($subject_codes[$i]);
                    $subject = htmlspecialchars($subjects[$i]);

                    $subject_stmt->bind_param("isss", $id, $semester, $subject_code, $subject);
                    $subject_stmt->execute();
                }
            }
            $subject_stmt->close();
        }

        echo "<script>alert('Form Submitted Successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<h1>Error Submitting the Form</h1><p>Error: " . $conn->error . "</p>";
    }
    
    $conn->close();
} else {
    echo "<h1>Access Denied</h1><p>You must submit the form to access this page.</p>";
}
?>
