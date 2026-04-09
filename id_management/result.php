<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab Grade Sheet</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      margin: 0;
    }

    .grade-sheet {
      width: 800px;
      padding: 20px;
      background: #D3D3D3;
      border: 2px solid #d1cfd0;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      font-size: 12px;
      line-height: 1.4;
    }

    .grade-sheet header {
      text-align: center;
      margin-bottom: 20px;
    }

    .grade-sheet header h1 {
      font-size: 18px;
      text-transform: uppercase;
      margin: 0;
      font-weight: bold;
    }

    .grade-sheet header h2 {
      font-size: 14px;
      margin: 5px 0;
    }

    .header-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
      font-size: 12px;
    }

    .header-row div {
      flex: 1;
    }

    .header-row div:last-child {
      text-align: right;
    }

    .photo {
      float: right;
      width: 120px;
      height: 150px;
      border: 1px solid #ccc;
      margin-bottom: 15px;
      text-align: center;
      line-height: 150px;
      font-size: 10px;
      color: #666;
      background: #f0f0f0;
    }

    .student-info {
      width: 80%;
      margin-bottom: 20px;
      font-size: 12px;
    }

    .student-info table,
    .grades table {
      width: 100%;
      border-collapse: collapse;
      font-size: 12px;
    }

    .student-info table td,
    .grades table th,
    .grades table td {
      border: 1px solid #ccc;
      padding: 6px;
      text-align: left;
    }

    .student-info table td:first-child {
      font-weight: bold;
      width: 25%;
    }

    .grades table th {
      background: #f0f0f0;
      text-transform: uppercase;
      font-weight: bold;
    }

    .grades .end-of-statement {
      text-align: center;
      margin-top: 10px;
      font-weight: bold;
    }

    .grades table .footer td {
      font-weight: bold;
      text-align: right;
      padding: 10px;
    }

    .semester-summary {
      margin-top: 20px;
      font-size: 12px;
    }

    .semester-summary table {
      width: 100%;
      border-collapse: collapse;
    }

    .semester-summary table th,
    .semester-summary table td {
      border: 1px solid #ccc;
      padding: 6px;
      text-align: center;
    }

    .semester-summary table th {
      background: #f0f0f0;
      font-weight: bold;
      text-transform: uppercase;
    }

    .signatures {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
      font-size: 12px;
    }

    .signatures div {
      text-align: center;
    }

    .footer-note {
      margin-top: 20px;
      font-size: 10px;
      text-align: center;
      color: #555;
    }
  </style>
</head>
<body>
  <div class="grade-sheet">
    <header>
      <h1>Anna University, Chennai - 25</h1>
      <h2>B.E. Degree Examinations - Lab Grade Sheet</h2>
    </header>

    <div class="header-row">
      <div><strong>Sl.No:</strong> MA 2140863</div>
      <div><strong>Folio No:</strong> A013790375</div>
    </div>

    <div class="photo">
      <img src="thumb_1200_1200.png" alt="Photo" style="width: 100%; height: 100%;">
    </div>

    <section class="student-info">
      <table>
        <tr>
          <td>Name of the Candidate:</td>
          <td>Tilak Surya M</td>
          <td>Date of Birth:</td>
          <td>12-Dec-97</td>
        </tr>
        <tr>
          <td>Gender:</td>
          <td>Male</td>
          <td>Month & Year of Examination:</td>
          <td>Apr 2019</td>
        </tr>
        <tr>
          <td>College of Study:</td>
          <td colspan="3">Sri Venkateswara College of Engineering and Technology</td>
        </tr>
        <tr>
          <td>Programme & Branch:</td>
          <td colspan="3">B.E. Mechanical Engineering</td>
        </tr>
        <tr>
          <td>Regulations:</td>
          <td colspan="3">2013</td>
        </tr>
      </table>
    </section>

    <section class="grades">
      <table>
        <thead>
          <tr>
            <th>SEM.No</th>
            <th>Course Code</th>
            <th>Course Title</th>
            <th>Credits</th>
            <th>Grade</th>
            <th>Grade Point</th>
            <th>Result</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>6</td>
            <td>GE6074</td>
            <td>Communication and Soft Skills - Lab Based</td>
            <td>2</td>
            <td>A</td>
            <td>9</td>
            <td>PASS</td>
          </tr>
          <tr>
            <td>6</td>
            <td>ME6004</td>
            <td>Unconventional Machining Processes</td>
            <td>3</td>
            <td>S</td>
            <td>10</td>
            <td>PASS</td>
          </tr>
          <tr>
            <td>6</td>
            <td>ME6601</td>
            <td>Design of Transmission System</td>
            <td>3</td>
            <td>B</td>
            <td>8</td>
            <td>PASS</td>
          </tr>
          <tr>
            <td>6</td>
            <td>ME6602</td>
            <td>Automobile Engineering</td>
            <td>3</td>
            <td>B</td>
            <td>8</td>
            <td>PASS</td>
          </tr>
        <!--  <tr>
            <td>6</td>
            <td>ME6603</td>
            <td>Finite Element Analysis</td>
            <td>3</td>
            <td>C</td>
            <td>7</td>
            <td>PASS</td>
          </tr>
          <tr>
            <td>6</td>
            <td>ME6604</td>
            <td>Gas Dynamics and Jet Propulsion</td>
            <td>3</td>
            <td>B</td>
            <td>8</td>
            <td>PASS</td>
          </tr>-->
        </tbody>
      </table>
      <p class="end-of-statement">* * * End of Statement * * *</p>
    </section>

   <!-- <section class="semester-summary">
      <table>
        <thead>
          <tr>
            <th>Semester</th>
            <th>Credits Registered</th>
            <th>Credits Earned</th>
            <th>Grade Points Earned</th>
            <th>Grade Point Average (GPA)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>I</td>
            <td>24</td>
            <td>24</td>
            <td>192</td>
            <td>8.00</td>
          </tr>
          <tr>
            <td>II</td>
            <td>24</td>
            <td>24</td>
            <td>200</td>
            <td>8.33</td>
          </tr>
          <tr>
            <td>VII</td>
            <td>24</td>
            <td>24</td>
            <td>202</td>
            <td>8.417</td>
          </tr>
        </tbody>
      </table>
    </section>-->

    <div class="signatures">
      <div>
        <p>Signature of the Candidate</p>
      </div>
      <div>
        <p>Controller of Examinations</p>
      </div>
    </div>

    <p class="footer-note">Chennai - 600 025 | Date: 04-09-19</p>
  </div>
</body>
</html>
