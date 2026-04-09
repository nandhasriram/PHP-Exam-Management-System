<?php
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 

// Fetch the record based on ID from the GET request
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM cms_result WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

// Handle the form submission to update the record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
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

    // Update query to modify the cms_result table
    $query = "UPDATE cms_result 
              SET name='$name', date_of_birth='$date_of_birth', gender='$gender', 
                  date_of_exam='$date_of_exam', college='$college', 
                  program_branch='$program_branch', regulation='$regulation', 
                  semester_no='$semester_no', course_code='$course_code', 
                  course_title='$course_title', credits='$credits', grade='$grade', 
                  grade_point='$grade_point', result='$result'
              WHERE id='$id'";
    
    if ($conn->query($query) === TRUE) {
        echo '<div class="alert alert-success">Result updated successfully</div>';
        header('Location: result_mark_sheet.php'); // Redirect to the result page
        exit(); // Ensure the script stops executing after the redirect
    } else {
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Result</h1>
    
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="<?php echo $row['date_of_birth']; ?>" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="form-control" required>
                <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="date_of_exam">Date of Exam</label>
            <input type="date" id="date_of_exam" name="date_of_exam" class="form-control" value="<?php echo $row['date_of_exam']; ?>" required>
        </div>

        <div class="form-group">
            <label for="college">College</label>
            <input type="text" id="college" name="college" class="form-control" value="<?php echo $row['college']; ?>" required>
        </div>

        <div class="form-group">
            <label for="program_branch">Program Branch</label>
            <input type="text" id="program_branch" name="program_branch" class="form-control" value="<?php echo $row['program_branch']; ?>" required>
        </div>

        <div class="form-group">
            <label for="regulation">Regulation</label>
            <input type="text" id="regulation" name="regulation" class="form-control" value="<?php echo $row['regulation']; ?>" required>
        </div>

        <div class="form-group">
            <label for="semester_no">Semester No</label>
            <input type="number" id="semester_no" name="semester_no" class="form-control" value="<?php echo $row['semester_no']; ?>" required>
        </div>

        <div class="form-group">
            <label for="course_code">Course Code</label>
            <input type="text" id="course_code" name="course_code" class="form-control" value="<?php echo $row['course_code']; ?>" required>
        </div>

        <div class="form-group">
            <label for="course_title">Course Title</label>
            <input type="text" id="course_title" name="course_title" class="form-control" value="<?php echo $row['course_title']; ?>" required>
        </div>

        <div class="form-group">
            <label for="credits">Credits</label>
            <input type="text" id="credits" name="credits" class="form-control" value="<?php echo $row['credits']; ?>" required>
        </div>

        <div class="form-group">
            <label for="grade">Grade</label>
            <select id="grade" name="grade" class="form-control" required>
                <option value="O" <?php if ($row['grade'] == 'O') echo 'selected'; ?>>O</option>
                <option value="A+" <?php if ($row['grade'] == 'A+') echo 'selected'; ?>>A+</option>
                <option value="A" <?php if ($row['grade'] == 'A') echo 'selected'; ?>>A</option>
                <option value="B+" <?php if ($row['grade'] == 'B+') echo 'selected'; ?>>B+</option>
                <option value="B" <?php if ($row['grade'] == 'B') echo 'selected'; ?>>B</option>
                <option value="C" <?php if ($row['grade'] == 'C') echo 'selected'; ?>>C</option>
                <option value="D" <?php if ($row['grade'] == 'D') echo 'selected'; ?>>D</option>
                <option value="U" <?php if ($row['grade'] == 'U') echo 'selected'; ?>>U</option>
            </select>
        </div>

        <div class="form-group">
            <label for="grade_point">Grade Point</label>
            <input type="text" id="grade_point" name="grade_point" class="form-control" value="<?php echo $row['grade_point']; ?>" required>
        </div>

        <div class="form-group">
            <label for="result">Result</label>
            <select id="result" name="result" class="form-control" required>
                <option value="Pass" <?php if ($row['result'] == 'Pass') echo 'selected'; ?>>Pass</option>
                <option value="Fail" <?php if ($row['result'] == 'Fail') echo 'selected'; ?>>Fail</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Result</button>
        <a href="cms_result.php" class="btn btn-info">Back</a>
    </form>
</div>
<?php ob_end_flush(); // End output buffering ?>
