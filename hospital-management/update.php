<?php

    include("./php/dbconnection/db.php");
    session_start();

    $user_id = $_SESSION['user_id'];

    // Get user data from form
    $first_name = $_POST['name'];
    $last_name = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo $first_name;
    // Prepare SQL statement
    $stmt = $conn->prepare("UPDATE users SET fname = ?, lname = ?, username = ?, password = ? WHERE user_id = ?");
    $stmt->bind_param("ssssi", $first_name, $last_name, $username, $password, $user_id);

    // Execute SQL statement
    $stmt->execute();

    // Close connection
    $stmt->close();
    $conn->close();

    // Redirect to profile page
    
    if($_SESSION['user_role']=="user")
    {
         header("Location: index.php");
    }else{
         header("Location: admin.php");
    }


    exit();
    



?>