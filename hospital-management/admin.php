<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/adminstyle.css">

    <style>
        form {
        display: flex;
        flex-direction: column;
        align-items: center;
        }

        label {
        margin-top: 10px;
        margin-bottom: 5px;
        }

        input[type="text"], input[type="number"], input[type="date"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        text-align: center;
        }

        input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }

        input[type="submit"]:hover {
        background-color: #3e8e41;
        }
    </style>
    
	

</head>

<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginpanel.html");
    exit;
}
?>

<?php

include("./php/dbconnection/db.php");
$sql = "SELECT * FROM health_statistics";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $date = $row['date'];
    $blood_pressure = $row['blood_pressure'];
    $blood_sugar = $row['blood_sugar'];
    $temperature = $row['temperature'];
}



?>


<body>

    <section id="menu">
        <div id="logo">Course</div>
        <nav>
            <a href="#statistics"><i class="fa-solid fa-circle-info icons"></i>Statistics</a>
            <a href="./admin_users.php"><i class="fa-solid fa-book icons"></i>Users</a>
            <a href="./profile.php"><i class="fa-solid fa-user icons"></i>Profile</a>
            <a href="./logout.php"><i class="fa-solid fa-right-from-bracket icons"></i>Log-out</a>
        </nav>
    </section>

    <section id="statistics">
        <h3>Statistics</h3>
        <div>
        

        <form method="post" action="updateStatistics.php">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value=<?php echo $date ?> required><br>
        <script>
        // Get the date input field
        var dateInput = document.getElementById("date");

        // Set the date value to '2023-05-27'
        var dateValue = new Date("2023-05-27");
        dateInput.valueAsDate = dateValue;
        </script>

        <label for="blood_pressure">Blood Pressure:</label>
        <input type="text" id="blood_pressure" name="blood_pressure" value=<?php echo $blood_pressure ?>  required><br>

        <label for="blood_sugar">Blood Sugar:</label>
        <input type="number" id="blood_sugar" name="blood_sugar" value=<?php echo $blood_sugar ?>  required><br>

        <label for="temperature">Temperature:</label>
        <input type="number" id="temperature" name="temperature" value=<?php echo $temperature ?>  required><br>

        <input type="submit" value="Update">
        </form>

	
        </div>
    </section>


</body>

</html>

