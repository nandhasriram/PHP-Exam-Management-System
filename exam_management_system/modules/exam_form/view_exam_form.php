<?php 
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php';
?>

<div class="container">
    <h1 class="mt-5">Submitted Forms</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Session Time</th>
                <th>College Name</th>
                <th>Center Code</th>
                <th>Register Number</th>
                <th>Student Name</th>
                <th>Date of Birth</th>
                <th>Course</th>
                <th>Medium</th>
                <th>Sex</th>
                <th>Contact Number</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch submitted exam forms and display all data
            $query = "SELECT * FROM cms_exam_form";
            $result = $conn->query($query);

            // Check if the query returned results
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['id']) . "</td>
                        <td>" . htmlspecialchars($row['session_time']) . "</td>
                        <td>" . htmlspecialchars($row['college_name']) . "</td>
                        <td>" . htmlspecialchars($row['center_code']) . "</td>
                        <td>" . htmlspecialchars($row['register_number']) . "</td>
                        <td>" . htmlspecialchars($row['student_name']) . "</td>
                        <td>" . htmlspecialchars($row['date_of_birth']) . "</td>
                        <td>" . htmlspecialchars($row['course']) . "</td>
                        <td>" . htmlspecialchars($row['medium']) . "</td>
                        <td>" . htmlspecialchars($row['sex']) . "</td>
                        <td>" . htmlspecialchars($row['contact_number']) . "</td>
                        <td>" . htmlspecialchars($row['created_at']) . "</td>
                        <td>
                            <a href='edit_exam_form.php?id=" . urlencode($row['id']) . "' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='exam_form_receipt.php?id=" . urlencode($row['id']) . "' class='btn btn-success btn-sm'>Form</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='13' class='text-center'>No submitted forms found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button type="button" onclick="window.location.href='dashboard.php';">Back</button>
</div>

<?php 
include '../../includes/footer.php'; 
ob_end_flush();
?>
