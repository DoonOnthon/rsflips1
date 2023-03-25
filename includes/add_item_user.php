<?php
// Start session (if not already started)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    echo "Error: User not logged in.";
    exit();
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    // Get form data
    $itemName = $_POST['userItemName'];
    $itemPrice = $_POST['userPrice'];
    $itemSellPrice = $_POST['userSellPrice'];

    // Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=rsflips', 'root', '');

    // Check if the item with the same itemName already exists in the database
    $check_stmt = $pdo->prepare("SELECT id, description FROM items WHERE itemName = :itemName");
    $check_stmt->bindParam(':itemName', $itemName);
    $check_stmt->execute();
    $existingItem = $check_stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingItem) {
        // If the item with the same itemName already exists, use its description and id
        $itemId = $existingItem['id'];
        $itemDescription = $existingItem['description'];
    } else {
        // Otherwise, set the id and description to NULL
        $itemId = NULL;
        $itemDescription = NULL;
    }

    // Modify the INSERT statement to include the current timestamp
    $stmt = $pdo->prepare("INSERT INTO items (id, itemName, price, sellPrice, time, description) VALUES (:id, :itemName, :price, :sellPrice, :time, :description)");
    $stmt->bindParam(':id', $userId);
    $stmt->bindParam(':itemName', $itemName);
    $stmt->bindParam(':price', $itemPrice);
    $stmt->bindParam(':sellPrice', $itemSellPrice);

    // Bind the current timestamp and the item description (if it exists)
    $currentTimestamp = date('Y-m-d H:i:s');
    $stmt->bindParam(':time', $currentTimestamp);
    $stmt->bindParam(':description', $itemDescription);

    if ($stmt->execute()) {
        echo "Item successfully added!";
    } else {
        echo "Error: Unable to add item.";
    }
} else {
    echo "Error: Invalid request method or user not logged in.";
}
?>