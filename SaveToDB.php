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

$name = $_POST["name"];
$age = $_POST["age"];
$sql = "INSERT INTO tbluser ( name, age) VALUES ('$name', '$age')";
// $sql = "INSERT INTO tbluser (NULL, ".$name.", ".$age.")";

if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
    header("Location: index.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 