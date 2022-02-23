<?php ob_start(); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/7cac6f5ac1.js"
      crossorigin="anonymous"
    ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <script defer src="JS/year.js"></script>
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/headerfooter.css" />
    <title>The Glow Light</title>
  </head>
  <body>
  <?php include 'inc/db.php'; ?>
  <?php include 'inc/functions.php'; ?>
  <!----------------->
  <!-- Heading -->
  <!----------------->
  <header class="header">
    <div class="head-container">
      <div class="head">
        <div class="heading">
          <h1 href="#">The Glow Light</h1>
          <p class="site-description text">Smart Detailing</p>
        </div>
        <div class="head-info">
          <div class="head-info-container">
            <i class="fas fa-phone"></i>
            <div>
              <p class="head-info-heading">Call Us</p>
              <p class="head-info-content text">07577 425 727</p>
            </div>
          </div>
          <div class="head-info-container">
            <i class="far fa-envelope-open"></i>
            <div>
              <p class="head-info-heading">Email Address</p>
              <p class="head-info-content text">info@theglowlight.co.uk</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!----------------->
    <!-- Navigation -->
    <!----------------->
    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a class="main-nav-link" href="home.php">Home</a></li>
        <li><a class="main-nav-link" href="services.php">Services</a></li>
        <li><a class="main-nav-link" href="aboutus.php">About Us</a></li>
        <li><a class="main-nav-link" href="testimonials.php">Testimonials</a></li>
        <li class="<?php conditionalDisplay('on'); ?>"><a class="main-nav-link" href="login.php">Log-In</a></li>
        <li class="<?php conditionalDisplay('off'); ?>"><a class="main-nav-link" href="profile.php">Profile</a></li>
        <li class="<?php conditionalDisplay('off'); ?>"><a class="main-nav-link" href="admin/index.php">Admin</a></li>
        <li class="<?php conditionalDisplay('off'); ?>"><a class="main-nav-link main-nav-link-last" href="inc/logout.php">Log-Out</a></li>
      </ul>
    </nav>
  </header>