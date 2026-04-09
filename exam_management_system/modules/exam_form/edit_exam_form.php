<?php
include '../../config/config.php';

// Check if ID is provided
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the input
    $query = "SELECT * FROM cms_exam_form WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        // Convert comma-separated values back into arrays
        $data['session_time'] = explode(',', $data['session_time']);
        $data['medium'] = explode(',', $data['medium']);
        $data['community'] = explode(',', $data['community']);
    } else {
        echo "No record found!";
        exit;
    }
} else {
    echo "ID not provided!";
    exit;
}

// Update Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $session_time = implode(',', $_POST['session_time'] ?? []);
    $college_name = mysqli_real_escape_string($conn, $_POST['college_name']);
    $center_code = mysqli_real_escape_string($conn, $_POST['center_code']);
    $register_number = mysqli_real_escape_string($conn, $_POST['register_number']);
    $admission_year = mysqli_real_escape_string($conn, $_POST['admission_year']);
    $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
    $father_name = mysqli_real_escape_string($conn, $_POST['father_name']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $medium = implode(',', $_POST['medium'] ?? []);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $community = implode(',', $_POST['community'] ?? []);
    $temporary_address = mysqli_real_escape_string($conn, $_POST['temporary_address']);
    $permanent_address = mysqli_real_escape_string($conn, $_POST['permanent_address']);
    $pin_code = mysqli_real_escape_string($conn, $_POST['pin_code']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
    $d_d_number = mysqli_real_escape_string($conn, $_POST['d_d_number']);
    $d_d_date = mysqli_real_escape_string($conn, $_POST['d_d_date']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);

    $query = "UPDATE cms_exam_form SET 
                session_time = '$session_time', college_name = '$college_name', center_code = '$center_code',
                register_number = '$register_number', admission_year = '$admission_year',
                student_name = '$student_name', father_name = '$father_name', date_of_birth = '$date_of_birth',
                course = '$course', medium = '$medium', sex = '$sex', community = '$community',
                temporary_address = '$temporary_address', permanent_address = '$permanent_address',
                pin_code = '$pin_code', contact_number = '$contact_number', bank_name = '$bank_name',
                d_d_number = '$d_d_number', d_d_date = '$d_d_date', amount = '$amount'
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "<p style='color: green;'>Record updated successfully!</p>";
        $result = mysqli_query($conn, "SELECT * FROM cms_exam_form WHERE id = $id");
        $data = mysqli_fetch_assoc($result);

        // Convert comma-separated values back into arrays
        $data['session_time'] = explode(',', $data['session_time']);
        $data['medium'] = explode(',', $data['medium']);
        $data['community'] = explode(',', $data['community']);
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
    <title>Edit Examination Application</title>
    <style>
        /* Your styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .form-container {
            width: 90%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 24px;
            font-weight: bold;
        }

        header p {
            margin: 5px 0;
            font-size: 14px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table td, table th {
            border: 2px solid #333;
            padding: 8px;
            font-size: 14px;
            vertical-align: top;
            text-align: left;
        }

        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #555;
            border-radius: 4px;
            resize: none;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="number"], input[type="date"], textarea {
            width: calc(100% - 16px);
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #555;
            border-radius: 4px;
        }

        .checkbox-group, .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 10px;
        }

        footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Edit Examination Application</h2>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <table>
            <tr>
                <td>Session Time:</td>
                <td>
                    <label><input type="checkbox" name="session_time[]" value="Day" 
                        <?php echo in_array('Day', $data['session_time']) ? 'checked' : ''; ?>> Day</label>
                    <label><input type="checkbox" name="session_time[]" value="Evening" 
                        <?php echo in_array('Evening', $data['session_time']) ? 'checked' : ''; ?>> Evening</label>
                    <label><input type="checkbox" name="session_time[]" value="CDE" 
                        <?php echo in_array('CDE', $data['session_time']) ? 'checked' : ''; ?>> CDE</label>
                </td>
            </tr>
            <tr>
                <td>College Name:</td>
                <td><input type="text" name="college_name" value="<?php echo $data['college_name']; ?>"></td>
            </tr>
            <tr>
                <td>Center Code:</td>
                <td><input type="text" name="center_code" value="<?php echo $data['center_code']; ?>"></td>
            </tr>
            <tr>
                <td>Register Number:</td>
                <td><input type="text" name="register_number" value="<?php echo $data['register_number']; ?>"></td>
            </tr>
            <tr>
                <td>Admission Year:</td>
                <td><input type="text" name="admission_year" value="<?php echo $data['admission_year']; ?>"></td>
            </tr>
            <tr>
                <td>Student Name:</td>
                <td><input type="text" name="student_name" value="<?php echo $data['student_name']; ?>"></td>
            </tr>
            <tr>
                <td>Father's Name:</td>
                <td><input type="text" name="father_name" value="<?php echo $data['father_name']; ?>"></td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input type="date" name="date_of_birth" value="<?php echo $data['date_of_birth']; ?>"></td>
            </tr>
            <tr>
                <td>Course:</td>
                <td><input type="text" name="course" value="<?php echo $data['course']; ?>"></td>
            </tr>
            <tr>
                <td>Medium:</td>
                <td>
                    <label><input type="checkbox" name="medium[]" value="English" 
                        <?php echo in_array('English', $data['medium']) ? 'checked' : ''; ?>> English</label>
                    <label><input type="checkbox" name="medium[]" value="Tamil" 
                        <?php echo in_array('Tamil', $data['medium']) ? 'checked' : ''; ?>> Tamil</label>
                </td>
            </tr>
            <tr>
                <td>Sex:</td>
                <td>
                    <label><input type="radio" name="sex" value="Male" 
                        <?php echo $data['sex'] === 'Male' ? 'checked' : ''; ?>> Male</label>
                    <label><input type="radio" name="sex" value="Female" 
                        <?php echo $data['sex'] === 'Female' ? 'checked' : ''; ?>> Female</label>
                </td>
            </tr>
            <tr>
                <td>Community:</td>
                <td>
                    <label><input type="checkbox" name="community[]" value="SC" 
                        <?php echo in_array('SC', $data['community']) ? 'checked' : ''; ?>> SC</label>
                    <label><input type="checkbox" name="community[]" value="ST" 
                        <?php echo in_array('ST', $data['community']) ? 'checked' : ''; ?>> ST</label>
                    <label><input type="checkbox" name="community[]" value="BC" 
                        <?php echo in_array('BC', $data['community']) ? 'checked' : ''; ?>> BC</label>
                    <label><input type="checkbox" name="community[]" value="MBC" 
                        <?php echo in_array('MBC', $data['community']) ? 'checked' : ''; ?>> MBC</label>
                    <label><input type="checkbox" name="community[]" value="OC" 
                        <?php echo in_array('OC', $data['community']) ? 'checked' : ''; ?>> OC</label>
                </td>
            </tr>
            <tr>
                <td>Temporary Address:</td>
                <td><textarea name="temporary_address"><?php echo $data['temporary_address']; ?></textarea></td>
            </tr>
            <tr>
                <td>Permanent Address:</td>
                <td><textarea name="permanent_address"><?php echo $data['permanent_address']; ?></textarea></td>
            </tr>
            <tr>
                <td>Pin Code:</td>
                <td><input type="text" name="pin_code" value="<?php echo $data['pin_code']; ?>"></td>
            </tr>
            <tr>
                <td>Contact Number:</td>
                <td><input type="text" name="contact_number" value="<?php echo $data['contact_number']; ?>"></td>
            </tr>
            <tr>
                <td>Bank Name:</td>
                <td><input type="text" name="bank_name" value="<?php echo $data['bank_name']; ?>"></td>
            </tr>
            <tr>
                <td>DD Number:</td>
                <td><input type="text" name="d_d_number" value="<?php echo $data['d_d_number']; ?>"></td>
            </tr>
            <tr>
                <td>DD Date:</td>
                <td><input type="date" name="d_d_date" value="<?php echo $data['d_d_date']; ?>"></td>
            </tr>
            <tr>
                <td>Amount:</td>
                <td><input type="text" name="amount" value="<?php echo $data['amount']; ?>"></td>
            </tr>
        </table>
        <button type="submit">Update Application</button>
         <button type="button" onclick="window.location.href='view_exam_form.php';">Back</button>
    </form>
</div>
</body>
</html>
