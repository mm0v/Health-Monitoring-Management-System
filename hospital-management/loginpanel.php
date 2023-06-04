<?php
include("./php/dbconnection/db.php");
$username = $_POST['username'];
$password = $_POST['password'];


$stmt = $conn->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();


// Check if the user exists and has the correct account type

if($row)
{
  session_start();

  // If login is successful, set session variable
  $_SESSION["loggedin"] = true;
  $_SESSION['user_id'] = $row['user_id'];
  $_SESSION['user_role'] = $row['account_type'];
  if ($row['account_type'] == 'user') {
  // Redirect to the index page
  
  header('Location: index.php');
} else if ($row['account_type'] == 'admin') {
  // Redirect to the admin page
  header('Location: admin.php');
} else {
  // Display an error message
  echo 'Invalid username or password.';
}
}



// Close the statement and connection
$stmt->close();
$conn->close();

?>