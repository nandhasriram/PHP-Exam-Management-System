<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php';
?>

<div class="container">
    <h1 class="mt-5">Submitted Revaluation Forms</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                
                <th>Application No</th>
                <th>Campus</th>
                <th>Name</th>
                <th>Roll No</th>
                <th>Program</th>
                <th>Branch</th>
                <th>Mobile No</th>
                <th>Email</th>
                
                
                <th>Semester No</th>
                
                <th>Subject</th>
                
                
                <th>Date</th> <!-- Updated column -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch submitted revaluation forms and display all data
            $query = "SELECT * FROM cms_revaluation_form";
            $result = $conn->query($query);

            // Check if the query returned results
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        
                        <td>" . htmlspecialchars($row['application_number']) . "</td>
                        <td>" . htmlspecialchars($row['campus']) . "</td>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['roll_number']) . "</td>
                        <td>" . htmlspecialchars($row['program']) . "</td>
                        <td>" . htmlspecialchars($row['branch']) . "</td>
                        <td>" . htmlspecialchars($row['mobile_no']) . "</td>
                        <td>" . htmlspecialchars($row['email']) . "</td>
                        
                        
                        <td>" . htmlspecialchars($row['semester_no']) . "</td>
                        
                        <td>" . htmlspecialchars($row['subject_title']) . "</td>
                        
                        
                        <td>" . htmlspecialchars($row['date']) . "</td> <!-- Corrected field -->
                        <td>
                            <a href='edit_revaluation.php?id=" . urlencode($row['id']) . "' class='btn btn-primary btn-sm'>Edit</a>
                            
                            <a href='print_revaluation.php?id=" . urlencode($row['id']) . "' class='btn btn-success btn-sm'>Print</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='19' class='text-center'>No submitted revaluation forms found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button type="button" onclick="window.location.href='dashboard.php';" class="btn btn-secondary">Back</button>
</div>

<?php 
include '../../includes/footer.php'; 
ob_end_flush();
?>
