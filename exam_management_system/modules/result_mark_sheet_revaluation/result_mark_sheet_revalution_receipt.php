<?php include '../../config/config.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM result_mark_sheet_revalution WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Revaluation Form - <?php echo $row['id']; ?></title>
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
                    <h2>Revaluation Form</h2>
                    <p><strong>Form ID:</strong> <?php echo $row['id']; ?></p>
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
                        <th>Revaluation Form ID:</th>
                        <td><?php echo $row['revolution_form_id']; ?></td>
                    </tr>
                    <tr>
                        <th>Student Name:</th>
                        <td><?php echo $row['student_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Existing Marks:</th> <!-- Added the existing marks field -->
                        <td><?php echo $row['existing_mark']; ?></td>
                    </tr>
                    <tr>
                        <th>Revised Marks:</th>
                        <td><?php echo $row['revised_marks']; ?></td>
                    </tr>
                    <tr>
                        <th>Result Status:</th>
                        <td><?php echo $row['result_status']; ?></td>
                    </tr>
                    <tr>
                        <th>Result Date:</th>
                        <td><?php echo $row['result_date']; ?></td>
                    </tr>
                </table>
                <div class="signature">
                    <p>Signature: ____________________</p>
                </div>
                <div class="text-center mt-4">
                    <button onclick="window.print();" class="btn btn-primary">Print Form</button>
                    <a href="result_mark_sheet_revalution.php" class="btn btn-info">Back</a>
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
