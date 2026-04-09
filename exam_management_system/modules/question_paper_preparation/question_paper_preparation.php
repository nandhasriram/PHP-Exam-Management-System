<?php 
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Question Paper Preparation Staff Allotment</h1>

    <?php
    // Handling form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $collage = $_POST['collage'];
        $program_name = $_POST['program_name'];
        $semester = $_POST['semester'];
        $subject = $_POST['subject'];
        $date = $_POST['date'];
        $register_no = $_POST['register_no'];
        $staff_name = $_POST['staff_name'];
        $phone_no = $_POST['phone_no'];
        $prepare_subject = $_POST['prepare_subject'];
        $preparation_date = $_POST['preparation_date'];
        $status = $_POST['status'];

        // Insert query to add data to the cms_question_paper_preparation table
        $query = "INSERT INTO cms_question_paper_preparation (collage, program_name, semester, subject, date, register_no, staff_name, phone_no, prepare_subject, preparation_date, status) 
                  VALUES ('$collage', '$program_name', '$semester', '$subject', '$date', '$register_no', '$staff_name', '$phone_no', '$prepare_subject', '$preparation_date', '$status')";

        if ($conn->query($query) === TRUE) {
            // Redirect to the same page after successful insert
            header("Location: question_paper_preparation.php");
            exit();
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <!-- Form for staff allotment -->
    <form method="post">
        <div class="form-group">
            <label for="collage">Collage</label>
            <input type="text" id="collage" name="collage" class="form-control" required>
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
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="register_no">Register No</label>
            <input type="text" id="register_no" name="register_no" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="staff_name">Staff Name</label>
            <input type="text" id="staff_name" name="staff_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone_no">Phone Number</label>
            <input type="text" id="phone_no" name="phone_no" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="prepare_subject">Prepare Subject</label>
            <input type="text" id="prepare_subject" name="prepare_subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="preparation_date">Preparation Date</label>
            <input type="date" id="preparation_date" name="preparation_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="Allocated">Allocated</option>
                <option value="Not Allocated">Not Allocated</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Allocate Staff</button>

        <!-- Link to view report -->
        <div class="mt-4">
            <a href="question_paper_preparation_report.php" class="btn btn-secondary">View Report</a>
        </div>
        <div class="mt-4">
            <a href="dashboard.php" class="btn btn-info">Back</a>
        </div>
    </form>

    <!-- Table to display current preparation allocations -->
    <h2 class="mt-5">Preparation Allocations</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Collage</th>
                <th>Program Name</th>
                <th>Semester</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Register No</th>
                <th>Staff Name</th>
                <th>Phone Number</th>
                <th>Prepare Subject</th>
                <th>Preparation Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query to fetch all records from the cms_question_paper_preparation table
            $query = "SELECT * FROM cms_question_paper_preparation";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['collage']}</td>
                    <td>{$row['program_name']}</td>
                    <td>{$row['semester']}</td>
                    <td>{$row['subject']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['register_no']}</td>
                    <td>{$row['staff_name']}</td>
                    <td>{$row['phone_no']}</td>
                    <td>{$row['prepare_subject']}</td>
                    <td>{$row['preparation_date']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <a href='question_paper_preparation_edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>  
<?php ob_end_flush(); // End output buffering ?>  
