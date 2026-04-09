<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Student Attendance Report</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>College Name</th>
                <th>Program Name</th>
                <th>Semester</th>
                <th>Subject</th>
                <th>Date of Exam</th>
                <th>Register Number</th>
                <th>Student Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM cms_student_attendance";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['collage_name']}</td>
                    <td>{$row['program_name']}</td>
                    <td>{$row['semester']}</td>
                    <td>{$row['subject']}</td>
                    <td>{$row['date_of_exam']}</td>
                    <td>{$row['register_no']}</td>
                    <td>{$row['student_name']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="text-center mt-4">
        <button onclick="window.print();" class="btn btn-primary">Print Report</button>
        <a href="dashboard.php" class="btn btn-info">Back</a>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>  
