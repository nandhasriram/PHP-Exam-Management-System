<?php 
// Start output buffering to prevent "headers already sent" issue
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Edit Fee Details</h1>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM fee_collection WHERE id = $id";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo '<div class="alert alert-danger">No record found.</div>';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $student_id = $_POST['student_id'];
        $student_name = $_POST['student_name'];
        $class = $_POST['class'];
        $department = $_POST['department'];
        $academic_amount = $_POST['academic_amount'];
        $lab_amount = $_POST['lab_amount'];
        $sports_amount = $_POST['sports_amount'];
        $placement_amount = $_POST['placement_amount'];
        $due_date = $_POST['due_date'];
        $status = $_POST['status'];

        // Update the SQL query without any comments inside
        $query = "UPDATE fee_collection 
                  SET student_id = '$student_id', 
                      student_name = '$student_name', 
                      class = '$class', 
                      department = '$department', 
                      academic_amount = '$academic_amount', 
                      lab_amount = '$lab_amount', 
                      sports_amount = '$sports_amount', 
                      placement_amount = '$placement_amount', 
                      due_date = '$due_date', 
                      status = '$status' 
                  WHERE id = $id";

        if ($conn->query($query) === TRUE) {
            echo '<div class="alert alert-success">Fee details updated successfully</div>';
            // Redirect to fee_collection.php after successful update
            header("Location: fee_collection.php");
            exit(); // Ensure no further code is executed after redirection
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" id="student_id" name="student_id" class="form-control" value="<?php echo $row['student_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" id="student_name" name="student_name" class="form-control" value="<?php echo $row['student_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="class">Class</label>
            <input type="text" id="class" name="class" class="form-control" value="<?php echo $row['class']; ?>" required>
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" id="department" name="department" class="form-control" value="<?php echo $row['department']; ?>" required>
        </div>
        <div class="form-group">
            <label for="academic_amount">Academic Amount</label>
            <input type="number" id="academic_amount" name="academic_amount" step="0.01" class="form-control" value="<?php echo $row['academic_amount']; ?>" required>
        </div>
        <div class="form-group">
            <label for="lab_amount">Lab Amount</label>
            <input type="number" id="lab_amount" name="lab_amount" step="0.01" class="form-control" value="<?php echo $row['lab_amount']; ?>" required>
        </div>
        <div class="form-group">
            <label for="sports_amount">Sports Amount</label>
            <input type="number" id="sports_amount" name="sports_amount" step="0.01" class="form-control" value="<?php echo $row['sports_amount']; ?>" required>
        </div>
        <div class="form-group">
            <label for="placement_amount">Placement Amount</label>
            <input type="number" id="placement_amount" name="placement_amount" step="0.01" class="form-control" value="<?php echo $row['placement_amount']; ?>" required>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" class="form-control" value="<?php echo $row['due_date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="Paid" <?php if ($row['status'] == 'Paid') echo 'selected'; ?>>Paid</option>
                <option value="Unpaid" <?php if ($row['status'] == 'Unpaid') echo 'selected'; ?>>Unpaid</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Fee Details</button>
        <div class="mt-4">
            <a href="fee_collection.php" class="btn btn-info">Back</a> <!-- Added Back button -->
        </div>
    </form>
</div>

<?php 
include '../../includes/footer.php'; 
// Flush the output buffer and send the headers
ob_end_flush();
?>
