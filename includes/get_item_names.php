<?php
// connect to database
$pdo = new PDO('mysql:host=localhost;dbname=rsflips', 'root', '');

// get the search term from the client
$searchTerm = isset($_GET['term']) ? $_GET['term'] : '';

// function to search for items in the database
function searchItems($pdo, $searchTerm) {
  // prepare SQL statement to search for items
  $stmt = $pdo->prepare("SELECT itemID, itemName, itemIcon FROM items WHERE itemName LIKE :term");
  $stmt->bindValue(':term', '%'.$searchTerm.'%');
  $stmt->execute();

  // fetch results as an array of items
  $items = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $item = array();
    $item['label'] = $row['itemName'];
    $item['value'] = $row['itemName'];
    $item['itemID'] = $row['itemID'];
    $item['itemIcon'] = base64_encode($row['itemIcon']);
    $items[] = $item;
  }

  return $items;
}

// search for items and return them as JSON
$items = searchItems($pdo, $searchTerm);
echo json_encode($items);
?>
