<?php include '../../config/config.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM reports WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Report Receipt - <?php echo $row['id']; ?></title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <style>
                .receipt-container {
                    max-width: 600px;
                    margin: 50px auto;
                    padding: 30px;
                    border: 1px solid #ddd;
                    border-radius: 10px;
                    background-color: #f9f9f9;
                }
                .receipt-header {
                    text-align: center;
                    margin-bottom: 30px;
                }
                .receipt-header h2 {
                    margin: 0;
                }
                .receipt-details th,
                .receipt-details td {
                    padding: 10px;
                    border: none;
                }
                .receipt-details th {
                    width: 40%;
                    text-align: left;
                    color: #333;
                }
                .receipt-details td {
                    text-align: right;
                    color: #555;
                }
                .signature {
                    margin-top: 50px;
                    text-align: right;
                    font-style: italic;
                    color: #666;
                }
                .date-field {
                    text-align: left;
                    margin-bottom: 20px;
                    font-weight: bold;
                    color: #333;
                }
            </style>
        </head>
        <body>
            <div class="receipt-container">
                <div class="receipt-header">
                    <h2>Report Receipt</h2>
                    <p><strong>Receipt ID:</strong> <?php echo $row['id']; ?></p>
                </div>
                <div class="date-field">
                    Date: <?php echo date('Y-m-d'); ?>
                </div>
                <table class="receipt-details">
                    <tr>
                        <th>Student ID:</th>
                        <td><?php echo $row['student_id']; ?></td>
                    </tr>
                    <tr>
                        <th>Student Name:</th>
                        <td><?php echo $row['student_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Report Type:</th>
                        <td><?php echo $row['report_type']; ?></td>
                    </tr>
                    <tr>
                        <th>Mark:</th> <!-- Added the Mark field -->
                        <td><?php echo $row['mark']; ?></td>
                    </tr>
                    <tr>
                        <th>Generation Date:</th>
                        <td><?php echo $row['generation_date']; ?></td>
                    </tr>
                    <tr>
                        <th>Details:</th>
                        <td><?php echo $row['details']; ?></td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                </table>
                <div class="signature">
                    <p>Signature: ____________________</p>
                </div>
                <div class="text-center mt-4">
                    <button onclick="window.print();" class="btn btn-primary">Print Receipt</button>
                    <a href="reports.php" class="btn btn-info">Back</a>
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
