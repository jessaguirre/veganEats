<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=loginsystem', 'phpmyadmin', 'VeganOcean2k19');

$query = "
SELECT * FROM ingredient
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
echo json_encode($result);

?>

