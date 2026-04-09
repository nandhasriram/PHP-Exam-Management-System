<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Staff Exam Attendance Report</h1>

    <!-- Search Form -->
    <form method="POST" action="">
        <div class="row">
            <div class="col-md-4">
                <label for="program">Program</label>
                <input type="text" name="program" id="program" class="form-control" placeholder="Enter Program">
            </div>
            <div class="col-md-4">
                <label for="semester">Semester</label>
                <input type="text" name="semester" id="semester" class="form-control" placeholder="Enter Semester">
            </div>
            <div class="col-md-4">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject">
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" name="search" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Table to display attendance records -->
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>College</th>
                <th>Program</th>
                <th>Semester</th>
                <th>Subject</th>
                <th>Date of Exam</th>
                <th>Register No</th>
                <th>Staff Name</th>
                <th>Phone No</th>
                <th>Class No</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Initialize an empty condition
            $condition = "1";

            // Check if the search button is clicked
            if (isset($_POST['search'])) {
                $program = $_POST['program'];
                $semester = $_POST['semester'];
                $subject = $_POST['subject'];

                // Build the condition dynamically based on user inputs
                if (!empty($program)) {
                    $condition .= " AND program LIKE '%$program%'";
                }
                if (!empty($semester)) {
                    $condition .= " AND semester = '$semester'";
                }
                if (!empty($subject)) {
                    $condition .= " AND subject LIKE '%$subject%'";
                }
            }

            // Query to retrieve filtered records
            $query = "SELECT * FROM cms_staff_attendance WHERE $condition";
            $result = $conn->query($query);

            // Check if records exist and display them
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['collage']}</td>
                        <td>{$row['program']}</td>
                        <td>{$row['semester']}</td>
                        <td>{$row['subject']}</td>
                        <td>{$row['date_of_exam']}</td>
                        <td>{$row['register_no']}</td>
                        <td>{$row['staff_name']}</td>
                        <td>{$row['phone_no']}</td>
                        <td>{$row['class_no']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='10' class='text-center'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Print and Back buttons -->
    <button onclick="window.print()" class="btn btn-primary mt-3">Print Report</button>
    <a href="dashboard.php" class="btn btn-info">Back</a>
</div>

<?php include '../../includes/footer.php'; ?>
