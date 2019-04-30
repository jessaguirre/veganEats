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

//Create array
$elements = $_POST['insert_ingredients_joined'];
$elements = explode(',', $elements);

//Iterate through array
foreach ($elements as $value) {

//Split ingredient name from desc
$ing_name = substr($value, 0, strpos($value,';'));
$ing_desc = substr($value, strpos($value,';')+1);

$sql = "INSERT INTO recipe_ingredients (recipe_id,ingredient_name,description) VALUES (12,'$ing_name','$ing_desc');";

if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
   header( 'location: ve_makeyourown.php' );
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
