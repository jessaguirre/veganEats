<?php

//add_comment.php


session_start();

$connect = new PDO('mysql:host=localhost:3306;dbname=loginsystem', 'phpmyadmin', 'VeganOcean2k19');

// $connect = new PDO('mysql:host=localhost;dbname=loginsystem', 'root', 'root');


$error = '';
$comment_content = '';


if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
    try {
        $rating = explode(" ", $_POST["rating"]);
        
        $query = "
        INSERT INTO tbl_comment 
        (comment_id, user_username ,recipe_name, rating, comment) 
        VALUES (:comment_id, :user_username ,:recipe_name, :rating, :comment)
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
         array(
          ':comment_id' => $_POST["comment_id"],
          ':user_username' => $_SESSION["u_uid"],
          ':recipe_name' => $_POST["recipe-select"],
          ':rating' => $rating[0],
          ':comment' => $comment_content
         )
        );
        $error = '<label class="text-success">Comment Added</label>';
    }
    catch (Exception $e) {
        $error = $e;
    }
    
 
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>
