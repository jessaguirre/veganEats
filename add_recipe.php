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

//checking if name has been entered
if( isset( $_POST['recipe_type'] ) && isset( $_POST['name'] ) && !empty( $_POST['name'] ) )
{
    $name = $_POST['name'];
    $recipe_type = $_POST['recipe_type'];
} else {
    header( 'location: ve_makeyourown.php' );
    exit();
}
//$sql = "INSERT INTO recipe_ingredients (ingredient_name,description) VALUES ('name','test');";
$sql = "INSERT INTO recipe (recipe_type,recipe_title,recipe_author) VALUES ('$recipe_type','$name','testname');";

if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
   header( 'location: ve_makeyourown.php' );
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
