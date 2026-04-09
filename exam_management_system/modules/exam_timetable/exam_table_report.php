<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Exam Table Report</h1>
    
    <h2 class="mt-5">Exam Table Details</h2>
    <table class="table table-bordered" id="exam_table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Year</th>
                <th>Month</th>
                <th>Regulation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all data from the exam_table
            $query = "SELECT * FROM exam_table";
            $result = $conn->query($query);

            // Display each row in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['year']}</td>
                    <td>{$row['month']}</td>
                    <td>{$row['regulation']}</td>
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
        <a href="exam_table.php" class="btn btn-info">Back</a>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>

<script>
function printReport() {
    window.print();
}
</script>
