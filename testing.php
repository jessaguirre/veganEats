<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "VeganOcean2k19";
$dbname = "loginsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  echo "Error connecting";
   die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO recipe_ingredients (recipe_id,ingredient_name,description) VALUES (5,'name','test');";

if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
