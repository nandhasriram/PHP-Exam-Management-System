<?php
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM room_allocation WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $student_id_from = $_POST['student_id_from'];
    $student_id_to = $_POST['student_id_to'];
    $course = $_POST['course'];
    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $room_number = $_POST['room_number'];
    $building_name = $_POST['building_name'];
    $exam_date = $_POST['exam_date'];

    // Updated query to include the correct fields based on the table structure
    $query = "UPDATE room_allocation SET 
                student_id_from='$student_id_from', 
                student_id_to='$student_id_to', 
                course='$course', 
                subject_code='$subject_code', 
                subject_name='$subject_name', 
                room_number='$room_number', 
                building_name='$building_name', 
                exam_date='$exam_date' 
              WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo '<div class="alert alert-success">Room allocation updated successfully</div>';

        // Output buffering to prevent headers sent warning
        ob_start();
        header('Location: room_allocation.php'); // Redirect to the room allocation page
        ob_end_flush();
        exit(); // Ensure the script stops executing after the redirect
    } else {
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Room Allocation</h1>
    
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="student_id_from">Student ID From</label>
            <input type="text" id="student_id_from" name="student_id_from" class="form-control" value="<?php echo $row['student_id_from']; ?>" required>
        </div>
        <div class="form-group">
            <label for="student_id_to">Student ID To</label>
            <input type="text" id="student_id_to" name="student_id_to" class="form-control" value="<?php echo $row['student_id_to']; ?>" required>
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" id="course" name="course" class="form-control" value="<?php echo $row['course']; ?>" required>
        </div>
        <div class="form-group">
            <label for="subject_code">Subject Code</label>
            <input type="text" id="subject_code" name="subject_code" class="form-control" value="<?php echo $row['subject_code']; ?>" required>
        </div>
        <div class="form-group">
            <label for="subject_name">Subject Name</label>
            <input type="text" id="subject_name" name="subject_name" class="form-control" value="<?php echo $row['subject_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" id="room_number" name="room_number" class="form-control" value="<?php echo $row['room_number']; ?>" required>
        </div>
        <div class="form-group">
            <label for="building_name">Building Name</label>
            <input type="text" id="building_name" name="building_name" class="form-control" value="<?php echo $row['building_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="exam_date">Exam Date</label>
            <input type="date" id="exam_date" name="exam_date" class="form-control" value="<?php echo $row['exam_date']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Room Allocation</button>
        <a href="room_allocation.php" class="btn btn-info">Back</a>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
<?php ob_end_flush(); // End output buffering ?>
