<?php include '../../config/config.php'; ?>

<?php
// Check if we are viewing an existing record
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$data = [];
if ($id) {
    $query = "SELECT * FROM cms_revaluation_form WHERE id = $id";
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
    <title>Revaluation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f5f5f5;
        }

        .form-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 80px;
            margin-bottom: 10px;
        }

        .header h2, .header h3, .header h4 {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .section-title {
            font-weight: bold;
            margin: 20px 0 10px;
        }

        .print-button {
            text-align: center;
            margin-top: 20px;
        }

        .print-button button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007BFF;
            color: #fff;
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
            window.history.back();
        }
    </script>
</head>
<body>
    <div class="form-container">
        <!-- Header -->
        <div class="header">
            <img src="/exam_management_system/assets/image/logo.png" alt="University Logo">
            <h2>ANNA UNIVERSITY, CHENNAI – 600 025.</h2>
            <h3>Office of the Additional Controller of Examinations (University Departments)</h3>
            <h4>APPLICATION FOR REVALUATION OF ANSWER SCRIPT - Session – ………….</h4>
        </div>

        <!-- Application Details -->
        <table>
            <tr>
                <td>Application Number</td>
                <td><?php echo htmlspecialchars($data['application_number'] ?? 'N/A'); ?></td>
            
                <td>Campus</td>
                <td><?php echo htmlspecialchars($data['campus'] ?? 'N/A'); ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td colspan="3"><?php echo htmlspecialchars($data['name'] ?? 'N/A'); ?></td>
            </tr>
            <tr>
                <td>Roll Number</td>
                <td colspan="3"><?php echo htmlspecialchars($data['roll_number'] ?? 'N/A'); ?></td>
            </tr>
            <tr>
                <td>Program</td>
                <td colspan="3"><?php echo htmlspecialchars($data['program'] ?? 'N/A'); ?></td>
            </tr>
            <tr>
                <td>Branch</td>
                <td colspan="3"><?php echo htmlspecialchars($data['branch'] ?? 'N/A'); ?></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><?php echo htmlspecialchars($data['mobile_no'] ?? 'N/A'); ?></td>
            
                <td>Email</td>
                <td><?php echo htmlspecialchars($data['email'] ?? 'N/A'); ?></td>
            </tr>
            <tr>
                <td>Mode</td>
                <td colspan="3"><?php echo htmlspecialchars($data['mode'] ?? 'N/A'); ?></td>
            </tr>
        </table>
        <h4>DETAILS OF REVALUATION APPLIED</h4>
        <table>
            <tr>
                <td>Semester Number</td>
                <td><?php echo htmlspecialchars($data['semester_no'] ?? 'N/A'); ?></td>
            </tr>
            <tr>
                <td>Subject Code</td>
                <td><?php echo htmlspecialchars($data['subject_code'] ?? 'N/A'); ?></td>
            </tr>
            <tr>
                <td>Subject Title</td>
                <td><?php echo htmlspecialchars($data['subject_title'] ?? 'N/A'); ?></td>
            </tr>
            <tr>
                <td>Regular/Arrear</td>
                <td><?php echo htmlspecialchars($data['regular_arrear'] ?? 'N/A'); ?></td>
            </tr>
        </table>
        <h4>Details of Fee Payment (Enclose the original challan - ACOE copy)</h4>
        <table>
            <tr>
                <td>Challan Date</td>
                <td><?php echo htmlspecialchars($data['challan_date'] ?? 'N/A'); ?></td>
            </tr>
            <tr>
                <td>Bank Details</td>
                <td><?php echo htmlspecialchars($data['bank_details'] ?? 'N/A'); ?></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td><?php echo htmlspecialchars($data['amount'] ?? 'N/A'); ?></td>
            </tr>
        </table>

        <!-- Print and Back Buttons -->
        <div class="print-button">
            <button onclick="printPage()">Print</button>
            <button onclick="goBack()">Back</button>
        </div>
    </div>
</body>
</html>
