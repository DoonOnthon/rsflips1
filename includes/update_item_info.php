<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/db.inc.php';

// Get itemIDauto and new price from POST data
$itemIDauto = $_POST['itemIDauto'];
$newPrice = $_POST['price'];

// Start transaction
$conn->begin_transaction();

try {
  // Lock the row with FOR UPDATE
  $stmt = $conn->prepare("SELECT * FROM items WHERE itemIDauto = ? FOR UPDATE");
  $stmt->bind_param("i", $itemIDauto);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check for results and update price
  if ($result->num_rows > 0) {
    $stmt = $conn->prepare("UPDATE items SET price = ? WHERE itemIDauto = ?");
    $stmt->bind_param("ii", $newPrice, $itemIDauto);
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

// Close connection
$stmt->close();
$conn->close();
?>
