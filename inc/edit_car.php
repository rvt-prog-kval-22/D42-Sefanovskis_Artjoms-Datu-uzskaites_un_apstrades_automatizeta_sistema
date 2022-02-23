<?php
  if(isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];

    if(isset($_GET['c_id'])){
      $car_id = $_GET['c_id'];
    }

    $query = "select*from cars where car_id = $car_id";
    $select_car = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($select_car)){

      $db_car_model = $row['car_model'];
      $db_car_producer = $row['car_producer'];
      $db_car_year = $row['car_year'];
      $db_car_color = $row['car_color'];
      $db_car_interior = $row['car_interior_material'];
      $db_car_details = $row['car_details'];
    }

    if(isset($_POST['update_car'])){

      $car_model = $_POST['car_model'];
      $car_producer = $_POST['car_producer'];
      $car_year = $_POST['car_year'];
      $car_color = $_POST['car_color'];
      $car_interior = $_POST['car_interior'];
      $car_details = $_POST['car_details'];

      $query = "update cars set ";
      $query.= "car_producer = '$car_producer', ";
      $query.= "car_model = '$car_model', ";
      $query.= "car_year = $car_year, ";
      $query.= "car_color = '$car_color', ";
      $query.= "car_interior_material = '$car_interior', ";
      $query.= "car_details = '$car_details' ";
      $query.= "where car_id = $car_id ";
    
      $update_car_query = mysqli_query($conn, $query);

      if (!$update_car_query) {
        die('Query Failed ' . mysqli_error($conn));
      }
      else {
        header('Location: profile.php?source=view_cars');
      }
    }

    


  ?>
  <div class="profile-header-box">
    <div>
      <h2 class="profile-heading">Update Car</h2>
      <span class="profile-header-line"></span>
    </div>
    
    <a href="profile.php?source=view_cars" class="btn--cta user-edit-btn" >
      <i class="fas fa-angle-right"></i>
      <span>Back</span>
    </a>
  </div>

  <form action="" method="post">

  
    <table class="user-data-box">
      <tr>
        <td class="user-data-label">Car Model: </td>
        <td><input class="text user-data-input" name="car_model" type="text" value="<?php echo $db_car_model; ?>"></td>
      </tr>
      <tr>
        <td class="user-data-label">Producer: </td>
        <td><input class="text user-data-input" name="car_producer" value="<?php echo $db_car_producer; ?>"></td>
      </tr>
      <tr>
        <td class="user-data-label">Year of Production: </td>
        <td><input class="text user-data-input" name="car_year" value="<?php echo $db_car_year; ?>"></td>
      </tr>
      <tr>
        <td class="user-data-label">Color: </td>
        <td><input class="text user-data-input" name="car_color" value="<?php echo $db_car_color; ?>"></td>
      </tr>
      <tr>
        <td class="user-data-label">Interior Material: </td>
        <td><input class="text user-data-input" name="car_interior" value="<?php echo $db_car_interior; ?>"></td>
      </tr>
      <tr>
        <td class="user-data-label">Details: </td>
        <td>
          <textarea class="text user-data-input-textfield" name="car_details"><?php echo $db_car_details; ?></textarea>
        </td>
      </tr>
    </table>
    <div class="update-profile-btn-box">
      <button type="submit" name="update_car" class="btn--cta">
        <i class="fa fa-rotate-left"></i>
        Update
      </button>
    </div>

  </form>
  <?php  
  }
?>