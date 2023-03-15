<?php
include 'db.inc.php';

// Get itemIDauto and new price from POST data
$itemIDauto  = $_POST['itemIDauto '];
$newPrice = $_POST['price'];

// Prepare and execute query
$stmt = $conn->prepare("UPDATE items SET price = ? WHERE itemIDauto  = ?");
$stmt->bind_param("si", $newPrice, $itemIDauto );
$stmt->execute();

// Check for errors and output appropriate message
if ($stmt->affected_rows > 0) {
  echo "Changes saved successfully";
} else {
  echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
