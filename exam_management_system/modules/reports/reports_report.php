<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Report</h1>

    <!-- Filter Form -->
    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="program">Program:</label>
                <select name="program" class="form-control">
                    <option value="">Select Program</option>
                    <?php
                    $programQuery = "SELECT DISTINCT program FROM cms_reports";
                    $programResult = $conn->query($programQuery);
                    while ($programRow = $programResult->fetch_assoc()) {
                        $selected = (isset($_GET['program']) && $_GET['program'] == $programRow['program']) ? "selected" : "";
                        echo "<option value='{$programRow['program']}' $selected>{$programRow['program']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="semester">Semester:</label>
                <select name="semester" class="form-control">
                    <option value="">Select Semester</option>
                    <?php
                    $semesterQuery = "SELECT DISTINCT semester FROM cms_reports";
                    $semesterResult = $conn->query($semesterQuery);
                    while ($semesterRow = $semesterResult->fetch_assoc()) {
                        $selected = (isset($_GET['semester']) && $_GET['semester'] == $semesterRow['semester']) ? "selected" : "";
                        echo "<option value='{$semesterRow['semester']}' $selected>{$semesterRow['semester']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-4 mt-4">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="reports_report.php" class="btn btn-secondary">Reset</a>
            </div>
        </div>
    </form>

    <!-- Report Table -->
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>College</th>
                <th>Program</th>
                <th>Semester</th>
                <th>Date</th>
                <th>Register No</th>
                <th>Student Name</th>
                <th>Student Semester</th>
                <th>CGPA</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $where = [];

            if (!empty($_GET['program'])) {
                $program = $conn->real_escape_string($_GET['program']);
                $where[] = "program = '$program'";
            }
            if (!empty($_GET['semester'])) {
                $semester = $conn->real_escape_string($_GET['semester']);
                $where[] = "semester = '$semester'";
            }

            $whereSQL = !empty($where) ? " WHERE " . implode(" AND ", $where) : "";
            $query = "SELECT * FROM cms_reports" . $whereSQL;
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['college']}</td>
                    <td>{$row['program']}</td>
                    <td>{$row['semester']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['register_no']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['student_semester']}</td>
                    <td>{$row['cgpa']}</td>
                    <td>{$row['status']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="text-center mt-4">
        <button onclick="window.print();" class="btn btn-primary">Print Report</button>
        <a href="dashboard.php" class="btn btn-info">Back</a>
    </div>
</div>
