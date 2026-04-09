<?php
ob_start(); // Start output buffering to prevent header issues
include '../../config/config.php'; 
include '../../includes/header.php'; 

// Fetch the record for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM exam_table WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

// Handle form submission for updating the record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $exam_name = $_POST['exam_name'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $regulation = $_POST['regulation'];

    // Update query for `exam_table`
    $query = "UPDATE exam_table 
              SET exam_name='$exam_name', 
                  year='$year', 
                  month='$month', 
                  regulation='$regulation' 
              WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        // Redirect to the main exam table page after successful update
        header('Location: exam_table.php');
        exit(); // Ensure no further code executes
    } else {
        // Display an error message if the query fails
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Exam Details</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-group">
            <label for="exam_name">Exam Name</label>
            <input type="text" id="exam_name" name="exam_name" class="form-control" value="<?php echo $row['exam_name']; ?>" required>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" id="year" name="year" class="form-control" value="<?php echo $row['year']; ?>" required>
        </div>

        <div class="form-group">
            <label for="month">Month</label>
            <input type="text" id="month" name="month" class="form-control" value="<?php echo $row['month']; ?>" required>
        </div>

        <div class="form-group">
            <label for="regulation">Regulation</label>
            <input type="text" id="regulation" name="regulation" class="form-control" value="<?php echo $row['regulation']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Exam</button>
        <a href="exam_table.php" class="btn btn-info">Back</a>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
<?php ob_end_flush(); // End output buffering ?>
