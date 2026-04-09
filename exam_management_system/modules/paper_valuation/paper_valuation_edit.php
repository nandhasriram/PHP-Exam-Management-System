<?php
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM paper_valuation WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $staff_id = $_POST['staff_id'];
    $student_id = $_POST['student_id'];
    $exam_id = $_POST['exam_id'];
    $staff_name = $_POST['staff_name'];
    $subject_name = $_POST['subject_name']; // Added field for subject_name
    $marks_awarded = $_POST['marks_awarded'];
    $valuation_date = $_POST['valuation_date'];
    
    $query = "UPDATE paper_valuation SET 
        staff_id='$staff_id', 
        student_id='$student_id', 
        exam_id='$exam_id', 
        staff_name='$staff_name',
        subject_name='$subject_name',  /* Added subject_name to the query */
        marks_awarded='$marks_awarded', 
        valuation_date='$valuation_date' 
        WHERE id='$id'";
    
    if ($conn->query($query) === TRUE) {
        echo '<div class="alert alert-success">Paper valuation updated successfully</div>';
        header('Location: paper_valuation.php'); // Redirect to the paper valuation page
        exit(); // Ensure the script stops executing after the redirect
    } else {
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Paper Valuation</h1>
    
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="staff_id">Staff ID</label>
            <input type="text" id="staff_id" name="staff_id" class="form-control" value="<?php echo $row['staff_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" id="student_id" name="student_id" class="form-control" value="<?php echo $row['student_id']; ?>" required>
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
            <label for="subject_name">Subject Name</label> <!-- Added input for subject_name -->
            <input type="text" id="subject_name" name="subject_name" class="form-control" value="<?php echo $row['subject_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="marks_awarded">Marks Awarded</label>
            <input type="text" id="marks_awarded" name="marks_awarded" class="form-control" value="<?php echo $row['marks_awarded']; ?>" required>
        </div>
        <div class="form-group">
            <label for="valuation_date">Valuation Date</label>
            <input type="date" id="valuation_date" name="valuation_date" class="form-control" value="<?php echo $row['valuation_date']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Paper Valuation</button>
        <a href="paper_valuation.php" class="btn btn-info">Back</a>
    </form>
</div>
<?php ob_end_flush(); // End output buffering ?>