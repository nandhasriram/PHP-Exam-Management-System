<?php 
// Include header, navbar, and database connection
include('../../templates/header.php');  
include('../../config/db.php'); // Assuming $conn is initialized as a PDO instance
?>

<div class="container">
    <h1>Student Applications</h1>

    <!-- Display list of scholarship applications -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Admission No</th>
                <th>Student Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Mother Tongue</th>
                <th>Caste</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query to fetch all scholarship application details from admisapplicastuddetail table
            try {
                // Removed the extra comma before "FROM"
                $query = "SELECT id, AdmissionNo, StudentName, dobdd, dobmm, dobyy, Gender, Age, MotherTongue, Caste, PresentAddress1 FROM admisapplicastuddetail";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Check if any records exist and display them
                if (count($applications) > 0) {
                    foreach ($applications as $row) {
                        // Concatenate dob fields to form the complete date of birth
                        $dob = "{$row['dobdd']}-{$row['dobmm']}-{$row['dobyy']}";
                        
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['AdmissionNo']}</td>
                            <td>{$row['StudentName']}</td>
                            <td>{$dob}</td>
                            <td>{$row['Gender']}</td>
                            <td>{$row['Age']}</td>
                            <td>{$row['MotherTongue']}</td>
                            <td>{$row['Caste']}</td>
                            <td>{$row['PresentAddress1']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>No scholarship applications available.</td></tr>";
                }
            } catch (PDOException $e) {
                echo "<tr><td colspan='9' class='text-center text-danger'>Error: " . $e->getMessage() . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Buttons for print and back -->
    <div class="mt-4">
        <button onclick="window.print();" class="btn btn-primary">Print Record</button>
        <a href="student_info1.php" class="btn btn-secondary">Back to Applications List</a>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>
