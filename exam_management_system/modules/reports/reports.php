<?php 
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Report Submission</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $college = $_POST['college'];
        $program = $_POST['program'];
        $semester = $_POST['semester'];
        $date = $_POST['date'];
        $register_no = $_POST['register_no'];
        $name = $_POST['name'];
        $student_semester = $_POST['student_semester'];
        $cgpa = $_POST['cgpa'];
        $status = $_POST['status'];

        $query = "INSERT INTO cms_reports (college, program, semester, date, register_no, name, student_semester, cgpa, status) 
                  VALUES ('$college', '$program', '$semester', '$date', '$register_no', '$name', '$student_semester', '$cgpa', '$status')";
        
        if ($conn->query($query) === TRUE) {
            header('Location: reports.php');
            exit();
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="college">College</label>
            <input type="text" id="college" name="college" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="program">Program</label>
            <input type="text" id="program" name="program" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" id="semester" name="semester" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="register_no">Register No</label>
            <input type="text" id="register_no" name="register_no" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="student_semester">Student Semester</label>
            <input type="number" id="student_semester" name="student_semester" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cgpa">CGPA</label>
            <input type="text" id="cgpa" name="cgpa" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="Pass">Pass</option>
                <option value="Fail">Fail</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit Report</button>
        
        <div class="mt-4">
            <a href="dashboard.php" class="btn btn-info">Back</a>
        </div>
    </form>

    <h2 class="mt-5">Submitted Reports</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>College</th>
                <th>Program</th>
                <th>Semester</th>
                <th>Date</th>
                <th>Register No</th>
                <th>Name</th>
                <th>Student Semester</th>
                <th>CGPA</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM cms_reports";
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
                    <td>
                        <a href='reports_edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php ob_end_flush(); ?>
