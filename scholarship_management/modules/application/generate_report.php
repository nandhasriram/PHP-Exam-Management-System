<?php 
include('../../templates/header.php'); 
include('../../templates/navbar.php'); 
include('../../config/db.php'); // Assuming $conn is initialized as a PDO instance
?>

<div class="container">
    <h1>Scholarship Applications</h1>

    <!-- Display list of scholarship applications -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Scholarship Name</th>
                <th>Department</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Application Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch the scholarship applications from the database using PDO
            $query = "SELECT * FROM applications";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $applications = $stmt->fetchAll(PDO::FETCH_ASSOC); // Use fetchAll() for PDO

            // Check if any records exist and display them
            if (count($applications) > 0) {
                foreach ($applications as $row) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['student_name']}</td>
                        <td>{$row['scholarship_name']}</td>
                        <td>{$row['department']}</td>
                        <td>{$row['father_name']}</td>
                        <td>{$row['mother_name']}</td>
                        <td>{$row['application_date']}</td>
                        <td>{$row['status']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No scholarship applications available.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Buttons for print and back -->
    <div class="mt-4">
        <button onclick="window.print();" class="btn btn-primary">Print Record</button>
        <a href="list_applications.php" class="btn btn-secondary">Back to Applications List</a>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>
