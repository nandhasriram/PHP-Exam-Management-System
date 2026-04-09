<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Result Mark Sheet Report</h1>

    <!-- Search Form -->
    <form method="POST" action="">
        <div class="row">
            <div class="col-md-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
            </div>
            <div class="col-md-3">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="program_branch">Program/Branch</label>
                <input type="text" name="program_branch" id="program_branch" class="form-control" placeholder="Enter Program/Branch">
            </div>
            <div class="col-md-3">
                <label for="regulation">Regulation</label>
                <input type="text" name="regulation" id="regulation" class="form-control" placeholder="Enter Regulation">
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" name="search" class="btn btn-primary">Search</button>
        </div>
    </form>

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Date of Exam</th>
                <th>College</th>
                <th>Program/Branch</th>
                <th>Regulation</th>
                <th>Semester No</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Credits</th>
                <th>Grade</th>
                <th>Grade Point</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Initialize an empty SQL condition
            $condition = "1";

            // Check if the search button is clicked
            if (isset($_POST['search'])) {
                $name = $_POST['name'];
                $date_of_birth = $_POST['date_of_birth'];
                $program_branch = $_POST['program_branch'];
                $regulation = $_POST['regulation'];

                // Build the condition based on input values
                if (!empty($name)) {
                    $condition .= " AND name LIKE '%$name%'";
                }
                if (!empty($date_of_birth)) {
                    $condition .= " AND date_of_birth = '$date_of_birth'";
                }
                if (!empty($program_branch)) {
                    $condition .= " AND program_branch LIKE '%$program_branch%'";
                }
                if (!empty($regulation)) {
                    $condition .= " AND regulation LIKE '%$regulation%'";
                }
            }

            // Query to fetch filtered records
            $query = "SELECT * FROM cms_result WHERE $condition";
            $result = $conn->query($query);

            // Check if records exist
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['date_of_birth']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['date_of_exam']}</td>
                        <td>{$row['college']}</td>
                        <td>{$row['program_branch']}</td>
                        <td>{$row['regulation']}</td>
                        <td>{$row['semester_no']}</td>
                        <td>{$row['course_code']}</td>
                        <td>{$row['course_title']}</td>
                        <td>{$row['credits']}</td>
                        <td>{$row['grade']}</td>
                        <td>{$row['grade_point']}</td>
                        <td>{$row['result']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='15' class='text-center'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="text-center mt-4">
        <button onclick="window.print();" class="btn btn-primary">Print Report</button>
        <a href="dashboard.php" class="btn btn-info">Back</a>
    </div>
</div>
