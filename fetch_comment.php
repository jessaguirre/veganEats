<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=comment', 'root', '');

$query = "
SELECT * FROM tbl_comment 
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
echo json_encode($result);

?>
