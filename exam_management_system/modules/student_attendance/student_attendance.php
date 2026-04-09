<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Student Exam Attendance</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $collage_name = $conn->real_escape_string($_POST['collage_name']);
        $program_name = $conn->real_escape_string($_POST['program_name']);
        $semester = intval($_POST['semester']);
        $subject = $conn->real_escape_string($_POST['subject']);
        $date_of_exam = $conn->real_escape_string($_POST['date_of_exam']);
        
        // Handle multiple register numbers and student names
        $register_nos = $_POST['register_no'];
        $student_names = $_POST['student_name'];

        for ($i = 0; $i < count($register_nos); $i++) {
            $register_no = $conn->real_escape_string($register_nos[$i]);
            $student_name = $conn->real_escape_string($student_names[$i]);

            $query = "INSERT INTO cms_student_attendance (collage_name, program_name, semester, subject, date_of_exam, register_no, student_name) 
                      VALUES ('$collage_name', '$program_name', '$semester', '$subject', '$date_of_exam', '$register_no', '$student_name')";

            if (!$conn->query($query)) {
                echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
            }
        }

        // Redirect after successful insertion
        header("Location: student_attendance.php");
        exit();
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="collage_name">College Name</label>
            <input type="text" id="collage_name" name="collage_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="program_name">Program Name</label>
            <input type="text" id="program_name" name="program_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" id="semester" name="semester" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_of_exam">Date of Exam</label>
            <input type="date" id="date_of_exam" name="date_of_exam" class="form-control" required>
        </div>

        <div id="student-entries">
            <div class="student-entry">
                <div class="form-group">
                    <label>Register Number</label>
                    <input type="text" name="register_no[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="student_name[]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-danger remove-student mt-2">Remove</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary" id="add-student">Add Another Student</button>
        <button type="submit" class="btn btn-primary mt-3">Submit Attendance</button>
        
        <div class="mt-4">
            
            <a href="dashboard.php" class="btn btn-info">Back</a>
        </div>
    </form>

    
    <h2 class="mt-5">Attendance Records</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>College Name</th>
                <th>Program Name</th>
                <th>Semester</th>
                <th>Subject</th>
                <th>Date of Exam</th>
                <th>Register Number</th>
                <th>Student Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM cms_student_attendance";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['collage_name']}</td>
                    <td>{$row['program_name']}</td>
                    <td>{$row['semester']}</td>
                    <td>{$row['subject']}</td>
                    <td>{$row['date_of_exam']}</td>
                    <td>{$row['register_no']}</td>
                    <td>{$row['student_name']}</td>
                    <td>
                        <a href='student_attendance_edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    // Functionality to dynamically add and remove student entry fields
    document.getElementById('add-student').addEventListener('click', function() {
        const studentEntry = document.querySelector('.student-entry').cloneNode(true);
        studentEntry.querySelectorAll('input').forEach(input => input.value = ''); // Clear inputs
        studentEntry.querySelector('.remove-student').addEventListener('click', function() {
            studentEntry.remove();
        });
        document.getElementById('student-entries').appendChild(studentEntry);
    });

    document.querySelectorAll('.remove-student').forEach(button => {
        button.addEventListener('click', function() {
            button.parentElement.remove();
        });
    });
</script>

<?php ob_end_flush(); ?>
