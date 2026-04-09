<?php 
// Include necessary configuration and headers
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Result Mark Sheet Report</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
    }

    grade-sheet {
      width: 800px;
      padding: 20px;
      background: #D3D3D3;
      border: 2px solid #d1cfd0;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      font-size: 12px;
      line-height: 1.4;
    }

    

    .container {
      padding: 20px;
    }

    h1 {
      text-align: center;
      font-size: 22px;
      margin-bottom: 20px;
    }

    .filter-form {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
      gap: 10px;
    }

    .filter-form input {
      padding: 5px;
      font-size: 14px;
    }

    .filter-form button {
      padding: 6px 10px;
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }

    .filter-form a {
      text-decoration: none;
      padding: 6px 10px;
      background-color: #6c757d;
      color: white;
    }

    .grade-sheet {
      width: 800px;
      margin: 0 auto;
      padding: 20px;
      background: white;
      border: 1px solid #ddd;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      font-size: 12px;
    }

    .grade-sheet header {
      text-align: center;
      margin-bottom: 20px;
    }

    .grade-sheet header h1 {
      font-size: 18px;
      margin: 0;
    }

    .student-info, .grades {
      margin-bottom: 20px;
    }

    .student-info table, .grades table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }

    table th, table td {
      border: 1px solid #ccc;
      padding: 6px;
      text-align: left;
    }

    table th {
      background-color: #f0f0f0;
    }

    .end-of-statement {
      text-align: center;
      margin-top: 10px;
      font-weight: bold;
    }

    .signatures {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
      font-size: 12px;
    }

    .signatures div {
      text-align: center;
    }

    .footer-note {
      text-align: center;
      font-size: 10px;
      margin-top: 20px;
    }

    @media print {
      .filter-form, 
      .print-button, 
       {
        display: none !important;
      }
    }
  </style>
  <script>
    function printReport() {
      window.print();
    }
  </script>
</head>
<body>
  <div class="container">
    <h1>Result Mark Sheet Report</h1>

    <!-- Filter Form -->
    <form method="GET" action="" class="filter-form">
      <input type="text" name="name" placeholder="Enter Student Name" value="<?php echo htmlspecialchars($_GET['name'] ?? ''); ?>">
      <input type="text" name="college" placeholder="Enter College Name" value="<?php echo htmlspecialchars($_GET['college'] ?? ''); ?>">
      <input type="text" name="program_branch" placeholder="Enter Program/Branch" value="<?php echo htmlspecialchars($_GET['program_branch'] ?? ''); ?>">
      <button type="submit">Filter</button>
      <a href="print_marksheet.php">Reset</a>
    </form>

    <!-- PHP to fetch and display the results -->
    <?php
    $name = $conn->real_escape_string($_GET['name'] ?? '');
    $college = $conn->real_escape_string($_GET['college'] ?? '');
    $program_branch = $conn->real_escape_string($_GET['program_branch'] ?? '');

    $query = "SELECT * FROM cms_result WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND name LIKE '%$name%'";
    }
    if (!empty($college)) {
        $query .= " AND college LIKE '%$college%'";
    }
    if (!empty($program_branch)) {
        $query .= " AND program_branch LIKE '%$program_branch%'";
    }

    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="grade-sheet">
              <header>
                <h1>Anna University, Chennai - 25</h1>
                <h2>B.E. Degree Examinations - Grade Sheet</h2>
              </header>
              <section class="student-info">
                <table>
                  <tr>
                    <td><strong>Name of the Candidate:</strong></td>
                    <td>' . htmlspecialchars($row['name']) . '</td>
                    <td><strong>Date of Birth:</strong></td>
                    <td>' . htmlspecialchars($row['date_of_birth']) . '</td>
                  </tr>
                  <tr>
                    <td><strong>Gender:</strong></td>
                    <td>' . htmlspecialchars($row['gender']) . '</td>
                    <td><strong>Month & Year of Examination:</strong></td>
                    <td>' . htmlspecialchars($row['date_of_exam']) . '</td>
                  </tr>
                  <tr>
                    <td><strong>College of Study:</strong></td>
                    <td colspan="3">' . htmlspecialchars($row['college']) . '</td>
                  </tr>
                  <tr>
                    <td><strong>Programme & Branch:</strong></td>
                    <td colspan="3">' . htmlspecialchars($row['program_branch']) . '</td>
                  </tr>
                  <tr>
                    <td><strong>Regulations:</strong></td>
                    <td colspan="3">' . htmlspecialchars($row['regulation']) . '</td>
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
                    <tr>
                      <td>' . htmlspecialchars($row['semester_no']) . '</td>
                      <td>' . htmlspecialchars($row['course_code']) . '</td>
                      <td>' . htmlspecialchars($row['course_title']) . '</td>
                      <td>' . htmlspecialchars($row['credits']) . '</td>
                      <td>' . htmlspecialchars($row['grade']) . '</td>
                      <td>' . htmlspecialchars($row['grade_point']) . '</td>
                      <td>' . htmlspecialchars($row['result']) . '</td>
                    </tr>
                  </tbody>
                </table>
                <p class="end-of-statement">* * * End of Statement * * *</p>
              </section>
              <div class="signatures">
                <div>Signature of the Candidate</div>
                <div>Controller of Examinations</div>
              </div>
              <p class="footer-note">Chennai - 600 025 | Date: ' . htmlspecialchars($row['date_of_exam']) . '</p>
            </div>';
        }
    } else {
        echo "<p>No results found</p>";
    }
    ?>
    <button class="print-button" onclick="printReport()">Print</button>
    <button onclick="window.location.href='dashboard.php';">Back to Dashboard</button>
  </div>
</body>
</html>

<?php 
include '../../includes/footer.php'; 
?>
