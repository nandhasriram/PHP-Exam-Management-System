<?php include '../../config/config.php'; ?>

<?php
// Check if we are viewing an existing record
$id = isset($_GET['id']) ? $_GET['id'] : null;
$data = [];
if ($id) {
    $query = "SELECT * FROM cms_exam_form WHERE id = $id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo '<div class="alert alert-danger">No record found.</div>';
        exit;
    }
} else {
    echo '<div class="alert alert-danger">No record ID provided.</div>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG Examination Application</title>
    <style>
        /* Your styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .form-container {
            width: 90%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 24px;
            font-weight: bold;
        }

        header p {
            margin: 5px 0;
            font-size: 14px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table td, table th {
            border: 2px solid #333;
            padding: 8px;
            font-size: 14px;
            vertical-align: top;
            text-align: left;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
        }

        .print-button {
            text-align: center;
            margin: 20px 0;
        }

        .print-button button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        .print-button button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function printPage() {
            window.print();
        }
        function goBack() {
            window.location.href = "view_exam_form.php";
        }
    </script>
</head>
<body>
    <div class="form-container">
        <header>
            <h1>BHARATHIDASAN UNIVERSITY</h1>
            <p>TIRUCHIRAPPALLI - 620 024.</p>
            <p>(Re-Accredited with 'A' Grade among the Universities by NAAC)</p>
            <p>For the candidates admitted in the year <span>20__ - 20__</span></p>
        </header>
        <h2>P.G. Degree Examination Application</h2>
        <p>(All P.G. / M.C.A. / M.B.A. / M.S.I.T / Diploma Courses)</p>

        <table>
            <tr>
                <td>Semester:</td>
                <td colspan="3"><?php echo $data['session_time'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Name of the College / Centre:</td>
                <td colspan="3"><?php echo $data['college_name'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Centre Code:</td>
                <td><?php echo $data['center_code'] ?? 'N/A'; ?></td>
                <td>Register Number:</td>
                <td><?php echo $data['register_number'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Year of Admission:</td>
                <td><?php echo $data['admission_year'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Name of the Candidate (as per H.S.C. Records):</td>
                <td colspan="3"><?php echo $data['student_name'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Name of the Father / Guardian:</td>
                <td colspan="3"><?php echo $data['father_name'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Date of Birth (as per H.S.C. Records):</td>
                <td colspan="3"><?php echo $data['date_of_birth'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Name of the Course with Main Subject:</td>
                <td colspan="3"><?php echo $data['course'] ?? 'N/A'; ?></td>
            </tr>
        </table>

        <div class="section-title">Medium of Instruction:</div>
        <p><?php echo $data['medium'] ?? 'N/A'; ?></p>

        <div class="section-title">Sex:</div>
        <p><?php echo $data['sex'] ?? 'N/A'; ?></p>

        <div class="section-title">Community:</div>
        <p><?php echo $data['community'] ?? 'N/A'; ?></p>

        <div class="section-title">Address:</div>
        <table>
            <tr>
                <td>Temporary Address:</td>
                <td><?php echo $data['temporary_address'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Permanent Address:</td>
                <td><?php echo $data['permanent_address'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Pin:</td>
                <td><?php echo $data['pin_code'] ?? 'N/A'; ?></td>
                <td>Contact No:</td>
                <td><?php echo $data['contact_number'] ?? 'N/A'; ?></td>
            </tr>
        </table>

        <div class="section-title">Fee Particulars:</div>
        <table>
            <tr>
                <td>Name of the Bank and Place:</td>
                <td><?php echo $data['bank_name'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <td>D.D. Number:</td>
                <td><?php echo $data['d_d_number'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><?php echo $data['d_d_date'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Amount Rs. (In Words):</td>
                <td><?php echo $data['amount'] ?? 'N/A'; ?></td>
            </tr>
        </table>

        <div class="print-button">
            <button onclick="printPage()">Print</button>
            <button onclick="goBack()">Back</button>
        </div>
    </div>
</body>
</html>
