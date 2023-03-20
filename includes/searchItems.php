<?php
// Connect to database
$pdo = new PDO('mysql:host=localhost;dbname=dbs10393855', 'root', '');

// Get search query from POST data
$itemSearch = $_POST['itemSearch'];

// Query database for matching items
$stmt = $pdo->prepare('SELECT id, itemName FROM items WHERE itemName LIKE :itemSearch');
$stmt->execute(['itemSearch' => '%' . $itemSearch . '%']);
$matchingItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return matching items as JSON
header('Content-Type: application/json');
echo json_encode($matchingItems);


?>