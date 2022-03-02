<?php include 'inc/header.php'; ?>

<link rel="stylesheet" href="css/prepare_order.css">

<main class="container">
  <?php
  if (!isset($_SESSION['user_id']) || !isset($_GET['p_id'])) {
    header('Location: need_to_login.php');
  }
  else{
    $user_id = $_SESSION['user_id'];
    $service_id = $_GET['p_id'];

    $query1 = "select service_title, service_price, service_hours ";
    $query1.= "FROM services ";
    $query1.= "WHERE service_id = $service_id ";

    $select_service = mysqli_query($conn,$query1);

    while($row = mysqli_fetch_assoc($select_service)){
      $service_title = $row['service_title'];
      $service_price = $row['service_price'];
      $service_hours = $row['service_hours'];
    }

    if(isset($_POST['confirm_order'])){
      $order_car = $_POST['order_car'];
      $order_date = $_POST['order_date'];
      
      $query = "insert into orders(order_user_id, order_service_id, order_car_id, order_date, order_appointment_date, order_status) ";
      $query.= "values($user_id, $service_id, $order_car,now(),'$order_date', 'Recieved')";
      
      $create_order_query = mysqli_query($conn,$query);

      if (!$create_order_query) {
        die('Query Failed ' . mysqli_error($conn));
      }
      else {
        header('Location: profile.php?source=view_active_orders');
      }
    }
  ?>

  <div class="profile-header-box">
    <div>
      <h2 class="profile-heading">Order <?php echo $service_title; ?></h2>
      <span class="profile-header-line"></span>
    </div>
    
    <a href="service-page.php?p_id=<?php echo $service_id; ?>" class="btn--cta user-edit-btn" >
      <i class="fas fa-angle-right"></i>
      <span>Back</span>
    </a>
  </div>

  <p class="order-message">
    You are preparing order for <?php echo $service_title; ?> now. 
    Please select what car you want to take care of,
    if you have no cars to select from then please head to profile page, cars section and add your car there.
    Then select on what date you want to leave your car to us and confirm order.
    <br>
    <br>
    After work will be done you will recieve bill on your email and/or in paper on place.  
    Please remember that different cars can demand different level of attention and labour and because of that the end price can slightly warry. 
  </p>

  <form action="" method="post">
    <table class="user-data-box">
      <tr>
        <td class="user-data-label">Estimated labour hours:</td>
        <td><?php echo $service_hours; ?></td>
      </tr>
      <tr>
        <td class="user-data-label">Estimated price:</td>
        <td><?php echo $service_price; ?></td>
      </tr>
      <tr>
        <td class="user-data-label">Select Car</td>
        <td>
          <select name="order_car">
            <option value="0">Select Car</option>

            <?php
              $query2 = "select car_id, car_producer, car_model, car_number_sign ";
              $query2.= "from cars ";
              $query2.= "where car_owner_id = $user_id";
          
              $select_cars = mysqli_query($conn,$query2);

              if (mysqli_num_rows($select_cars) !== 0) {
                while($row = mysqli_fetch_assoc($select_cars)){
                  $car_id = $row['car_id'];
                  $producer = $row['car_producer'];
                  $model = $row['car_model'];
                  $number = $row['car_number_sign'];
                  echo "<option value='$car_id'>$producer $model $number</option>";
                }
              }
            ?>
          </select>
          <?php
            if(mysqli_num_rows($select_cars) === 0){
              echo "<span class='msg-nocars'>Looks like you have no cars to select from</span>";
            }
          ?>
        </td>
      </tr>
      <tr>
        <td class="user-data-label">Select Date</td>
        <td><input type="date" name="order_date"></td>
      </tr>
    </table>

    <div class="confirm-btn-box">
      <button type="submit" name="confirm_order" class="btn--cta">
        <i class="fa fa-check"></i>
        Confirm Order
      </button>
    </div>

  </form>
  <?php
  }
  ?>

</main>

<?php include 'inc/footer.php'; ?> 