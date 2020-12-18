<?php
// Initialize the session
session_start();

//Check if logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo "You have to be logged in to add a comment!";
    exit;
};


require_once('config.php');

//variables can also passed by url

if (isset($_POST["textComment"])) 
    $content = $mysqli->real_escape_string($_POST["textComment"]);
else    
    $content = $mysqli->real_escape_string($_GET["textComment"]);


if (isset($_POST["postid"])) 
    $postid = $mysqli->real_escape_string($_POST["postid"]);
else
    $postid = $mysqli->real_escape_string($_GET["postid"]);


if (isset($_POST["postslug"])) 
    $postslug = $mysqli->real_escape_string($_POST["postslug"]);
else
    $postslug = $mysqli->real_escape_string($_GET["postslug"]);


$userid = $_SESSION["id"];


if(empty(trim($content))){
    echo "Comment can`t be empty!";
    exit;
}


$sql="INSERT INTO `comments`(`user_id`, `post_id`, `content`) VALUES ('$userid', '$postid', '$content')";

    if ($mysqli->query($sql) === TRUE) {
        header("location: single_post.php?post-slug=".$postslug);
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    $conn->close();



?>