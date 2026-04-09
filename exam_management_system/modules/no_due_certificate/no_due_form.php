<?php
// Include the database configuration file
include '../../config/config.php';

// Check if an ID is passed in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to fetch the student's record
    $query = "SELECT * FROM cms_no_due WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("No record found for the given ID.");
    }
} else {
    die("No ID provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Dues Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 20px;
        }

        .certificate-container {
            width: 900px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
            background-color: #fff;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 14px;
            margin: 5px 0;
        }

        .header .ref-no {
            font-size: 14px;
            margin-top: 10px;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            text-decoration: underline;
            margin: 20px 0;
        }

        .details {
            margin-bottom: 20px;
            font-size: 14px;
        }

        .details span {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 10px;
            font-size: 14px;
            text-align: center;
        }

        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
        }

        .footer-note {
            font-size: 12px;
            margin-top: 10px;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .signature-box {
            width: 45%;
            text-align: center;
            font-size: 14px;
        }

        .signature-box p {
            margin: 5px 0;
        }

        .date-section {
            margin-top: 20px;
            font-size: 14px;
        }

        .important-note {
            font-size: 12px;
            margin-top: 20px;
            font-style: italic;
        }

        .no-dues-certificate {
            border-top: 2px solid #000;
            margin-top: 30px;
            padding-top: 20px;
        }

        .no-dues-certificate h2 {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 20px;
        }

        .no-dues-certificate p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .no-dues-signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .no-dues-signature-box {
            width: 45%;
            text-align: center;
            font-size: 14px;
        }

        @media print {
            button {
                display: none;
            }
            /* Hide other unnecessary elements during printing */
            .important-note {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="header">
            <h1>SIKKIM UNIVERSITY</h1>
            <p>A Central University established by an Act of Parliament in 2007 and accredited by NAAC in 2015</p>
            <p class="ref-no">SU/REG/Estt/F-239/2018/..............</p>
            <h2 class="section-title">NO DUES CERTIFICATE FOR STUDENTS</h2>
        </div>

        <div class="details">
            <p>
                Name of student: <span><?= htmlspecialchars($row['name']) ?></span>
                Regn. No.: <span><?= htmlspecialchars($row['reg_no']) ?></span>
            </p>
            <p>
                Programme: <span><?= htmlspecialchars($row['course']) ?></span>
                Department: <span><?= htmlspecialchars($row['department']) ?></span>
            </p>
            <p>
                The following clearances are requested from all concerned Incharge / Dealing hands for obtaining 'No Dues Certificate':
            </p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>S/No</th>
                    <th>Facility</th>
                    <th>In Charge</th>
                    <th>Signature/Stamp</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Library</td>
                    <td>Assistant Librarian</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Finance</td>
                    <td>DR/SO</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Laboratory (for subject-related students)</td>
                    <td>Lab Assistant / Attendant</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Students Affairs</td>
                    <td>DSW</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Examination</td>
                    <td>Asst./Dy. Registrar/SO</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Hostel Mess</td>
                    <td>Mess Manager</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Hostel</td>
                    <td>Hostel Warden</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Health Centre</td>
                    <td>Sr. MO/MO</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Student ID Card</td>
                    <td>Security Officer/Supervisor</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Email ID (for Ph.D Scholars)</td>
                    <td>System Analyst</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <div class="date-section">
                <p>Date: <?= htmlspecialchars($row['date']) ?></p>
            </div>
            <div class="important-note">
                <p>IMPORTANT: Before issuing the No Dues Certificate, ensure the student has cleared all dues and returned any borrowed items.</p>
            </div>
                </br>
                </br>
            <div class="signature-section">
                <div class="signature-box">
                    <p>Signature of the student</p>
                    <p>Contact No. / email ID</p>
                </div>
                <div class="signature-box">
                    <p>Name & Signature of HoD/In-charge</p>
                </div>
            </div>
                </br>
                </br>
            <div class="signature-section">
                <div class="signature-box">
                    <p>Date: ______________</p>
                </div>
                <div class="signature-box">
                    <p>Dean Students Welfare</p>
                </div>
            </div>
        </div>

        <div class="no-dues-certificate">
            <h2>NO DUES CERTIFICATE</h2>
            <p>
                On the basis of the clearances obtained by the student from various concerned In-charge/dealing hands, it is certified that Shri/Kum/Ms/Mrs. <?= htmlspecialchars($row['name']) ?> has nothing due against him/her.
            </p>
                </br>
                </br>
            <div class="no-dues-signatures">
                <div class="no-dues-signature-box">
                    <p>(Name and Signature of HoD/In-charge)</p>
                </div>
                <div class="no-dues-signature-box">
                    <p>(Dean Students Welfare)</p>
                </div>
            </div>
        </div>
        
    </div>
    <div style="text-align: center; margin-top: 20px;">
    <button onclick="window.print()" style="padding: 10px 20px; font-size: 14px; cursor: pointer;">Print</button>
    <button onclick="window.location.href='no_due_certificate.php'" style="padding: 10px 20px; font-size: 14px; cursor: pointer;">Back</button>
</div>
</body>
</html>
