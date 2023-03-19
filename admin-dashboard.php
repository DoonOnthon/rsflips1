<?php
session_start(); 
?>
<!doctype html>
<html lang="en">
  <head>
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflips/rsflips1/includes/header.inc.php'; ?>
    <title>Flipper's Den</title>
  </head>
  <body>
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflips/rsflips1/includes/navbar.php'; 
  include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflips/rsflips1/includes/adminNavbar.php';?>
    <?php
      // Controle of gebruiker is ingelogd.
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        $id = $_SESSION["id"];
        include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflips/rsflips1/includes/db.inc.php';
        // Database include.
        $sql = "SELECT admin FROM accounts WHERE id = $id"; 
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $admin = $row["admin"];
        
// CHECK IF THE PERSON IS AN ADMIN
if ($admin == 1) { 
  // Check if the value of admin = 1
  error_log('Welcome');
} else {
  // If it isn't 1 send back to index
  ?>
  <script>
  window.location.replace("index.php");
  window.onload = function() {
  alert('If you see this message please contact an admin through preferably Discord');
  };
  </script> 
  <?php
}}
        ?>
</body>
<body>
<?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflips/rsflips1/includes/footer.inc.php'; ?>
  </body>
</html>
<?php

?>