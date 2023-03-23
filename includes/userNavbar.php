<head>
  <script src="includes/js/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="includes/js/handlerSearchInput.js"></script>
<script src="includes/js/listenerSearchInput.js"></script>
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
    <li class="nav-item">
      <a class="nav-link" href="#graphs" data-toggle="tab">Graphs</a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="items" class="tab-pane active">
        
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
    </form>
    </div>
    <div id="yourFlips" class="tab-pane">
    <p>Your flips</p>
    <!----- PHP CODE ------>
    <?php
    // Fetch all items from the database
    $pdo = new PDO('mysql:host=localhost;dbname=rsflips', 'root', '');
    $id = $_SESSION['id'];
    $stmt = $pdo->query("SELECT id, itemName FROM items WHERE id = '$id'");
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
        <!--------------- CONTENT ------------->
        <div class="bg-light">
      <div class="explanationTitle">
        <h1> Your flips </h1>
      </div>
      <p> Your past and current flips are displayed here so you can easily keep track! </p>
      <hr>
    </div>

    <div class="card-container">
      <?php foreach ($items as $item) { ?>
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="#" alt="<?php echo $item[
              'itemName'
          ]; ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo $item['itemName']; ?></h5>
            <p class="card-text">Small description</p>
            <a href="#" class="btn btn-primary">More information</a>
          </div>
        </div>
      <?php } ?>
    </div>

  </div>
  <div id="graphs" class="tab-pane">
    <p>Show statistics</p>
  </div>
</div>
</div>
<div class="modal fade" id="itemInfoModal" tabindex="-1" aria-labelledby="itemInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemInfoModalLabel">Item Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Item ID:</strong> <span id="itemId"></span></p>
        <p><strong>Price:</strong> <span id="itemPrice"></span></p>
        <p><strong>Time:</strong> <span id="itemTime"></span></p>
        <p><strong>Item ID Auto:</strong> <span id="itemIdAuto"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        </body>
</nav>

