<?php

// Initialize the session
session_start();

$par_category = "";
$par_searchword = "";

//If there is the parameter category in the url
if (isset($_GET["category"]))     
    $par_category = $_GET["category"];

//If there is the parameter search in the url
if (isset($_GET["search"]))     
    $par_searchword = $_GET["search"];

 
?>

<!DOCTYPE html>
<html lang="it">
<head>
   <title>Blog Name</title>
   <?php include (dirname(__FILE__).'/components/head.php');?>
   <?php require_once('config.php') ?>
   <?php require_once(ROOT_PATH .'/includes/public_functions.php') ?>
   <?php 
      if(!empty($par_searchword))
         $posts = getPublishedPostsFiltered($par_searchword);  
      else 
         $posts = getPublishedPosts($par_category); 

      $categories = getCategories(); 
   ?>
</head>
<body>
   <?php include (dirname(__FILE__).'/components/navbar.php');?>
   <div class="jumbotron text-center">
      <h1>Blog</h1>
      <p>Sample blog for the project</p>
   </div>
   <div class="container">
      <div class="row content">

      <div id="categories" class="col-8 mb-5">
         <a href="index.php" class="btn btn-primary">All</a>

         <?php foreach ($categories as $category): ?>
            <a class="btn btn-primary" href="index.php?category=<?php echo $category['id']?>"><?php echo $category['categoryname'];?></a>
         <?php endforeach ?>
      </div>

      <div id="search" class="col-4">
            <button class="btn btn-primary float-right ml-1" onclick="window.open('index.php?search=' + document.getElementById('txtsearch').value, '_self')">Search</button>
            <input class="float-right" type="text" id="txtsearch" value="<?php echo $par_searchword?>">

      </div>  

      <div id="searchresults" class="col-12">
            <?php
               if(!empty($par_searchword))
                  $searchresult = count($posts) . " result(s) for '" . $par_searchword . "'";
               else
                  $searchresult = "";
            ?>
            <label class="float-right" id="lblseachresults"><?php echo htmlentities($searchresult, ENT_QUOTES, 'UTF-8')?></label>
      </div> 
         
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
