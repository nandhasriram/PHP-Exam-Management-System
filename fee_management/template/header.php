<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Management System</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to an external CSS file if you have one -->
    <style>
        /* Header styling */
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .header .nav {
            display: flex;
            gap: 20px;
        }

        .header .nav a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .header .nav a:hover {
            color: #ffd700;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .header {
                flex-direction: column;
                text-align: center;
            }
            .header .nav {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <!-- Logo or Project Title -->
        <div class="logo">
            <a href="/fee_management/dashboard.php" style="color: #fff; text-decoration: none;">Fee Management System</a>
        </div>

        <!-- Navigation Links -->
        <div class="nav">
            <a href="/fee_management/dashboard.php">Dashboard</a>
            <a href="/fee_management/modules/add_student_info.php">Add Student Info</a>
            <a href="/fee_management/modules/add_fee.php">Add Fees</a>
            <a href="/fee_management/modules/manage_fee_dashboard.php">Manage Fees</a>
            <a href="/fee_management/modules/generate_receipt_dashboard.php">Generate Fee Receipt</a>
            <a href="/fee_management/modules/annual_fee_report.php">Annual Fee Report</a>
            <a href="/fee_management/modules/generate_report.php">Generate Report</a>
            <a href="/fee_management/modules/accounts.php">Date Wise Accounts</a>
            <a href="modules/user/logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
