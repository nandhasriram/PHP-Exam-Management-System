<?php
// Include database configuration
include 'config/db.php';
include 'templates/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Dashboard</title>
    <style>
        /* Inline CSS for Center-aligning container and its contents */
        .center-align {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            min-height: 100vh; /* Full viewport height */
        }

        /* Optional: Center-align the button in the dashboard-menu */
        .dashboard-menu .button {
            margin-top: 20px; /* Add space above the button */
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .dashboard-menu .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Main Container -->
    <div class="container center-align">
        <h2>Welcome to the Dashboard</h2>
        <p>Select a module to manage student information.</p>

        <!-- Dashboard Navigation -->
        <div class="dashboard-menu">
            <a href="/student_info_management/modules/student/student_info1.php" class="button">Manage Students</a>
        </div>
    </div>

    <script src="assets/js/scripts.js"></script>
</body>
</html>
