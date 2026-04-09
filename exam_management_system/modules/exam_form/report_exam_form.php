<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php';
?>

<div class="container">
    <h1 class="mt-5">Submitted Forms</h1>

    <!-- Search Form -->
    <form method="GET" action="" class="mb-4 no-print">
        <div class="row">
            <div class="col-md-4">
                <label for="student_name">Student Name</label>
                <input type="text" name="student_name" id="student_name" class="form-control" placeholder="Enter Student Name" value="<?php echo isset($_GET['student_name']) ? htmlspecialchars($_GET['student_name']) : ''; ?>">
            </div>
            <div class="col-md-4">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="<?php echo isset($_GET['date_of_birth']) ? htmlspecialchars($_GET['date_of_birth']) : ''; ?>">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">Search</button>
                <a href="report_exam_form.php" class="btn btn-secondary me-2">Reset</a>
                <button type="button" onclick="printPage()" class="btn btn-info">Print</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Session Time</th>
                <th>College Name</th>
                <th>Center Code</th>
                <th>Register Number</th>
                <th>Student Name</th>
                <th>Date of Birth</th>
                <th>Course</th>
                <th>Medium</th>
                <th>Sex</th>
                <th>Contact Number</th>
                <th>Created At</th>
                <th class='no-print'>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Initialize query
            $query = "SELECT * FROM cms_exam_form WHERE 1=1";

            // Add conditions for search filters
            if (!empty($_GET['student_name'])) {
                $student_name = $conn->real_escape_string($_GET['student_name']);
                $query .= " AND student_name LIKE '%$student_name%'";
            }

            if (!empty($_GET['date_of_birth'])) {
                $date_of_birth = $conn->real_escape_string($_GET['date_of_birth']);
                $query .= " AND date_of_birth = '$date_of_birth'";
            }

            $result = $conn->query($query);

            // Check if the query returned results
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['id']) . "</td>
                        <td>" . htmlspecialchars($row['session_time']) . "</td>
                        <td>" . htmlspecialchars($row['college_name']) . "</td>
                        <td>" . htmlspecialchars($row['center_code']) . "</td>
                        <td>" . htmlspecialchars($row['register_number']) . "</td>
                        <td>" . htmlspecialchars($row['student_name']) . "</td>
                        <td>" . htmlspecialchars($row['date_of_birth']) . "</td>
                        <td>" . htmlspecialchars($row['course']) . "</td>
                        <td>" . htmlspecialchars($row['medium']) . "</td>
                        <td>" . htmlspecialchars($row['sex']) . "</td>
                        <td>" . htmlspecialchars($row['contact_number']) . "</td>
                        <td>" . htmlspecialchars($row['created_at']) . "</td>
                        <td class='no-print'>
                            <a href='exam_form_receipt1.php?id=" . urlencode($row['id']) . "' class='btn btn-success btn-sm'>Receipt</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='13' class='text-center'>No submitted forms found.</td></tr>";
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
