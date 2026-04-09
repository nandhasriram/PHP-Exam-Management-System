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

        .hall-ticket {
            width: 900px;
            margin: 20px auto;
            padding: 15px;
            border: 2px solid #000;
            background-color: #fff;
        }

        /* Header Section */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }

        .header h2 {
            font-size: 16px;
            margin: 5px 0;
        }

        .header h3 {
            font-size: 20px;
            text-decoration: underline;
            margin: 10px 0;
        }

        /* Form Section */
        .form-section {
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 20px;
        }

        .form-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 10px;
        }

        .details-section {
            width: calc(100% - 170px); /* Adjust to fit photo box */
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
        }

        .photo-box {
            width: 150px;
            height: 150px;
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            text-align: center;
        }

        /* Table Section */
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
            background-color: #f4f4f4;
            font-weight: bold;
        }

        /* Signature Section */
        .signature-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
        }

        .signature-box {
            width: 45%;
            border-top: 1px solid #000;
            padding-top: 10px;
        }

        /* Instructions Section */
        .instructions {
            font-size: 14px;
            line-height: 1.6;
            border-top: 1px solid #000;
            padding-top: 10px;
        }

        .instructions h4 {
            text-decoration: underline;
            font-size: 18px;
            margin-bottom: 15px;
            text-align: center;
        }

        .instructions ol {
            padding-left: 20px;
            margin: 0;
        }

        /* Footer */
        .footer {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="hall-ticket">
        <!-- Header Section -->
        <div class="header">
            <h1>BHARATHIDASAN UNIVERSITY, TIRUCHIRAPPALLI - 620 024</h1>
            <h2>Degree Examinations, Nov. / Apr. 20XX</h2>
            <h3>HALL TICKET</h3>
        </div>

        <!-- Form Section -->
        <div class="form-section">
            <div class="form-content">
                <div class="details-section">
                    <div class="form-row">
                        <label>Reg. Number:</label>
                        <div class="input-box"></div>
                    </div>
                    <div class="form-row">
                        <label>Current Semester:</label>
                        <div class="input-box"></div>
                    </div>
                    <div class="form-row">
                        <label>Name:</label>
                        <div class="input-box"></div>
                    </div>
                    <div class="form-row">
                        <label>Degree & Branch:</label>
                        <div class="input-box"></div>
                    </div>
                    <div class="form-row">
                        <label>Examination Centre:</label>
                        <div class="input-box"></div>
                    </div>
                </div>
                <div class="photo-box">
                    <p>Photo of the Candidate</p>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <table>
            <thead>
                <tr>
                    <th>Sub. Code</th>
                    <th>Subject</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- Add additional rows if needed -->
            </tbody>
        </table>

        <!-- Signature Section -->
        <div class="signature-section">
            <div class="signature-box">
                <p>Signature of the Candidate</p>
                <p>(When filling the application)</p>
            </div>
            <div class="signature-box">
                <p>Signature of the Principal / Director</p>
            </div>
        </div>
        <div class="signature-section">
            <div class="signature-box">
                <p>Signature of the Candidate</p>
                <p>(When it is issued by the Principal)</p>
            </div>
            <div class="signature-box">
                <p>Controller of Examinations</p>
            </div>
        </div>

        <!-- Instructions Section -->
        <div class="instructions">
            <h4>INSTRUCTIONS TO THE CANDIDATES</h4>
            <ol>
                <li>Candidate should sign when the Chief Superintendent of the College issues the Hall Ticket to them.</li>
                <li>Candidates indulging in malpractice of any kind will be severely dealt with.</li>
                <li>Candidates shall not be permitted to enter the examination hall after the expiry of 30 minutes from the commencement of examination.</li>
                <li>Candidates shall not be allowed to leave the examination hall before the expiry of 45 minutes from the commencement of examination.</li>
                <li>If a candidate writes their register number on any part of the answer book/sheet other than specified places, they are liable for disciplinary action.</li>
                <li>Candidates shall not take any written/printed material, Cell Phone, Programmable Calculator, or unauthorized data sheets into the examination hall.</li>
            </ol>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>The Photo and Hall Ticket are valid only if attested by the Principal</p>
        </div>
    </div>
</body>
</html>
