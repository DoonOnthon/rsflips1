<?php
/**
 * This file connects to DB
 */

  // Database info.
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dbs10393855";

  // Maak connectie met de database.
  $con = mysqli_connect($host, $username, $password, $dbname);

  // Controleer connectie met de database.
  $conn = mysqli_connect($host, $username, $password, $dbname);
  if (mysqli_connect_errno()) {
      // If there is an error with the connection, stop the script and display the error.
      exit('Failed to connect to MySQL: ' . mysqli_connect_error());
  }
?>