<?php
// Include the database connection file
include 'config/db.php';
include 'template/header.php';

// Initialize variables for total collected, overdue count, and pending fees
$totalCollected = 0;
$overdueCount = 0;
$totalPending = 0;

try {
    // Query for total fees collected (from feereceipt table)
    $stmt = $conn->query("SELECT SUM(amountpaid) AS total_collected FROM feereceipt");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalCollected = $result['total_collected'] ?? 0;

    // Query for total overdue accounts (where due date is past and status is unpaid)
    $stmt = $conn->query("SELECT COUNT(*) AS overdue_count FROM feereceipt WHERE duedate < CURDATE() AND amountpaid < amount");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $overdueCount = $result['overdue_count'] ?? 0;

    // Query for total pending fees (amount not yet paid)
    $stmt = $conn->query("SELECT SUM(amount - amountpaid) AS total_pending FROM feereceipt WHERE amountpaid < amount");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalPending = $result['total_pending'] ?? 0;

} catch (PDOException $e) {
    echo "Error fetching dashboard data: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fee Management Dashboard</title>
    <style>
        /* General styling for the body and container */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1;
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin: 20px auto;
            box-sizing: border-box;
        }

        /* Header styling */
        header h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Statistics section styling */
        .stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .stat {
            width: 30%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border-radius: 8px;
            text-align: center;
        }

        .stat h2 {
            font-size: 16px;
            margin: 10px 0;
        }

        .stat p {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        /* Buttons styling */
        .actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 10px;
        }

        .actions .button {
            flex: 1 1 calc(50% - 10px);
            padding: 12px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .actions .button:hover {
            background-color: #218838;
        }

        /* Footer styling */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .stat {
                width: 100%;
                margin-bottom: 10px;
            }
            .actions .button {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Fee Management System Dashboard</h1>
        </header>

        <!-- Dashboard Statistics Display -->
        <div class="stats">
            <div class="stat">
                <h2>Total Fees Collected</h2>
                <p>₹<?php echo number_format($totalCollected, 2); ?></p>
            </div>
            <div class="stat">
                <h2>Pending Fees</h2>
                <p>₹<?php echo number_format($totalPending, 2); ?></p>
            </div>
            <div class="stat">
                <h2>Overdue Accounts</h2>
                <p><?php echo $overdueCount; ?></p>
            </div>
        </div>

        <!-- Navigation Actions -->
        <div class="actions">
            <a href="modules/add_student_info.php" class="button">Add Student Info</a>
            <a href="modules/add_fee_dashboard.php" class="button">Add Fee</a>
            <a href="modules/manage_fee_dashboard.php" class="button">Manage Fees</a>
            <a href="modules/generate_receipt_dashboard.php" class="button">Generate Fee Receipt</a>
            <a href="modules/annual_fee_report.php" class="button">Annual Fee Reports</a>
            <a href="modules/generate_report.php" class="button">Record Payment Report</a>
            <a href="modules/accounts.php" class="button">Date wise Accounts</a>
            
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <?php include 'template/footer.php'; ?>
    </footer>
</body>
</html>
