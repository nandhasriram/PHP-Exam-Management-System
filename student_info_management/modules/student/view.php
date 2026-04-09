<?php 
// Include header, navbar, and database connection
include('../../templates/header.php');  
include('../../config/db.php'); // Assuming $conn is initialized as a PDO instance
?>

<div class="container">
    <h1>Student Details</h1>

    <?php
    try {
        // Query to fetch all student details from the table
        $query = "SELECT 
                    Id, 
                    AdmissionNo, 
                    Date, 
                    StudentName, 
                    RollNumber, 
                    Community, 
                    Class, 
                    GroupSection, 
                    DateofAdmission, 
                    DateofBirth 
                  FROM classbscseccsstuddetail";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if records exist
        if (count($students) > 0) {
            foreach ($students as $row) {
                // Extract Group and Section from GroupSection column
                $groupSection = explode("/", $row['GroupSection']);
                $group = isset($groupSection[0]) ? htmlspecialchars($groupSection[0]) : 'N/A';
                $section = isset($groupSection[1]) ? htmlspecialchars($groupSection[1]) : 'N/A';

                // Display student details in separate rows
                echo '<table class="table table-bordered table-striped">';
                echo '<tbody>';
                echo '<tr><th>ID</th><td>' . htmlspecialchars($row['Id']) . '</td></tr>';
                echo '<tr><th>Admission No</th><td>' . htmlspecialchars($row['AdmissionNo']) . '</td></tr>';
                echo '<tr><th>Date</th><td>' . htmlspecialchars($row['Date']) . '</td></tr>';
                echo '<tr><th>Student Name</th><td>' . htmlspecialchars($row['StudentName']) . '</td></tr>';
                echo '<tr><th>Roll Number</th><td>' . htmlspecialchars($row['RollNumber']) . '</td></tr>';
                echo '<tr><th>Community</th><td>' . htmlspecialchars($row['Community']) . '</td></tr>';
                echo '<tr><th>Class</th><td>' . htmlspecialchars($row['Class']) . '</td></tr>';
                echo '<tr><th>Group</th><td>' . $group . '</td></tr>';
                echo '<tr><th>Section</th><td>' . $section . '</td></tr>';
                echo '<tr><th>Date of Admission</th><td>' . htmlspecialchars($row['DateofAdmission']) . '</td></tr>';
                echo '<tr><th>Date of Birth</th><td>' . htmlspecialchars($row['DateofBirth']) . '</td></tr>';
                echo '</tbody>';
                echo '</table>';
                echo '<hr>'; // Add a horizontal line between each student's details
            }
        } else {
            echo '<div class="alert alert-info text-center">No student records available.</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger text-center">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
    ?>

    <!-- Buttons for print and back -->
    <div class="mt-4">
        <button onclick="window.print();" class="btn btn-primary">Print Records</button>
        <a href="student_info1.php" class="btn btn-secondary">Back to List</a>
    </div>
</div>

<?php include('../../templates/footer.php'); ?>
