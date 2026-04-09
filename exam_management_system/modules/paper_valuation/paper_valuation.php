<?php 
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Paper Valuation Staff Allocation</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $staff_id = $_POST['staff_id'];
        $student_id = $_POST['student_id'];
        $exam_id = $_POST['exam_id'];
        $staff_name = $_POST['staff_name'];
        $subject_name = $_POST['subject_name']; // Added subject name field
        $marks_awarded = $_POST['marks_awarded'];
        $valuation_date = $_POST['valuation_date'];

        // Insert query with subject_name included
        $query = "INSERT INTO paper_valuation (staff_id, student_id, exam_id, staff_name, subject_name, marks_awarded, valuation_date) 
                  VALUES ('$staff_id', '$student_id', '$exam_id', '$staff_name', '$subject_name', '$marks_awarded', '$valuation_date')";

        if ($conn->query($query) === TRUE) {
            // Redirect to paper_valuation.php after successful insertion
            header('Location: paper_valuation.php');
            exit();
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <!-- Form to allocate staff for paper valuation -->
    <form method="post">
        <div class="form-group">
            <label for="staff_id">Staff ID</label>
            <input type="text" id="staff_id" name="staff_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" id="student_id" name="student_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="exam_id">Exam ID</label>
            <input type="text" id="exam_id" name="exam_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="staff_name">Staff Name</label>
            <input type="text" id="staff_name" name="staff_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject_name">Subject Name</label> <!-- Added input for subject name -->
            <input type="text" id="subject_name" name="subject_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="marks_awarded">Marks Awarded</label>
            <input type="number" id="marks_awarded" name="marks_awarded" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="valuation_date">Valuation Date</label>
            <input type="date" id="valuation_date" name="valuation_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Allocate Staff</button>
        <div class="mt-4">
            <a href="paper_valuation_report.php" class="btn btn-secondary">View Report</a>
        </div>
        <div class="mt-4">
            <a href="../../index.php" class="btn btn-info">Back</a>
        </div>
    </form>

    <!-- Table to display current valuation allocations -->
    <h2 class="mt-5">Valuation Allocations</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Staff ID</th>
                <th>Student ID</th>
                <th>Exam ID</th>
                <th>Staff Name</th>
                <th>Subject Name</th> <!-- Added subject name column -->
                <th>Marks Awarded</th>
                <th>Valuation Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query to fetch all records from paper_valuation table
            $query = "SELECT * FROM paper_valuation";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['staff_id']}</td>
                    <td>{$row['student_id']}</td>
                    <td>{$row['exam_id']}</td>
                    <td>{$row['staff_name']}</td>
                    <td>{$row['subject_name']}</td> <!-- Added subject name in table rows -->
                    <td>{$row['marks_awarded']}</td>
                    <td>{$row['valuation_date']}</td>
                    <td>
                        <a href='paper_valuation_edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../../includes/footer.php'; ?>
<?php ob_end_flush(); // End output buffering ?>