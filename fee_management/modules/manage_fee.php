<?php
// Include database connection
include '../config/db.php';
include '../template/header.php';

// Fetch fee records from the feereceipt table
$query = "SELECT * FROM feereceipt ORDER BY id ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Initialize total variables
$totalAmount = 0;
$totalAmountPaid = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Records</title>
    <style>
        /* General Styles */
        body, html {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h2 {
            color: #4CAF50;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }

        /* Table Styles */
        table {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #ddd;
        }

        thead th {
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e0f7fa;
        }

        /* Form Container */
        .form-container {
            width: 100%;
            max-width: 95vw;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            box-sizing: border-box;
            flex-grow: 1;
        }

        /* Button Styles */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .action-buttons a {
            padding: 8px 12px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .edit-btn {
            background-color: #4CAF50;
        }

        .edit-btn:hover {
            background-color: #45a049;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .delete-btn:hover {
            background-color: #e53935;
        }

        /* Back Button Styles */
        .back-btn {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                font-size: 13px;
            }

            th, td {
                padding: 8px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }
        }

        @media (max-width: 480px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            th, td {
                display: block;
                text-align: left;
                padding: 10px;
            }

            tr {
                display: table-row;
                border-bottom: 1px solid #ddd;
                margin-bottom: 10px;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                display: inline-block;
                width: 120px;
                color: #333;
            }

            .action-buttons {
                display: flex;
                justify-content: flex-start;
            }
        }

        /* Footer Styles */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div>
        <h2>Fee Records </h2>
        <table>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Feereceipt No</th>
                    <th>Date</th>
                    <th>Student Roll Number</th>
                    <th>Admission No</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Particulars</th>
                    <th>Amount</th>
                    <th>Amount Paid</th>
                    <th>Term</th>
                    <th>Due Date</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($results) > 0) {
                    $sno = 1; // Initialize Sno counter
                    foreach ($results as $row) {
                        // Add to totals
                        $totalAmount += $row['amount'] ?? 0;
                        $totalAmountPaid += $row['amountpaid'] ?? 0;

                        echo "<tr>";
                        echo "<td data-label='Sno'>" . htmlspecialchars($sno++) . "</td>";
                        echo "<td data-label='Feereceipt No'>" . htmlspecialchars($row['Feereceiptno'] ?? '') . "</td>";
                        echo "<td data-label='Date'>" . htmlspecialchars($row['date'] ?? '') . "</td>";
                        echo "<td data-label='Student Roll Number'>" . htmlspecialchars($row['StudentRollNumber'] ?? '') . "</td>";
                        echo "<td data-label='Admission No'>" . htmlspecialchars($row['addmissionno'] ?? '') . "</td>";
                        echo "<td data-label='Student Name'>" . htmlspecialchars($row['Studentname'] ?? '') . "</td>";
                        echo "<td data-label='Class'>" . htmlspecialchars($row['class'] ?? '') . "</td>";
                        echo "<td data-label='Section'>" . htmlspecialchars($row['section'] ?? '') . "</td>";
                        echo "<td data-label='Particulars'>" . htmlspecialchars($row['particulars'] ?? '') . "</td>";
                        echo "<td data-label='Amount'>" . htmlspecialchars($row['amount'] ?? '') . "</td>";
                        echo "<td data-label='Amount Paid'>" . htmlspecialchars($row['amountpaid'] ?? '') . "</td>";
                        echo "<td data-label='Term'>" . htmlspecialchars($row['term'] ?? '') . "</td>";
                        echo "<td data-label='Due Date'>" . htmlspecialchars($row['duedate'] ?? '') . "</td>";
                        echo "<td data-label='Description'>" . htmlspecialchars($row['description'] ?? '') . "</td>";
                        echo "<td class='action-buttons'>";
                        echo "<a href='edit_fee.php?id=" . urlencode($row['id']) . "' class='edit-btn'>Edit</a>";
                        echo "<a href='delete_fee.php?id=" . urlencode($row['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='15'>No records found</td></tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9" style="text-align:right; font-weight:bold;">Total:</td>
                    <td><?php echo number_format($totalAmount, 2); ?></td>
                    <td><?php echo number_format($totalAmountPaid, 2); ?></td>
                    <td colspan="4"></td>
                </tr>
            </tfoot>
        </table>
        <a href="manage_fee_dashboard.php" class="back-btn">Back to Dashboard</a>
    </div>

    <footer>
        <?php include '../template/footer.php'; ?>
    </footer>
</body>
</html>
