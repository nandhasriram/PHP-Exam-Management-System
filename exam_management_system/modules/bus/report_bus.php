<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php';
?>

<div class="container">
    <h1 class="mt-5">Submitted Bus Forms</h1>

    <!-- Search Form -->
    <form method="GET" action="" class="mb-4 no-print">
        <div class="row">
            <div class="col-md-4">
                <label for="student_name">Student Name</label>
                <input type="text" name="student_name" id="student_name" class="form-control" placeholder="Enter Student Name" value="<?php echo isset($_GET['student_name']) ? htmlspecialchars($_GET['student_name']) : ''; ?>">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">Search</button>
                <a href="report_bus_form.php" class="btn btn-secondary me-2">Reset</a>
                <button type="button" onclick="printPage()" class="btn btn-info">Print</button>
            </div>
        </div>
    </form>

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
                <th>Bus Route No</th>
                <th>Bus In-Charge</th>
                <th class='no-print'>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Initialize query
            $query = "SELECT * FROM cms_bus WHERE 1=1";

            // Add conditions for search filters
            if (!empty($_GET['student_name'])) {
                $student_name = $conn->real_escape_string($_GET['student_name']);
                $query .= " AND name LIKE '%$student_name%'";
            }

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
                        <td>" . htmlspecialchars($row['bus_rout_no']) . "</td>
                        <td>" . htmlspecialchars($row['bus_incharge']) . "</td>
                        <td class='no-print'>
                            <a href='bus_receipt.php?id=" . urlencode($row['id']) . "' class='btn btn-success btn-sm'>Receipt</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='18' class='text-center'>No submitted forms found.</td></tr>";
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
