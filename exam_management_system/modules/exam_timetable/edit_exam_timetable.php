<?php
ob_start(); // Start output buffering to prevent header issues
include '../../config/config.php'; 
include '../../includes/header.php'; 

// Fetch the record for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM exam_time_table WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

// Handle form submission for updating the record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
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

    // Update query to include all fields from the table
    $query = "UPDATE exam_time_table 
              SET subject_table_id='$subject_table_id', 
                  exam_table_id='$exam_table_id', 
                  course_table_id='$course_table_id', 
                   
                  exam_date='$exam_date', 
                  day='$day', 
                  session='$session', 
                  session_time='$session_time', 
                  semester='$semester', 
                  subject_type='$subject_type', 
                  exam_type='$exam_type' 
              WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        // Redirect to the timetable page after successful update
        header('Location: exam_timetable.php');
        exit(); // Ensure no further code executes
    } else {
        // Display an error message if the query fails
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Exam Timetable</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-group">
            <label for="subject_table_id">Subject Table</label>
            <select id="subject_table_id" name="subject_table_id" class="form-control" required>
                <option value="">Select Subject</option>
                <?php
                $subjectQuery = "SELECT id, subject_name FROM exam_subject_table";
                $subjectResult = $conn->query($subjectQuery);
                while ($subjectRow = $subjectResult->fetch_assoc()) {
                    $selected = ($row['subject_table_id'] == $subjectRow['id']) ? 'selected' : '';
                    echo "<option value='{$subjectRow['id']}' $selected>{$subjectRow['subject_name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="exam_table_id">Exam Table</label>
            <select id="exam_table_id" name="exam_table_id" class="form-control" required>
                <option value="">Select Exam</option>
                <?php
                $examQuery = "SELECT id, exam_name FROM exam_table";
                $examResult = $conn->query($examQuery);
                while ($examRow = $examResult->fetch_assoc()) {
                    $selected = ($row['exam_table_id'] == $examRow['id']) ? 'selected' : '';
                    echo "<option value='{$examRow['id']}' $selected>{$examRow['exam_name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="course_table_id">Course Table</label>
            <select id="course_table_id" name="course_table_id" class="form-control" required>
                <option value="">Select Course</option>
                <?php
                $courseQuery = "SELECT id, course FROM exam_course_table";
                $courseResult = $conn->query($courseQuery);
                while ($courseRow = $courseResult->fetch_assoc()) {
                    $selected = ($row['course_table_id'] == $courseRow['id']) ? 'selected' : '';
                    echo "<option value='{$courseRow['id']}' $selected>{$courseRow['course']}</option>";
                }
                ?>
            </select>
        </div>

        

        <div class="form-group">
            <label for="exam_date">Exam Date</label>
            <input type="date" id="exam_date" name="exam_date" class="form-control" value="<?php echo $row['exam_date']; ?>" required>
        </div>

        <div class="form-group">
            <label for="day">Day</label>
            <input type="text" id="day" name="day" class="form-control" value="<?php echo $row['day']; ?>" required>
        </div>

        <div class="form-group">
            <label for="session">Session</label>
            <select id="session" name="session" class="form-control" required>
                <option value="FN" <?php echo ($row['session'] == 'FN') ? 'selected' : ''; ?>>FN (Forenoon)</option>
                <option value="AN" <?php echo ($row['session'] == 'AN') ? 'selected' : ''; ?>>AN (Afternoon)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="session_time">Session Time</label>
            <input type="time" id="session_time" name="session_time" class="form-control" value="<?php echo $row['session_time']; ?>" required>
        </div>

        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="text" id="semester" name="semester" class="form-control" value="<?php echo $row['semester']; ?>" required>
        </div>

        <div class="form-group">
            <label for="subject_type">Subject Type</label>
            <input type="text" id="subject_type" name="subject_type" class="form-control" value="<?php echo $row['subject_type']; ?>" required>
        </div>

        <div class="form-group">
            <label for="exam_type">Exam Type</label>
            <input type="text" id="exam_type" name="exam_type" class="form-control" value="<?php echo $row['exam_type']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Timetable</button>
        <a href="exam_timetable.php" class="btn btn-info">Back</a>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
<?php ob_end_flush(); // End output buffering ?>
