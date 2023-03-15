<?php
include 'db.inc.php';
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get email, id, and admin from POST data
$email = $_POST['email'];
$id = $_POST['id'];
$admin = $_POST['admin'];

// Prepare and execute query
$stmt = $conn->prepare("SELECT * FROM accounts WHERE email = ? AND id = ? AND admin = ?");
$stmt->bind_param("sii", $email, $id, $admin);
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