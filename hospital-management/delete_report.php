<?php
include("./php/dbconnection/db.php");
$report_id = $_POST['id'];

$sql = "DELETE FROM reports WHERE report_id = $report_id";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
  header("Location: myreports.php");
} else {
  echo "Error deleting report: " . $conn->error;
}

// Close the database connection
$conn->close();
?>