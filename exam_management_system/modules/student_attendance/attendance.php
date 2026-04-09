<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination Attendance Sheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #000;
            background-color: #fff;
        }

        .sheet-header {
            text-align: center;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .sheet-header h2 {
            font-size: 16px;
            margin: 0;
            font-weight: bold;
        }

        .sheet-header .header-row {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin: 3px 0;
        }

        .attendance-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .attendance-table th,
        .attendance-table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
            font-size: 14px;
        }

        .attendance-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .attendance-table td {
            height: 20px;
        }

        .attendance-table tfoot td {
            text-align: left;
            padding: 8px;
            font-size: 14px;
            font-weight: bold;
            
        }

        .sheet-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .signature-box {
            width: 45%;
            text-align: center;
            font-size: 14px;
            border-top: 1px solid #000;
            padding-top: 10px;
        }

        .small-note {
            font-size: 14px;
            text-align: left;
            margin-top: 10px;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .action-buttons button,
        .action-buttons a {
            padding: 10px 20px;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .action-buttons button {
            background-color: #007bff;
        }

        .action-buttons a {
            background-color: #28a745;
        }

        .action-buttons button:hover {
            background-color: #0056b3;
        }

        .action-buttons a:hover {
            background-color: #218838;
        }

        @media print {
            .action-buttons {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="sheet-header">
            <h2>ANNA UNIVERSITY CHENNAI – 25</h2>
            <h2>EXAMINATION ATTENDANCE SHEET</h2>
            <div class="header-row">
                <p style="text-align: left;">College:________________ </p>
                <p style="text-align: right;">Programme: ________________</p>
            </div>
            <div class="header-row">
                <p style="text-align: left;">Semester: ________________</p>
                <p style="text-align: right;">Subject: ________________</p>
            </div>
            <p style="text-align: center;">Date of Exam: </p>
        </header>

        <table class="attendance-table">
            <thead>
                <tr>
                    <th>Reg. No.</th>
                    <th>Name</th>
                    <th>Answer Book No.</th>
                    <th>HS to write 'AB' for absentee</th>
                    <th>Signature of the Candidate</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- Add more rows as needed -->
                <!-- Empty rows for exact structure -->
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- Add more empty rows if necessary -->
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Page Total Present: ______ | Page Total Absent: ______</td>
                </tr>
            </tfoot>
        </table>

    </br>
        <footer>
            <div class="sheet-footer">
                <div class="signature-box">
                    Signature of the Hall Superintendent<br>with Name and Designation
                </div>
                <div class="signature-box">
                    Signature of the Chief Superintendent<br>with Name and Designation
                </div>
            </div>
    </br>
            <div class="small-note">
                <p>* FN indicates Forenoon session</p>
                <p>* Use "AB" for absent candidates in the HS column</p>
            </div>
        </footer>
        <div class="action-buttons">
            <button onclick="window.print();">Print</button>
            <a href="dashboard.php">Back</a>
        </div>
    </div>
</body>
</html>
