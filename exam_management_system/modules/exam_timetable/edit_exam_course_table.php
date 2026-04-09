<?php
ob_start(); // Start output buffering to prevent header issues
include '../../config/config.php'; 
include '../../includes/header.php'; 

// Fetch the record for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM exam_course_table WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

// Handle form submission for updating the record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $course = $_POST['course'];
    $mode_of_course = $_POST['mode_of_course'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];
    $regulation = $_POST['regulation'];
    $section = $_POST['section'];

    // Update query for `exam_course_table`
    $query = "UPDATE exam_course_table 
              SET course='$course', 
                  mode_of_course='$mode_of_course', 
                  branch='$branch', 
                  semester='$semester', 
                  year='$year', 
                  regulation='$regulation', 
                  section='$section' 
              WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        // Redirect to the main course table page after successful update
        header('Location: exam_course_table.php');
        exit(); // Ensure no further code executes
    } else {
        // Display an error message if the query fails
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Course Details</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" id="course" name="course" class="form-control" value="<?php echo $row['course']; ?>" required>
        </div>

        <div class="form-group">
            <label for="mode_of_course">Mode of Course</label>
            <select id="mode_of_course" name="mode_of_course" class="form-control" required>
                <option value="Regular" <?php echo ($row['mode_of_course'] == 'Regular') ? 'selected' : ''; ?>>Regular</option>
                <option value="PartTime" <?php echo ($row['mode_of_course'] == 'PartTime') ? 'selected' : ''; ?>>PartTime</option>
                <option value="Cursus" <?php echo ($row['mode_of_course'] == 'Cursus') ? 'selected' : ''; ?>>Cursus</option>
            </select>
        </div>

        <div class="form-group">
            <label for="branch">Branch</label>
            <input type="text" id="branch" name="branch" class="form-control" value="<?php echo $row['branch']; ?>" required>
        </div>

        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" id="semester" name="semester" class="form-control" value="<?php echo $row['semester']; ?>" required>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" id="year" name="year" class="form-control" value="<?php echo $row['year']; ?>" required>
        </div>

        <div class="form-group">
            <label for="regulation">Regulation</label>
            <input type="text" id="regulation" name="regulation" class="form-control" value="<?php echo $row['regulation']; ?>" required>
        </div>

        <div class="form-group">
            <label for="section">Section</label>
            <input type="text" id="section" name="section" class="form-control" value="<?php echo $row['section']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Course</button>
        <a href="exam_course_table.php" class="btn btn-info">Back</a>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
<?php ob_end_flush(); // End output buffering ?>
