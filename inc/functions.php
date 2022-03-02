<?php

function displayStars($rating)
{
  for ($i=0; $i < 5; $i++) { 
    if ($rating<1) {
      if ($rating<0.5) {
        echo "<i class='far fa-star'></i>";
      }
      else {
        echo "<i class='fas fa-star-half-alt'></i>";
      }
    }
    else{
      echo "<i class='fas fa-star'></i>";
    }
    $rating-=1;
  }
}

function displayLinks(){
  if(isset($_SESSION['user_id'])){
    echo "<li><a class='main-nav-link' href='profile.php'>Profile</a></li>";
    echo "<li><a class='main-nav-link main-nav-link-last' href='inc/logout.php'>Log-Out</a></li>";
    if($_SESSION['user_role'] == 'admin'){
      echo "<li><a class='main-nav-link' href='admin/index.php'>Admin</a></li>";
    }
  }
  else{
    echo "<li><a class='main-nav-link' href='login.php'>Log-In</a></li>";
  }
}