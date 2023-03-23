<?php
session_start(); 
?>
<!doctype html>
<html lang="en">
  <head>
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/header.inc.php'; ?>
    <title>Flipper's Den roadmap</title>
  </head>
  <body>
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/navbar.php'; ?>
  <div class="container my-5">
  <div class="row">
    <div class="col-md-12 text-center">
      <h2>Our Roadmap</h2>
      <p class="lead">Here's what we're planning to work on in the coming months. We'll keep updating this roadmap as we make progress and release new features.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <ul class="timeline">
        <li class="timeline-item">
          <div class="timeline-badge bg-primary">
            <i class="fas fa-users"></i>
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Community Feedback</h4>
            </div>
            <div class="timeline-body">
              <p>We'll be listening closely to your feedback and suggestions, and using that input to guide our development priorities.</p>
            </div>
          </div>
        </li>
        <li class="timeline-item">
          <div class="timeline-badge bg-warning">
            <i class="fas fa-book"></i>
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Expanded Guides</h4>
            </div>
            <div class="timeline-body">
            At Flipper's Den, we understand the importance of having access to reliable and comprehensive guides that can help you navigate
             the complex world of Oldschool Runescape and Runescape 3. As part of our commitment to providing you with the best resources and tools,
              we are currently working on expanding our collection of guides. Initially, we will be focusing on providing more comprehensive guides to help you with money-making
               strategies in the game. However, we plan to expand our guides to cover other areas of the game as well in the near future.

 We appreciate any help from the community,
 be it video or text-based guides, in order to provide even more value to our users. We believe that these guides will help you become a more successful player
  and achieve your goals in the game. Keep an eye out for more updates and new guides coming soon!
            </div>
          </div>
        </li>
        <li class="timeline-item">
          <div class="timeline-badge bg-danger">
            <i class="fas fa-tools"></i>
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">New Tools</h4>
            </div>
            <div class="timeline-body">
              <p>At Flipper's Den, we are committed to providing our users with the best tools and resources to help
                 them succeed in Oldschool Runescape and Runescape 3. As part of this commitment, we are continually
                  working on developing new tools to help you analyze your data and make more informed decisions.
                   Our development team is dedicated to creating innovative solutions that will enhance your experience
                    and provide you with a competitive edge. We understand the importance of having access to accurate and reliable data,
                     and we are making it a priority to provide you with the tools you need to succeed. Stay tuned for more updates and new tools coming soon!</p>
            </div>
          </div>
        </li>
        <li class="timeline-item">
          <div class="timeline-badge bg-danger">
            <i class="fas fa-tools"></i>
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Comming soon!</h4>
            </div>
            <div class="timeline-body">
              <p>At Flipper's Den, we are committed to providing you with the best tools and resources to help you succeed in Oldschool Runescape and Runescape 3.
                 Our team is constantly working on improving our platform, and we have some exciting updates in the works. In the near future, we will be releasing
                  a blog feature to keep you up-to-date with our latest developments and updates to the platform. We are also developing new calculation tools,
                   better graphs, and more comprehensive guides to help you make more informed decisions in the game. We believe that these updates will make your
                 experience on our platform even better and help you achieve your goals in the game. Keep an eye out for more updates and new features coming soon!</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>




</body>
<body>
  <!-- footer -->
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/footer.inc.php'; ?>
<!----- extra footer for index -------->
<footer class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <h5 class="mb-3">Flipper's Den</h5>
        <p class="text-muted">Flipper's Den is able to provide accurate prices based on players their input, the more you submit the better we become as a community.</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#" class="text-muted">Privacy Policy</a></li>
          <li class="list-inline-item"><a href="#" class="text-muted">Terms of Use</a></li>
        </ul>
      </div>
      <div class="col-lg-6">
        <h5 class="mb-3">Contact Us</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><i class="bi bi-envelope-fill"></i> info@flippersden.com</li>
          <a href="https://discord.gg/c6ux3WdYkv" target="_blank" class="btn btn-primary">Discord</a>
        </ul>
      </div>
    </div>
  </div>
  <div class="bg-dark py-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p class="m-0 text-center text-white">&copy; 2023 Flipper's Den. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
  </body>
</html>