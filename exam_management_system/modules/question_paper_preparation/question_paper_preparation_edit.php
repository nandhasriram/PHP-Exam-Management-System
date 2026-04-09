<?php
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM cms_question_paper_preparation WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $collage = $_POST['collage'];
    $program_name = $_POST['program_name'];
    $semester = $_POST['semester'];
    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $register_no = $_POST['register_no'];
    $staff_name = $_POST['staff_name'];
    $phone_no = $_POST['phone_no'];
    $prepare_subject = $_POST['prepare_subject'];
    $preparation_date = $_POST['preparation_date'];
    $status = $_POST['status'];

    // Update query with the fields included
    $query = "UPDATE cms_question_paper_preparation 
              SET collage='$collage', program_name='$program_name', semester='$semester', subject='$subject', date='$date', 
                  register_no='$register_no', staff_name='$staff_name', phone_no='$phone_no', prepare_subject='$prepare_subject', 
                  preparation_date='$preparation_date', status='$status' 
              WHERE id='$id'";
    
    if ($conn->query($query) === TRUE) {
        echo '<div class="alert alert-success">Question paper preparation updated successfully</div>';
        header('Location: question_paper_preparation.php'); // Redirect to the question paper preparation page
        exit(); // Ensure the script stops executing after the redirect
    } else {
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Question Paper Preparation</h1>
    
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <div class="form-group">
            <label for="collage">Collage</label>
            <input type="text" id="collage" name="collage" class="form-control" value="<?php echo $row['collage']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="program_name">Program Name</label>
            <input type="text" id="program_name" name="program_name" class="form-control" value="<?php echo $row['program_name']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" id="semester" name="semester" class="form-control" value="<?php echo $row['semester']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control" value="<?php echo $row['subject']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" value="<?php echo $row['date']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="register_no">Register No</label>
            <input type="text" id="register_no" name="register_no" class="form-control" value="<?php echo $row['register_no']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="staff_name">Staff Name</label>
            <input type="text" id="staff_name" name="staff_name" class="form-control" value="<?php echo $row['staff_name']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="phone_no">Phone Number</label>
            <input type="text" id="phone_no" name="phone_no" class="form-control" value="<?php echo $row['phone_no']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="prepare_subject">Prepare Subject</label>
            <input type="text" id="prepare_subject" name="prepare_subject" class="form-control" value="<?php echo $row['prepare_subject']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="preparation_date">Preparation Date</label>
            <input type="date" id="preparation_date" name="preparation_date" class="form-control" value="<?php echo $row['preparation_date']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="Allocated" <?php if ($row['status'] == 'Allocated') echo 'selected'; ?>>Allocated</option>
                <option value="Not Allocated" <?php if ($row['status'] == 'Not Allocated') echo 'selected'; ?>>Not Allocated</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="question_paper_preparation.php" class="btn btn-info">Back</a>
    </form>
</div>
<?php ob_end_flush(); // End output buffering ?>
