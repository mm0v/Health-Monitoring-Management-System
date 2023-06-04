<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        
        table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
        }

        th, td {
        text-align: left;
        padding: 8px;
        }

        th {
        background-color: #f2f2f2;
        color: #333;
        }

        tr:nth-child(even) {
        background-color: #f2f2f2;
        }

        tr:hover {
        background-color: #ddd;
        }

        input[type=submit] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 8px 16px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
        }

        input[type=submit]:hover {
        background-color: #3e8e41;
        }
    </style>

</head>
<body>
    
    <?php
        include("./php/dbconnection/db.php");
        // Get the user's reports from the database
        session_start();
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT report_id, date, type, IF(value = 0, 'waiting', value) AS status
                FROM reports
                WHERE user_id = $user_id";
        $result = $conn->query($sql);

        // Display the reports in an HTML table
        if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Date</th><th>Type</th><th>Status</th><th>Delete</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["report_id"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["type"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td><form method='post' action='delete_report.php'><input type='hidden' name='id' value='" . $row["report_id"] . "'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</table>";
        } else {
        echo "No reports found";
        }

        $conn->close();
    ?>
</body>
</html>





