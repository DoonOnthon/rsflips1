<?php
$pdo = new PDO('mysql:host=localhost;dbname=rsflips', 'root', '');
session_start();
include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/db.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    try {
        // Get the values from the form
        $itemName = $_POST['itemName'];
        $price = $_POST['price']; // buy price
        $sellPrice = $_POST['sellPrice']; // sell price
        $description = isset($_POST['description']) ? $_POST['description'] : null; // Item description
        $buyScreenshot = isset($_FILES['buyScreenshot']) && $_FILES['buyScreenshot']['tmp_name'] !== '' ? file_get_contents($_FILES['buyScreenshot']['tmp_name']) : null; //buy screenshot
        $sellScreenshot = isset($_FILES['sellScreenshot']) && $_FILES['sellScreenshot']['tmp_name'] !== '' ? file_get_contents($_FILES['sellScreenshot']['tmp_name']) : null; //sell screenshot
        $id = $_SESSION["id"];
        $itemID = isset($_POST['itemID']) ? (int) $_POST['itemID'] : null;

        // Insert the values into the database
        $stmt = $pdo->prepare("INSERT INTO items (itemName, price, sellPrice, Description, buyScreenshot, sellScreenshot, id, itemID, time) VALUES (:itemName, :price, :sellPrice, :description, :buyScreenshot, :sellScreenshot, :id, :itemID, NOW())");
        $stmt->bindParam(':itemName', $itemName);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':sellPrice', $sellPrice);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':buyScreenshot', $buyScreenshot, PDO::PARAM_LOB);
        $stmt->bindParam(':sellScreenshot', $sellScreenshot, PDO::PARAM_LOB);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':itemID', $itemID);
        $stmt->execute();

        var_dump($_POST); // to check the values of the form inputs
        var_dump($stmt->errorInfo()); // to check if there are any database errors

        // Redirect to the flips page
        echo "Item added successfully!";
        exit();
    } catch (PDOException $e) {
        echo "Error inserting into the database: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error processing the form: " . $e->getMessage();
    }
} else {
    ?>
    <script>
        window.location.replace("includes/add_item.php.php");
    </script>
    <?php
    echo "The form was not submitted.";
}
?>
