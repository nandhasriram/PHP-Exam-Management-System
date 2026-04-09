<?php 
ob_start(); // Start output buffering

include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Room Allocation for Exams</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $student_id_from = $_POST['student_id_from'];
        $student_id_to = $_POST['student_id_to'];
        $course = $_POST['course'];
        $subject_code = $_POST['subject_code'];
        $subject_name = $_POST['subject_name'];
        $room_number = $_POST['room_number'];
        $building_name = $_POST['building_name'];
        $exam_date = $_POST['exam_date'];
        
        // Updated query to match the new fields in room_allocation table
        $query = "INSERT INTO room_allocation (student_id_from, student_id_to, course, subject_code, subject_name, room_number, building_name, exam_date) 
                  VALUES ('$student_id_from', '$student_id_to', '$course', '$subject_code', '$subject_name', '$room_number', '$building_name', '$exam_date')";

        if ($conn->query($query) === TRUE) {
            echo '<div class="alert alert-success">Room allocated successfully</div>';
            header('Location: room_allocation.php'); // Redirect to room_allocation.php after successful insertion
            exit(); // Make sure to stop further script execution after redirection
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="student_id_from">Student ID From</label>
            <input type="text" id="student_id_from" name="student_id_from" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="student_id_to">Student ID To</label>
            <input type="text" id="student_id_to" name="student_id_to" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" id="course" name="course" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject_code">Subject Code</label>
            <input type="text" id="subject_code" name="subject_code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject_name">Subject Name</label>
            <input type="text" id="subject_name" name="subject_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" id="room_number" name="room_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="building_name">Building Name</label>
            <input type="text" id="building_name" name="building_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="exam_date">Exam Date</label>
            <input type="date" id="exam_date" name="exam_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Allocate Room</button>
        <div class="mt-4">
            <a href="room_allocation_report.php" class="btn btn-secondary">View Report</a>
        </div>
        <div class="mt-4">
            <a href="../../index.php" class="btn btn-info">Back</a>
        </div>
    </form>

    <h2 class="mt-5">Room Allocations</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student ID From</th>
                <th>Student ID To</th>
                <th>Course</th>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Room Number</th>
                <th>Building Name</th>
                <th>Exam Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM room_allocation";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['student_id_from']}</td>
                    <td>{$row['student_id_to']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['subject_code']}</td>
                    <td>{$row['subject_name']}</td>
                    <td>{$row['room_number']}</td>
                    <td>{$row['building_name']}</td>
                    <td>{$row['exam_date']}</td>
                    <td>
                        <a href='room_allocation_edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='room_allocation_delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this entry?\");'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../../includes/footer.php'; ?>
<?php ob_end_flush(); // End output buffering ?>  
