<?php 
/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
function getPublishedPosts() {
	// use global $conn object in function
	global $mysqli;
	$posts = null;

	$sql = "SELECT * FROM posts WHERE published=true";
	$result = $mysqli->query($sql);

	// fetch all posts as an associative array called $posts
	if($result)
		$posts = $result->fetch_all(MYSQLI_ASSOC);

	return $posts;
}

/* * * * * * * * * * * * * * *
* Returns a single post
* * * * * * * * * * * * * * */
function getPost($slug){
	global $mysqli;
	$post = null;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
	$result = $mysqli->query($sql);

	// fetch query results as associative array.
	if($result)
		$post = $result->fetch_assoc();
	
	return $post;
}

?>