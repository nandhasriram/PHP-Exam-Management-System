<?php
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch the record from the database based on the given ID
    $query = "SELECT * FROM cms_staff_attendance WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $collage = $_POST['collage'];
    $program = $_POST['program'];
    $semester = $_POST['semester'];
    $subject = $_POST['subject'];
    $date_of_exam = $_POST['date_of_exam'];
    $register_no = $_POST['register_no'];
    $staff_name = $_POST['staff_name'];
    $phone_no = $_POST['phone_no'];
    $class_no = $_POST['class_no'];

    // Update query to modify the staff attendance data
    $query = "UPDATE cms_staff_attendance 
              SET collage='$collage', program='$program', semester='$semester', subject='$subject', 
                  date_of_exam='$date_of_exam', register_no='$register_no', staff_name='$staff_name', 
                  phone_no='$phone_no', class_no='$class_no' 
              WHERE id='$id'";
    
    if ($conn->query($query) === TRUE) {
        // Success message and redirect to staff_attendance.php
        echo '<div class="alert alert-success">Staff attendance updated successfully</div>';
        header('Location: staff_attendance.php'); // Redirect after update
        exit(); // Ensure the script stops executing after the redirect
    } else {
        // Error message if the query fails
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Staff Attendance</h1>
    
    <form method="post">
        <!-- Hidden input to hold the ID of the record -->
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <!-- Collage -->
        <div class="form-group">
            <label for="collage">Collage</label>
            <input type="text" id="collage" name="collage" class="form-control" value="<?php echo $row['collage']; ?>" required>
        </div>

        <!-- Program -->
        <div class="form-group">
            <label for="program">Program</label>
            <input type="text" id="program" name="program" class="form-control" value="<?php echo $row['program']; ?>" required>
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
        
        <!-- Staff Name -->
        <div class="form-group">
            <label for="staff_name">Staff Name</label>
            <input type="text" id="staff_name" name="staff_name" class="form-control" value="<?php echo $row['staff_name']; ?>" required>
        </div>
        
        <!-- Phone Number -->
        <div class="form-group">
            <label for="phone_no">Phone Number</label>
            <input type="text" id="phone_no" name="phone_no" class="form-control" value="<?php echo $row['phone_no']; ?>" required>
        </div>
        
        <!-- Class Number -->
        <div class="form-group">
            <label for="class_no">Class Number</label>
            <input type="text" id="class_no" name="class_no" class="form-control" value="<?php echo $row['class_no']; ?>" required>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Staff Attendance</button>
        <a href="staff_attendance.php" class="btn btn-info">Back</a>
    </form>
</div>
<?php ob_end_flush(); // End output buffering ?>
