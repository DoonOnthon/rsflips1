<head>
  <script src="includes/js/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="mycss.css">
</head>
<nav>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="#items" data-toggle="tab">Items</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#users" data-toggle="tab">Users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#graphs" data-toggle="tab">Graphs</a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="items" class="tab-pane active">
    <?php
    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    // Execute query
    $sql = 'SELECT itemID, itemIDauto, itemName, price, time, id FROM items';
    $result = $conn->query($sql);
    // Loop through result set and display items
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<a class='itemName-link' href='#' data-id='" .
            $row['id'] .
            "' data-itemID='" .
            $row['itemID'] .
            "' data-itemIDauto='" .
            $row['itemIDauto'] . // Add this line
                "' data-itemName='" .
                $row['itemName'] .
                "' data-price='" .
                $row['price'] .
                "' data-time='" .
                $row['time'] .
                "' data-toggle='modal' data-target='#editItemModal'>" .
                $row['itemName'] .
                '</a><br>';

            echo "<span class='time'>" . $row['time'] . '</span><br>';
        }
    } else {
        echo 'No results';
    }
    ?>
    <script src="includes/js/itemsAdmin.js"></script>
    </div>
  <div id="users" class="tab-pane">
    <p>Add / edit and remove users</p>
    <?php
    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    // Execute query
    $sql = 'SELECT username, email, id, admin FROM accounts';
    $result = $conn->query($sql);

    // Loop through result set and display usernames as links
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<a class='username-link' href='#' data-email='" .
                $row['email'] .
                "' data-id='" .
                $row['id'] .
                "' data-admin='" .
                $row['admin'] .
                "'>" .
                $row['username'] .
                '</a><br>';
        }
    } else {
        echo 'No results';
    }
    ?>
<script src="includes/js/usersAdmin.js"></script>
</div>
  <div id="graphs" class="tab-pane">
    <p>Show statistics</p>
  </div>
</div>
</nav>
