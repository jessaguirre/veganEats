<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=loginsystem', 'phpmyadmin', 'VeganOcean2k19');

$id = $_POST['id'];

$query = "
SELECT * FROM tbl_comment t
WHERE t.recipe_name = '$id'
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
echo json_encode($result);

?>
