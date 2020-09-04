<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simpleuser";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_POST["id"];
$sql = "DELETE FROM tbluser WHERE id = '$id'";
// $sql = "INSERT INTO tbluser (NULL, ".$name.", ".$age.")";

if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
    header("Location: index.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 