<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anna University Marksheet</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 95%;
      margin: 20px auto;
      background: #fff;
      border: 1px solid #000;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .header {
      text-align: center;
      padding: 10px 0;
      border-bottom: 2px solid #000;
      position: relative;
    }

    .header h1 {
      font-size: 24px;
      margin: 0;
      color: #d41414;
    }

    .header h2 {
      margin: 5px 0;
      font-size: 18px;
    }

    .header p {
      font-size: 12px;
      margin: 2px 0;
      font-style: italic;
    }

    /* Logo and Photo Section */
    .logo-photo {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .logo {
      width: 100px;
    }

    .photo {
      width: 100px;
      height: 120px;
      border: 1px solid #000;
      background-color: #ddd;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: bold;
    }

    .student-info {
      margin: 20px 0;
      font-size: 14px;
      border-bottom: 2px solid #000;
      padding-bottom: 10px;
    }

    .student-info p {
      margin: 5px 0;
    }

    .grades {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    .grades th, .grades td {
      border: 1px solid #000;
      text-align: center;
      font-size: 12px;
      padding: 5px;
    }

    .grades th {
      background-color: #ffe4e1;
      font-weight: bold;
    }

    .semester-header {
      background-color: #dcdcdc;
      text-align: left;
      font-weight: bold;
      padding-left: 10px;
    }

    .footer {
      text-align: right;
      margin-top: 20px;
    }

    .signature {
      margin-top: 30px;
      text-align: right;
      font-style: italic;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Header Section -->
    <div class="header">
      <h1>Anna University, Chennai</h1>
      <h2>Consolidated Statement of Grades</h2>
      <p>(Affiliated Colleges - Regulation 2013)</p>
    </div>

    <!-- Logo and Photo Section -->
    <div class="logo-photo">
      <!-- University Logo -->
      
      <!-- Student Photo -->
      <div class="photo">
        Student Photo
      </div>
    </div>

    <!-- Student Info -->
    <div class="student-info">
      <p><strong>Name:</strong> John Doe</p>
      <p><strong>Roll Number:</strong> 123456789</p>
      <p><strong>Program:</strong> Bachelor of Engineering (Computer Science)</p>
    </div>

    <!-- Grades Table -->
    <table class="grades">
      <thead>
        <tr>
          <th>Subject Code</th>
          <th>Subject Name</th>
          <th>Grade</th>
          <th>Credits</th>
          <th>Result</th>
          <th>Semester</th>
        </tr>
      </thead>
      <tbody>
        <!-- Semester 1 -->
        <tr class="semester-header">
          <td colspan="6">Semester 1</td>
        </tr>
        <tr>
          <td>HS8151</td>
          <td>Communicative English</td>
          <td>A</td>
          <td>4</td>
          <td>Pass</td>
          <td>1</td>
        </tr>
        <tr>
          <td>MA8151</td>
          <td>Engineering Mathematics I</td>
          <td>B</td>
          <td>4</td>
          <td>Pass</td>
          <td>1</td>
        </tr>

        <!-- Semester 2 -->
        <tr class="semester-header">
          <td colspan="6">Semester 2</td>
        </tr>
        <tr>
          <td>MA8251</td>
          <td>Engineering Mathematics II</td>
          <td>B</td>
          <td>4</td>
          <td>Pass</td>
          <td>2</td>
        </tr>

        <!-- Semester 3 -->
        <tr class="semester-header">
          <td colspan="6">Semester 3</td>
        </tr>
        <tr>
          <td>CS8351</td>
          <td>Software Engineering</td>
          <td>A</td>
          <td>4</td>
          <td>Pass</td>
          <td>3</td>
        </tr>

        <!-- Semester 4 -->
        <tr class="semester-header">
          <td colspan="6">Semester 4</td>
        </tr>
        <tr>
          <td>CS8451</td>
          <td>Operating Systems</td>
          <td>A</td>
          <td>4</td>
          <td>Pass</td>
          <td>4</td>
        </tr>

        <!-- Semester 5 -->
        <tr class="semester-header">
          <td colspan="6">Semester 5</td>
        </tr>
        <tr>
          <td>CS8551</td>
          <td>Artificial Intelligence</td>
          <td>A</td>
          <td>4</td>
          <td>Pass</td>
          <td>5</td>
        </tr>

        <!-- Semester 6 -->
        <tr class="semester-header">
          <td colspan="6">Semester 6</td>
        </tr>
        <tr>
          <td>CS8651</td>
          <td>Cloud Computing</td>
          <td>A</td>
          <td>4</td>
          <td>Pass</td>
          <td>6</td>
        </tr>

        <!-- Semester 7 -->
        <tr class="semester-header">
          <td colspan="6">Semester 7</td>
        </tr>
        <tr>
          <td>CS8751</td>
          <td>Cybersecurity</td>
          <td>A</td>
          <td>4</td>
          <td>Pass</td>
          <td>7</td>
        </tr>

        <!-- Semester 8 -->
        <tr class="semester-header">
          <td colspan="6">Semester 8</td>
        </tr>
        <tr>
          <td>CS8851</td>
          <td>Project Work</td>
          <td>A</td>
          <td>10</td>
          <td>Pass</td>
          <td>8</td>
        </tr>
      </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
      <div class="signature">
        <p>Controller of Examinations</p>
        <img src="signature.png" alt="Signature" width="120">
      </div>
    </div>
  </div>
</body>
</html>
