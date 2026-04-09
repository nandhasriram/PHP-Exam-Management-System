<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php';
?>

<div class="container">
    <h1 class="mt-5">Submitted Forms</h1>

    <!-- Search Form -->
    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input 
                    type="text" 
                    name="student_name" 
                    class="form-control" 
                    placeholder="Student Name" 
                    value="<?php echo isset($_GET['student_name']) ? htmlspecialchars($_GET['student_name']) : ''; ?>">
            </div>
            <div class="col-md-4">
                <input 
                    type="date" 
                    name="date_of_birth" 
                    class="form-control" 
                    value="<?php echo isset($_GET['date_of_birth']) ? htmlspecialchars($_GET['date_of_birth']) : ''; ?>">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="print_revaluation.php" class="btn btn-secondary">Reset</a>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Build the base query
            $query = "SELECT * FROM cms_exam_form WHERE 1=1";

            // Add filters if set
            if (!empty($_GET['student_name'])) {
                $student_name = $conn->real_escape_string($_GET['student_name']);
                $query .= " AND student_name LIKE '%$student_name%'";
            }
            if (!empty($_GET['date_of_birth'])) {
                $date_of_birth = $conn->real_escape_string($_GET['date_of_birth']);
                $query .= " AND date_of_birth = '$date_of_birth'";
            }

            // Execute the query
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
                        <td>
                            <a href='print_revaluation.php?id=" . urlencode($row['id']) . "' class='btn btn-success btn-sm'>Print</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='13' class='text-center'>No submitted forms found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <button type="button" onclick="window.location.href='dashboard.php';" class="btn btn-secondary mt-3">Back</button>
</div>

<?php 
include '../../includes/footer.php'; 
ob_end_flush();
?>
