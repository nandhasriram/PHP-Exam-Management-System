<?php
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 

// Fetch the record for editing based on the ID from the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure safe input
    $query = "SELECT * FROM cms_student_attendance WHERE id='$id'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo '<div class="alert alert-danger">Record not found!</div>';
        exit();
    }
}

// Update the record when the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']); // Hidden field to track the record being edited
    $collage_name = $conn->real_escape_string($_POST['collage_name']);
    $program_name = $conn->real_escape_string($_POST['program_name']);
    $semester = intval($_POST['semester']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $date_of_exam = $conn->real_escape_string($_POST['date_of_exam']);
    $register_no = $conn->real_escape_string($_POST['register_no']);
    $student_name = $conn->real_escape_string($_POST['student_name']);
    
    // Update query to match the table structure in the screenshot
    $query = "UPDATE cms_student_attendance SET 
                collage_name='$collage_name', 
                program_name='$program_name', 
                semester='$semester', 
                subject='$subject', 
                date_of_exam='$date_of_exam', 
                register_no='$register_no', 
                student_name='$student_name'
              WHERE id='$id'";
    
    if ($conn->query($query) === TRUE) {
        echo '<div class="alert alert-success">Student attendance updated successfully</div>';
        header('Location: student_attendance.php'); // Redirect after success
        exit();
    } else {
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Student Attendance</h1>
    
    <form method="post">
        <!-- Hidden field for the record ID -->
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <!-- College Name -->
        <div class="form-group">
            <label for="collage_name">College Name</label>
            <input type="text" id="collage_name" name="collage_name" class="form-control" value="<?php echo $row['collage_name']; ?>" required>
        </div>

        <!-- Program Name -->
        <div class="form-group">
            <label for="program_name">Program Name</label>
            <input type="text" id="program_name" name="program_name" class="form-control" value="<?php echo $row['program_name']; ?>" required>
        </div>

        <!-- Semester -->
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" id="semester" name="semester" class="form-control" value="<?php echo $row['semester']; ?>" required>
        </div>

        <!-- Subject -->
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control" value="<?php echo $row['subject']; ?>" required>
        </div>

        <!-- Date of Exam -->
        <div class="form-group">
            <label for="date_of_exam">Date of Exam</label>
            <input type="date" id="date_of_exam" name="date_of_exam" class="form-control" value="<?php echo $row['date_of_exam']; ?>" required>
        </div>

        <!-- Register Number -->
        <div class="form-group">
            <label for="register_no">Register Number</label>
            <input type="text" id="register_no" name="register_no" class="form-control" value="<?php echo $row['register_no']; ?>" required>
        </div>

        <!-- Student Name -->
        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" id="student_name" name="student_name" class="form-control" value="<?php echo $row['student_name']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Attendance</button>
        <a href="student_attendance.php" class="btn btn-info">Back</a>
    </form>
</div>
<?php ob_end_flush(); // End output buffering ?>
