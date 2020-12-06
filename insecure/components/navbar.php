<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Blog</a>
    </li>
  </ul>
  <ul class="navbar-nav">
    <li class="nav-item">
      <p id="username" class="navbar-text">Logged in as <?php echo $_SESSION["username"]?></p> 
    </li>
    <li class="nav-item">
      <a id="login" class="nav-link" href="login.php">Login</a>
    </li>
    <li class="nav-item">
      <a id="logout" class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>
</nav>

<?php
// Check if the user is logged in, hide login or logout in navbar
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ ?>
    <script type="text/javascript">
      $('#logout').hide();
      $('#username').hide();
    </script>
<?php } else { ?>
  <script type="text/javascript">
      $('#login').hide();
    </script>
<?php } ?>