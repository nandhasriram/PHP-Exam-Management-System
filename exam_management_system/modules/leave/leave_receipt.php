<?php include '../../config/config.php'; ?>

<?php
// Check if we are viewing an existing record
$id = isset($_GET['id']) ? $_GET['id'] : null;
$data = [];
if ($id) {
    $query = "SELECT * FROM cms_leave WHERE id = $id";
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
    <title>Leave Application Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .actions {
            text-align: center;
            margin-top: 20px;
        }

        .actions button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .print-btn {
            background-color: #007bff;
            color: white;
        }

        .back-btn {
            background-color: #6c757d;
            color: white;
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
<div class="container">
    <h1>Leave Application Details</h1>
    <table>
        <tr>
            <th>Type of Leave</th>
            <td colspan="3"><?php echo isset($data['type_of_leave']) ? htmlspecialchars($data['type_of_leave']) : 'N/A'; ?></td>
            
        </tr>
        <tr><th>Available Leave</th>
            <td><?php echo isset($data['available_leave']) ? htmlspecialchars($data['available_leave']) : 'N/A'; ?></td>
            <th>Balance Leave</th>
            <td><?php echo isset($data['balance_leave']) ? htmlspecialchars($data['balance_leave']) : 'N/A'; ?></td>
            
        </tr>
        <tr><th>Name</th>
            <td><?php echo isset($data['name']) ? htmlspecialchars($data['name']) : 'N/A'; ?></td>
            <th>Roll Number</th>
            <td><?php echo isset($data['roll_no']) ? htmlspecialchars($data['roll_no']) : 'N/A'; ?></td>
            
        </tr>
        <tr><th>Program</th>
            <td><?php echo isset($data['program']) ? htmlspecialchars($data['program']) : 'N/A'; ?></td>
            <th>Department</th>
            <td><?php echo isset($data['department']) ? htmlspecialchars($data['department']) : 'N/A'; ?></td>
            
        </tr>
        <tr><th>Hostel Address</th>
            <td><?php echo isset($data['hostel_address']) ? htmlspecialchars($data['hostel_address']) : 'N/A'; ?></td>
            <th>Hall Number</th>
            <td><?php echo isset($data['hall_no']) ? htmlspecialchars($data['hall_no']) : 'N/A'; ?></td>
            
        </tr>
        <tr><th>Days From</th>
            <td><?php echo isset($data['days_from']) ? htmlspecialchars($data['days_from']) : 'N/A'; ?></td>
            <th>Days To</th>
            <td><?php echo isset($data['days_to']) ? htmlspecialchars($data['days_to']) : 'N/A'; ?></td>
        </tr>
        <tr><th>Prefix Days</th>
            <td><?php echo isset($data['prefix_date']) ? htmlspecialchars($data['prefix_date']) : 'N/A'; ?></td>
            <th>Suffix Days</th>
            <td><?php echo isset($data['suffix_date']) ? htmlspecialchars($data['suffix_date']) : 'N/A'; ?></td>
        </tr>
        <tr>
            <th>Purpose of Leave</th>
            <td colspan="3"><?php echo isset($data['purpose_of_leave']) ? htmlspecialchars($data['purpose_of_leave']) : 'N/A'; ?></td>
        </tr>
        <tr>
            <th>Contact Number</th>
            <td colspan="3"><?php echo isset($data['contact_no']) ? htmlspecialchars($data['contact_no']) : 'N/A'; ?></td>
        </tr>
        <tr>
            <th>Date</th>
            <td><?php echo isset($data['date']) ? htmlspecialchars($data['date']) : 'N/A'; ?></td>
        </tr>
    </table>

    <div class="actions">
        <button class="print-btn" onclick="printPage()">Print</button>
        <button class="back-btn" onclick="goBack()">Back</button>
    </div>
</div>
</body>
</html>
