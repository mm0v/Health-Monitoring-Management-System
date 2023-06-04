<!DOCTYPE html>
<html>
<head>
	<title>User Table</title>
	<link rel="stylesheet" type="text/css" href="./css/admin_users.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include("./php/dbconnection/db.php");
				// select data from the users table
				$sql = "SELECT user_id, fname, lname FROM users";
				$result = $conn->query($sql);
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["user_id"] . "</td><td>" . $row["fname"] . "</td><td>" . $row["lname"] . "</td></tr>";
				}
				$conn->close();
			?>
		</tbody>
	</table>
	<a href="./registration.php" class="button">Add User</a>
</body>
</html>