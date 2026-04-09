<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Exam Timetable Report</h1>
    
    <h2 class="mt-5">Timetable Report</h2>
    <table class="table table-bordered" id="timetable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject Table ID</th>
                <th>Exam Table ID</th>
                <th>Course Table ID</th>
                <th>Subject Id</th>
                
                <th>Exam Date</th>
                <th>Day</th>
                <th>Session</th>
                <th>Session Time</th>
                <th>Semester</th>
                <th>Subject Type</th>
                <th>Exam Type</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all data from the exam_time_table
            $query = "SELECT * FROM exam_time_table";
            $result = $conn->query($query);

            // Display each row in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['subject_table_id']}</td>
                    <td>{$row['exam_table_id']}</td>
                    <td>{$row['course_table_id']}</td>
                    <td>{$row['subject_id']}</td>
                    
                    <td>{$row['exam_date']}</td>
                    <td>{$row['day']}</td>
                    <td>{$row['session']}</td>
                    <td>{$row['session_time']}</td>
                    <td>{$row['semester']}</td>
                    <td>{$row['subject_type']}</td>
                    <td>{$row['exam_type']}</td>
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
        <a href="exam_timetable.php" class="btn btn-info">Back</a>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>

<script>
function printReport() {
    window.print();
}
</script>
