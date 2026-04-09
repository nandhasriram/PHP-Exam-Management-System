<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<div class="container">
    <h1>Hall Ticket Generation</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $register_no = $conn->real_escape_string($_POST['register_no']);
        $current_semester = $conn->real_escape_string($_POST['current_semester']);
        $name = $conn->real_escape_string($_POST['name']);
        $degree_branch = $conn->real_escape_string($_POST['degree_branch']);
        $exam_center = $conn->real_escape_string($_POST['exam_center']);

        // Insert hall ticket details
        if (!empty($_POST['subject_code']) && is_array($_POST['subject_code'])) {
            $subject_codes = $_POST['subject_code'];
            $subjects = $_POST['subject'];
            $semesters = $_POST['semester'];

            for ($i = 0; $i < count($subject_codes); $i++) {
                $subject_code = $conn->real_escape_string($subject_codes[$i]);
                $subject = $conn->real_escape_string($subjects[$i]);
                $semester = $conn->real_escape_string($semesters[$i]);

                $query = "INSERT INTO cms_hall_ticket (register_no, current_semester, name, degree_branch, exam_center, subject_code, subject, semester) 
                          VALUES ('$register_no', '$current_semester', '$name', '$degree_branch', '$exam_center', '$subject_code', '$subject', '$semester')";

                if (!$conn->query($query)) {
                    echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
                }
            }

            // Redirect to hall_ticket.php after successful generation
            header("Location: hall_ticket.php");
            exit();
        } else {
            echo '<div class="alert alert-danger">Please add at least one subject.</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="register_no">Register Number</label>
            <input type="text" id="register_no" name="register_no" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="current_semester">Current Semester</label>
            <input type="text" id="current_semester" name="current_semester" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="degree_branch">Degree & Branch</label>
            <input type="text" id="degree_branch" name="degree_branch" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="exam_center">Exam Center</label>
            <input type="text" id="exam_center" name="exam_center" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="subjects">Subjects</label>
            <div id="subject-list">
                <div class="input-group mb-2">
                    <input type="text" name="subject_code[]" class="form-control" placeholder="Enter subject code" required>
                    <input type="text" name="subject[]" class="form-control" placeholder="Enter subject name" required>
                    <input type="text" name="semester[]" class="form-control" placeholder="Enter semester" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-success add-subject">Add</button>
                    </div>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Generate Ticket</button>
        
        <div class="mt-4">
            <a href="dashboard.php" class="btn btn-info">Back</a>
        </div>
    </form>

    <h2 class="mt-5">Generated Hall Tickets</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Register Number</th>
                <th>Semester</th>
                <th>Student Name</th>
                <th>Degree & Branch</th>
                <th>Exam Center</th>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM cms_hall_ticket";
            $result = $conn->query($query);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['register_no']}</td>
                        <td>{$row['current_semester']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['degree_branch']}</td>
                        <td>{$row['exam_center']}</td>
                        <td>{$row['subject_code']}</td>
                        <td>{$row['subject']}</td>
                        <td>{$row['semester']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No hall tickets generated yet.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('add-subject')) {
            const subjectList = document.getElementById('subject-list');
            const newInputGroup = document.createElement('div');
            newInputGroup.classList.add('input-group', 'mb-2');
            newInputGroup.innerHTML = `
                <input type="text" name="subject_code[]" class="form-control" placeholder="Enter subject code" required>
                <input type="text" name="subject[]" class="form-control" placeholder="Enter subject name" required>
                <input type="text" name="semester[]" class="form-control" placeholder="Enter semester" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-subject">Remove</button>
                </div>
            `;
            subjectList.appendChild(newInputGroup);
        }

        if (event.target.classList.contains('remove-subject')) {
            event.target.closest('.input-group').remove();
        }
    });
</script>

<?php 
include '../../includes/footer.php'; 
ob_end_flush(); // End output buffering
?>
