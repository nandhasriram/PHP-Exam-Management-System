<?php
// Include database connection
include '../template/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Container Styles */
        .container {
            max-width: 900px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 80px; /* Ensure content does not overlap with footer */
        }

        /* Row Alignment */
        .row {
            justify-content: center;
        }

        /* Column Styles */
        .col-md-4 {
            margin-bottom: 20px;
        }

        /* Header Styles */
        h3 {
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            font-size: 14px;
        }

        /* Button Styles */
        .btn-info {
            background-color: #17a2b8;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        /* Back Button */
        .btn-back {
            background-color: #6c757d;
            color: #fff;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            margin-bottom: 15px;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        /* Footer Styles */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
            z-index: 1000;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h3 {
                font-size: 18px;
            }

            p {
                font-size: 13px;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding: 10px;
            }

            .btn-info {
                padding: 8px 15px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<!-- Back Button -->


<div class="container mt-3">
    <div class="row mt-5">
        
        
        <!-- Individual Fee Generate Section -->
        <div class="col-md-4 text-center">
            <h3>Manage Student Fee Record</h3>
            <p>Manage Fee for individual students.</p>
            <a class="btn btn-info" href="manage_fee.php">Manage Student Fee</a>
        </div>
        <div class="col-md-4 text-center">
            <h3>Manage Class Wise Fee Record</h3>
            <p>Manage Fee for Class Wise.</p>
            <a class="btn btn-info" href="manage_class_wise_fee.php">Manage Class Wise Fee</a>
        </div>
        <div class="col-md-4 text-center">
            <h3>Manage Student Record</h3>
            <p>Manage Student Record.</p>
            <a class="btn btn-info" href="manage_student.php">Manage Class Wise Fee</a>
        </div>
    </div>
    <div class="text-center mt-3">
    <a href="../dashboard.php" class="btn btn-back">Back to Dashboard</a>
</div>
</div>

<!-- Footer Section -->
<footer>
    <?php include '../template/footer.php'; ?>
</footer>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
