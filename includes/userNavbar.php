<head>
  <script src="includes/js/jquery-3.6.4.min.js"></script>
  <stylesheet linkrel= "mycss.cs">
</head>
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
      $pdo = new PDO('mysql:host=localhost;dbname=dbs10393855', 'root', '');
      $stmt = $pdo->query('SELECT id, itemName FROM items');
      ?>
    </select>
  </div>
  </form>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="includes/js/listenerSearchInput.js"></script>
<script src="includes/js/handlerSearchInput.js"></script>
    </form>
    
    </div>
    <div id="yourFlips" class="tab-pane">
    <p>Your flips</p>
    <!----- PHP CODE ------>
    <?php
// Fetch all items from the database
$pdo = new PDO('mysql:host=localhost;dbname=dbs10393855', 'root', '');
$id = $_SESSION["id"];
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
          <img class="card-img-top" src="#" alt="<?php echo $item['itemName']; ?>">
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
</nav>
