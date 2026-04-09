<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Fee Collection Report</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Department</th>
                <th>Phone Number</th>
                <th>Amount Due</th>
                <th>Amount Paid</th>
                <th>Due Date</th>
                <th>Status</th>
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
                    <td>{$row['phone_number']}</td>
                    <td>{$row['amount_due']}</td>
                    <td>{$row['amount_paid']}</td>
                    <td>{$row['due_date']}</td>
                    <td>{$row['status']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="print-button text-center mt-4">
        <button onclick="window.print();" class="btn btn-primary">Print Report</button>
        <a href="fee_collection.php" class="btn btn-info">Back</a> <!-- Added Back button -->
    </div>
</div>
