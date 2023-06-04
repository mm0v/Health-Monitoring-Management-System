<?php

session_start();
include("./php/dbconnection/db.php");
// Get user ID from session (assuming you have a login system that sets the user ID in the session)
$user_id = $_SESSION['user_id'];

// Prepare SQL statement
$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);

// Execute SQL statement
$stmt->execute();

// Get result
$result = $stmt->get_result();

// Get user data
$user = $result->fetch_assoc();

// Close connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <link rel="stylesheet" href="./css/styleprofile.css">
</head>
<body>
  <body>
  <div class="wrapper">
    <h2>Profile</h2>
    <form action="./update.php" method="post">
      <div class="input-box">
        <input type="text" name="name" value= <?php echo $user['fname'] ?>>
      </div>
      <div class="input-box">
        <input type="text" name="lname" value= <?php echo $user['lname'] ?>>
      </div>
      <div class="input-box">
        <input type="text" name="username" value= <?php echo $user['username'] ?>>
      </div>
      <div class="input-box">
        <input type="text" name="password" value= <?php echo $user['password'] ?>>
      </div>
      
      <div class="text">
        <input type="submit" value="Update">
      </div>
    </form>
  </div>
</body>
</body>
</html>