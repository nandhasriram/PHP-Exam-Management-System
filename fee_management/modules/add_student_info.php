<?php
// Include the database connection file
//include '../config/db.php';
include '../template/header.php';
error_reporting (E_ALL ^ E_NOTICE);
error_reporting(0);
$host = 'localhost';    // Database host (usually 'localhost')
$dbname = 'jpninfot_ims_db';   // Database name
$username = 'jpninfot_user';    // Database username
$password = '';        // Database password (leave blank if not set)

try {
    // PDO is used to connect to the database
  //  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn = new PDO("mysql:host=localhost;dbname=ims_jpninfot_db", "root","");
    // Set the PDO error mode to exception for better error handling
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optional: Display a message if connected successfully
    
} catch (PDOException $e) {
    // Display error message in case connection fails
    echo "Connection failed: " . $e->getMessage();
}
// Initialize variables for form fields and error messages
$error = '';
$success = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data and sanitize
    
    $admissionNo = trim($_POST['admissionNo']);
    $studentName = trim($_POST['studentName']);
    $admissionClass = trim($_POST['admissionClass']);
    $admissionSection = trim($_POST['admissionSection']);
    $date = $_POST['date'];
    $dobdd = $_POST['dobdd'];
    $dobmm = $_POST['dobmm'];
    $dobyy = $_POST['dobyy'];
    $gender = $_POST['gender'];
    $age = (int)$_POST['age'];
    
    $religion = trim($_POST['religion']);
    $nationality = trim($_POST['nationality']);
    $community = trim($_POST['community']);
    $caste = trim($_POST['caste']);
    $PresentResPhone = trim($_POST['PresentResPhone']);
    $PresentEmail = trim($_POST['PresentEmail']);
    $date=date("d/m/Y");
    // Validation
    if ($age <= 0) {
        $error = 'Age must be a positive number.';
    } //elseif (!preg_match('/^\d{6}$/', $presentPinCode)) {
       // $error = 'Pin Code must be a 6-digit number.';
    //} 
    
    else {
        try {
            // Begin transaction
            $conn->beginTransaction();

            // Insert data into `admisapplicastuddetail` table
            $stmt = $conn->prepare("INSERT INTO admisapplicastuddetail 
                (AdmissionNo, StudentName, admissionClass, admissionSection, Date, dobdd, dobmm, dobyy, Gender, Age, Religion, Nationality, Community, Caste, PresentResPhone, PresentEmail) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$admissionNo, $studentName, $admissionClass, $admissionSection, $date, $dobdd, $dobmm, $dobyy, $gender, $age, $religion, $nationality, $community, $caste, $PresentResPhone, $PresentEmail]);

            // Commit transaction
            $conn->commit();
            $success = 'Student record added successfully!';
        } catch (PDOException $e) {
            $conn->rollBack();
            $error = 'Error: ' . $e->getMessage();
        }
    }
}
//$conn = null;
try {
$stmt = $conn->prepare("SELECT MAX(AdmissionNo) as madn FROM admisapplicastuddetail ");
$stmt->execute();

// set the resulting array to associative
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
if (count($results) > 0) {
    foreach ($results as $row) {
         $AdmissionNocount = $row['madn'];
       //echo htmlspecialchars($row['madn'] ?? '');
    }
}
} catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}
$conn = null;
$AdmissionNocount++;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form</title>
    <style>
        /* CSS styles */
        .container {
            width: 70%;
            margin: 20px auto;
            border: 3px solid #a3d07a;
            padding: 20px;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
        }
        .container h2 {
            text-align: center;
            font-size: 1.4em;
            color: #333;
            border-bottom: 3px solid #a3d07a;
            padding-bottom: 10px;
            margin-top: 0;
        }
        .message {
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
        }
        .success {
            color: green;
            background-color: #e7f4e4;
        }
        .error {
            color: red;
            background-color: #f8d7da;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .form-group {
            flex: 1;
            margin: 0 10px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 1em;
            box-sizing: border-box;
        }
        .button-group {
            text-align: center;
            margin-top: 20px;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 1em;
            border-radius: 3px;
            font-weight: bold;
            margin: 5px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student Information</h2>

        <?php if ($success): ?>
            <p class="message success"><?php echo htmlspecialchars($success); ?></p>
        <?php elseif ($error): ?>
            <p class="message error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form action="add_student_info.php" method="post">
            <div class="form-row">
                
                <div class="form-group">
                    <label for="addmissionNo">Admission Number</label>
                    <input type="text" id="admissionNo" name="admissionNo" value="<?php echo $AdmissionNocount; ?>" required>
                </div>
                <div class="form-group">
                    <label for="studentName">Student Name</label>
                    <input type="text" id="studentName" name="studentName" required>
                </div>
            </div>

            <div class="form-row">
                
                <div class="form-group">
                    <label for="admissionClass">Class</label>
                    <input type="text" id="admissionClass" name="admissionClass" required>
                </div>
                <div class="form-group">
                    <label for="admissionSection">Section</label>
                    <input type="text" id="admissionSection" name="admissionSection" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="dobdd">Date of Birth Date</label>
                    <input type="text" id="dobdd" name="dobdd" required>
                </div>
                <div class="form-group">
                    <label for="dobmm">Date of Birth Month</label>
                    <input type="text" id="dobmm" name="dobmm" required>
                </div>
                <div class="form-group">
                    <label for="dobyy">Date of Birth Year</label>
                    <input type="text" id="dobyy" name="dobyy" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            

            
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="religion">Religion</label>
                    <input type="text" id="religion" name="religion" required>
                </div>
            

            
                
                <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <input type="text" id="nationality" name="nationality" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="community">Community</label>
                    <input type="text" id="community" name="community" required>
                </div>
            

            
                
                <div class="form-group">
                    <label for="caste">Caste</label>
                    <input type="text" id="caste" name="caste" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="PresentResPhone">Phone No</label>
                    <input type="text" id="PresentResPhone" name="PresentResPhone" required>
                </div>
            

            
                
                <div class="form-group">
                    <label for="PresentEmail">Email Id</label>
                    <input type="text" id="PresentEmail" name="PresentEmail">
                </div>
            </div>

            

            <div class="button-group">
                <button type="submit" class="button">Submit</button>
                <button type="button" class="button" onclick="window.location.href='../dashboard.php'">Back</button>
            </div>
        </form>
    </div>
</body>
</html>
