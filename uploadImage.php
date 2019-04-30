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

    //Put image in directory
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        $id = $_POST['newid'];
        mkdir("./uploadedImages/$id");
        move_uploaded_file($_FILES['file']['tmp_name'], "uploadedImages/$id/" . $_FILES['file']['name']);


        $img_name = $_FILES['file']['name'];
        //Set image relationship
        $sql = "INSERT INTO recipe_image VALUES ($id,'$img_name')";

        if ($conn->query($sql) === TRUE) {
           //echo "New record created successfully";
           //header( 'location: builder.php' );
        } else {
           echo "Error: " . $sql . $img_name . "<br>" . $conn->error;
        }

    }
?>
