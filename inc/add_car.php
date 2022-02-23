<?php
  if(isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];

    if(isset($_POST['add_car'])){

      $car_model = $_POST['car_model'];
      $car_producer = $_POST['car_producer'];
      $car_year = $_POST['car_year'];
      $car_color = $_POST['car_color'];
      $car_interior = $_POST['car_interior'];
      $car_details = $_POST['car_details'];

      $query = "insert into cars(car_owner_id, car_producer, car_model, car_year, car_color, car_interior_material, car_details) ";
      $query.= "values($user_id, '$car_producer', '$car_model', $car_year, '$car_color', '$car_interior', '$car_details' )";
    
      $create_car_query = mysqli_query($conn, $query);

      if (!$create_car_query) {
        die('Query Failed ' . mysqli_error($conn));
      }
      else {
        header('Location: profile.php?source=view_cars');
      }
    }
  ?>
  <div class="profile-header-box">
    <div>
      <h2 class="profile-heading">Add Car</h2>
      <span class="profile-header-line"></span>
    </div>
    
    <a href="profile.php?source=view_cars" class="btn--cta user-edit-btn" >
      <i class="fas fa-angle-right"></i>
      <span>Back</span>
    </a>
  </div>

  <form action="profile.php?source=add_car" method="post">

  
    <table class="user-data-box">
      <tr>
        <td class="user-data-label">Car Model: </td>
        <td><input class="text user-data-input" name="car_model" type="text"></td>
      </tr>
      <tr>
        <td class="user-data-label">Producer: </td>
        <td><input class="text user-data-input" name="car_producer"></td>
      </tr>
      <tr>
        <td class="user-data-label">Year of Production: </td>
        <td><input class="text user-data-input" name="car_year" ></td>
      </tr>
      <tr>
        <td class="user-data-label">Color: </td>
        <td><input class="text user-data-input" name="car_color"></td>
      </tr>
      <tr>
        <td class="user-data-label">Interior Material: </td>
        <td><input class="text user-data-input" name="car_interior"></td>
      </tr>
      <tr>
        <td class="user-data-label">Details: </td>
        <td>
          <textarea class="text user-data-input-textfield" name="car_details"></textarea>
        </td>
      </tr>
    </table>
    <div class="update-profile-btn-box">
      <button type="submit" name="add_car" class="btn--cta">
        <i class="fas fa-plus"></i>  
        Submit
      </button>
    </div>

  </form>
  <?php  
  }
?>