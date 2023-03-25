<?php
// Connect to database
$pdo = new PDO('mysql:host=localhost;dbname=rsflips', 'root', '');

// Get search query from POST data
$itemSearch = $_POST['itemSearch'];

// Query database for matching items
$stmt = $pdo->prepare(
    'SELECT i1.id, i1.itemName, i1.price, i1.sellPrice, i1.time, i1.description, a.username
    FROM items i1
    INNER JOIN (
        SELECT itemName, MAX(time) as maxTime
        FROM items
        GROUP BY itemName
    ) i2 ON i1.itemName = i2.itemName AND i1.time = i2.maxTime
    INNER JOIN accounts a ON i1.id = a.id
    WHERE i1.itemName LIKE :itemSearch
    ORDER BY i1.time DESC'
);
$stmt->execute(['itemSearch' => '%' . $itemSearch . '%']);
$matchingItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return matching items as JSON
header('Content-Type: application/json');
echo json_encode($matchingItems);
?>
