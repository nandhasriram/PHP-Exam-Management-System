<?php 
include '../config/db.php'; 
include '../template/header.php'; 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Receipt Table Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        form label {
            font-weight: bold;
            margin-right: 5px;
        }

        form input[type="text"],
        form input[type="date"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 150px;
        }

        form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        form button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        #printButton, #backButton {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
        }

        #printButton {
            background-color: #4CAF50;
        }

        #printButton:hover {
            background-color: #45a049;
        }

        #backButton {
            background-color: #2196F3;
        }

        #backButton:hover {
            background-color: #1E88E5;
        }

        @media print {
            header, .header, nav, #printButton, #backButton, form {
                display: none !important;
            }

            table {
                width: 100%;
            }

            body {
                margin: 10;
                padding: 0;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Fee Receipt Table Report</h2>
    
    <!-- Date Range Search Form -->
    <form action="" method="get">
        <label for="fromDate">From:</label>
        <input type="date" id="fromDate" name="fromDate">
        <label for="toDate">To:</label>
        <input type="date" id="toDate" name="toDate">
        <button type="submit">Search</button>
    </form>
    <button id="printButton" onclick="printReport()">Print Report</button>
    <button id="backButton" onclick="window.location.href='../dashboard.php'">Back to Dashboard</button>
    

    <h2> Main Fee Receipt table</h2>
    <table class="table table-bordered" id="fee_receipt_table">
    <thead>
        <tr>
            
            <th>Serial No</th>
            
            <th>Date</th>
            <th>Student Roll Number</th>
            
            <th>Student Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Year</th>
            <th>Class-Wise Fee Item</th>
            <th>Amount Paid</th>
            <th>Due Amount</th>
            <th>Term</th>
            <th>Due Date</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Handle date range search
        $query = "SELECT * FROM main_feereceipt"; // Table name updated to match the screenshot
        if (isset($_GET['fromDate']) && isset($_GET['toDate'])) {
            $fromDate = $_GET['fromDate'];
            $toDate = $_GET['toDate'];
            $query .= " WHERE date BETWEEN :fromDate AND :toDate";
        }

        $stmt = $conn->prepare($query);
        if (isset($fromDate) && isset($toDate)) {
            $stmt->bindParam(':fromDate', $fromDate);
            $stmt->bindParam(':toDate', $toDate);
        }
        $stmt->execute();
        

        // Fetch and display data
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            echo "<tr>
                
                <td>{$row['Sno']}</td>
                
                <td>{$row['date']}</td>
                <td>{$row['StudentRollNumber']}</td>
                
                <td>{$row['Studentname']}</td>
                <td>{$row['class']}</td>
                <td>{$row['section']}</td>
                <td>{$row['year']}</td>
                <td>{$row['addclasswisefeeitem']}</td>
                <td>{$row['amountpaid']}</td>
                <td>{$row['dueamount']}</td>
                <td>{$row['term']}</td>
                <td>{$row['duedate']}</td>
                <td>{$row['description']}</td>
            </tr>";
        }
        ?>
    </tbody>
</table>

    
</div>

<script>
function printReport() {
    window.print();
}
</script>

</body>
</html>
