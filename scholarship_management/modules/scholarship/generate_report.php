<?php 
include('../../templates/header.php'); 
include('../../templates/navbar.php'); 
include('../../config/db.php'); // Assuming $conn is initialized as a PDO instance
?>

<div class="container">
    <h1>Scholarships</h1>

    <!-- Display list of scholarships -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Scholarship ID</th>
                <th>Scholarship Name</th>
                <th>Description</th>
                <th>Eligibility Criteria</th>
                <th>Amount</th>
                <th>Deadline</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch the scholarships from the database using PDO
            $query = "SELECT * FROM scholarships";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $scholarships = $stmt->fetchAll(PDO::FETCH_ASSOC); // Use fetchAll() for PDO

            // Check if any records exist and display them
            if (count($scholarships) > 0) {
                foreach ($scholarships as $row) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['scholarship_id']}</td>
                        <td>{$row['scholarship_name']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['eligibility_criteria']}</td>
                        <td>{$row['amount']}</td>
                        <td>{$row['deadline']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>No scholarships available.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Buttons for print and back -->
    <div class="mt-4">
        <button onclick="window.print();" class="btn btn-primary">Print Record</button>
        <a href="list_scholarships.php" class="btn btn-secondary">Back to Scholarships List</a>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>
