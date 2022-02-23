<?php 
  if (isset($_POST['create_service'])) {
    $service_title = $_POST['service_title'];
    $service_price = $_POST['service_price'];
    $service_hours = $_POST['service_hours'];
    $service_description = $_POST['service_description'];
    
    $service_image = $_FILES['service_image']['name'];
    $service_image_temp = $_FILES['service_image']['tmp_name'];

    
    move_uploaded_file($service_image_temp, "../img/services-images/$service_image");
    
    $query = "insert into services(service_title, service_price, service_hours, service_description, service_image) ";
    $query.= "values('$service_title','$service_price','$service_hours','$service_description','$service_image')";
    
    $create_service_query = mysqli_query($conn,$query);

    if (!$create_service_query) {
      die('Query Failed ' . mysqli_error($conn));
    }
    else {
      header('Location: admin-services.php');
    }
  }
  ?>

<div class="create-button-box">
  <a href="admin-services.php" class="btn--cta services-create-btn">
  <i class="fas fa-angle-right"></i>
    <span>Back</span>
  </a>
</div>

<form action="" method="post" enctype="multipart/form-data">
  
  <label class="input-label" for="service_title">Title</label>
  <input type="text" name="service_title" class="text input-field">

  <label class="input-label" for="service_price">Price</label>
  <input type="text" name="service_price" class="text input-field">

  <label class="input-label" for="service_hours">Estimated Labour hours</label>
  <input type="text" name="service_hours" class="text input-field">

  <label class="input-label" for="service_image">Post Image</label>
  <input class="input-image" type="file" name="service_image">

  <label class="input-label" for="service_description">Description</label>
  <textarea class="text service-description" name="service_description" rows="10"></textarea>  

  <div class="create-btn-box">
    <button class="btn--cta" type="submit" name="create_service">Create</button>  
  </div>
  
</form>