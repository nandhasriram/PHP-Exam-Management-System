<?php 
    include '../../config/config.php'; 
    include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Room Allocation Report</h1>

    <table class="table table-bordered mt-5">
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
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="text-center mt-4">
        <button onclick="window.print();" class="btn btn-primary">Print Report</button>
        <a href="room_allocation.php" class="btn btn-info">Back</a>
    </div>
</div>
