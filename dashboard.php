<?php
session_start(); 
var_dump ($_SESSION);
?>
<!doctype html>
<html lang="en">
  <head>
  <?php 
      include_once 'includes/header.inc.php'; ?>
    <title>Flipper's Den</title>
  </head>
  <body>
<?php include_once 'includes/navbar.php'; ?>
<p>Welcome back, <?=$_SESSION['name']?>!</p>
<?php include_once 'includes/footer.inc.php'; ?>
  </body>
</html>
<?php

?>