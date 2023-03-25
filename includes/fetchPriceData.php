<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=rsflips', 'root', '');

// Get the itemName from the request
$itemName = $_GET['itemName'];

// Query the database to fetch price and sellPrice data
$stmt = $pdo->prepare('SELECT id, itemName, price, sellPrice, time FROM items WHERE itemName = :itemName');
$stmt->execute(['itemName' => $itemName]);
$priceData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the price data as a JSON object
header('Content-Type: application/json');
echo json_encode($priceData);
?>
