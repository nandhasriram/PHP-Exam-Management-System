<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG Examination Application</title>
    <style>
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

        .print-button-container {
            text-align: center;
            margin: 20px 0;
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
        <header>
            <h1>BHARATHIDASAN UNIVERSITY</h1>
            <p>TIRUCHIRAPPALLI - 620 024.</p>
            <p>(Re-Accredited with 'A' Grade among the Universities by NAAC)</p>
            <p>For the candidates admitted in the year <span>20__ - 20__</span></p>
        </header>
        <h2>P.G. Degree Examination Application</h2>
        <p>(All P.G. / M.C.A. / M.B.A. / M.S.I.T / Diploma Courses)</p>

        <table>
            <tr>
                <td>Semester:</td>
                <td colspan="3">
                    <label><input type="checkbox"> Day</label>
                    <label><input type="checkbox"> Evening</label>
                    <label><input type="checkbox"> CDE</label>
                </td>
            </tr>
            <tr>
                <td>Name of the College / Centre:</td>
                <td colspan="3"><input type="text"></td>
            </tr>
            <tr>
                <td>Centre Code:</td>
                <td><input type="text"></td>
                <td>Register Number:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Year of Admission:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Name of the Candidate (as per H.S.C. Records):</td>
                <td colspan="3"><input type="text"></td>
            </tr>
            <tr>
                <td>Name of the Father / Guardian:</td>
                <td colspan="3"><input type="text"></td>
            </tr>
            <tr>
                <td>Date of Birth (as per H.S.C. Records):</td>
                <td colspan="3"><input type="date"></td>
            </tr>
            <tr>
                <td>Name of the Course with Main Subject:</td>
                <td colspan="3"><input type="text"></td>
            </tr>
        </table>

        <div class="section-title">Medium of Instruction:</div>
        <div class="checkbox-group">
            <label><input type="checkbox"> English</label>
            <label><input type="checkbox"> Tamil</label>
        </div>

        <div class="section-title">Sex:</div>
        <div class="radio-group">
            <label><input type="radio" name="sex"> Male</label>
            <label><input type="radio" name="sex"> Female</label>
        </div>

        <div class="section-title">Community:</div>
        <div class="checkbox-group">
            <label><input type="checkbox"> SC</label>
            <label><input type="checkbox"> ST</label>
            <label><input type="checkbox"> MBC</label>
            <label><input type="checkbox"> BC</label>
            <label><input type="checkbox"> OC</label>
        </div>

        <div class="section-title">Address:</div>
        <table>
            <tr>
                <td>Temporary Address:</td>
                <td><textarea></textarea></td>
            </tr>
            <tr>
                <td>Permanent Address:</td>
                <td><textarea></textarea></td>
            </tr>
            <tr>
                <td>Pin:</td>
                <td><input type="text"></td>
                <td>Contact No:</td>
                <td><input type="text"></td>
            </tr>
        </table>

        <div class="section-title">Fee Particulars:</div>
        <table>
            <tr>
                <td>Name of the Bank and Place:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>D.D. Number:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="date"></td>
            </tr>
            <tr>
                <td>Amount Rs. (In Words):</td>
                <td><input type="text"></td>
            </tr>
        </table>
    </br>
    </br>
    </br>
        <footer>
            <div>
                <p>Signature of the Principal / Director</p>
                <p>(with Date and Seal)</p>
            </div>
            <div>
                <p>Signature of the Candidate</p>
                <p>(with Date)</p>
            </div>
        </footer>

    </br>

        <h2>Papers Now Appearing</h2>

        <!-- Table for Semesters I, II, and III -->
        <table>
            <thead>
                <tr>
                    <th colspan="2">I SEMESTER</th>
                    <th colspan="2">II SEMESTER</th>
                    <th colspan="2">III SEMESTER</th>
                </tr>
                <tr>
                    <th>Sub. Code</th>
                    <th>Subject</th>
                    <th>Sub. Code</th>
                    <th>Subject</th>
                    <th>Sub. Code</th>
                    <th>Subject</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
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
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <!-- Table for Semesters IV, V, and VI -->
        <table>
            <thead>
                <tr>
                    <th colspan="2">IV SEMESTER</th>
                    <th colspan="2">V SEMESTER</th>
                    <th colspan="2">VI SEMESTER</th>
                </tr>
                <tr>
                    <th>Sub. Code</th>
                    <th>Subject</th>
                    <th>Sub. Code</th>
                    <th>Subject</th>
                    <th>Sub. Code</th>
                    <th>Subject</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
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
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="instructions">
            <h2>Instructions to the Candidates</h2>
            <ol>
                <li>The Candidates should read all the instructions carefully and fill in the application in his/her own handwriting.</li>
                <li>Students are advised to give the correct title of papers and corresponding subject codes, so as to be admitted for the papers for which he/she is appearing in this examination only.</li>
                <li>Request for change of subject, change of centre after the receipt of the filled-in application at this office will not be entertained.</li>
                <li>The candidates will be permitted to write the Examinations only at the College where they underwent the course. Application not routed through the Principal will be rejected. This will apply to private candidates with arrears subjects as well.</li>
                <li>The application routed through the Principal should reach this office on or before the last date prescribed. Late applications will be entertained only up to 7 days after the last date with penalty. UNDER NO CIRCUMSTANCES WILL ANY APPLICATION BE ACCEPTED AFTER THE LAST DATE OF PENALTY IS OVER. BULK APPLICATIONS FROM THE COLLEGES SHOULD REACH THIS OFFICE WITHIN A WEEK AFTER THE LAST DATE OF PENALTY.</li>
                <li>FEE ONCE PAID WILL NOT BE REFUNDED UNDER ANY CIRCUMSTANCES OR HELD OVER FOR SUBSEQUENT EXAMINATIONS.</li>
                <li>If the Chief Superintendent is forced to cancel the examination due to any misconduct of the candidates, malpractice, or any other incident in the Examination centre, re-examination will not be conducted for the concerned subject(s). The candidates will have to write the examination(s) only at the next appearance.</li>
                <li>Results WILL NOT BE DECLARED for wrong entry of Register Numbers. Any paper for which the registration is wrong will not be valued.</li>
                <li>The Examination Schedule will be displayed on the College notice board only.</li>
                <li>Re-admission / Re-do candidates should enclose the orders issued by the Registrar along with their application.</li>
            </ol>
        </div>
        <div class="print-button-container">
            <button onclick="printPage()">Print</button>
            <button onclick="back()">Back</button>
        </div>
    </div>
     <script>
        function printPage() {
            window.print();
        }
        function back() {
                window.location.href = "dashboard.php";
            }
    </script>
</body>
</html>
