<?php

// Initialize the session
session_start();
 
?>

<!DOCTYPE html>
<html lang="it">
<head>
   <title>Blog Name</title>
   <?php include (dirname(__FILE__).'/components/head.php');?>
   <?php require_once('config.php') ?>
   <?php require_once(ROOT_PATH .'/includes/public_functions.php') ?>
   <?php $posts = getPublishedPosts(); ?>
</head>
<body>
   <?php include (dirname(__FILE__).'/components/navbar.php');?>
   <div class="jumbotron text-center">
      <h1>Blog</h1>
      <p>Sample blog for the project</p>
   </div>
   <div class="container">
      <div class="row content">
         
      <?php foreach ($posts as $post): ?>
         <div class="col-md-6 post">
            <img src="<?php echo '/images/' . $post['image']; ?>" class="post_image" alt="">
            <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
               <div class="post_info">
                  <h3><?php echo $post['title'] ?></h3>
                  <div class="info">
                     <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
                     <span class="read_more">Read more...</span>
                  </div>
               </div>
            </a>
         </div>
      <?php endforeach ?>


      </div>
   </div>

</body>
</html>
