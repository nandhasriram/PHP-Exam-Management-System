<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Staff Allocation Report</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Staff ID</th>
                <th>Exam ID</th>
                <th>Staff Name</th>
                <th>Room Number</th>
                <th>Subject Name</th> <!-- Added Subject Name column -->
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM staff_allocation";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['staff_id']}</td>
                    <td>{$row['exam_id']}</td>
                    <td>{$row['staff_name']}</td>
                    <td>{$row['room_number']}</td>
                    <td>{$row['subject_name']}</td> <!-- Added Subject Name to the table rows -->
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="text-center mt-4">
        <button onclick="window.print();" class="btn btn-primary">Print Report</button>
        <a href="staff_allocation.php" class="btn btn-info">Back</a>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>
