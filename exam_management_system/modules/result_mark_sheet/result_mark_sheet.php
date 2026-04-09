<?php 
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Result Mark Sheet</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $date_of_birth = $_POST['date_of_birth'];
        $gender = $_POST['gender'];
        $date_of_exam = $_POST['date_of_exam'];
        $college = $_POST['college'];
        $program_branch = $_POST['program_branch'];
        $regulation = $_POST['regulation'];
        $semester_no = $_POST['semester_no'];
        $course_code = $_POST['course_code'];
        $course_title = $_POST['course_title'];
        $credits = $_POST['credits'];
        $grade = $_POST['grade'];
        $grade_point = $_POST['grade_point'];
        $result = $_POST['result'];

        // Insert query with fields from the screenshot
        $query = "INSERT INTO cms_result (name, date_of_birth, gender, date_of_exam, college, program_branch, regulation, semester_no, course_code, course_title, credits, grade, grade_point, result) 
                  VALUES ('$name', '$date_of_birth', '$gender', '$date_of_exam', '$college', '$program_branch', '$regulation', '$semester_no', '$course_code', '$course_title', '$credits', '$grade', '$grade_point', '$result')";
        if ($conn->query($query) === TRUE) {
            // After successful insertion, redirect to result_mark_sheet.php
            header("Location: result_mark_sheet.php");
            exit(); // Stop further script execution
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date_of_exam">Date of Exam</label>
            <input type="date" id="date_of_exam" name="date_of_exam" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="college">College</label>
            <input type="text" id="college" name="college" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="program_branch">Program/Branch</label>
            <input type="text" id="program_branch" name="program_branch" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="regulation">Regulation</label>
            <input type="text" id="regulation" name="regulation" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="semester_no">Semester No</label>
            <input type="number" id="semester_no" name="semester_no" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="course_code">Course Code</label>
            <input type="text" id="course_code" name="course_code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="course_title">Course Title</label>
            <input type="text" id="course_title" name="course_title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="credits">Credits</label>
            <input type="text" id="credits" name="credits" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="grade">Grade</label>
            <select id="grade" name="grade" class="form-control" required>
                <option value="O">O</option>
                <option value="A+">A+</option>
                <option value="A">A</option>
                <option value="B+">B+</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="U">U</option>
            </select>
        </div>
        <div class="form-group">
            <label for="grade_point">Grade Point</label>
            <input type="text" id="grade_point" name="grade_point" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="result">Result</label>
            <select id="result" name="result" class="form-control" required>
                <option value="Pass">Pass</option>
                <option value="Fail">Fail</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Generate Mark Sheet</button>
        <div class="mt-4">
            <a href="result_mark_sheet_report.php" class="btn btn-secondary">View Report</a>
        </div>
        <div class="mt-4">
            <a href="dashboard.php" class="btn btn-info">Back</a>
        </div>
    </form>

    <h2 class="mt-5">Mark Sheets</h2>
    <table class="table table-bordered">
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM cms_result";
            $result = $conn->query($query);
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
                    <td>
                        <a href='result_mark_sheet_edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php ob_end_flush(); // End output buffering ?>
