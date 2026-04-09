<?php 
// Include database connection
include '../../config/config.php'; 
include '../../includes/header.php'; 

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $name = $conn->real_escape_string($_POST['name']);

    // Fetch student data from the database using name
    $query = "SELECT * FROM cms_hall_ticket WHERE name = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $students = $result->fetch_all(MYSQLI_ASSOC);

    if (!$students) {
        echo "<p style='text-align: center; color: red;'>Error: No Hall Ticket Found for Name: " . htmlspecialchars($name) . "</p>";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .container {
            text-align: center;
        }

        .hall-ticket {
            width: 900px;
            margin: 20px auto;
            padding: 15px;
            border: 2px solid #000;
            background-color: #fff;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        .header h2 {
            font-size: 13px;
            margin: 5px 0;
        }

        .header h3 {
            font-size: 13px;
            text-decoration: underline;
            margin: 10px 0;
        }

        .form-section {
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 20px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .form-row label {
            font-size: 14px;
            font-weight: bold;
            width: 35%;
        }

        .input-box {
            width: 60%;
            border: 1px solid #000;
            height: 25px;
            padding-left: 5px;
            line-height: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-size: 14px;
        }

        table th {
            background-color: rgb(9, 5, 5);
            color: white;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin-top: 10px;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container button {
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            margin: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Exam Management System</h1>
    
    <!-- Form to Fetch Hall Ticket -->
    <form method="POST" style="text-align: center; margin-bottom: 20px;">
        <label for="name">Enter Student Name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Fetch Hall Ticket</button>
    </form>

    <?php if (!empty($students)): ?>
        <div class="hall-ticket" id="hallTicket">
            <h2>BHARATHIDASAN UNIVERSITY, TIRUCHIRAPPALLI - 620 024</h2>
            <h3>Degree Examinations, Nov. / Apr. 20XX</h3>
            <h3>HALL TICKET</h3>

            <!-- Display Student Details (Using First Record) -->
            <?php $student = $students[0]; ?>
            <div class="form-row">
                <label>Name:</label>
                <div class="input-box"><?php echo htmlspecialchars($student['name']); ?></div>
            </div>
            <div class="form-row">
                <label>Register Number:</label>
                <div class="input-box"><?php echo htmlspecialchars($student['register_no']); ?></div>
            </div>
            <div class="form-row">
                <label>Current Semester:</label>
                <div class="input-box"><?php echo htmlspecialchars($student['current_semester']); ?></div>
            </div>
            <div class="form-row">
                <label>Degree & Branch:</label>
                <div class="input-box"><?php echo htmlspecialchars($student['degree_branch']); ?></div>
            </div>
            <div class="form-row">
                <label>Examination Centre:</label>
                <div class="input-box"><?php echo htmlspecialchars($student['exam_center']); ?></div>
            </div>

            <!-- Display Multiple Subjects -->
            <table>
                <thead>
                    <tr>
                        <th>Sub. Code</th>
                        <th>Subject</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($student['subject_code']); ?></td>
                            <td><?php echo htmlspecialchars($student['subject']); ?></td>
                            <td><?php echo htmlspecialchars($student['semester']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="footer">
                <p>The Photo and Hall Ticket are valid only if attested by the Principal</p>
            </div>
        </div>

        <div class="button-container">
    <button onclick="window.location.href='dashboard.php'">Back</button>

    <button onclick="window.print()">Print</button>

</div>

    <?php endif; ?>
</div>



</body>
</html>
