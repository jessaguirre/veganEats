<?php


$connect = new PDO('mysql:host=localhost;dbname=loginsystem', 'phpmyadmin', 'VeganOcean2k19');

$id = $_POST['id'];

$query = "
SELECT * FROM recipe_ingredients i
WHERE i.recipe_id = '$id'
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
echo json_encode($result);

?>

