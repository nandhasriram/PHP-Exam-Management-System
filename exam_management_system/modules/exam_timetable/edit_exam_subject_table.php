<?php
ob_start(); // Start output buffering
include '../../config/config.php'; 
include '../../includes/header.php'; 

// Fetch the record for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM exam_subject_table WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

// Handle form submission for updating the record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
    $course = $_POST['course'];
    $branch = $_POST['branch'];
    $year = $_POST['year'];

    // Update query for `exam_subject_table`
    $query = "UPDATE exam_subject_table 
              SET subject_name='$subject_name', 
                  subject_code='$subject_code', 
                  course='$course', 
                  branch='$branch', 
                  year='$year' 
              WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        // Redirect to the main subject table page after a successful update
        header('Location: exam_subject_table.php');
        exit();
    } else {
        // Display an error message if the query fails
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Subject Details</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-group">
            <label for="subject_name">Subject Name</label>
            <input type="text" id="subject_name" name="subject_name" class="form-control" value="<?php echo $row['subject_name']; ?>" required>
        </div>

        <div class="form-group">
            <label for="subject_code">Subject Code</label>
            <input type="text" id="subject_code" name="subject_code" class="form-control" value="<?php echo $row['subject_code']; ?>" required>
        </div>

        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" id="course" name="course" class="form-control" value="<?php echo $row['course']; ?>" required>
        </div>

        <div class="form-group">
            <label for="branch">Branch</label>
            <input type="text" id="branch" name="branch" class="form-control" value="<?php echo $row['branch']; ?>" required>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" id="year" name="year" class="form-control" value="<?php echo $row['year']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Subject</button>
        <a href="exam_subject_table.php" class="btn btn-info">Back</a>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
<?php ob_end_flush(); // End output buffering ?>
