<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Exam Subjects</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form data
        $subject_name = $_POST['subject_name'];
        $subject_code = $_POST['subject_code'];
        $course = $_POST['course'];
        $branch = $_POST['branch'];
        $year = $_POST['year'];

        // Insert query
        $query = "INSERT INTO exam_subject_table (subject_name, subject_code, course, branch, year) 
                  VALUES ('$subject_name', '$subject_code', '$course', '$branch', '$year')";

        if ($conn->query($query) === TRUE) {
            // Redirect to the subject table page after successful submission
            header("Location: exam_timetable.php");
            exit();
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="subject_name">Subject Name</label>
            <input type="text" id="subject_name" name="subject_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject_code">Subject Code</label>
            <input type="text" id="subject_code" name="subject_code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" id="course" name="course" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="branch">Branch</label>
            <input type="text" id="branch" name="branch" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" id="year" name="year" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Subject</button>
        <a href="exam_subject_table_report.php" class="btn btn-info">Report</a>
    </form>

    <div class="mt-4">
        <a href="exam_timetable.php" class="btn btn-info">Back</a>
    </div>

    
</div>

<?php 
include '../../includes/footer.php'; 
?>
<?php ob_end_flush(); ?>
