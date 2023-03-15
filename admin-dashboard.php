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
<?php include_once 'includes/adminNavbar.php'; ?>
<?php include_once 'includes/footer.inc.php'; ?>
  </body>
</html>
<?php

?>