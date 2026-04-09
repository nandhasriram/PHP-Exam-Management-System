<?php
ob_start();
include '../../config/config.php';
include '../../includes/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM cms_reports WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $college = $_POST['college'];
    $program = $_POST['program'];
    $semester = $_POST['semester'];
    $date = $_POST['date'];
    $register_no = $_POST['register_no'];
    $name = $_POST['name'];
    $student_semester = $_POST['student_semester'];
    $cgpa = $_POST['cgpa'];
    $status = $_POST['status'];

    $query = "UPDATE cms_reports SET 
              college='$college', 
              program='$program', 
              semester='$semester', 
              date='$date', 
              register_no='$register_no', 
              name='$name', 
              student_semester='$student_semester', 
              cgpa='$cgpa', 
              status='$status' 
              WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo '<div class="alert alert-success">Report updated successfully</div>';
        header('Location: reports.php'); // Redirect after update
        exit();
    } else {
        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h1>Edit Report</h1>

    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-group">
            <label for="college">College</label>
            <input type="text" id="college" name="college" class="form-control" value="<?php echo $row['college']; ?>" required>
        </div>

        <div class="form-group">
            <label for="program">Program</label>
            <input type="text" id="program" name="program" class="form-control" value="<?php echo $row['program']; ?>" required>
        </div>

        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" id="semester" name="semester" class="form-control" value="<?php echo $row['semester']; ?>" required>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" value="<?php echo $row['date']; ?>" required>
        </div>

        <div class="form-group">
            <label for="register_no">Register No</label>
            <input type="text" id="register_no" name="register_no" class="form-control" value="<?php echo $row['register_no']; ?>" required>
        </div>

        <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
        </div>

        <div class="form-group">
            <label for="student_semester">Student Semester</label>
            <input type="number" id="student_semester" name="student_semester" class="form-control" value="<?php echo $row['student_semester']; ?>" required>
        </div>

        <div class="form-group">
            <label for="cgpa">CGPA</label>
            <input type="text" id="cgpa" name="cgpa" class="form-control" value="<?php echo $row['cgpa']; ?>" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="Pass" <?php if ($row['status'] == 'Pass') echo 'selected'; ?>>Pass</option>
                <option value="Fail" <?php if ($row['status'] == 'Fail') echo 'selected'; ?>>Fail</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Report</button>
        <a href="reports.php" class="btn btn-info">Back</a>
    </form>
</div>

<?php ob_end_flush(); ?>
