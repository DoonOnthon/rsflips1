<?php
session_start(); 
?>
<style>
</style>
<!doctype html>
<html lang="en">
  <head>
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/header.inc.php'; ?>
    <title>Flipper's Den</title>
  </head>
  <body class="dark-mode">
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/navbar.php'; ?>
  <section class="section-about">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="section-title text-center">About Flipper's Den </br>
      </h2>
        <p class ="section-text text-center">Note: make sure to check our roadmap at the bottom!</p>
        <div class="section-divider mb-5"></div>
        <p class="section-text text-center">Welcome to Flipper's Den - a community-driven project dedicated to providing accurate and
          up-to-date information on Oldschool Runescape and Runescape 3. Our mission is to become the go-to resource for every player, and we need your help to achieve this goal.</p>
        <p class="section-text text-center">Our platform is still in its early stages of development, but we have a passionate deloper who works tirelessly to bring you the best experience possible. We value your input and encourage you to provide us with your feedback and suggestions so that we can continue to make improvements and ensure your satisfaction.</p>
        <p class="section-text text-center">At Flipper's Den, we believe that sharing data is key to success. The more data you upload, the more accurate our platform becomes, benefiting the entire community. We provide guides for money making in both Oldschool Runescape and Runescape 3, and our graphs are based on the data that you and others provide.</p>
        <p class="section-text text-center">Our full-featured dashboard allows you to track your flips within the game, providing you with real-time insights into your profit margins. While we are still in the early stages of development, we are committed to providing you with the best tools and resources to help you succeed in the game.</p>
        <p class="section-text text-center">We appreciate your patience as we continue to refine our platform, and we invite you to join us on this exciting journey towards creating the ultimate resource for the Runescape community.</p>
      </div>
      <div class="container-fluid py-5 bg-light">
  <div class="row">
    <div class="col-md-12 text-center">
    <a href="/rsflipsmain/rsflips1/roadmap.php" class="btn btn-info btn-lg">View our Roadmap</a>
    </div>
  </div>
</div>
    </div>
  </div>
</section>

  <!-- footer -->
<?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflipsmain/rsflips1/includes/footer.inc.php'; ?>
<!----- extra footer for index -------->
<footer class="bg-light py-3" id="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <h5 class="mb-3">Flipper's Den</h5>
        <p class="text-muted">Flipper's Den is able to provide accurate prices based on players their input, the more you submit the better we become as a community.</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#" class="text-muted">Privacy Policy</a></li>
          <li class="list-inline-item"><a href="#" class="text-muted">Terms of Use</a></li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h5 class="mb-3">Contact Us</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><i class="bi bi-envelope-fill"></i> info@flippersden.com</li>
          <a href="https://discord.gg/c6ux3WdYkv" target="_blank" class="btn btn-primary">Discord</a>
        </ul>
      </div>
      <div class="col-lg-4">
        <h5 class="mb-3">Donations</h5>
        <p class="text-muted">To keep our website running smoothly and provide you with the best resources, we rely on donations from the community. Any support is greatly appreciated.</p>
        <!--@@@@@@@@@@@@@@ DONATION BUTTON @@@@@@@@@@@@@-->
        <div id="donate-button-container">
<div id="donate-button"></div>
<script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
<script>
PayPal.Donation.Button({
env:'production',
hosted_button_id:'NRHLPX7GLB552',
image: {
src:'https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif',
alt:'Donate with PayPal button',
title:'PayPal - The safer, easier way to pay online!',
}
}).render('#donate-button');
</script>
</div>
<!--@@@@@@@@@@@@@@ DONATION BUTTON ENDING @@@@@@@@@@@@@-->
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
<?php
?>