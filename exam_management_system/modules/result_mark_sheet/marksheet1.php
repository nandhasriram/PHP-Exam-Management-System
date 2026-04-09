<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "exam_management"; // Replace with your database name

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch candidate data based on ID
$candidate_id = 1; // Change to dynamic based on GET/POST
$sql_candidate = "SELECT * FROM grade_sheet WHERE id = $candidate_id";
$result_candidate = $conn->query($sql_candidate);

// Check if data exists
if ($result_candidate->num_rows > 0) {
    $candidate_data = $result_candidate->fetch_assoc();
    $name = $candidate_data['candidate_name'];
    $dob = $candidate_data['dob'];
    $gender = $candidate_data['gender'];
    $exam_date = $candidate_data['exam_date'];
    $college_name = $candidate_data['college_name'];
    $program_branch = $candidate_data['program_branch'];
    $regulations = $candidate_data['regulations'];

    // Fetch grades for the candidate
    $sql_grades = "SELECT sem_no, course_code, course_title, credits, grade, grade_point, result 
                   FROM grade_sheet WHERE id = $candidate_id";
    $grades_result = $conn->query($sql_grades);
} else {
    die("No data found for candidate ID: $candidate_id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Sheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        .grade-sheet {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        header {
            text-align: center;
        }
        header h1, header h2 {
            margin: 5px;
        }
        .header-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .header-row div {
            font-size: 14px;
        }
        .student-info table, .grades table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .student-info td, .grades th, .grades td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .grades th {
            background-color: #f4f4f4;
        }
        .photo {
            float: right;
            margin-left: 20px;
            width: 120px;
            height: 120px;
            border: 1px solid #ddd;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .footer-note {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="grade-sheet">
        <header>
            <h1>Anna University, Chennai - 25</h1>
            <h2>B.E. Degree Examinations - Grade Sheet</h2>
        </header>

        <div class="header-row">
            <div><strong>Sl.No:</strong> CMS000001</div>
            <div><strong>Folio No:</strong> A000001234</div>
        </div>

        <div class="photo">
            <img src="thumb_1200_1200.png" alt="Photo" style="width: 100%; height: 100%;">
        </div>

        <section class="student-info">
            <table>
                <tr>
                    <td>Name of the Candidate:</td>
                    <td><?php echo $name; ?></td>
                    <td>Date of Birth:</td>
                    <td><?php echo $dob; ?></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><?php echo $gender; ?></td>
                    <td>Date of Exam:</td>
                    <td><?php echo $exam_date; ?></td>
                </tr>
                <tr>
                    <td>College of Study:</td>
                    <td colspan="3"><?php echo $college_name; ?></td>
                </tr>
                <tr>
                    <td>Programme & Branch:</td>
                    <td colspan="3"><?php echo $program_branch; ?></td>
                </tr>
                <tr>
                    <td>Regulations:</td>
                    <td colspan="3"><?php echo $regulations; ?></td>
                </tr>
            </table>
        </section>

        <section class="grades">
            <table>
                <thead>
                    <tr>
                        <th>SEM.No</th>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Credits</th>
                        <th>Grade</th>
                        <th>Grade Point</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($grade = $grades_result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $grade['sem_no']; ?></td>
                            <td><?php echo $grade['course_code']; ?></td>
                            <td><?php echo $grade['course_title']; ?></td>
                            <td><?php echo $grade['credits']; ?></td>
                            <td><?php echo $grade['grade']; ?></td>
                            <td><?php echo $grade['grade_point']; ?></td>
                            <td><?php echo $grade['result']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p class="end-of-statement">* * * End of Statement * * *</p>
        </section>

        <div class="signatures">
            <div>
                <p>Signature of the Candidate</p>
            </div>
            <div>
                <p>Controller of Examinations</p>
            </div>
        </div>

        <p class="footer-note">Chennai - 600 025 | Date: <?php echo date('d-M-Y'); ?></p>
    </div>
</body>
</html>

<?php
$conn->close();
?>
