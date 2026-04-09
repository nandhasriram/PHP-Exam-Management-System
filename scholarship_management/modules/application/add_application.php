<?php
session_start();
ob_start();  // Start output buffering
include '../../config/db.php';
include '../../templates/header.php';
include '../../templates/navbar.php';

// Initialize a variable to store the message
$message = '';

// Check if the URL contains a 'success' query parameter
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    $message = '<div class="message-box success">Application record added successfully. <a href="list_applications.php">Go Back</a></div>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve posted data
    $student_id = $_POST['student_id'];
    $scholarship_id = $_POST['scholarship_id'];
    $student_name = $_POST['student_name'];
    $department = $_POST['department'];
    $cast = $_POST['cast'];
    $father_name = $_POST['father_name'];
    $father_occupation = $_POST['father_occupation'];
    $mother_name = $_POST['mother_name'];
    $mother_occupation = $_POST['mother_occupation'];
    $scholarship_name = $_POST['scholarship_name'];
    $application_date = $_POST['application_date'];
    $status = $_POST['status'];

    // Insert query to add an application (without 'id' since it's AUTO_INCREMENT)
    $query = "INSERT INTO applications 
              (student_id, scholarship_id, student_name, department, cast, father_name, father_occupation, mother_name, mother_occupation, scholarship_name, application_date, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Execute the query and check for success
    if ($stmt->execute([$student_id, $scholarship_id, $student_name, $department, $cast, $father_name, $father_occupation, $mother_name, $mother_occupation, $scholarship_name, $application_date, $status])) {
        // Redirect to the same page with a success flag in the URL
        header('Location: ../../dashboard.php?success=true');
        exit();  // Stop further execution after the redirect
    } else {
        $message = '<div class="message-box error">Failed to add application record. Please try again.</div>';
    }
}
?>

<div class="container">
    <h2>Add Scholarship Application</h2>

    <!-- Display the message if it's set -->
    <?php if ($message) echo $message; ?>

    <form method="POST" action="add_application.php">
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="number" class="form-control" id="student_id" name="student_id" required>
        </div>
        <div class="form-group">
            <label for="scholarship_id">Scholarship ID</label>
            <input type="number" class="form-control" id="scholarship_id" name="scholarship_id" required>
        </div>
        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" class="form-control" id="student_name" name="student_name" required>
        </div>
        <div class="form-group">
            <label for="scholarship_name">Scholarship Name</label>
            <input type="text" class="form-control" id="scholarship_name" name="scholarship_name" required>
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>
        <div class="form-group">
            <label for="cast">Cast</label>
            <input type="text" class="form-control" id="cast" name="cast" required>
        </div>
        <div class="form-group">
            <label for="father_name">Father's Name</label>
            <input type="text" class="form-control" id="father_name" name="father_name" required>
        </div>
        <div class="form-group">
            <label for="father_occupation">Father's Occupation</label>
            <input type="text" class="form-control" id="father_occupation" name="father_occupation" required>
        </div>
        <div class="form-group">
            <label for="mother_name">Mother's Name</label>
            <input type="text" class="form-control" id="mother_name" name="mother_name" required>
        </div>
        <div class="form-group">
            <label for="mother_occupation">Mother's Occupation</label>
            <input type="text" class="form-control" id="mother_occupation" name="mother_occupation" required>
        </div>
        
        <div class="form-group">
            <label for="application_date">Application Date</label>
            <input type="date" class="form-control" id="application_date" name="application_date" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="Pending">Pending</option>
                <option value="Approved">Approved</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Application</button>
    </form>

    <!-- Back Button -->
    <a href="../../dashboard.php" class="btn btn-secondary mt-3">Back</a>
</div>

<?php 
include '../../templates/footer.php'; 
ob_end_flush();  // Flush the output buffer
?> 
