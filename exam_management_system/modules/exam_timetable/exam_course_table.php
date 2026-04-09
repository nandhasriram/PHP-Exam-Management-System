<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Exam Course Table</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form data
        $course = $_POST['course'];
        $mode_of_course = $_POST['mode_of_course'];
        $branch = $_POST['branch'];
        $semester = $_POST['semester'];
        $year = $_POST['year'];
        $regulation = $_POST['regulation'];
        $section = $_POST['section'];

        // Insert query
        $query = "INSERT INTO exam_course_table (course, mode_of_course, branch, semester, year, regulation, section) 
                  VALUES ('$course', '$mode_of_course', '$branch', '$semester', '$year', '$regulation', '$section')";

        if ($conn->query($query) === TRUE) {
            // Redirect to the same page after successful submission
            header("Location: exam_timetable.php");
            exit();
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" id="course" name="course" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mode_of_course">Mode of Course</label>
            <select id="mode_of_course" name="mode_of_course" class="form-control" required>
                <option value="Regular">Regular</option>
                <option value="PartTime">PartTime</option>
                <option value="Cursus">Cursus</option>
            </select>
        </div>
        <div class="form-group">
            <label for="branch">Branch</label>
            <input type="text" id="branch" name="branch" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" id="semester" name="semester" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" id="year" name="year" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="regulation">Regulation</label>
            <input type="text" id="regulation" name="regulation" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="section">Section</label>
            <input type="text" id="section" name="section" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Course</button>
        <a href="exam_course_table_report.php" class="btn btn-info">Report</a>
    </form>

    <div class="mt-4">
        <a href="exam_timetable.php" class="btn btn-info">Back</a>
    </div>

    
</div>

<?php 
include '../../includes/footer.php'; 
?>
<?php ob_end_flush(); ?>
