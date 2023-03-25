<?php
session_start(); 
?>
<html lang="en">
  <head>
  <?php include_once 'includes/header.inc.php' ?>
    <title>Community</title>
  </head>
  <body class="dark-mode">
  <?php include_once 'includes/navbar.php'?>
</div>
<div class="bg-light">
  <div class="explanationTitle">
    <h1> Community </h1>
  </div>
  <p> Here are different platforms we use to communicate within our community </br> NOTE : some social media might not work because we're
   still in the very early stages of devloping the website </p>
<hr>
</div>

<div class="row">
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card">
      <img class="card-img-top" src="images/DiscordLogo.png" alt="DiscordCommunityLogo" >
      <div class="card-body">
        <h5 class="card-title">Discord</h5>
        <p class="card-text">A discord for the community to voice their opinion and get to know each other.</p>
        <a href="https://discord.gg/c6ux3WdYkv" target="_blank" class="btn btn-primary">Join!</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card">
      <img class="card-img-top" src="images/RedditLogo.png" alt="RedditCommunityLogo">
      <div class="card-body">
        <h5 class="card-title">Reddit</h5>
        <p class="card-text">A subreddit for the community to share and discuss ideas.</p>
        <a href="https://www.reddit.com/r/FlippersDen" target="_blank" class="btn btn-primary">Join!</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card">
      <img class="card-img-top" src="images/TwitterLogo.png" alt="TwitterCommunityLogo" style="width: 200px; height: 168px;">
      <div class="card-body">
        <h5 class="card-title">Twitter</h5>
        <p class="card-text">Follow us on Twitter for updates and announcements.</p>
        <a href="https://twitter.com/FlippersDen" target="_blank" class="btn btn-primary">Follow</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card">
      <img class="card-img-top" src="images/InstagramLogo.png" alt="InstagramCommunityLogo" style="width: 200px; height: 168px;">
      <div class="card-body">
        <h5 class="card-title">Instagram</h5>
        <p class="card-text">Follow us on Instagram for photos and behind-the-scenes content.</p>
        <a href="https://www.instagram.com/FlippersDen/" target="_blank" class="btn btn-primary">Follow</a>
      </div>
    </div>
  </div>
</div>

<?php include_once 'includes/footer.inc.php'?>
  </body>
</html>
