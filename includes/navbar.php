<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Flipper's Den</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="guides.php">Guides</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blog.php">Blog</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Community
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="https://discord.gg/c6ux3WdYkv" target="_blank">Discord</a>
          <a class="dropdown-item" href="#">Reddit</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Twitter</a>
          <a class="dropdown-item" href="#">Instagram</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <?php
      // Controle of gebruiker is ingelogd.
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                $id = $_SESSION["id"];
                include_once 'includes/db.inc.php'; // Database include.
                $sql = "SELECT admin FROM accounts WHERE id = $id"; 
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $admin = $row["admin"];
                
                if($admin == 1){ // Als de waarde van $admin 1 is stuur door naar dashboard-admin?>
                  <li class="nav-item">
                  <a class="nav-link" href="admin-dashboard.php">Dashboard</a>
                </li>
              <?php } else { // If anything but 1 send to Normal dashboard?> 
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php">Dashboard</a>
                <?php } }?>
                <!-- If something different  -->
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
                  <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <?php } else {?>
                  <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
                  <li class="nav-item">
                  <a class="nav-link" href="register.php">Register</a>
                </li>
                <?php } ?>
    </ul>
  </div>
</nav>