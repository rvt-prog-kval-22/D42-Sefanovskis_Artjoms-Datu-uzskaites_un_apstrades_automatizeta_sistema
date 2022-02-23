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

function conditionalDisplay($default){
  if($default === 'off'){
    if(isset($_SESSION['user_id'])){
      echo "main-nav-link-on";
    }
    else{
      echo "main-nav-link-off";
    }
  }
  else{
    if(!isset($_SESSION['user_id'])){
      echo "main-nav-link-on";
    }
    else{
      echo "main-nav-link-off";
    }
  }
}

