<?php
// Initialize the session
session_start();

//Check if logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo "You have to be logged in to add an answer!";
    exit;
};

require_once('config.php');

$content = $mysqli->real_escape_string($_POST["textAnswer"]);
$postid = $mysqli->real_escape_string($_POST["postid"]);
$commentid = $mysqli->real_escape_string($_POST["commentid"]);
$userid = $_SESSION["id"];
$postslug = $_POST["postslug"];

if(empty(trim($content))){
    echo "Answer can`t be empty!";
    exit;
}

$sql="INSERT INTO `comments`(`user_id`, `post_id`, `comment_id`, `content`) VALUES ('$userid', '$postid', '$commentid', '$content')";

    if ($mysqli->query($sql) === TRUE) {
        header("location: single_post.php?post-slug=".$postslug);
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    $conn->close();



?>