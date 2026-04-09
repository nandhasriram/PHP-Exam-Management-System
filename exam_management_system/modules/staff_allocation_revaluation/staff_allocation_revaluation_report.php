<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 

// Get selected filter values
$selected_subject = isset($_GET['subject']) ? $_GET['subject'] : '';
$selected_semester = isset($_GET['semester']) ? $_GET['semester'] : '';
?>

<!-- Add custom CSS -->
<style>
    @media print {
        /* Hide the filter form, buttons, and unnecessary elements */
        form, .btn, .mt-4 {
            display: none;
        }
        
        /* Adjust the table for better printing */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #000;
            padding: 8px;
        }
    }
</style>

<div class="container">
    <h1>Staff Allocation Report for Revaluation</h1>

    <!-- Filter Form -->
    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="subject">Subject</label>
                <select name="subject" id="subject" class="form-control">
                    <option value="">All Subjects</option>
                    <?php
                    // Fetch unique subjects from the database
                    $subject_query = "SELECT DISTINCT subject FROM cms_staff_allocation_revaluation";
                    $subject_result = $conn->query($subject_query);
                    while ($subject_row = $subject_result->fetch_assoc()) {
                        $selected = ($subject_row['subject'] == $selected_subject) ? 'selected' : '';
                        echo "<option value='{$subject_row['subject']}' $selected>{$subject_row['subject']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="semester">Semester</label>
                <select name="semester" id="semester" class="form-control">
                    <option value="">All Semesters</option>
                    <?php
                    // Fetch unique semesters from the database
                    $semester_query = "SELECT DISTINCT semester FROM cms_staff_allocation_revaluation";
                    $semester_result = $conn->query($semester_query);
                    while ($semester_row = $semester_result->fetch_assoc()) {
                        $selected = ($semester_row['semester'] == $selected_semester) ? 'selected' : '';
                        echo "<option value='{$semester_row['semester']}' $selected>{$semester_row['semester']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4 align-self-end">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="staff_allocation_revalution.php" class="btn btn-secondary">Reset</a>
            </div>
        </div>
    </form>

    <!-- Data Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Register Number</th>
                <th>Staff Name</th>
                <th>Phone Number</th>
                <th>Subject</th>
                <th>Semester</th>
                <th>Date of Revaluation</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Build the query with filters
            $query = "SELECT * FROM cms_staff_allocation_revaluation WHERE 1=1";
            if (!empty($selected_subject)) {
                $query .= " AND subject = '{$selected_subject}'";
            }
            if (!empty($selected_semester)) {
                $query .= " AND semester = '{$selected_semester}'";
            }

            $result = $conn->query($query);

            // Loop through the fetched records and display them in the table
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['register_no']}</td>
                        <td>{$row['staff_name']}</td>
                        <td>{$row['phone_no']}</td>
                        <td>{$row['subject']}</td>
                        <td>{$row['semester']}</td>
                        <td>{$row['date_of_revaluation']}</td>
                        <td>{$row['status']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
    <div class="text-center mt-4">
        <button onclick="window.print();" class="btn btn-primary">Print Report</button>
        <a href="dashboard.php" class="btn btn-info">Back</a>
    </div>
</div>

<?php include '../../includes/footer.php'; ?> 
