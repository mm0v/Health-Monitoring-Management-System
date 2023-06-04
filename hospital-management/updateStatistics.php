<?php

include("./php/dbconnection/db.php");

    $date = $_POST['date'];
    $blood_pressure = $_POST['blood_pressure'];
    $blood_sugar = $_POST['blood_sugar'];
    $temperature = $_POST['temperature'];


    // Update health statistics and date
    $sql = "UPDATE health_statistics SET date=$date, blood_pressure = $blood_pressure, blood_sugar=$blood_sugar, temperature=$temperature WHERE id=1";

    if ($conn->query($sql) === TRUE) {
            header("Location: admin.php");
    } else {
    echo "Error updating health statistics and date: " . $conn->error;
    }

    $conn->close();
    ?>

?>