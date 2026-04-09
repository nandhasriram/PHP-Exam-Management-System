<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php';
?>

<div class="container">
    <h1 class="mt-5">Report Revaluation Forms</h1>

    <!-- Search Form -->
    <form method="GET" action="" class="mb-3">
        <div class="form-group">
            <label for="roll_number">Search by Roll Number:</label>
            <input type="text" name="roll_number" id="roll_number" class="form-control" placeholder="Enter Roll Number" value="<?php echo htmlspecialchars($_GET['roll_number'] ?? ''); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="report_revaluation.php" class="btn btn-secondary">Reset</a>
    </form>

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
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Initialize query
            $query = "SELECT * FROM cms_revaluation_form";

            // Check if roll number is provided
            if (!empty($_GET['roll_number'])) {
                $roll_number = $conn->real_escape_string($_GET['roll_number']);
                $query .= " WHERE roll_number = '$roll_number'";
            }

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
                        <td>" . htmlspecialchars($row['date']) . "</td>
                        <td>
                            <a href='print_revaluation.php?id=" . urlencode($row['id']) . "' class='btn btn-success btn-sm'>Print</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='12' class='text-center'>No submitted revaluation forms found.</td></tr>";
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
