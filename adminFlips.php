<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>New database items</title>
	<!-- include jQuery library -->
	<script src="includes/js/jquery-3.6.4.min.js"></script>
  <<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.min.css">
	<!-- include jQuery UI library -->
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
  <!-- different JS scripts -->
  <script src="includes/js/addItemScript.js"></script>
<script>
$(function() {
  $("#itemName").autocomplete({
    source: function(request, response) {
      // use AJAX to call the get_item_names.php file with the search term
      $.ajax({
  url: "includes/get_item_names.php",
  dataType: "json",
  data: { term: request.term },
  success: function(data) {

        response(data);
        console.log('Autocomplete function called');
        console.log(data);
        },
error: function(jqXHR, textStatus, errorThrown) {
  console.error("Error in AJAX request:", textStatus, errorThrown);
}
      });
    },
    minLength: 2, // minimum characters to start search
    appendTo: "#itemResults", // Specify the element to append the results to
  });
});
console.log('Autocomplete function called');
</script>
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addItemModalLabel">Add New Item into database</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="add-item-form" onsubmit="submitForm(event)">
        <div class="form-group">
            <label for="itemName">Item Name:</br>(you can click the names i'll make this clearer in the future)</label>
            <input type="text" class="form-control" id="itemName" name="itemName" required>
        </div>
        <div class="form-group" id="itemResults"></div> <!-- Add a div to hold the autocomplete results -->
        <div id="autocomplete-results"></div>
          <div class="form-group">
            <label for="price">Buy Price:</label>
            <input type="number" class="form-control" id="price" name="price" required>
          </div>
          <div class="form-group">
            <label for="sellPrice">Sell Price:</label>
            <input type="number" class="form-control" id="sellPrice" name="sellPrice" required>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>
          <div class="form-group">
            <label for="buyScreenshot">Buy Screenshot:</label>
            <input type="file" class="form-control-file" id="buyScreenshot" name="buyScreenshot">
          </div>
          <div class="form-group">
            <label for="sellScreenshot">Sell Screenshot:</label>
            <input type="file" class="form-control-file" id="sellScreenshot" name="sellScreenshot">
          </div>
          <div class="form-group">
    <label for="itemID">Item ID:</label>
    <input type="number" class="form-control" id="itemID" name="itemID" required>
</div>
          <button type="submit" id="add-item-btn" class="btn btn-primary" name="submit">
  Add Item
</button>

        </form>
      </div>
    </div>
  </div>
</div>

<?php
session_start();
include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/db.inc.php';
// Fetch all items from the database if they are also your ID (your flips)
$pdo = new PDO('mysql:host=localhost;dbname=rsflips', 'root', '');
$id = $_SESSION["id"];
$stmt = $pdo->query("SELECT id, itemName, description FROM items WHERE id = '$id'");
$items = $stmt->fetchAll();
// Check if user is logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $id = $_SESSION["id"];
    //Find out if user is admin
    $sql = "SELECT admin FROM accounts WHERE id = $id"; 
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $admin = $row["admin"];


// CHECK IF THE PERSON IS AN ADMIN
if ($admin == 1) { 
    // Check if the value of admin is 1
    error_log('Welcome');
} else {
    // If it isn't one send back to index
    ?>
    <script>
    window.location.replace("index.php");
    window.onload = function() {
    alert('If you see this message please contact an admin through preferably Discord');
    };
    </script> 
    <?php
}}
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/header.inc.php'; ?>
    <title>Flipper's Den</title>
    <!--------- small bit of css to make cards appear left to right ----->
    <style>
      .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
      }
      .card {
        margin: 10px;
      }
    </style>
  </head>
  <body>
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/navbar.php'; ?>
    <!--------------- CONTENT ------------->
    <div class="bg-light">
      <div class="explanationTitle">
        <h1> New database entries </h1>
        <!-- Button to trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addItemModal">
  Add Item
</button>
      </div>
      <p> Add NEW items into the database</p>
      <hr>
    </div>
<!-- generated cards to display information about the item -->
    <div class="card-container">
    <?php foreach ($items as $item) { ?>
    <div class="card" style="width: 18rem;">
    <?php if (isset($item['itemIcon'])) { ?>
      <img class="card-img-top" src="data:image/jpeg;base64,<?php echo $item['itemIcon']; ?>" alt="<?php echo $item['itemName']; ?>">
    <?php } else { ?>
      <img class="card-img-top" src="#" alt="No item icon">
    <?php } ?>
          <div class="card-body">
            <h5 class="card-title"><?php echo $item['itemName']; ?></h5>
            <p class="card-text"><?php echo $item['description']; ?></p>
          </div>
        </div>
      <?php } ?>
    </div>

    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/footer.inc.php'; ?>
  </body>
</html>
<!--- java scripts ---->
<script>
    function submitForm(event) {
    event.preventDefault(); // Prevent the default form submission
  
    // Create a FormData object to hold the form data
    var formData = new FormData(document.getElementById('add-item-form'));
  
    // Send the form data to add_item.php using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'includes/add_item.php', true);
    xhr.onload = function () {
      if (this.status === 200) {
        console.log(this.responseText); // Output the response from add_item.php
        location.reload(); // Reload the page to see the updated data
      } else {
        console.error('An error occurred during the request: ', this.status);
      }
    };
    xhr.send(formData);
  }
</script>