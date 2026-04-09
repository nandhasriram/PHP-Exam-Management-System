<?php 
include '../../config/config.php'; 
include '../../includes/header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination Attendance Sheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #000;
            background-color: #fff;
        }

        .sheet-header {
            text-align: center;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .sheet-header h2 {
            font-size: 16px;
            margin: 0;
            font-weight: bold;
        }

        .sheet-header .header-row {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin: 3px 0;
        }

        .attendance-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .attendance-table th,
        .attendance-table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
            font-size: 14px;
        }

        .attendance-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .attendance-table td {
            height: 20px;
        }

        .attendance-table tfoot td {
            text-align: left;
            padding: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .sheet-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .signature-box {
            width: 45%;
            text-align: center;
            font-size: 14px;
            border-top: 1px solid #000;
            padding-top: 10px;
        }

        .small-note {
            font-size: 14px;
            text-align: left;
            margin-top: 10px;
        }

        /* Hide non-printable elements and form fields during printing */
        @media print {
            button, a, form, .no-print {
                display: none;
            }
            select {
                border: none;
                background-color: transparent;
                -webkit-appearance: none; /* For Safari */
                -moz-appearance: none; /* For Firefox */
                appearance: none;
            }
            .container {
                border: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        
        

        <header class="sheet-header">
            <h2>ANNA UNIVERSITY CHENNAI – 25</h2>
            <h2>EXAMINATION ATTENDANCE SHEET</h2>
    </br>
                <p style="text-align: center;">College: 4216 – Mailam Engineering College</p>
                 
            
            
            <p style="text-align: center;">Date of Exam: 02-02-2013 FN</p>
        </header>

        <!-- Filter Form -->
        <form method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="subject">subject Name:</label>
                    <select name="subject" id="subject" class="form-control">
                        <option value="">-- Select subject --</option>
                        <?php
                        // Fetch unique subject names
                        $subjectQuery = "SELECT DISTINCT subject FROM cms_staff_allocation_revaluation";
                        $subjectResult = $conn->query($subjectQuery);
                        while ($subjectRow = $subjectResult->fetch_assoc()) {
                            $selected = (isset($_GET['subject']) && $_GET['subject'] === $subjectRow['subject']) ? 'selected' : '';
                            echo "<option value='{$subjectRow['subject']}' $selected>{$subjectRow['subject']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="semester">Semester:</label>
                    <select name="semester" id="semester" class="form-control">
                        <option value="">-- Select Semester --</option>
                        <?php
                        // Fetch unique semesters
                        $semesterQuery = "SELECT DISTINCT semester FROM cms_staff_allocation_revaluation";
                        $semesterResult = $conn->query($semesterQuery);
                        while ($semesterRow = $semesterResult->fetch_assoc()) {
                            $selected = (isset($_GET['semester']) && $_GET['semester'] == $semesterRow['semester']) ? 'selected' : '';
                            echo "<option value='{$semesterRow['semester']}' $selected>{$semesterRow['semester']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4 mt-4">
                    <button type="submit" class="btn btn-success">Filter</button>
                    <a href="student_attendance_report.php" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <table class="attendance-table">
            <thead>
                <tr>
                    <th>Reg. No.</th>
                    <th>Staff Name</th>
                    <th>Phone No.</th>
                    <th>Subject.</th>
                    <th>Semester</th>
                    <th>Date of Revaluation</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Build query with filters
                $conditions = [];
                if (!empty($_GET['subject'])) {
                    $subjectName = $conn->real_escape_string($_GET['subject']);
                    $conditions[] = "subject = '$subjectName'";
                }
                if (!empty($_GET['semester'])) {
                    $semester = intval($_GET['semester']);
                    $conditions[] = "semester = $semester";
                }

                $whereClause = !empty($conditions) ? "WHERE " . implode(' AND ', $conditions) : '';
                $query = "SELECT register_no, staff_name, phone_no, subject, semester, date_of_revaluation, status FROM cms_staff_allocation_revaluation $whereClause";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
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
                    echo "<tr><td colspan='5'>No records found.</td></tr>";
                }

                // Empty rows for exact structure
                for ($i = 0; $i < 20; $i++) {
                    echo "<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Page Total Present: ______ | Page Total Absent: ______</td>
                </tr>
            </tfoot>
        </table>

            </br>
        <footer>
            <div class="sheet-footer">
                <div class="signature-box">
                    Signature of the Hall Superintendent<br>with Name and Designation
                </div>
                <div class="signature-box">
                    Signature of the Chief Superintendent<br>with Name and Designation
                </div>
            </div>
            <div class="small-note">
                <p>* FN indicates Forenoon session</p>
                <p>* Use "AB" for absent candidates in the HS column</p>
            </div>
        </footer>
    </div>
    <div style="text-align: center; margin-bottom: 10px;" class="no-print">
        <button onclick="window.print()" class="btn btn-primary" style="padding: 10px 15px; font-size: 14px;">Print</button>
        <button onclick="window.location.href='dashboard.php'" class="btn btn-secondary" style="padding: 10px 15px; font-size: 14px; margin-right: 10px;">Back</button>
        
    </div>
</div>

</body>
</html>
<?php include '../../includes/footer.php'; ?>
