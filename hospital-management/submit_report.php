<?php

session_start();
// Get the measurement type, date, and value from the form
$measurement_type = $_POST['measurement_type'];
$measurement_date = $_POST['measurement_date'];
$measurement_value = $_POST['measurement_value'];
$user_id = $_SESSION['user_id'];

include("./php/dbconnection/db.php");

// Prepare the SQL statement
$stmt = $conn->prepare('INSERT INTO reports (type, date,value, user_id) VALUES (?, ?, ?,?)');
$stmt->bind_param('sssi', $measurement_type, $measurement_date,$measurement_value, $user_id);


// Execute the statement
$stmt->execute();

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect to the index page
header('Location: index.php');

?>