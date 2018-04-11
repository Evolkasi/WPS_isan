<?php
$servername = "localhost";
$username = "admin";
$password = "123ananaskalas";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
echo "You did it mate, you are now succesfully connected to the network!";

//SQL-QUERY
$sql = "SHOW TABLES";

if ($conn->query($sql) === TRUE) {
  echo $sql;
} else {
  echo " Something went wrong " . $conn->error;
}

$conn->close();
?>
