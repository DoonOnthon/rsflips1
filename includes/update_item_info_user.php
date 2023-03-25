<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/db.inc.php';

// Get itemIDauto, new price, and sell price from POST data
$itemIDauto = $_POST['itemId'];
$newPrice = $_POST['itemPrice'];
$sellPrice = $_POST['sellPrice'];
var_dump($_POST);
// Start transaction
$conn->begin_transaction();

try {
  // Lock the row with FOR UPDATE
  $stmt = $conn->prepare("SELECT * FROM items WHERE itemIDauto = ? FOR UPDATE");
  $stmt->bind_param("i", $itemIDauto);
  $stmt->execute();
  $result = $stmt->get_result();
  var_dump($_POST);
  // Check for results and update price and sell price
  if ($result->num_rows > 0) {
    $stmt = $conn->prepare("UPDATE items SET price = ?, sellPrice = ? WHERE itemIDauto = ?");
    $stmt->bind_param("iii", $newPrice, $sellPrice, $itemIDauto);
    $stmt->execute();
    $conn->commit();
    echo "Changes saved successfully";
  } else {
    echo "Item not found";
  }
} catch (Exception $e) {
  $conn->rollback();
  echo "Error: " . $e->getMessage();
}
var_dump($_POST);
// Close connection
$stmt->close();
$conn->close();
?>
