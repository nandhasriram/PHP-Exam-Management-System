<?php 
include '../../config/config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM fee_collection WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Fee Payment Receipt - <?php echo $row['id']; ?></title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <style>
                .container {
                    width: 70%;
                    margin: 0 auto;
                    font-family: Arial, sans-serif;
                    padding: 20px;
                    background-color: #f9f9f9;
                }

                h2 {
                    text-align: center;
                    margin-bottom: 20px;
                }

                .header-section {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 20px;
                }

                .college-logo {
                    max-width: 100px;
                }

                .college-name {
                    text-align: center;
                    flex-grow: 1;
                    font-size: 24px;
                    font-weight: bold;
                }

                .footer-section {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 40px;
                    font-size: 18px;
                    padding-top: 40px;
                }

                .signature {
                    text-align: right;
                    width: 40%;
                }

                .date {
                    text-align: left;
                    width: 40%;
                }

                .student-info {
                    margin-top: 20px;
                    border: 1px solid #000;
                    padding: 10px;
                }

                .student-info div {
                    margin-bottom: 10px;
                }

                #result-table {
                    margin-top: 20px;
                }

                #result-table table {
                    width: 100%;
                    border-collapse: collapse;
                }

                #result-table th, #result-table td {
                    border: 1px solid #000;
                    padding: 10px;
                    text-align: center;
                }

                #result-table th {
                    background-color: #ddd;
                }

                /* CSS for printing */
                @media print {
                    body * {
                        visibility: hidden;
                    }

                    .container, .container * {
                        visibility: visible;
                    }

                    .footer-section, button, form {
                        display: none !important;
                    }

                    .container {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        padding: 10px;
                        border-bottom: 1px solid #ddd;
                    }
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header-section">
                    <img src="path_to_logo" alt="College Logo" class="college-logo">
                    <div class="college-name">College Name</div>
                </div>
                <h2>Fee Payment Receipt</h2>
                <p><strong>Receipt ID:</strong> <?php echo $row['id']; ?></p>
                <div class="date">
                    Date: <?php echo date('Y-m-d'); ?>
                </div>
                <div class="student-info">
                    <div><strong>Student ID:</strong> <?php echo $row['student_id']; ?></div>
                    <div><strong>Student Name:</strong> <?php echo $row['student_name']; ?></div>
                    <div><strong>Class:</strong> <?php echo $row['class']; ?></div>
                    <div><strong>Department:</strong> <?php echo $row['department']; ?></div>
                </div>
                <div id="result-table">
                    <table>
                        <tr>
                            <th>Academic Amount</th>
                            <th>Lab Amount</th>
                            <th>Sports Amount</th>
                            <th>Placement Amount</th>
                        </tr>
                        <tr>
                            <td><?php echo $row['academic_amount']; ?></td>
                            <td><?php echo $row['lab_amount']; ?></td>
                            <td><?php echo $row['sports_amount']; ?></td>
                            <td><?php echo $row['placement_amount']; ?></td>
                        </tr>
                        <tr>
                            <th colspan="3">Due Date</th>
                            <td><?php echo $row['due_date']; ?></td>
                        </tr>
                        <tr>
                            <th colspan="3">Status</th>
                            <td><?php echo $row['status']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="footer-section">
                    <div class="date">Date: <?php echo date('Y-m-d'); ?></div>
                    <div class="signature">Signature: ____________________</div>
                </div>
                <div class="text-center mt-4">
                    <button onclick="window.print();" class="btn btn-primary">Print Receipt</button>
                    <a href="fee_collection.php" class="btn btn-info">Back</a>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo '<div class="alert alert-danger">No record found.</div>';
    }
} else {
    echo '<div class="alert alert-danger">Invalid request.</div>';
}
?>
