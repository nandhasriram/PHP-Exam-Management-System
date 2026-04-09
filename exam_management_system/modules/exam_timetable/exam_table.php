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
        $exam_name = $_POST['exam_name'];
        $year = $_POST['year'];
        $month = $_POST['month'];
        $regulation = $_POST['regulation'];

        // Insert query
        $query = "INSERT INTO exam_table (exam_name, year, month, regulation) 
                  VALUES ('$exam_name', '$year', '$month', '$regulation')";

        if ($conn->query($query) === TRUE) {
            // Redirect to the timetable page after successful submission
            header("Location: exam_timetable.php");
            exit();
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="exam_name">Exam Name</label>
            <input type="text" id="exam_name" name="exam_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" id="year" name="year" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="month">Month</label>
            <input type="text" id="month" name="month" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="regulation">Regulation</label>
            <input type="text" id="regulation" name="regulation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Exam</button>
        <a href="exam_table_report.php" class="btn btn-info">Report</a>
    </form>

    <div class="mt-4">
        <a href="exam_timetable.php" class="btn btn-info">Back</a>
    </div>

    
</div>

<?php 
include '../../includes/footer.php'; 
?>
<?php ob_end_flush(); ?>
