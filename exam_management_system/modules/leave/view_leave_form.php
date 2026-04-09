<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php';
?>

<div class="container">
    <h1 class="mt-5">Leave Details</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type of Leave</th>
                
                <th>Name</th>
                <th>Roll No</th>
                <th>Program</th>
                <th>Department</th>
                
                <th>Days From</th>
                <th>Days To</th>
                
                <th>Purpose of Leave</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query to fetch leave details
            $query = "SELECT * FROM cms_leave";
            $result = $conn->query($query);

            // Check if records exist
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['id']) . "</td>
                        <td>" . htmlspecialchars($row['type_of_leave']) . "</td>
                        
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['roll_no']) . "</td>
                        <td>" . htmlspecialchars($row['program']) . "</td>
                        <td>" . htmlspecialchars($row['department']) . "</td>
                        
                        <td>" . htmlspecialchars($row['days_from']) . "</td>
                        <td>" . htmlspecialchars($row['days_to']) . "</td>
                        
                        <td>" . htmlspecialchars($row['purpose_of_leave']) . "</td>
                        <td>" . htmlspecialchars($row['address']) . "</td>
                        <td>" . htmlspecialchars($row['contact_no']) . "</td>
                        <td>" . htmlspecialchars($row['date']) . "</td>
                        <td>
                            <a href='edit_leave.php?id=" . urlencode($row['id']) . "' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='leave_receipt.php?id=" . urlencode($row['id']) . "' class='btn btn-success btn-sm'>Receipt</a>
                        </td>
                    </tr>";
                }
            } else {
                // No records fallback
                echo "<tr><td colspan='19' class='text-center'>No leave details found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button type="button" onclick="window.location.href='dashboard.php';">Back</button>
</div>

<?php 
include '../../includes/footer.php'; 
ob_end_flush();
?>
