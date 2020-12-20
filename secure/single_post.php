<?php
// Initialize the session
session_start();

$loggedin = true;

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    $loggedin = false;
};


?>
</head>
<!DOCTYPE html>
<html lang="it">
<head>
   <?php include (dirname(__FILE__).'/components/head.php');?>
   <?php require_once('config.php') ?>
   <?php require_once(ROOT_PATH .'/includes/public_functions.php') ?>
   <?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
    ?>
    <title><?php echo $post['title'] ?></title>
	<?php $comments = getComments($post['id']); ?>
</head>
<body>
<?php include (dirname(__FILE__).'/components/navbar.php');?>
<div class="container">
	
	<div class="content" >
		<!-- Page wrapper -->
		<div class="post-wrapper">
			<!-- full post div -->
			<div class="full-post-div">
            <?php if ($post == null): ?>
                <h2 class="post-title">Sorry... This post doesn`t exist</h2>
			<?php elseif ($post['published'] == false): ?>
                <h2 class="post-title">Sorry... This post has not been published</h2>
			<?php else: ?>
                <img src="<?php echo '/images/' . $post['image']; ?>" class="post_image mt-4 mb-4" alt="">
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
				<div class="post-body-div">
					<?php echo html_entity_decode($post['body']); ?>
				</div>
			<?php endif ?>
			</div>
			<!-- // full post div -->
                
			<!-- comments section -->
			<div class="comments mt-5">
				<h4>Comments</h4>
				<form action="addcomment.php" method="post">
				<input id="postid" name="postid" type="text" class="d-none" value="<?php echo $post['id']?>"/>
				<input id="postslug" name="postslug" type="text" class="d-none" value="<?php echo $post['slug']?>"/>
				<textarea class="mb-1 mt-2" id="textComment" name="textComment" rows="4" cols="70" required></textarea>
				<div class="mb-4">
					<input type="submit" class="btn btn-primary" value="Comment" <?php if(!$loggedin) echo "disabled"?>/>
				</div>
				</form>
				<?php foreach ($comments as $comment): ?>
					<div>
						<?php $answers = getCommentAnswers($comment['id']); ?>
						<p><?php echo $comment['username']?><br><?php echo htmlentities($comment['content'], ENT_QUOTES, 'UTF-8')?>
						<br><small><?php echo date("j.m.Y H:i", strtotime($comment["created_at"]));?></small></p>
						<div class="answers ml-5">
							<?php foreach ($answers as $answer): ?>
								<p><?php echo $answer['username']?><br><?php echo htmlentities($answer['content'], ENT_QUOTES, 'UTF-8')?>
								<br><small><?php echo date("j.m.Y H:i", strtotime($answer["created_at"]));?></small></p>
							<?php endforeach ?>
							<form action="addanswer.php" method="post">
							<input id="postid2" name="postid" type="text" class="d-none" value="<?php echo $post['id']?>"/>
							<input id="postslug2" name="postslug" type="text" class="d-none" value="<?php echo $post['slug']?>"/>
							<input id="commentid" name="commentid" type="text" class="d-none" value="<?php echo $comment['id']?>"/>
							<textarea class="mb-1 mt-2" id="textAnswer" name="textAnswer" rows="4" cols="70" required></textarea>
							<div class="mb-4">
								<input type="submit" class="btn btn-primary" value="Answer" <?php if(!$loggedin) echo "disabled"?>/>
							</div>
							</form>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>
<!-- // content -->
