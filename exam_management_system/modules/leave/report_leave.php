<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php';
?>

<div class="container">
    <h1 class="mt-5">Submitted Leave Forms</h1>

    <!-- Search Form -->
    <form method="GET" action="" class="mb-4 no-print">
        <div class="row">
            <div class="col-md-4">
                <label for="name">Student Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Student Name" value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>">
            </div>
            <div class="col-md-4">
                <label for="roll_no">Roll Number</label>
                <input type="text" name="roll_no" id="roll_no" class="form-control" placeholder="Enter Roll Number" value="<?php echo isset($_GET['roll_no']) ? htmlspecialchars($_GET['roll_no']) : ''; ?>">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">Search</button>
                <a href="report_leave.php" class="btn btn-secondary me-2">Reset</a>
                <button type="button" onclick="printPage()" class="btn btn-info">Print</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type of Leave</th>
                
                <th>Name</th>
                <th>Roll Number</th>
                <th>Program</th>
                <th>Department</th>
                <th>Hostel Address</th>
                <th>Hall Number</th>
                <th>Days From</th>
                <th>Days To</th>
                <th>Purpose of Leave</th>
                <th>Contact Number</th>
                
                <th class='no-print'>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Initialize query
            $query = "SELECT * FROM cms_leave WHERE 1=1";

            // Add conditions for search filters
            if (!empty($_GET['name'])) {
                $name = $conn->real_escape_string($_GET['name']);
                $query .= " AND name LIKE '%$name%'";
            }

            if (!empty($_GET['roll_no'])) {
                $roll_no = $conn->real_escape_string($_GET['roll_no']);
                $query .= " AND roll_no LIKE '%$roll_no%'";
            }

            $result = $conn->query($query);

            // Check if the query returned results
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['id']) . "</td>
                        <td>" . htmlspecialchars($row['type_of_leave']) . "</td>
                        
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['roll_no']) . "</td>
                        <td>" . htmlspecialchars($row['program']) . "</td>
                        <td>" . htmlspecialchars($row['department']) . "</td>
                        <td>" . htmlspecialchars($row['hostel_address']) . "</td>
                        <td>" . htmlspecialchars($row['hall_no']) . "</td>
                        <td>" . htmlspecialchars($row['days_from']) . "</td>
                        <td>" . htmlspecialchars($row['days_to']) . "</td>
                        <td>" . htmlspecialchars($row['purpose_of_leave']) . "</td>
                        <td>" . htmlspecialchars($row['contact_no']) . "</td>
                        
                        <td class='no-print'>
                            <a href='leave_receipt.php?id=" . urlencode($row['id']) . "' class='btn btn-success btn-sm'>Receipt</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='16' class='text-center'>No submitted leave forms found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button type="button" onclick="window.location.href='dashboard.php';" class="btn btn-secondary mt-3 no-print">Back</button>
</div>

<!-- CSS to Hide Elements During Print -->
<style>
    @media print {
        .no-print, .no-print * {
            display: none !important;
        }
    }
</style>

<!-- JavaScript for Print Functionality -->
<script>
    function printPage() {
        window.print();
    }
</script>

<?php 
include '../../includes/footer.php'; 
ob_end_flush();
?>
