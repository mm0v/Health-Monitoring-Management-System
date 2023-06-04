<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginpanel.html");
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

   
    <link rel="stylesheet" href="./owl/owl.carousel.min.css">
    <link rel="stylesheet" href="./owl/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">


</head>



<body>

    <section id="menu">
        <div id="logo">Hospital</div>
        <nav>
            <a href="#banner"><i class="fa-solid fa-house icons"></i>Home</a>
            <a href="#statistics"><i class="fa-solid fa-circle-info icons"></i>Statistics</a>
            <a href="./submit_report.html"><i class="fa-solid fa-book icons"></i>Submit report</a>
            <a href="./myreports.php"><i class="fa-solid fa-book icons"></i>My Reports</a>
            <a href="./profile.php"><i class="fa-solid fa-user icons"></i>Profile</a>
            <a href="./logout.php"><i class="fa-solid fa-right-from-bracket icons"></i>Log-out</a>
        </nav>
    </section>

    <section id="banner">
        <div id="black">

        </div>

        <div id="content">
            <h3 id="content-name">Hospital</h3>
            <hr width="200" >
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. In temporibus nobis sapiente debitis dolores optio
            adipisci tempore quod eum consectetur, libero itaque suscipit praesentium quas provident laboriosam
            obcaecati ducimus quidem.
        </div>
    </section>



        <section id="statistics">
            <h3>Statistics for today</h3>
            <div class="container">

            <table>
        <thead>
            <tr>
            <th>Blood Sugar</th>
            <th>Blood Pressure</th>
            <th>Temperature</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("./php/dbconnection/db.php");
            $query = "SELECT blood_sugar, blood_pressure, temperature FROM health_statistics";
            $result = mysqli_query($conn, $query);

            // Loop through the data and display it in the table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['blood_sugar'] . "</td>";
                echo "<td>" . $row['blood_pressure'] . "</td>";
                echo "<td>" . $row['temperature'] . "</td>";
                echo "</tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </tbody>
        </table>
                
            </div>
        </section>

</body>

</html>