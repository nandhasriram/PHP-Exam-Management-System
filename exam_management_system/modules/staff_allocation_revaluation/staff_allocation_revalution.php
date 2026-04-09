<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Staff Allocation for Revaluation</h1>

    <?php
    // Handle delete request
    if (isset($_GET['delete_id'])) {
        $delete_id = $conn->real_escape_string($_GET['delete_id']);
        $delete_query = "DELETE FROM cms_staff_allocation_revaluation WHERE id = '$delete_id'";
        
        if ($conn->query($delete_query) === TRUE) {
            echo '<div class="alert alert-success">Staff allocation deleted successfully</div>';
        } else {
            echo '<div class="alert alert-danger">Error deleting record: ' . $conn->error . '</div>';
        }
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $register_no = $conn->real_escape_string($_POST['register_no']);
        $staff_name = $conn->real_escape_string($_POST['staff_name']);
        $phone_no = $conn->real_escape_string($_POST['phone_no']);
        $subject = $conn->real_escape_string($_POST['subject']);
        $semester = $conn->real_escape_string($_POST['semester']);
        $date_of_revaluation = $conn->real_escape_string($_POST['date_of_revaluation']);
        
        $query = "INSERT INTO cms_staff_allocation_revaluation (register_no, staff_name, phone_no, subject, semester, date_of_revaluation) 
                  VALUES ('$register_no', '$staff_name', '$phone_no', '$subject', '$semester', '$date_of_revaluation')";
        
        if ($conn->query($query) === TRUE) {
            echo '<div class="alert alert-success">Staff allocated for revaluation successfully</div>';
            // Redirect to avoid duplicate submissions
            header("Location: staff_allocation_revaluation.php");
            exit();
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="register_no">Register Number</label>
            <input type="text" id="register_no" name="register_no" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="staff_name">Staff Name</label>
            <input type="text" id="staff_name" name="staff_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone_no">Phone Number</label>
            <input type="text" id="phone_no" name="phone_no" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="text" id="semester" name="semester" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_of_revaluation">Date of Revaluation</label>
            <input type="date" id="date_of_revaluation" name="date_of_revaluation" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Allocate Staff</button>
        
        <div class="mt-4">
            <a href="dashboard.php" class="btn btn-info">Back</a>
        </div>
    </form>

    <h2 class="mt-5">Revaluation Staff Allocations</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Register Number</th>
                <th>Staff Name</th>
                <th>Phone Number</th>
                <th>Subject</th>
                <th>Semester</th>
                <th>Date of Revaluation</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM cms_staff_allocation_revaluation";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['register_no']}</td>
                        <td>{$row['staff_name']}</td>
                        <td>{$row['phone_no']}</td>
                        <td>{$row['subject']}</td>
                        <td>{$row['semester']}</td>
                        <td>{$row['date_of_revaluation']}</td>
                        <td>{$row['status']}</td>
                        <td>
                            <a href='staff_allocation_revaluation_edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='?delete_id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9' class='text-center'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php ob_end_flush(); ?>
