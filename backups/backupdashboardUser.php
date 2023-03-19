<head>
  <script src="includes/js/jquery-3.6.4.min.js"></script>
  <title>Dashboard</title>
</head>
<nav>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="#itemSearch" data-toggle="tab">Item searcher</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#yourFlips" data-toggle="tab">Your flips</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#graphs" data-toggle="tab">Graphs</a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="itemSearch" class="tab-pane active">
    <form>
      <!---------------- ITEMS -------------------->
  <form>
    <div class="tab-content">
      <div id="">
  <div class="form-group">
  <label for="itemSearch">Item Search:
    </br> the suggestions shown are clickable working on making that more clear</label>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="includes/js/listenerSearchInput.js"></script>
<script src="includes/js/handlerSearchInput.js"></script>

    </form>
  <div id="yourFlips" class="tab-pane">
    <p>Add / edit and remove users</p>
    <?php
// ############################################################
// ################   CHECK FOR ITEMS  ########################
// ############################################################
?>
<?php
    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    // Execute query
    $sql = 'SELECT itemID, itemIDauto, itemName, price, time, id FROM items';
    $result = $conn->query($sql);
// Loop through result set and display usernames as links
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<a class='itemName-link' href='#' data-id='" .
  $row['id'] .
  "' data-itemID='" .
  $row['itemID'] .
  "' data-itemIDauto='" .
  $row['itemIDauto'] .  // Add this line
  "' data-itemName='" .
  $row['itemName'] .
  "' data-price='" .
  $row['price'] .
  "' data-time='" .
  $row['time'] .
  "' data-toggle='modal' data-target='#editItemModal'>" .
  $row['itemName'] .
  "</a><br>";
  
    echo "<span class='time'>" . $row['time'] . "</span><br>";
  }
    } else {
        echo 'No results';
    }
    ?>
    </div>
    <!---------------- END ITEMS --------------->
    <script src="includes/js/itemsAdmin.js"></script>
  </div>
  <div id="graphs" class="tab-pane">
    <p>Show statistics</p>
  </div>
  </div>
