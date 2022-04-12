<?php 
  ob_start(); 
  session_start();
  include '../inc/db.php';
  include '../inc/functions.php';
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script
      src="https://kit.fontawesome.com/7cac6f5ac1.js"
      crossorigin="anonymous">
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="style/general.css">
  <link rel="stylesheet" href="style/admin-header.css">
  <script defer src="../JS/year.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <title>TGL - Admin</title>
</head>
<body>
<!----------------->
<!-- Header -->
<!----------------->
<header class="admin-header">
  <h1 >The Glow Light Admin Panel</h1>
</header>
<!----------------->
<!-- Navigation -->
<!----------------->
<div class="page">
  <nav class="admin-main-nav">
    <ul class="admin-main-nav-list">
      <li><a class="admin-main-nav-link" href="index.php">Dashboard</a></li>
      <li><a class="admin-main-nav-link" href="admin-services.php">Services</a></a></li>
      <li><a class="admin-main-nav-link" href="admin_orders.php">Orders</a></a></li>
      <li><a class="admin-main-nav-link" href="admin_comments.php">Comments</a></a></li>
      <li><a class="admin-main-nav-link" href="admin-users.php">Users</a></a></li>
      <li><a class="admin-main-nav-link" href="../home.php">Go Back To Home</a></li>
    </ul>
  </nav>