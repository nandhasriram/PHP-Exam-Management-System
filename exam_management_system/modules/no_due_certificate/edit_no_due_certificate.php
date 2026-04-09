<?php
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 

// Fetch data based on the provided `id` parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM cms_no_due WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $reg_no = $_POST['reg_no'];
    $course = $_POST['course'];
    $department = $_POST['department'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    // Update the record in the database
    $query = "UPDATE cms_no_due SET 
                name='$name', 
                reg_no='$reg_no', 
                course='$course', 
                department='$department', 
                date='$date', 
                status='$status' 
              WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo '<div class="alert alert-success">No Due record updated successfully</div>';

        // Redirect to the no_due page
        header('Location: no_due_certificate.php');
        exit(); // Ensure the script stops executing after the redirect
    } else {
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit No Due Record</h1>
    
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="reg_no">Register Number</label>
            <input type="text" id="reg_no" name="reg_no" class="form-control" value="<?php echo $row['reg_no']; ?>" required>
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" id="course" name="course" class="form-control" value="<?php echo $row['course']; ?>" required>
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" id="department" name="department" class="form-control" value="<?php echo $row['department']; ?>" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" value="<?php echo $row['date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="submitted" <?php echo ($row['status'] == 'submitted') ? 'selected' : ''; ?>>Submitted</option>
                <option value="not submitted" <?php echo ($row['status'] == 'not submitted') ? 'selected' : ''; ?>>Not Submitted</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update No Due Record</button>
        <a href="no_due_certificate.php" class="btn btn-info">Back</a>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
<?php ob_end_flush(); // End output buffering ?>
