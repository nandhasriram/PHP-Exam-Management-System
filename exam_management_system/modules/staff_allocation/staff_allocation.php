<?php 
ob_start();

    include '../../config/config.php'; 
    include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Staff Allocation for Exam Halls</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $staff_id = $_POST['staff_id'];
        $exam_id = $_POST['exam_id'];
        $staff_name = $_POST['staff_name'];
        $room_number = $_POST['room_number'];
        $subject_name = $_POST['subject_name'];

        // Insert query to allocate staff
        $query = "INSERT INTO staff_allocation (staff_id, exam_id, staff_name, room_number, subject_name) 
                  VALUES ('$staff_id', '$exam_id', '$staff_name', '$room_number', '$subject_name')";

        if ($conn->query($query) === TRUE) {
            // Display success message
            echo '<div class="alert alert-success">Staff allocated successfully</div>';

            // Redirect to staff_allocation.php after successful insertion
            header('Location: staff_allocation.php');
            exit(); // Ensure no further code is executed after redirection
        } else {
            // Display error message
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="staff_id">Staff ID</label>
            <input type="text" id="staff_id" name="staff_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="exam_id">Exam ID</label>
            <input type="text" id="exam_id" name="exam_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="staff_name">Staff Name</label>
            <input type="text" id="staff_name" name="staff_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" id="room_number" name="room_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject_name">Subject Name</label>
            <input type="text" id="subject_name" name="subject_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Allocate Staff</button>
    </form>

    <div class="mt-4">
        <a href="staff_allocation_report.php" class="btn btn-secondary">View Report</a>
    </div>
    <div class="mt-4">
            <a href="../../index.php" class="btn btn-info">Back</a>
        </div>

    <h2 class="mt-5">Staff Allocations</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Staff ID</th>
                <th>Exam ID</th>
                <th>Staff Name</th>
                <th>Room Number</th>
                <th>Subject Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all staff allocations from the database
            $query = "SELECT * FROM staff_allocation";
            $result = $conn->query($query);

            // Loop through the results and display them in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['staff_id']}</td>
                    <td>{$row['exam_id']}</td>
                    <td>{$row['staff_name']}</td>
                    <td>{$row['room_number']}</td>
                    <td>{$row['subject_name']}</td>
                    <td>
                        <a href='staff_allocation_edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='staff_allocation_delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this entry?\");'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../../includes/footer.php'; ?>
<?php ob_end_flush(); // End output buffering ?>