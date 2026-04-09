<?php
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM staff_allocation WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $staff_id = $_POST['staff_id'];
    $exam_id = $_POST['exam_id'];
    $staff_name = $_POST['staff_name'];
    $room_number = $_POST['room_number'];
    $subject_name = $_POST['subject_name']; // Added subject_name

    // Update query including subject_name
    $query = "UPDATE staff_allocation 
              SET staff_id='$staff_id', exam_id='$exam_id', staff_name='$staff_name', room_number='$room_number', subject_name='$subject_name' 
              WHERE id='$id'";
    
    if ($conn->query($query) === TRUE) {
        echo '<div class="alert alert-success">Staff allocation updated successfully</div>';
        header('Location: staff_allocation.php'); // Redirect to the staff allocation page
        exit(); // Ensure the script stops executing after the redirect
    } else {
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Staff Allocation</h1>
    
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="staff_id">Staff ID</label>
            <input type="text" id="staff_id" name="staff_id" class="form-control" value="<?php echo $row['staff_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="exam_id">Exam ID</label>
            <input type="text" id="exam_id" name="exam_id" class="form-control" value="<?php echo $row['exam_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="staff_name">Staff Name</label>
            <input type="text" id="staff_name" name="staff_name" class="form-control" value="<?php echo $row['staff_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" id="room_number" name="room_number" class="form-control" value="<?php echo $row['room_number']; ?>" required>
        </div>
        <div class="form-group">
            <label for="subject_name">Subject Name</label> <!-- Added subject_name field -->
            <input type="text" id="subject_name" name="subject_name" class="form-control" value="<?php echo $row['subject_name']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Staff Allocation</button>
        <a href="staff_allocation.php" class="btn btn-info">Back</a>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
<?php ob_end_flush(); // End output buffering ?>