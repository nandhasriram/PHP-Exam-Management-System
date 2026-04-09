<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Paper Valuation Report</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Staff ID</th>
                <th>Student ID</th>
                <th>Exam ID</th>
                <th>Staff Name</th>
                <th>Subject Name</th> <!-- Added Subject Name -->
                <th>Marks Awarded</th>
                <th>Valuation Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM paper_valuation";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['staff_id']}</td>
                    <td>{$row['student_id']}</td>
                    <td>{$row['exam_id']}</td>
                    <td>{$row['staff_name']}</td>
                    <td>{$row['subject_name']}</td> <!-- Display Subject Name -->
                    <td>{$row['marks_awarded']}</td>
                    <td>{$row['valuation_date']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Add a Print button -->
    <button onclick="window.print()" class="btn btn-primary mt-3">Print Report</button>
    <a href="paper_valuation.php" class="btn btn-info">Back</a>
</div>

<?php include '../../includes/footer.php'; ?> 
