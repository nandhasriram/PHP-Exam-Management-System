<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Fee Collection</h1>

    <?php
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

        // Insert data into the database
        $query = "INSERT INTO fee_collection (student_id, student_name, class, department, academic_amount, lab_amount, sports_amount, placement_amount, due_date, status) 
                  VALUES ('$student_id', '$student_name', '$class', '$department', '$academic_amount', '$lab_amount', '$sports_amount', '$placement_amount', '$due_date', '$status')";
        if ($conn->query($query) === TRUE) {
            // Redirect to fee_collection.php after successful submission
            header("Location: fee_collection.php");
            exit(); // Ensure no further script execution after redirection
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="number" id="student_id" name="student_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" id="student_name" name="student_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="class">Class</label>
            <input type="text" id="class" name="class" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" id="department" name="department" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="academic_amount">Academic Amount</label>
            <input type="number" id="academic_amount" name="academic_amount" step="0.01" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lab_amount">Lab Amount</label>
            <input type="number" id="lab_amount" name="lab_amount" step="0.01" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="sports_amount">Sports Amount</label>
            <input type="number" id="sports_amount" name="sports_amount" step="0.01" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="placement_amount">Placement Amount</label>
            <input type="number" id="placement_amount" name="placement_amount" step="0.01" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Fee Details</button>
        <div class="mt-4">
            <a href="fee_collection_report.php" class="btn btn-secondary">Generate Report</a>
        </div>
        <div class="mt-4">
            <a href="../../index.php" class="btn btn-info">Back</a>
        </div>
    </form>

    <h2 class="mt-5">Fee Records</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Department</th>
                <th>Academic Amount</th>
                <th>Lab Amount</th>
                <th>Sports Amount</th>
                <th>Placement Amount</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM fee_collection";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['student_id']}</td>
                    <td>{$row['student_name']}</td>
                    <td>{$row['class']}</td>
                    <td>{$row['department']}</td>
                    <td>{$row['academic_amount']}</td>
                    <td>{$row['lab_amount']}</td>
                    <td>{$row['sports_amount']}</td>
                    <td>{$row['placement_amount']}</td>
                    <td>{$row['due_date']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <a href='fee_collection_edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='fee_collection_receipt.php?id={$row['id']}' class='btn btn-info btn-sm'>Receipt</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php 
include '../../includes/footer.php'; 
?>
<?php ob_end_flush(); // End output buffering ?>
