<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Time Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .container {
            width: 900px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        .header h2, .header h3 {
            font-size: 18px;
            margin: 5px 0;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        table th, table td {
            border: 1px solid #999;
            text-align: center;
            vertical-align: middle;
            padding: 10px;
            font-size: 14px;
            word-wrap: break-word;
        }

        table th {
            background-color: #f2f2f2;
        }

        table td {
            background-color: #fff;
        }

        table tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        .empty {
            background-color: #f7f7f7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>TIME TABLE SESSION 2023-24</h1>
            <h2>K.G. I</h2>
            <h3>CLASS TEACHER - MRS. SHAZIA AHMED (64)</h3>
            <h3>ASSISTED BY – ONAIZA (79)</h3>
        </div>
        <table>
            <tr>
                <th>Day</th>
                <th>zero</th>
                <th>I</th>
                <th>II</th>
                <th>III</th>
                <th>IV</th>
                <th>V</th>
                <th>VI</th>
                <th>VII</th>
                <th>VIII</th>
            </tr>
            <tr>
                <td>Monday</td>
                <td class="empty"></td>
                <td>English</td>
                <td>Maths</td>
                <td>English</td>
                <td>Art</td>
                <td>Onaiza Hindi</td>
                <td>Maths</td>
                <td class="empty"></td>
                <td class="empty"></td>
            </tr>
            <tr>
                <td>Tuesday</td>
                <td class="empty"></td>
                <td>English</td>
                <td>Maths</td>
                <td>Maths</td>
                <td>Music</td>
                <td>Onaiza Hindi</td>
                <td>English</td>
                <td class="empty"></td>
                <td class="empty"></td>
            </tr>
            <tr>
                <td>Wednesday</td>
                <td>Act/Games</td>
                <td>English</td>
                <td>Maths</td>
                <td>Maths</td>
                <td>Art</td>
                <td>G.K.</td>
                <td>Hindi</td>
                <td class="empty"></td>
                <td class="empty"></td>
            </tr>
            <tr>
                <td>Thursday</td>
                <td class="empty"></td>
                <td>English</td>
                <td>English</td>
                <td>Maths</td>
                <td class="empty"></td>
                <td>Onaiza Hindi Activity</td>
                <td>English</td>
                <td>Maths</td>
                <td class="empty"></td>
            </tr>
            <tr>
                <td>Friday</td>
                <td>Act/Pickout Games</td>
                <td>English</td>
                <td>Onaiza Act. Games</td>
                <td>Music</td>
                <td class="empty"></td>
                <td>Maths</td>
                <td>Hindi</td>
                <td>Hindi</td>
                <td class="empty"></td>
            </tr>
        </table>
    </div>
</body>
</html>
