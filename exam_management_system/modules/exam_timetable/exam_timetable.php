<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Exam Timetable</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form data
        $subject_table_id = $_POST['subject_table_id'];
        $exam_table_id = $_POST['exam_table_id'];
        $course_table_id = $_POST['course_table_id'];
        
        
        $exam_date = $_POST['exam_date'];
        $day = $_POST['day'];
        $session = $_POST['session'];
        $session_time = $_POST['session_time'];
        $semester = $_POST['semester'];
        $subject_type = $_POST['subject_type'];
        $exam_type = $_POST['exam_type'];

        // Insert query
        $query = "INSERT INTO exam_time_table 
                  (subject_table_id, exam_table_id, course_table_id, exam_date, day, session, session_time, semester, subject_type, exam_type) 
                  VALUES 
                  ('$subject_table_id', '$exam_table_id', '$course_table_id', '$exam_date', '$day', '$session', '$session_time', '$semester', '$subject_type', '$exam_type')";

        if ($conn->query($query) === TRUE) {
            // Redirect to the timetable page after successful submission
            header("Location: exam_timetable.php");
            exit();
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <div class="mt-4">
        <a href="exam_table.php" class="btn btn-info">Add Exam</a>
        <a href="exam_course_table.php" class="btn btn-info">Add Course</a>
    </div>

    <form method="post">
        <div class="form-group">
            <label for="subject_table_id">Subject</label>
            <select id="subject_table_id" name="subject_table_id" class="form-control" required>
                <option value="">Select Subject</option>
                <?php
                $subjectQuery = "SELECT id, subject_name FROM exam_subject_table";
                $subjectResult = $conn->query($subjectQuery);
                while ($subjectRow = $subjectResult->fetch_assoc()) {
                    echo "<option value='{$subjectRow['id']}'>{$subjectRow['subject_name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="exam_table_id">Exam</label>
            <select id="exam_table_id" name="exam_table_id" class="form-control" required>
                <option value="">Select Exam</option>
                <?php
                $examQuery = "SELECT id, exam_name FROM exam_table";
                $examResult = $conn->query($examQuery);
                while ($examRow = $examResult->fetch_assoc()) {
                    echo "<option value='{$examRow['id']}'>{$examRow['exam_name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="course_table_id">Course</label>
            <select id="course_table_id" name="course_table_id" class="form-control" required>
                <option value="">Select Course</option>
                <?php
                $courseQuery = "SELECT id, course FROM exam_course_table";
                $courseResult = $conn->query($courseQuery);
                while ($courseRow = $courseResult->fetch_assoc()) {
                    echo "<option value='{$courseRow['id']}'>{$courseRow['course']}</option>";
                }
                ?>
            </select>
        </div>

        
        
        <div class="form-group">
            <label for="exam_date">Exam Date</label>
            <input type="date" id="exam_date" name="exam_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="day">Day</label>
            <input type="text" id="day" name="day" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="session">Session</label>
            <select id="session" name="session" class="form-control" required>
                <option value="FN">FN (Forenoon)</option>
                <option value="AN">AN (Afternoon)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="session_time">Session Time</label>
            <input type="time" id="session_time" name="session_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" id="semester" name="semester" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject_type">Subject Type</label>
            <input type="text" id="subject_type" name="subject_type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="exam_type">Exam Type</label>
            <input type="text" id="exam_type" name="exam_type" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Timetable</button>
        <a href="exam_timetable_report.php" class="btn btn-info">Report</a>
        <a href="../../index.php" class="btn btn-info">Back</a>
        <div class="mt-4">
           <a href="exam_subject_table.php" class="btn btn-info">Add Subject</a>
        </div>
        <div class="mt-4">
           <a href="generate_timetable.php" class="btn btn-info">Generate Timetable</a>
        </div>
    </form>

    <h2 class="mt-5">Existing Timetables</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Exam</th>
                <th>Course</th>
                
                
                <th>Exam Date</th>
                <th>Day</th>
                <th>Session</th>
                <th>Session Time</th>
                <th>Semester</th>
                <th>Subject Type</th>
                <th>Exam Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM exam_time_table";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['subject_table_id']}</td>
                    <td>{$row['exam_table_id']}</td>
                    <td>{$row['course_table_id']}</td>
                    
                    
                    <td>{$row['exam_date']}</td>
                    <td>{$row['day']}</td>
                    <td>{$row['session']}</td>
                    <td>{$row['session_time']}</td>
                    <td>{$row['semester']}</td>
                    <td>{$row['subject_type']}</td>
                    <td>{$row['exam_type']}</td>
                    <td>
                        <a href='edit_exam_timetable.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete_exam_timetable.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this entry?\");'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <h2 class="mt-5">Existing Exams</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Year</th>
                <th>Month</th>
                <th>Regulation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM exam_table";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['exam_name']}</td>
                    <td>{$row['year']}</td>
                    <td>{$row['month']}</td>
                    <td>{$row['regulation']}</td>
                    <td>
                        <a href='edit_exam_table.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete_exam_table.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this entry?\");'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <h2 class="mt-5">Existing Courses</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course</th>
                <th>Mode of Course</th>
                <th>Branch</th>
                <th>Semester</th>
                <th>Year</th>
                <th>Regulation</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM exam_course_table";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['mode_of_course']}</td>
                    <td>{$row['branch']}</td>
                    <td>{$row['semester']}</td>
                    <td>{$row['year']}</td>
                    <td>{$row['regulation']}</td>
                    <td>{$row['section']}</td>
                    <td>
                        <a href='edit_exam_course_table.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete_exam_course_table.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this entry?\");'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <h2 class="mt-5">Existing Subjects</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject Name</th>
                <th>Subject Code</th>
                <th>Course</th>
                <th>Branch</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM exam_subject_table";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['subject_name']}</td>
                    <td>{$row['subject_code']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['branch']}</td>
                    <td>{$row['year']}</td>
                    <td>
                        <a href='edit_exam_subject_table.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete_exam_subject_table.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this entry?\");'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php 
include '../../includes/footer.php'; 
?>
<?php ob_end_flush(); ?>
