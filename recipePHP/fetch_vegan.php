<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=loginsystem', 'phpmyadmin', 'VeganOcean2k19');

$query = "
SELECT * FROM recipe r
WHERE r.recipe_type = 'Vegan'
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
echo json_encode($result);

?>
