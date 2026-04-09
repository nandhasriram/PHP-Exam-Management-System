<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Hall Ticket Report</h1>

    <form method="GET">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">
            </div>
            <div class="col-md-4">
                <input type="text" name="degree_branch" class="form-control" placeholder="Enter Degree Branch" value="<?php echo isset($_GET['degree_branch']) ? $_GET['degree_branch'] : ''; ?>">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="hall_ticket_report.php" class="btn btn-secondary">Reset</a>
            </div>
        </div>
    </form>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Register Number</th>
                <th>Current Semester</th>
                <th>Name</th>
                <th>Degree Branch</th>
                <th>Exam Center</th>
                <th>Subject Code</th>
                <th>Subject</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Build query with search filters
            $where = "1=1"; // Default condition to allow appending
            if (!empty($_GET['name'])) {
                $name = $conn->real_escape_string($_GET['name']);
                $where .= " AND name LIKE '%$name%'";
            }
            if (!empty($_GET['degree_branch'])) {
                $degree_branch = $conn->real_escape_string($_GET['degree_branch']);
                $where .= " AND degree_branch LIKE '%$degree_branch%'";
            }

            $query = "SELECT * FROM cms_hall_ticket WHERE $where";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['register_no']}</td>
                    <td>{$row['current_semester']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['degree_branch']}</td>
                    <td>{$row['exam_center']}</td>
                    <td>{$row['subject_code']}</td>
                    <td>{$row['subject']}</td>
                    <td>{$row['semester']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    
    <button class="btn btn-secondary mb-4" onclick="window.print()">Print Report</button>
    <a href="dashboard.php" class="btn btn-info">Back</a>
</div>
