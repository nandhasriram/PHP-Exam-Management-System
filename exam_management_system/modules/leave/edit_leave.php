<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "exam_management";

$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data for editing
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM cms_leave WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<p style='color: red;'>Record not found.</p>";
        exit;
    }
}

// Update data on form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']); // Primary key

    // Sanitize and collect input values
    $type_of_leave = mysqli_real_escape_string($conn, $_POST['type_of_leave']);
    $available_leave = intval($_POST['available_leave']);
    $balance_leave = intval($_POST['balance_leave']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $roll_no = mysqli_real_escape_string($conn, $_POST['roll_no']);
    $program = mysqli_real_escape_string($conn, $_POST['program']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $hostel_address = mysqli_real_escape_string($conn, $_POST['hostel_address']);
    $hall_no = mysqli_real_escape_string($conn, $_POST['hall_no']);
    $days_from = mysqli_real_escape_string($conn, $_POST['days_from']);
    $days_to = mysqli_real_escape_string($conn, $_POST['days_to']);
    $prefix_date = mysqli_real_escape_string($conn, $_POST['prefix_date']);
    $suffix_date = mysqli_real_escape_string($conn, $_POST['suffix_date']);
    $purpose_of_leave = mysqli_real_escape_string($conn, $_POST['purpose_of_leave']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    // Update query
    $query = "UPDATE cms_leave SET 
                type_of_leave = '$type_of_leave',
                available_leave = $available_leave,
                balance_leave = $balance_leave,
                name = '$name',
                roll_no = '$roll_no',
                program = '$program',
                department = '$department',
                hostel_address = '$hostel_address',
                hall_no = '$hall_no',
                days_from = '$days_from',
                days_to = '$days_to',
                prefix_date = '$prefix_date',
                suffix_date = '$suffix_date',
                purpose_of_leave = '$purpose_of_leave',
                address = '$address',
                contact_no = '$contact_no',
                date = '$date'
              WHERE id = $id";
              
    if (mysqli_query($conn, $query)) {
        echo "<p style='color: green;'>Record updated successfully!</p>";
        // Refresh data after update
        header("Location: edit_leave.php?id=$id");
        exit;
    } else {
        echo "<p style='color: red;'>Error updating record: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Leave Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
        form {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        table td:first-child {
            text-align: left;
            font-weight: bold;
            background-color: #f2f2f2;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-actions {
            text-align: center;
            margin-top: 20px;
        }
        .form-actions input[type="submit"] {
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-actions input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Edit Leave Application</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <table>
            <!-- Table rows for each field -->
            <tr>
                <td>Type of Leave</td>
                <td>
                    <select name="type_of_leave">
                        <option value="Short Leave" <?php echo $data['type_of_leave'] == 'Short Leave' ? 'selected' : ''; ?>>Short Leave</option>
                        <option value="Medical Leave" <?php echo $data['type_of_leave'] == 'Medical Leave' ? 'selected' : ''; ?>>Medical Leave</option>
                        <option value="Casual Leave" <?php echo $data['type_of_leave'] == 'Casual Leave' ? 'selected' : ''; ?>>Casual Leave</option>
                    </select>
                </td>
                
            </tr>
            <tr><td>Available Leave</td>
                <td><input type="number" name="available_leave" value="<?php echo $data['available_leave']; ?>"></td>
                <td>Balance Leave</td>
                <td><input type="number" name="balance_leave" value="<?php echo $data['balance_leave']; ?>"></td>
                
            </tr>
            <tr><td>Name</td>
                <td><input type="text" name="name" value="<?php echo htmlspecialchars($data['name']); ?>"></td>
                <td>Roll No.</td>
                <td><input type="text" name="roll_no" value="<?php echo $data['roll_no']; ?>"></td>
                
            </tr>
            <tr><td>Program</td>
                <td><input type="text" name="program" value="<?php echo $data['program']; ?>"></td>
                <td>Department</td>
                <td><input type="text" name="department" value="<?php echo $data['department']; ?>"></td>
                
            </tr>
            <tr><td>Hostel Address</td>
                <td><input type="text" name="hostel_address" value="<?php echo $data['hostel_address']; ?>"></td>
                <td>Hall No.</td>
                <td><input type="text" name="hall_no" value="<?php echo $data['hall_no']; ?>"></td>
                
            </tr>
            <tr><td>Days From</td>
                <td><input type="date" name="days_from" value="<?php echo $data['days_from']; ?>"></td>
                <td>Days To</td>
                <td><input type="date" name="days_to" value="<?php echo $data['days_to']; ?>"></td>
                >
            </tr>
            <tr><td>Prefix Date</td>
                <td><input type="date" name="prefix_date" value="<?php echo $data['prefix_date']; ?>"></td>
                <td>Suffix Date</td>
                <td><input type="date" name="suffix_date" value="<?php echo $data['suffix_date']; ?>"></td>
            </tr>
            <tr>
                <td>Purpose of Leave</td>
                <td><input type="text" name="purpose_of_leave" value="<?php echo $data['purpose_of_leave']; ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" value="<?php echo $data['address']; ?>"></td>
            </tr>
            <tr>
                <td>Contact No.</td>
                <td><input type="text" name="contact_no" value="<?php echo $data['contact_no']; ?>"></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><input type="date" name="date" value="<?php echo $data['date']; ?>"></td>
            </tr>
        </table>
        <div class="form-actions" style="display: flex; justify-content: center; gap: 10px;">
    <input type="submit" value="Update">
    <a href="view_leave_form.php" style="text-decoration: none;">
        <button type="button" style="padding: 10px 20px; color: #fff; background-color: #6c757d; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Back</button>
    </a>
</div>

    </form>
</body>
</html>
