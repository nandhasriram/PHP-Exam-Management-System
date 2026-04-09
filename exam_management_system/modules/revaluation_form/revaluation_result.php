<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revaluation Result Sheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #000;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            text-align: center;
            border: 1px solid #ddd;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
        }

        .header .logo img {
            height: 80px;
        }

        .header-text h1 {
            font-size: 20px;
            margin: 0;
        }

        .header-text p {
            margin: 5px 0;
            font-size: 14px;
        }

        .title {
            margin: 20px 0;
            font-size: 18px;
            font-weight: bold;
        }

        .student-details {
            display: flex;
            justify-content: space-between;
            text-align: left;
            margin: 20px 0;
        }

        .student-details .detail p {
            margin: 5px 0;
        }

        .result-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .result-table th, .result-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .result-table th {
            background-color: #f3f3f3;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
        }

        .footer .notations {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <img src="/exam_management_system/assets/image/logo.png" alt="University Logo">
            </div>
            <div class="header-text">
                <h1>Anna University, Chennai - 600 025</h1>
                <p>Additional Controller of Examinations</p>
                <p>University Departments</p>
            </div>
            <div class="logo">
                <img src="logo2.png" alt="ACOE Logo">
            </div>
        </header>

        <h2 class="title">Revaluation Result Sheet - April / May - 2023</h2>

        <section class="student-details">
            <div class="detail">
                <p>Campus :</p>
                <p>Branch : [ ]</p>
            </div>
            <div class="detail">
                <p>Name :</p>
                <p>Batch :</p>
            </div>
            <div class="detail">
                <p>Regno :</p>
                <p>Sem : -</p>
            </div>
        </section>

        <table class="result-table">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                <!-- Add rows dynamically -->
                <tr>
                    <td>1</td>
                    <td>CS101</td>
                    <td>Data Structures</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>MA201</td>
                    <td>Mathematics</td>
                    <td>B+</td>
                </tr>
            </tbody>
        </table>

        <footer class="footer">
            <p>Note: This is a Computer generated sheet. Signature/attestation not required.</p>
            <hr>
            <div class="notations">
                <p>U/F : Reappear</p>
                <p>W : Withdrawn</p>
                <p>I : Prevented</p>
                <p>AB : Absent</p>
                <p>- : Withheld</p>
            </div>
        </footer>
    </div>
</body>
</html>
