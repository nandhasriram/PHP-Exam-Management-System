<?php include '../../config/config.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Updated query based on the hall_ticket structure
    $query = "SELECT ht.*, GROUP_CONCAT(hts.subject_name SEPARATOR ', ') as subjects 
              FROM hall_ticket ht
              LEFT JOIN hall_ticket_subjects hts ON ht.id = hts.hall_ticket_id
              WHERE ht.id = $id
              GROUP BY ht.id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Hall Ticket Receipt - <?php echo $row['id']; ?></title>
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
                <h2>Hall Ticket Receipt</h2>
                <p><strong>Hall Ticket ID:</strong> <?php echo $row['id']; ?></p>
                <div class="date">
                    Date: <?php echo date('Y-m-d'); ?>
                </div>
                <div class="student-info">
                    <div><strong>Register Number:</strong> <?php echo $row['register_number']; ?></div>
                    <div><strong>Student ID:</strong> <?php echo $row['student_id']; ?></div>
                    <div><strong>Student Name:</strong> <?php echo $row['student_name']; ?></div>
                    <div><strong>Course:</strong> <?php echo $row['course']; ?></div>
                    <div><strong>Department:</strong> <?php echo $row['department']; ?></div>
                    <div><strong>Date of Birth:</strong> <?php echo $row['date_of_birth']; ?></div>
                    <div><strong>Issue Date:</strong> <?php echo $row['issue_date']; ?></div>
                    <div><strong>Subjects:</strong> <?php echo $row['subjects']; ?></div>
                </div>
                <div class="footer-section">
                    <div class="date">Date: <?php echo date('Y-m-d'); ?></div>
                    <div class="signature">Signature: ____________________</div>
                </div>
                <div class="text-center mt-4">
                    <button onclick="window.print();" class="btn btn-primary">Print Receipt</button>
                    <a href="hall_ticket.php" class="btn btn-info">Back</a>
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
