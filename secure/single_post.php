<?php
// Initialize the session
session_start();
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
                <img src="<?php echo '/images/' . $post['image']; ?>" class="post_image" alt="">
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
				<div class="post-body-div">
					<?php echo html_entity_decode($post['body']); ?>
				</div>
			<?php endif ?>
			</div>
			<!-- // full post div -->
			
			<!-- comments section -->

            


			<!--  coming soon ...  -->
		</div>
	</div>
</div>
<!-- // content -->
