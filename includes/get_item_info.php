<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/db.inc.php';

// Retrieve POST data
$itemName = $_POST['itemName'];
$price = $_POST['Price'];
$time = $_POST['time'];
$id = $_POST['id'];
$itemID = $_POST['itemID'];
$itemIDauto = $_POST['itemIDauto'];


// Prepare and execute query
$stmt = $conn->prepare("SELECT * FROM items WHERE itemName = ? AND price = ? AND itemID = ? AND time = ? AND id = ? AND itemIDauto = ?");
$stmt->bind_param("siisii", $itemName, $price, $itemID, $time, $id, $itemIDauto);
$stmt->execute();
$result = $stmt->get_result();

// Check for results and output as JSON
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo json_encode($row);
} else {
  echo "No results";
}

// Close connection
$stmt->close();
$conn->close();
?>