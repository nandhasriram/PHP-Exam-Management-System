<?php
include '../../config/config.php'; // Adjust the path as per your project structure
include '../../includes/header.php';

// Initialize variables for search filters
$name = $month = $year = $course = $branch = "";
$result_general = null;
$result_general1 = null;
$result_related = null;

// Handle search form submission
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Retrieve search parameters
    $name = $_GET['name'] ?? "";
    $month = $_GET['month'] ?? "";
    $year = $_GET['year'] ?? "";
    $course = $_GET['course'] ?? "";
    $branch = $_GET['branch'] ?? "";

    // Query for general exam data (Table 1)
    $query_general = "SELECT id, exam_name, year, month, regulation FROM exam_table WHERE 1";
    $params_general = [];

    if (!empty($name)) {
        $query_general .= " AND exam_name LIKE ?";
        $params_general[] = "%$name%";
    }
    if (!empty($month)) {
        $query_general .= " AND month = ?";
        $params_general[] = $month;
    }
    if (!empty($year)) {
        $query_general .= " AND year = ?";
        $params_general[] = $year;
    }

    $stmt_general = $conn->prepare($query_general);
    if ($stmt_general) {
        if (!empty($params_general)) {
            $stmt_general->bind_param(str_repeat('s', count($params_general)), ...$params_general);
        }
        $stmt_general->execute();
        $result_general = $stmt_general->get_result();
    } else {
        error_log("Error preparing statement for general exam data: " . $conn->error);
    }

    // Query for course data (Table 2)
    $query_general1 = "SELECT id, course, mode_of_course, branch, semester, year, regulation, section FROM exam_course_table WHERE 1";
    $params_general1 = [];

    if (!empty($course)) {
        $query_general1 .= " AND course LIKE ?";
        $params_general1[] = "%$course%";
    }
    if (!empty($branch)) {
        $query_general1 .= " AND branch = ?";
        $params_general1[] = $branch;
    }

    $stmt_general1 = $conn->prepare($query_general1);
    if ($stmt_general1) {
        if (!empty($params_general1)) {
            $stmt_general1->bind_param(str_repeat('s', count($params_general1)), ...$params_general1);
        }
        $stmt_general1->execute();
        $result_general1 = $stmt_general1->get_result();
    } else {
        error_log("Error preparing statement for course data: " . $conn->error);
    }

    // Query for related timetable data (Table 3)
    if (isset($_GET['selected_id']) && !empty($_GET['selected_id'])) {
        $selected_id = intval($_GET['selected_id']); // Ensure it is an integer
        $query_related = "SELECT id, subject_table_id, exam_table_id, course_table_id, semester, exam_date, 
                                 day, session, session_time, subject_type, exam_type 
                          FROM exam_timetable 
                          WHERE exam_id = ?";
        $stmt_related = $conn->prepare($query_related);
        if ($stmt_related) {
            $stmt_related->bind_param('i', $selected_id); // Use an integer binding for `exam_id`
            $stmt_related->execute();
            $result_related = $stmt_related->get_result();
        } else {
            error_log("Error preparing statement for related timetable data: " . $conn->error);
        }
    }
}
?>

<div class="container">
    <h1>Generate Exam Timetable</h1>

    <!-- Search Form -->
    <form method="get" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="name">Exam Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" placeholder="Enter exam name">
            </div>
            <div class="col-md-3">
                <label for="month">Month</label>
                <select id="month" name="month" class="form-control">
                    <option value="">Select Month</option>
                    <?php
                    $months = [
                        'January', 'February', 'March', 'April', 'May', 'June',
                        'July', 'August', 'September', 'October', 'November', 'December'
                    ];
                    foreach ($months as $monthName) {
                        $selected = ($month == $monthName) ? 'selected' : '';
                        echo "<option value='$monthName' $selected>$monthName</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="year">Year</label>
                <select id="year" name="year" class="form-control">
                    <option value="">Select Year</option>
                    <?php
                    $currentYear = date('Y');
                    for ($y = $currentYear; $y >= $currentYear - 5; $y--) {
                        $selected = ($year == $y) ? 'selected' : '';
                        echo "<option value='$y' $selected>$y</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="course">Course</label>
                <input type="text" id="course" name="course" class="form-control" value="<?php echo htmlspecialchars($course); ?>" placeholder="Enter course">
            </div>
            <div class="col-md-2">
                <label for="branch">Branch</label>
                <input type="text" id="branch" name="branch" class="form-control" value="<?php echo htmlspecialchars($branch); ?>" placeholder="Enter branch">
            </div>
            <div class="col-md-2 mt-4">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <!-- General Exam Data Table -->
    <h2>General Exam Data</h2>
    <?php if ($result_general && $result_general->num_rows > 0) : ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Exam Name</th>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Regulation</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result_general->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['exam_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['year']); ?></td>
                        <td><?php echo htmlspecialchars($row['month']); ?></td>
                        <td><?php echo htmlspecialchars($row['regulation']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-warning">No results found in General Exam Data.</div>
    <?php endif; ?>

    <!-- General Course Data Table -->
    <h2>General Course Data</h2>
    <?php if ($result_general1 && $result_general1->num_rows > 0) : ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course</th>
                    <th>Mode of Course</th>
                    <th>Branch</th>
                    <th>Semester</th>
                    <th>Year</th>
                    <th>Regulation</th>
                    <th>Section</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result_general1->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['course']); ?></td>
                        <td><?php echo htmlspecialchars($row['mode_of_course']); ?></td>
                        <td><?php echo htmlspecialchars($row['branch']); ?></td>
                        <td><?php echo htmlspecialchars($row['semester']); ?></td>
                        <td><?php echo htmlspecialchars($row['year']); ?></td>
                        <td><?php echo htmlspecialchars($row['regulation']); ?></td>
                        <td><?php echo htmlspecialchars($row['section']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-warning">No results found in General Course Data.</div>
    <?php endif; ?>

    <!-- Exam Timetable Data Table -->
    <h2>Exam Timetable Data</h2>
    <?php if ($result_related && $result_related->num_rows > 0) : ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Exam</th>
                    <th>Course</th>
                    <th>Semester</th>
                    <th>Exam Date</th>
                    <th>Day</th>
                    <th>Session</th>
                    <th>Session Time</th>
                    <th>Subject Type</th>
                    <th>Exam Type</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result_related->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['subject_table_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['exam_table_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['course_table_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['semester']); ?></td>
                        <td><?php echo htmlspecialchars($row['exam_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['day']); ?></td>
                        <td><?php echo htmlspecialchars($row['session']); ?></td>
                        <td><?php echo htmlspecialchars($row['session_time']); ?></td>
                        <td><?php echo htmlspecialchars($row['subject_type']); ?></td>
                        <td><?php echo htmlspecialchars($row['exam_type']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-warning">No results found for Exam Timetable Data.</div>
    <?php endif; ?>
</div>

<?php include '../../includes/footer.php'; ?>
