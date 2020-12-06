<?php 
/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
function getPublishedPosts() {
	// use global $conn object in function
	global $mysqli;

	$sql = "SELECT * FROM posts WHERE published=true";
	$result = $mysqli->query($sql);

	// fetch all posts as an associative array called $posts
	$posts = $result->fetch_all(MYSQLI_ASSOC);

	return $posts;
}

// more functions to come here ...
?>