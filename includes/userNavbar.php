<head>
  <!-- ... All stylesheets needed ... -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="mycss.css">

<!-- ... other styles ... -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- ...  other scripts, including handlerSearchInput.js (suggestion / autocomplete) ... -->
<script src="includes/js/handlerSearchInput.js"></script>
<script src="includes/js/handlerSearchInputUsers.js"></script>

<!-- ... Javascripts for charts ... -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!--- ... Gather information for the user flips ... -->
<script src="includes/js/moreinfoUserNav.js "></script>

</head>
<body>
<nav>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="#items" data-toggle="tab">Items</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#yourFlips" data-toggle="tab">Your Flips</a>
    </li>
  </ul>
  </nav>
  <div class="tab-content">
    <div id="items" class="tab-pane active">
        
    <label for="itemSearch">Item Search:</label>
        <input type="text" class="form-control" id="itemSearch" placeholder="Type to search...">
    <div id="suggestions">
    </div>
    <div class="form-group">
      <?php
      // Connect to your database and fetch data
      $pdo = new PDO('mysql:host=localhost;dbname=rsflips', 'root', '');
      $stmt = $pdo->query('SELECT id, itemName FROM items');
      ?>
    </select>
  </div>
  </form>
    </form>
    </div>
    <div id="yourFlips" class="tab-pane">
    <!----- PHP CODE ------>
    <?php
    // Fetch all items from the database
    $pdo = new PDO('mysql:host=localhost;dbname=rsflips', 'root', '');
    $id = $_SESSION['id'];
    $stmt = $pdo->query("SELECT id, itemName, price, sellPrice, time FROM items WHERE id = '$id'");

    $items = $stmt->fetchAll();
    ?>
<!-- small piece of css to make the cards appear left to right first --->
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
<!-- ... Database query ... -->
<?php
$pdo = new PDO('mysql:host=localhost;dbname=rsflips', 'root', '');
$id = $_SESSION['id'];
$stmt = $pdo->query("SELECT id, itemName, price, sellPrice, time FROM items WHERE id = '$id' ORDER BY time DESC");

$items = $stmt->fetchAll();
$total_profit = 0; // initialize total_profit variable
?>
<!-- DISPLAY CARDS AND SHOW TOTAL PROFIT -->
<div class="bg-light">
  <div class="explanationTitle">
    <h1> Your flips </h1>
  </div>
  <div class="row">
    <div class="col-lg-8">
      <p> Your past and current flips are displayed here so you can easily keep track! </p>
      <p> The items are shown from new to old. </p>
      <hr>
      <div class="card-container">
        <?php foreach ($items as $item) { ?>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top item-icon mx-auto" src="images/icons/<?php echo rawurlencode($item['itemName']); ?>.png" alt="<?php echo ("No item icon has been found"); ?>">
            <div class="card-body text-center d-flex flex-column"> <!-- Add d-flex and flex-column classes here -->
              <h5 class="card-title"><?php echo $item['itemName']; ?></h5>
              <p class="card-text">Small description</p>
              <div class="mt-auto"> <!-- Wrap the button in a div with mt-auto class -->
                <a href="#" class="btn btn-primary more-info-btn" data-item-id="<?php echo $item['id']; ?>"
                  data-item-name="<?php echo $item['itemName']; ?>"
                  data-item-price="<?php echo number_format($item['price'], 2, '.', ','); ?>"
                  data-item-time="<?php echo $item['time']; ?>"
                  data-item-id-auto="<?php echo $item['sellPrice']; ?>">More information</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="bg-white p-3 rounded">
        <?php
        foreach ($items as $item) {
          $total_profit += $item['price'] - $item['sellPrice'];
        }
        ?>
<h2>Total Profit:</h2>
<div class="d-flex align-items-center">
  <h3 style="color: <?php echo $total_profit >= 0 ? 'green' : 'red'; ?>">
    <?php echo number_format(abs($total_profit), 0, '.', ','); ?>
  </h3>
  <img src="images/coin.png" alt="Image description" class="ml-2" width="50" height="50">
</div>
      </div>
    </div>
  </div>
</div>
</div>
    <!--- Quick style to set icon sizes in the card above ^^^^^-->
    <style>
  .item-icon {
    max-width: 100px; /* adjust the percentage or use a fixed size, e.g. 200px */
    max-height: 125px; /* adjust the height */
  }
</style>
<!--###########################EDITING################################-->
<!---------- MODAL FOR EXTRA INFORMATION AND EDITING YOUR FLIPS -------->
  </div>
</div>
</div>
<div class="modal fade" id="itemInfoModal" tabindex="-1" aria-labelledby="itemInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemInfoModalLabel">Item Information</h5>
      </div>
      <div class="modal-body">
        <form id="updateItemForm">
          <input type="hidden" id="itemId" name="itemId">
          <div class="mb-3">
  <label for="itemName" class="form-label">Item Name</label>
  <input type="text" class="form-control" id="itemName" name="itemName">
</div>
          <div class="mb-3">
            <label for="itemPrice" class="form-label">Buy Price</label>
            <input type="text" class="form-control" id="itemPrice" name="itemPrice">
          </div>
          <div class="mb-3">
            <label for="sellPrice" class="form-label">Sell Price</label>
            <input type="text" class="form-control" id="sellPrice" name="sellPrice">
          </div>
          <div class="mb-3">
            <label for="itemTime" class="form-label">Time Recorded</label>
            <input type="text" class="form-control" id="itemTime" name="itemTime">
          </div>
        </form>
      </div>
      <!-- close and update / edit button -->
      <div class="modal-footer">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;Close</span>
        </button>
        <button type="button" class="btn btn-primary" id="updateItemBtn">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- ADD buttons -->
<button class="btn btn-primary addUserDash-item-btn" onclick="addItem()">Add Item</button>

<!-- ADD ITEM JAVASCRIPT -->
<script>
  function addItem() {
    // code here to handle the 'Add Item' button click
    console.log('Add Item button clicked');
  }
</script>
<!-- ^^ over ^^ -->
<!---------- MODAL TO DISPLAY EXTRA INFORMATION WHEN ITEM CLICKED ITEM SEARCHBAR -------->
<div id="itemInfo" class="card" style="display: none;">
  <div class="card-header">
    <h2 class="card-title">Item Information</h2>
    <p> All of the first added entries will be done by mods since we need to put it in the database,
       additionally many other entries are done by mods to get some prices in and for testing purposes. dont always take them as current prices,
        since some of these trades(not all) are based on other sites.
  </div>
  <div class="card-body">
    <p><strong>Name:</strong> <span id="modalItemName"></span></p>
    <p><strong>BuyPrice:</strong> <span id="price"><?php echo number_format($price, 0, '.', ','); ?></span></p>
    <p><strong>SellPriceAlt:</strong> <span id="sellPriceInformationSearch"></span></p>
    <p><strong>Description:</strong> <span id="description"></span></p>
    <p><strong>Last time recorded:</strong> <span id="itemTimeInfoSearch"></span></p>
    <p><strong>Added By:</strong> <span id="usernameInformation"></span></p>
  </div>
  <!-- ### Create a canvas element for the graph ### -->
  <div id="chartContainer" style="height: 400px;">
<canvas id="priceChart"></canvas>
</div>
</div>
</div>
<!-- User Modal -->
<div class="modal fade" id="addUserItemModal" tabindex="-1" role="dialog" aria-labelledby="addUserItemModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserItemModalLabel">Add New Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-user-item-form" onsubmit="submitUserForm(event)">
          <div class="form-group">
            <label for="userItemName">Item Name:</br>(you can click the names i'll make this clearer in the future)</label>
            <div class="input-container">
              <input type="text" class="form-control" id="userItemName" name="userItemName" required autocomplete="off">
              <div id="userItemResults" class="autocomplete-results"></div>
            </div>
          </div>
          <div class="form-group">
            <label for="userPrice">Buy Price:</label>
            <input type="number" class="form-control" id="userPrice" name="userPrice" required>
          </div>
          <div class="form-group">
            <label for="userSellPrice">Sell Price:</label>
            <input type="number" class="form-control" id="userSellPrice" name="userSellPrice" required>
          </div>
          <button type="submit" id="add-user-item-btn" class="btn btn-primary" name="submit">
            Add Item
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
<!--- java scripts ---->
<script>
  // OPEN MODAL WITH BUTTON
    function addItem() {
    // code here to handle the 'Add Item' button click
    $('#addUserItemModal').modal('show');
  }


// submit user form to database
  function submitUserForm(event) {
    event.preventDefault(); // Prevent the default form submission

    // Create a FormData object to hold the form data
    var formData = new FormData(document.getElementById('add-user-item-form'));

    // Send the form data to add_item.php using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'includes/add_item_user.php', true);
    xhr.onload = function () {
        if (this.status === 200) {
          alert (this.responseText); // Output the response from add_item.php
            // location.reload(); // Reload the page to see the updated data
        } else {
            console.error('An error occurred during the request: ', this.status);
        }
    };
    xhr.send(formData);
}

</script>