<?php
ob_start();
include '../../config/config.php'; 
include '../../includes/header.php';

// Check if the ID is passed
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = $conn->prepare("SELECT * FROM cms_bus WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found with the given ID.";
        exit;
    }
} else {
    echo "Invalid ID.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $admission_no = $_POST['admission_no'];
    $section = $_POST['section'];
    $roll_no = $_POST['roll_no'];
    $session = $_POST['session'];
    $address = $_POST['address'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $father_no = $_POST['father_no'];
    $mother_no = $_POST['mother_no'];
    $guardian_name = $_POST['guardian_name'];
    $guardian_no = $_POST['guardian_no'];
    $pickup_point = $_POST['pickup_point'];
    $drop_point = $_POST['drop_point'];
    $area = $_POST['area'];
    $bus_rout_no = $_POST['bus_rout_no'];
    $bus_incharge = $_POST['bus_incharge'];

    $update_query = $conn->prepare("UPDATE cms_bus SET 
        name = ?, admission_no = ?, section = ?, roll_no = ?, session = ?, address = ?, 
        father_name = ?, mother_name = ?, father_no = ?, mother_no = ?, 
        guardian_name = ?, guardian_no = ?, pickup_point = ?, drop_point = ?, 
        area = ?, bus_rout_no = ?, bus_incharge = ? WHERE id = ?");
    $update_query->bind_param("sssssssssssssssssi", 
        $name, $admission_no, $section, $roll_no, $session, $address, 
        $father_name, $mother_name, $father_no, $mother_no, 
        $guardian_name, $guardian_no, $pickup_point, $drop_point, 
        $area, $bus_rout_no, $bus_incharge, $id);

    if ($update_query->execute()) {
        header("Location: view_bus.php?message=Record updated successfully");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Bus Registration & Rules</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            padding: 20px 40px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header-left {
            text-align: left;
        }

        .header-left h1, .header-left h2, .header-left p {
            margin: 5px 0;
        }

        .logo {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .photo-placeholder {
            width: 100px;
            height: 120px;
            border: 1px solid #000;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            font-size: 14px;
            text-align: center;
        }

        h1, h3 {
            text-align: center;
            text-transform: uppercase;
            margin: 20px 0;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        label {
            flex: 0 0 100%;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"], textarea {
            flex: 0 0 100%;
            padding: 8px;
            font-size: 14px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: none;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin: 20px 0 0;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header>
            <div class="header-left">
                <img src="school-logo.png" alt="School Logo" class="logo">
                <h1>S.S.P. Shikshan Sanstha</h1>
                <p class="center-text">(Linguistic Minority Institute)</p>
                <h2>Ganesh International School & Sr. Secondary, Chikhali – Pune 62</h2>
                <p class="center-text">CBSE Affiliation No: 1130632 | UDISE No: 27252001510</p>
            </div>
            <div class="photo-placeholder">Student Photo</div>
        </header>

        <!-- Registration Form Section -->
        <h1>Bus Application Form</h1>
        <form method="POST">
            <label for="name">Name of the Student:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>

            <label for="admission_no">Admission No:</label>
            <input type="text" id="admission_no" name="admission_no" value="<?= htmlspecialchars($row['admission_no']) ?>" required>

            <label for="section">Class-Section:</label>
            <input type="text" id="section" name="section" value="<?= htmlspecialchars($row['section']) ?>" required>

            <label for="roll_no">Roll No:</label>
            <input type="text" id="roll_no" name="roll_no" value="<?= htmlspecialchars($row['roll_no']) ?>" required>

            <label for="session">Session:</label>
            <input type="text" id="session" name="session" value="<?= htmlspecialchars($row['session']) ?>" required>

            <label for="address">Residential Address:</label>
            <textarea id="address" name="address" required><?= htmlspecialchars($row['address']) ?></textarea>

            <label for="father_name">Father's Name:</label>
            <input type="text" id="father_name" name="father_name" value="<?= htmlspecialchars($row['father_name']) ?>" required>

            <label for="mother_name">Mother's Name:</label>
            <input type="text" id="mother_name" name="mother_name" value="<?= htmlspecialchars($row['mother_name']) ?>" required>

            <label for="father_no">Father's No:</label>
            <input type="text" id="father_no" name="father_no" value="<?= htmlspecialchars($row['father_no']) ?>" required>

            <label for="mother_no">Mother's No:</label>
            <input type="text" id="mother_no" name="mother_no" value="<?= htmlspecialchars($row['mother_no']) ?>" required>

            <label for="guardian_name">Guardian Name (if applicable):</label>
            <input type="text" id="guardian_name" name="guardian_name" value="<?= htmlspecialchars($row['guardian_name']) ?>">

            <label for="guardian_no">Guardian Contact No (if applicable):</label>
            <input type="text" id="guardian_no" name="guardian_no" value="<?= htmlspecialchars($row['guardian_no']) ?>">

            <label for="pickup_point">Pick-up Point:</label>
            <input type="text" id="pickup_point" name="pickup_point" value="<?= htmlspecialchars($row['pickup_point']) ?>" required>

            <label for="drop_point">Drop Point:</label>
            <input type="text" id="drop_point" name="drop_point" value="<?= htmlspecialchars($row['drop_point']) ?>" required>

            <label for="area">Area (As per list):</label>
            <input type="text" id="area" name="area" value="<?= htmlspecialchars($row['area']) ?>" required>

            <label for="bus_rout_no">Bus Route No:</label>
            <input type="text" id="bus_rout_no" name="bus_rout_no" value="<?= htmlspecialchars($row['bus_rout_no']) ?>" required>

            <label for="bus_incharge">Bus-In Charge:</label>
            <input type="text" id="bus_incharge" name="bus_incharge" value="<?= htmlspecialchars($row['bus_incharge']) ?>" required>

            <div class="button-row">
                <button type="submit">Submit Application</button>
                <button type="button" onclick="window.location.href='dashboard.php';">Back</button>
            </div>
        </form>
    </div>
</body>
</html>
