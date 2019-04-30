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
    header( 'location: builder.php' );
    exit();
}

//Create array
$elements = $_POST['insert_ingredients_joined'];
$elements = explode(',', $elements);

//Insert new recipe
$sql = "INSERT INTO recipe (recipe_type,recipe_title,recipe_author) VALUES ('$recipe_type','$name','testname');";

if ($conn->query($sql) === TRUE) {
   //echo "New record created successfully";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

//Get newest ID with recipe name just entered to use with ingredient relationships
$get_rec_id = "SELECT recipe_id FROM recipe r WHERE r.recipe_title = '$name'";

//Get max ID
$max_id = -1;

if ($result = mysqli_query($conn, $get_rec_id)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["recipe_id"] > $max_id){
          $max_id = $row["recipe_id"];
        }
    }
    /* free result set */
    mysqli_free_result($result);
}

//Return ID for image use

echo json_encode($max_id);

//Create recipe-ingredient relationship
//Iterate through array
foreach ($elements as $value) {

    //Split ingredient name from desc
    $ing_name = substr($value, 0, strpos($value,';'));
    $ing_desc = substr($value, strpos($value,';')+1);

    $sql = "INSERT INTO recipe_ingredients (recipe_id,ingredient_name,description) VALUES ($max_id,'$ing_name','$ing_desc');";

    if ($conn->query($sql) === TRUE) {
       //echo "New record created successfully";
       //header( 'location: builder.php' );
    } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
