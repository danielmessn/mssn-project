<?php

// Initialize the session
session_start();
 
?>

<!DOCTYPE html>
<html lang="it">
<head>
   <title>Blog Name</title>
   <?php include (dirname(__FILE__).'/components/head.php');?>
</head>
<body>
   <?php include (dirname(__FILE__).'/components/navbar.php');?>
   <div class="jumbotron text-center">
      <h1>Blog</h1>
      <p>Blog for Management of System Security and Networks</p>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <h3>Column 1</h3>
            <p>Lorem ipsum dolor..</p>
         </div>
         <div class="col-md-4">
            <h3>Column 2</h3>
            <p>Lorem ipsum dolor..</p>
         </div>
         <div class="col-md-4">
            <h3>Column 3</h3>
            <p>Lorem ipsum dolor..</p>
         </div>
         <div class="col-md-4">
            <h3>Column 4</h3>
            <p>Lorem ipsum dolor..</p>
         </div>
         <div class="col-md-4">
            <h3>Column 5</h3>
            <p>Lorem ipsum dolor..</p>
         </div>
         <div class="col-md-4">
            <h3>Column 6</h3>
            <p>Lorem ipsum dolor..</p>
         </div>
      </div>
   </div>

</body>
</html>
