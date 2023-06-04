<!DOCTYPE html>
<html>
<head>
</head>
<body>

    <style>
    form {
    display: flex;
    flex-direction: column;
    max-width: 400px;
    margin: 0 auto;
    }

    label {
    margin-top: 10px;
    }

    input {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
    }

    button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    }

    button:hover {
    background-color: #3e8e41;
    }

    input:focus {
    outline: none;
    border-color: #4CAF50;
    box-shadow: 0 0 5px #4CAF50;
    }
    </style>    

  <?php
  include("./php/dbconnection/db.php");
  session_start();
  // Check if the form is submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Get the result of the SQL query
    $result = $stmt->get_result();

    // Check if the username exists in the users table
    if ($result->num_rows > 0) {
    echo "Username exists!";
    } else {
    // Insert data into table
    $sql = "INSERT INTO users (fname, lname, username, password) VALUES ('$name', '$lname', '$username', '$password')";

    if (mysqli_query($conn, $sql)) {
      if($_SESSION['user_role']=="user")
      {
          header("Location: index.php");
      }else{
          header("Location: admin.php");
      }
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
  }

  ?>

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <label for="first-name">First Name:</label>
    <input type="text" id="first-name" name="name" required>
    <label for="last-name">Last Name:</label>
    <input type="text" id="last-name" name="lname" required>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Save</button>
  </form>

</body>
</html>