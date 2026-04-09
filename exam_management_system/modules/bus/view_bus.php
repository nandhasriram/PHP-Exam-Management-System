<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php';
?>

<div class="container">
    <h1 class="mt-5">Bus Details</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Admission No</th>
                <th>Section</th>
                <th>Roll No</th>
                <th>Session</th>
                <th>Address</th>
                
                <th>Pickup Point</th>
                <th>Drop Point</th>
                <th>Area</th>
                <th>Bus Route</th>
                <th>Bus In-charge</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch bus details and display all data
            $query = "SELECT * FROM cms_bus";
            $result = $conn->query($query);

            // Check if the query returned results
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['id']) . "</td>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['admission_no']) . "</td>
                        <td>" . htmlspecialchars($row['section']) . "</td>
                        <td>" . htmlspecialchars($row['roll_no']) . "</td>
                        <td>" . htmlspecialchars($row['session']) . "</td>
                        <td>" . htmlspecialchars($row['address']) . "</td>
                        
                        <td>" . htmlspecialchars($row['pickup_point']) . "</td>
                        <td>" . htmlspecialchars($row['drop_point']) . "</td>
                        <td>" . htmlspecialchars($row['area']) . "</td>
                        <td>" . htmlspecialchars($row['bus_rout_no']) . "</td>
                        <td>" . htmlspecialchars($row['bus_incharge']) . "</td>
                        <td>
                            <a href='edit_bus.php?id=" . urlencode($row['id']) . "' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='bus_receipt.php?id=" . urlencode($row['id']) . "' class='btn btn-success btn-sm'>Receipt</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='19' class='text-center'>No bus details found.</td></tr>";
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
