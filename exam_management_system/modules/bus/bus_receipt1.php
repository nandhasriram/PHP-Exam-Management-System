<?php
// Include necessary files
include '../../config/config.php'; 
include '../../includes/header.php';

// Check if ID is passed
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = $conn->prepare("SELECT * FROM cms_bus WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found with the given ID.";
        exit;
    }
} else {
    echo "Invalid ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Fee Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 1000px;
            margin: 30px auto;
            background: #fff;
            padding: 20px 30px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 15px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group p {
            margin: 0;
            padding: 10px;
            background: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .button-row {
            text-align: center;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ganesh International School</h1>
        <h2>Bus Fee Receipt</h2>

        <div class="form-group">
            <label>Name of the Student:</label>
            <p><?= htmlspecialchars($row['name']) ?></p>
        </div>
        <div class="form-group">
            <label>Admission No:</label>
            <p><?= htmlspecialchars($row['admission_no']) ?></p>
        </div>
        <div class="form-group">
            <label>Class-Section:</label>
            <p><?= htmlspecialchars($row['section']) ?></p>
        </div>
        <div class="form-group">
            <label>Roll No:</label>
            <p><?= htmlspecialchars($row['roll_no']) ?></p>
        </div>
        <div class="form-group">
            <label>Session:</label>
            <p><?= htmlspecialchars($row['session']) ?></p>
        </div>
        <div class="form-group">
            <label>Residential Address:</label>
            <p><?= htmlspecialchars($row['address']) ?></p>
        </div>
        <div class="form-group">
            <label>Father's Name:</label>
            <p><?= htmlspecialchars($row['father_name']) ?></p>
        </div>
        <div class="form-group">
            <label>Father's Contact:</label>
            <p><?= htmlspecialchars($row['father_no']) ?></p>
        </div>
        <div class="form-group">
            <label>Mother's Name:</label>
            <p><?= htmlspecialchars($row['mother_name']) ?></p>
        </div>
        <div class="form-group">
            <label>Mother's Contact:</label>
            <p><?= htmlspecialchars($row['mother_no']) ?></p>
        </div>
        <div class="form-group">
            <label>Guardian's Name:</label>
            <p><?= htmlspecialchars($row['guardian_name']) ?></p>
        </div>
        <div class="form-group">
            <label>Guardian's Contact:</label>
            <p><?= htmlspecialchars($row['guardian_no']) ?></p>
        </div>
        <div class="form-group">
            <label>Pickup Point:</label>
            <p><?= htmlspecialchars($row['pickup_point']) ?></p>
        </div>
        <div class="form-group">
            <label>Drop Point:</label>
            <p><?= htmlspecialchars($row['drop_point']) ?></p>
        </div>
        <div class="form-group">
            <label>Bus Route No:</label>
            <p><?= htmlspecialchars($row['bus_rout_no']) ?></p>
        </div>
        <div class="form-group">
            <label>Bus In-Charge:</label>
            <p><?= htmlspecialchars($row['bus_incharge']) ?></p>
        </div>
        

        <div class="button-row">
            <button onclick="window.print()">Print Receipt</button>
            <button onclick="window.location.href='report_bus.php';">Back</button>
        </div>
    </div>
</body>
</html>
