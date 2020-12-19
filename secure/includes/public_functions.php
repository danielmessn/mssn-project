<?php 
/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
function getPublishedPosts($category) {
	// use global $conn object in function
	global $mysqli;
	$posts = null;

	if(!empty(trim($category)))
		$sql = "SELECT * FROM posts WHERE category = '". $mysqli->real_escape_string($category)."' and published=true order by created_at desc";
	else
		$sql = "SELECT * FROM posts WHERE published=true order by created_at desc";


	$result = $mysqli->query($sql);

	// fetch all posts as an associative array called $posts
	if($result)
		$posts = $result->fetch_all(MYSQLI_ASSOC);

	return $posts;
}


/* * * * * * * * * * * * * * * * * * * * * * * * * * * *
* Returns all published posts filtered over search word
* * * * * * * * * * * * * * * * * * * * * * * * * * * */
function getPublishedPostsFiltered($searchword) {
	// use global $conn object in function
	global $mysqli;
	$posts = null;

	$sql = "SELECT * FROM posts WHERE title like '%". $mysqli->real_escape_string($searchword) ."%' or body like '%". $mysqli->real_escape_string($searchword) ."%' and published=true order by created_at desc";

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


/* * * * * * * * * * * * * * *
* Returns comments of a post
* * * * * * * * * * * * * * */
function getComments($id) {
	// use global $conn object in function
	global $mysqli;
	$comments = null;

	$sql = "SELECT comments.id, comments.created_at, username, content FROM comments INNER JOIN users ON comments.user_id = users.id WHERE post_id = '$id' AND comment_id is null order by comments.created_at desc";
	$result = $mysqli->query($sql);

	// fetch all posts as an associative array called $posts
	if($result)
		$comments = $result->fetch_all(MYSQLI_ASSOC);

	return $comments;
}

/* * * * * * * * * * * * * * *
* Returns answers of a comment
* * * * * * * * * * * * * * */
function getCommentAnswers($id) {
	// use global $conn object in function
	global $mysqli;
	$answers = null;

	$sql = "SELECT comments.id, comments.created_at, username, content FROM comments INNER JOIN users ON comments.user_id = users.id WHERE comment_id = '$id' order by comments.created_at";
	$result = $mysqli->query($sql);

	// fetch all posts as an associative array called $posts
	if($result)
		$answers = $result->fetch_all(MYSQLI_ASSOC);

	return $answers;
}


/* * * * * * * * * * * * * * *
* Returns the categories
* * * * * * * * * * * * * * */
function getCategories() {
	// use global $conn object in function
	global $mysqli;
	$categories = null;

	$sql = "SELECT * from categories";
	$result = $mysqli->query($sql);

	// fetch all posts as an associative array called $posts
	if($result)
		$categories = $result->fetch_all(MYSQLI_ASSOC);

	return $categories;
}

?>