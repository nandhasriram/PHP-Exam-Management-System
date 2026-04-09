<?php 
ob_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revaluation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f5f5f5;
        }

        .form-container {
            max-width: 1150px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-bottom: 20px;
            text-align: center;
        }

        .header img {
            max-width: 80px;
            height: auto;
            margin-bottom: 10px;
        }

        .header h2, .header h3, .header h4 {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .full-width {
            width: 100%;
        }

        .details-table{
            width: 80%;
        }

        .details-table th, td {
            background-color: #f0f0f0;
            
        }

        .signature {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .signature label {
            display: flex;
            flex-direction: column;
        }

        .office-use {
            margin-top: 20px;
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007BFF;
            color: #fff;
        }

        .button-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    include '../../config/config.php'; // Database configuration file
    include '../../includes/header.php'; // Header inclusion

    $formData = [];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM cms_revaluation_form WHERE id='$id'";
        $result = $conn->query($query);
        $formData = $result->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'] ?? null;
        $application_number = $_POST['application_number'];
        $campus = $_POST['campus'] ?? '';
        $name = $_POST['name'];
        $roll_number = $_POST['roll_number'];
        $program = $_POST['program'] ?? '';
        $branch = $_POST['branch'];
        $mobile_no = $_POST['mobile_no'];
        $email = $_POST['email'];
        $mode = $_POST['mode'] ?? '';
        $sl_no = $_POST['sl_no'];
        $semester_no = $_POST['semester_no'];
        $subject_code = $_POST['subject_code'];
        $subject_title = $_POST['subject_title'];
        $regular_arrear = $_POST['regular_arrear'];
        $challan_date = $_POST['challan_date'];
        $bank_details = $_POST['bank_details'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];

        $query = $id
            ? "UPDATE cms_revaluation_form SET 
                application_number='$application_number', campus='$campus', name='$name', roll_number='$roll_number', 
                program='$program', branch='$branch', mobile_no='$mobile_no', email='$email', mode='$mode', 
                sl_no='$sl_no', semester_no='$semester_no', subject_code='$subject_code', subject_title='$subject_title', regular_arrear='$regular_arrear',
                challan_date='$challan_date', bank_details='$bank_details', amount='$amount', date='$date' 
                WHERE id='$id'"
            : "INSERT INTO cms_revaluation_form (application_number, campus, name, roll_number, program, branch, mobile_no, email, mode, sl_no, semester_no, subject_code, subject_title, regular_arrear, challan_date, bank_details, amount, date) 
                VALUES ('$application_number', '$campus', '$name', '$roll_number', '$program', '$branch', '$mobile_no', '$email', '$mode', '$sl_no', '$semester_no', '$subject_code', '$subject_title', '$regular_arrear', '$challan_date', '$bank_details', '$amount', '$date')";

        if ($conn->query($query) === TRUE) {
            echo '<div class="alert alert-success">Revaluation form saved successfully</div>';
            header('Location: view_revaluation.php');
            exit();
        } else {
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
    ?>

    <div class="form-container">
        <div class="header">
            <img src="/exam_management_system/assets/image/logo.png" alt="University Logo">
            <h2>ANNA UNIVERSITY, CHENNAI – 600 025.</h2>
            <h3>Office of the Additional Controller of Examinations (University Departments)</h3>
            <h4>APPLICATION FOR REVALUATION OF ANSWER SCRIPT - Session – ………….</h4>
        </div>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $formData['id'] ?? ''; ?>">
            <table>
                <tr>
                    <td>Application Number</td>
                    <td><input type="text" name="application_number" value="<?php echo $formData['application_number'] ?? ''; ?>"></td>
                    <td>Campus (Tick ✓)</td>
                    <td>
                        <label><input type="checkbox" name="campus" value="CEG" <?php echo isset($formData['campus']) && $formData['campus'] === 'CEG' ? 'checked' : ''; ?>> CEG</label>
                        <label><input type="checkbox" name="campus" value="MIT" <?php echo isset($formData['campus']) && $formData['campus'] === 'MIT' ? 'checked' : ''; ?>> MIT</label>
                        <label><input type="checkbox" name="campus" value="ACT" <?php echo isset($formData['campus']) && $formData['campus'] === 'ACT' ? 'checked' : ''; ?>> ACT</label>
                        <label><input type="checkbox" name="campus" value="SAP" <?php echo isset($formData['campus']) && $formData['campus'] === 'SAP' ? 'checked' : ''; ?>> SAP</label>
                    </td>
                </tr>
                <tr>
                    <td>Name in Block Letters</td>
                    <td colspan="3"><input type="text" name="name" class="full-width" value="<?php echo $formData['name'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>Roll Number</td>
                    <td colspan="3"><input type="text" name="roll_number" value="<?php echo $formData['roll_number'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>Program</td>
                    <td colspan="3">
                        <label><input type="radio" name="program" value="B.E/B.Tech" <?php echo isset($formData['program']) && $formData['program'] === 'B.E/B.Tech' ? 'checked' : ''; ?>> B.E / B.Tech</label>
                        <label><input type="radio" name="program" value="B.Arch" <?php echo isset($formData['program']) && $formData['program'] === 'B.Arch' ? 'checked' : ''; ?>> B.Arch</label>
                        <label><input type="radio" name="program" value="M.E/M.Tech" <?php echo isset($formData['program']) && $formData['program'] === 'M.E/M.Tech' ? 'checked' : ''; ?>> M.E / M.Tech</label>
                        <label><input type="radio" name="program" value="M.Sc" <?php echo isset($formData['program']) && $formData['program'] === 'M.Sc' ? 'checked' : ''; ?>> M.Sc</label>
                        <label><input type="radio" name="program" value="M.Arch/M.Plan" <?php echo isset($formData['program']) && $formData['program'] === 'M.Arch/M.Plan' ? 'checked' : ''; ?>> M.Arch / M.Plan</label>
                        <label><input type="radio" name="program" value="Others" <?php echo isset($formData['program']) && $formData['program'] === 'Others' ? 'checked' : ''; ?>> Others (specify)</label>
                    </td>
                </tr>
                <tr>
                    <td>Branch / Specialization</td>
                    <td colspan="3"><input type="text" name="branch" value="<?php echo $formData['branch'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>Mobile No.</td>
                    <td><input type="text" name="mobile_no" value="<?php echo $formData['mobile_no'] ?? ''; ?>"></td>
                    <td>E-mail ID</td>
                    <td><input type="text" name="email" value="<?php echo $formData['email'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>Mode (Tick ✓)</td>
                    <td colspan="3">
                        <label><input type="radio" name="mode" value="fullTime" <?php echo isset($formData['mode']) && $formData['mode'] === 'fullTime' ? 'checked' : ''; ?>> Full Time</label>
                        <label><input type="radio" name="mode" value="partTime" <?php echo isset($formData['mode']) && $formData['mode'] === 'partTime' ? 'checked' : ''; ?>> Part Time</label>
                    </td>
                </tr>
            </table>

            <h4>DETAILS OF REVALUATION APPLIED</h4>
            <table class="details-table" id="detailsTable">
            <thead>
                <tr>
                    <th>Sl. No</th>
                    <th>Sem No</th>
                    <th>Subject Code</th>
                    <th>Subject Title</th>
                    <th>Regular / Arrear</th>
                    
                </tr>
            </thead>
            <tbody>
                
                        <tr>
                            <td><input type="text" name="sl_no" value="<?php echo $formData['sl_no'] ?? ''; ?>"></td>
                            <td><input type="text" name="semester_no" value="<?php echo $formData['semester_no'] ?? ''; ?>"></td>
                            <td><input type="text" name="subject_code" value="<?php echo $formData['subject_code'] ?? ''; ?>"></td>
                            <td><input type="text" name="subject_title" value="<?php echo $formData['subject_title'] ?? ''; ?>"></td>
                            <td><input type="text" name="regular_arrear" value="<?php echo $formData['regular_arrear'] ?? ''; ?>"></td>
                            
                        </tr>
                    
                 
            </tbody>
        </table>
            

            <h4>Details of Fee Payment (Enclose the original challan - ACOE copy)</h4>
            <table>
                <tr>
                    <td>Challan Date</td>
                    <td><input type="date" name="challan_date" value="<?php echo $formData['challan_date'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>Bank Details</td>
                    <td><input type="text" name="bank_details" value="<?php echo $formData['bank_details'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td>Amount (Rs)</td>
                    <td><input type="text" name="amount" value="<?php echo $formData['amount'] ?? ''; ?>"></td>
                </tr>
            </table>

            <p>Revaluation of Answer Scripts: Rs.200/- per answer script.</p>

            <h4>Declaration</h4>
            <p>
                I agree to consider my revalued grade / mark as final irrespective of any improvement or not.
                Also, I am aware that my application may be rejected due to submission of wrong / incomplete information.
            </p>

            <div class="signature">
                <label>Date: <input type="date" name="date" value="<?php echo $formData['date'] ?? ''; ?>"></label>
                <label>Signature of the Student: <input type="text" name="signature"></label>
            </div>

            <div class="button-container">
                <button type="submit">Submit</button>
                <button type="button" onclick="goToDashboard()">Back</button>
            </div>
        </form>
    </div>

    <script>
        

        function goToDashboard() {
            window.location.href = "view_revaluation.php";
        }
    </script>
</body>
</html>
<?php ob_end_flush(); // End output buffering ?>