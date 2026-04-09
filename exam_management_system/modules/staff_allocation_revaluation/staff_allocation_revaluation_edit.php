<?php
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    
    // Fetch the current data for the selected record
    $query = "SELECT * FROM cms_staff_allocation_revaluation WHERE id='$id'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo '<div class="alert alert-danger">No record found with the given ID.</div>';
        exit(); // Stop script if no record is found
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $register_no = $conn->real_escape_string($_POST['register_no']);
    $staff_name = $conn->real_escape_string($_POST['staff_name']);
    $phone_no = $conn->real_escape_string($_POST['phone_no']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $semester = $conn->real_escape_string($_POST['semester']);
    $date_of_revaluation = $conn->real_escape_string($_POST['date_of_revaluation']);
    $status = $conn->real_escape_string($_POST['status']);

    // Update the record in the database
    $query = "UPDATE cms_staff_allocation_revaluation 
              SET register_no='$register_no', 
                  staff_name='$staff_name', 
                  phone_no='$phone_no', 
                  subject='$subject', 
                  semester='$semester', 
                  date_of_revaluation='$date_of_revaluation', 
                  status='$status' 
              WHERE id='$id'";
    
    if ($conn->query($query) === TRUE) {
        echo '<div class="alert alert-success">Record updated successfully</div>';
        header('Location: staff_allocation_revalution.php'); // Redirect back to the main page
        exit(); // Ensure the script stops executing after the redirect
    } else {
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Staff Allocation for Revaluation</h1>
    
    <form method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
        
        <div class="form-group">
            <label for="register_no">Register Number</label>
            <input type="text" id="register_no" name="register_no" class="form-control" value="<?php echo htmlspecialchars($row['register_no']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="staff_name">Staff Name</label>
            <input type="text" id="staff_name" name="staff_name" class="form-control" value="<?php echo htmlspecialchars($row['staff_name']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="phone_no">Phone Number</label>
            <input type="text" id="phone_no" name="phone_no" class="form-control" value="<?php echo htmlspecialchars($row['phone_no']); ?>" required>
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control" value="<?php echo htmlspecialchars($row['subject']); ?>" required>
        </div>

        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" id="semester" name="semester" class="form-control" value="<?php echo htmlspecialchars($row['semester']); ?>" required>
        </div>

        <div class="form-group">
            <label for="date_of_revaluation">Date of Revaluation</label>
            <input type="date" id="date_of_revaluation" name="date_of_revaluation" class="form-control" value="<?php echo htmlspecialchars($row['date_of_revaluation']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="Allocated" <?php if($row['status'] == 'Allocated') echo 'selected'; ?>>Allocated</option>
                <option value="Unallocated" <?php if($row['status'] == 'Unallocated') echo 'selected'; ?>>Unallocated</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Record</button>
        <a href="staff_allocation_revalution.php" class="btn btn-secondary">Back</a>
    </form>
</div>
<?php ob_end_flush(); // End output buffering ?>
