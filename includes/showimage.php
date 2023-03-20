<?php
// connect to database
$pdo = new PDO('mysql:host=localhost;dbname=dbs10393855', 'root', '');

// get item ID from URL parameter
$itemID = isset($_GET['itemID']) ? $_GET['itemID'] : '';

// prepare SQL statement to retrieve blob data for the given item ID

$stmt = $pdo->prepare("SELECT itemIcon FROM items WHERE itemID = ?");
$stmt->bindParam(1, $itemID);
$stmt->execute();

// set headers to indicate that the output is an image
header("Content-Type: image/jpeg");

// output blob data as image
echo $stmt->fetch(PDO::FETCH_ASSOC)['itemIcon'];
?>