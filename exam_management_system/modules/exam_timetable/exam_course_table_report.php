<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Exam Course Table Report</h1>
    
    <h2 class="mt-5">Exam Course Details</h2>
    <table class="table table-bordered" id="exam_course_table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course</th>
                <th>Mode of Course</th>
                <th>Branch</th>
                <th>Semester</th>
                <th>Year</th>
                <th>Regulation</th>
                <th>Section</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all data from the exam_course_table
            $query = "SELECT * FROM exam_course_table";
            $result = $conn->query($query);

            // Display each row in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['mode_of_course']}</td>
                    <td>{$row['branch']}</td>
                    <td>{$row['semester']}</td>
                    <td>{$row['year']}</td>
                    <td>{$row['regulation']}</td>
                    <td>{$row['section']}</td>
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
        <a href="exam_course_table.php" class="btn btn-info">Back</a>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>

<script>
function printReport() {
    window.print();
}
</script>
