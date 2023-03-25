<head>
<title>Navbar</title>
</head>

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
      <!-- <li class="nav-item">
        <a class="nav-link" href="blog.php">Blog</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="community.php">Community</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li> -->
      <?php
      // Controle of gebruiker is ingelogd.
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                $id = $_SESSION["id"];
                include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/db.inc.php';
 // Database include.
                $sql = "SELECT admin FROM accounts WHERE id = $id"; 
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $admin = $row["admin"];
                
                if($admin == 1){ // if Admin = 1 ?>
                  <li class="nav-item">
                  <a class="nav-link" href="admin-dashboard.php">Admin Dashboard</a>
                </li>
                  <li class="nav-item">
                  <a class="nav-link" href="adminFlips.php">Add new database items</a>
                </li>
                <li>
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php">Normal Dashboard</a>
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
                <div class="d-flex justify-content-end">
                <div class="d-flex align-items-center">
  <label for="dark-mode-toggle" class="mr-2 mb-0">Dark mode</label>
  <label class="switch mb-0">
    <input type="checkbox" id="dark-mode-toggle">
    <span class="slider round"></span>
  </label>
</div>
                </div>
                </div>
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



<!--------------------- JAVA SCRIPT TO ENABLE DARK MODE ---------------------->
<script>
// Check the current state of the dark mode toggle and update the page accordingly
  function updateDarkMode() {
    const toggle = document.getElementById("dark-mode-toggle");
    const isDarkMode = toggle.checked;
    const body = document.querySelector("body");

    if (isDarkMode) {
      body.classList.add("dark-mode");
    } else {
      body.classList.remove("dark-mode");
    }
  }

  // Add an event listener to the toggle to update the page when it's changed
  const toggle = document.getElementById("dark-mode-toggle");
  toggle.addEventListener("change", updateDarkMode);

  // Update the page when it's loaded to reflect the current state of the toggle
  updateDarkMode();
</script>