<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Exam Hall Staff Attendance</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $collage = $_POST['collage'];
        $program = $_POST['program'];
        $semester = $_POST['semester'];
        $subject = $_POST['subject'];
        $date_of_exam = $_POST['date_of_exam'];
        $register_no = $_POST['register_no'];
        $staff_name = $_POST['staff_name'];
        $phone_no = $_POST['phone_no'];
        $class_no = $_POST['class_no'];

        // Insert the data into the cms_staff_attendance table
        $query = "INSERT INTO cms_staff_attendance (collage, program, semester, subject, date_of_exam, register_no, staff_name, phone_no, class_no) 
                  VALUES ('$collage', '$program', '$semester', '$subject', '$date_of_exam', '$register_no', '$staff_name', '$phone_no', '$class_no')";
        
        if ($conn->query($query) === TRUE) {
            // Redirect to staff_attendance.php after successful insertion
            header('Location: staff_attendance.php');
            exit();
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <!-- Form to record attendance -->
    <form method="post">
        <!-- Collage -->
        <div class="form-group">
            <label for="collage">Collage</label>
            <input type="text" id="collage" name="collage" class="form-control" required>
        </div>

        <!-- Program -->
        <div class="form-group">
            <label for="program">Program</label>
            <input type="text" id="program" name="program" class="form-control" required>
        </div>

        <!-- Semester -->
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" id="semester" name="semester" class="form-control" required>
        </div>

        <!-- Subject -->
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control" required>
        </div>

        <!-- Date of Exam -->
        <div class="form-group">
            <label for="date_of_exam">Date of Exam</label>
            <input type="date" id="date_of_exam" name="date_of_exam" class="form-control" required>
        </div>

        <!-- Register Number -->
        <div class="form-group">
            <label for="register_no">Register Number</label>
            <input type="text" id="register_no" name="register_no" class="form-control" required>
        </div>

        <!-- Staff Name -->
        <div class="form-group">
            <label for="staff_name">Staff Name</label>
            <input type="text" id="staff_name" name="staff_name" class="form-control" required>
        </div>

        <!-- Phone Number -->
        <div class="form-group">
            <label for="phone_no">Phone Number</label>
            <input type="text" id="phone_no" name="phone_no" class="form-control" required>
        </div>

        <!-- Class Number -->
        <div class="form-group">
            <label for="class_no">Class Number</label>
            <input type="text" id="class_no" name="class_no" class="form-control" required>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Record Attendance</button>

        <!-- Links -->
        <div class="mt-4">
            <a href="staff_attendance_report.php" class="btn btn-secondary">View Report</a>
        </div>
        <div class="mt-4">
            <a href="dashboard.php" class="btn btn-info">Back</a>
        </div>
    </form>

    <!-- Display attendance records -->
    <h2 class="mt-5">Attendance Records</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Collage</th>
                <th>Program</th>
                <th>Semester</th>
                <th>Subject</th>
                <th>Date of Exam</th>
                <th>Register Number</th>
                <th>Staff Name</th>
                <th>Phone Number</th>
                <th>Class Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch and display the attendance records from the database
            $query = "SELECT * FROM cms_staff_attendance";
            $result = $conn->query($query);
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
                    <td>
                        <a href='staff_attendance_edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php ob_end_flush(); ?>
