<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered ID Card Design</title>
    <style>
        /* Centering the page content */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        /* ID Card Container */
        .id-card {
            width: 350px;
            height: 200px;
            border: 2px solid #000;
            border-radius: 10px;
            font-family: Arial, sans-serif;
            position: relative;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        /* Header Section */
        .id-card-header {
            background-color: #1a2a6c;
            color: #fff;
            text-align: center;
            padding: 5px;
            border-radius: 8px 8px 0 0;
            font-size: 14px;
            font-weight: bold;
        }

        /* Photo Section */
        .photo {
            float: left;
            width: 80px;
            height: 100px;
            border: 1px solid #000;
            border-radius: 5px;
            margin: 10px 15px 10px 10px;
        }

        /* Details Section */
        .details {
            font-size: 14px;
            color: #000;
            margin-left: 110px;
            line-height: 1.5;
        }

        .details span {
            font-weight: bold;
            color: #d13b3b;
        }

        /* Barcode Section */
        .barcode {
            position: absolute;
            bottom: 10px;
            left: 10px;
        }

        .barcode img {
            width: 100px;
        }

        /* Principal Signature */
        .signature {
            position: absolute;
            bottom: 10px;
            right: 10px;
            text-align: center;
        }

        .signature img {
            width: 80px;
            display: block;
        }

        .signature p {
            font-size: 12px;
            margin: 0;
        }
        @media print {
            .no-print, .back-button {
                display: none;
            }
            body {
                background-color: #fff;
            }
        }
    </style>
</head>
<body>
    <?php
    // Enable error reporting for debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Database connection
    $conn = new mysqli("localhost", "root", "", "ims_jpninfot_db");
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Check if 'id' exists in the URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']); // Sanitize input

        // Fetch student data
        $query = "SELECT * FROM admisapplicastuddetail WHERE AdmissionNo = $id";
        $result = $conn->query($query);

        if (!$result) {
            die("Error in query: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
    <div class="id-card">
        <div class="id-card-header">
            COLLEGE Name OF ENGINEERING<br>
            <span style="font-size: 12px;">(An ISO 9001 - 2008 Certified Institution)</span>
        </div>
        <img class="photo" src="photo.jpg" alt="Student Photo">
        <div class="details">
            Name: <span><?php echo htmlspecialchars($row['StudentName']); ?></span><br>
            Gender: <span><?php echo htmlspecialchars($row['Gender']); ?></span><br>
            Reg. No.: <span><?php echo htmlspecialchars($row['AdmissionNo']); ?></span><br>
            Year: <span><?php echo htmlspecialchars($row['dobdd ']) . " - " . htmlspecialchars($row['dobmm']) . " - " . htmlspecialchars($row['dobyy']); ?></span><br>
            Age: <span><?php echo htmlspecialchars($row['Age']); ?></span>
        </div>
        <div class="barcode">
            <img src="barcode.jpg" alt="Barcode">
        </div>
        <div class="signature">
            <img src="signature.jpg" alt="Principal's Signature">
            <p>Principal</p>
        </div>
    </div>
    <?php
        } else {
            echo "<p>No student data found!</p>";
        }
    } else {
        echo "<p>Invalid or missing student ID!</p>";
    }

    $conn->close();
    ?>
    <div style="text-align: center;" class="no-print">
        <button class="btn btn-primary mt-3"><a href="Studentidcard.php" class="btn btn-info">Back</a></button>
        <button onclick="window.print()" class="btn btn-primary mt-3">Print</button>
    </div>
</body>
</html>
