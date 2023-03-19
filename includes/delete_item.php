<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflips/rsflips1/includes/db.inc.php';

// Get the item ID from the AJAX request
$itemIDauto = $_POST["itemIDauto"];

// Prepare and execute query to delete the item from the database
$stmt = $conn->prepare("DELETE FROM items WHERE itemIDauto = ?");
$stmt->bind_param("i", $itemIDauto);
$stmt->execute();

// Check for errors and output appropriate message
if ($stmt->affected_rows > 0) {
  echo "success";
} else {
  echo "error";
}

// Close connection
$stmt->close();
$conn->close();
?>
