<?php 
ob_start();

include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>No Due Certificate</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $reg_no = $_POST['reg_no'];
        $course = $_POST['course'];
        $department = $_POST['department'];
        $date = $_POST['date'];

        $query = "INSERT INTO cms_no_due (name, reg_no, course, department, date) 
                  VALUES ('$name', '$reg_no', '$course', '$department', '$date')";
        if ($conn->query($query) === TRUE) {
            // Redirect to the same page after successful insertion
            header("Location: no_due_certificate.php");
            exit();  // Ensure no further code is executed after redirection
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="reg_no">Registration Number</label>
            <input type="text" id="reg_no" name="reg_no" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" id="course" name="course" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" id="department" name="department" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Issue Certificate</button>
        <a href="no_due_certificate_report.php" class="btn btn-secondary">View Report</a>
        <div class="mt-4">
            <a href="../../index.php" class="btn btn-info">Back</a>
        </div>
    </form>

    <h2 class="mt-5">Issued Certificates</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Registration Number</th>
                <th>Course</th>
                <th>Department</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM cms_no_due";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['reg_no']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['department']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <a href='edit_no_due_certificate.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                        <a href='no_due_form.php?id={$row['id']}' class='btn btn-success'>Form</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php ob_end_flush(); // End output buffering ?> 
