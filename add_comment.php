<?php

//add_comment.php

$connect = new PDO('mysql:host=localhost:3306;dbname=comment', 'phpmyadmin', 'VeganOcean2k19');

$error = '';
$comment_name = '';
$comment_content = '';

if(empty($_POST["comment_name"]))
{
 $error .= '<p class="text-danger">Name is required</p>';
}
else
{
 $comment_name = $_POST["comment_name"];
}

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
        (comment_id, recipe_name, rating, comment, comment_sender_name) 
        VALUES (:comment_id, :recipe_name, :rating, :comment, :comment_sender_name)
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
         array(
          ':comment_id' => $_POST["comment_id"],
          ':recipe_name' => $_POST["selected_recipe"],
          ':rating' => $rating[0],
          ':comment' => $comment_content,
          ':comment_sender_name' => $comment_name
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
