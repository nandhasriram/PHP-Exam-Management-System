<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Exam Subject Table Report</h1>
    
    <h2 class="mt-5">Exam Subject Details</h2>
    <table class="table table-bordered" id="exam_subject_table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject Name</th>
                <th>Subject Code</th>
                <th>Course</th>
                <th>Branch</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all data from the exam_subject_table
            $query = "SELECT * FROM exam_subject_table";
            $result = $conn->query($query);

            // Display each row in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['subject_name']}</td>
                    <td>{$row['subject_code']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['branch']}</td>
                    <td>{$row['year']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Add Print Button -->
    <div class="mt-4">
        <button class="btn btn-primary" onclick="printReport()">Print Report</button>
    </div>
    <div class="mt-4">
        <a href="exam_subject_table.php" class="btn btn-info">Back</a>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>

<script>
function printReport() {
    window.print();
}
</script>
