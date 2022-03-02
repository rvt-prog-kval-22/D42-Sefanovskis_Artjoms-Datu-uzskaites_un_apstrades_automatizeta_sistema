<?php 

  if(isset($_GET['s_id'])){
    $the_service_id = $_GET['s_id'];
  }

  $query = "select*from services where service_id = $the_service_id";
  $select_service = mysqli_query($conn,$query);

  while($row = mysqli_fetch_assoc($select_service)){

    $service_id = $row['service_id'];
    $service_title = $row['service_title'];
    $service_price = $row['service_price'];
    $service_hours = $row['service_hours'];
    $service_image = $row['service_image'];
    $service_description = $row['service_description'];
  }

  if(isset($_POST['update_service'])){

    $service_title = $_POST['service_title'];
    $service_price = $_POST['service_price'];
    $service_hours = $_POST['service_hours'];
    $service_image = $_FILES['service_image']['name'];
    $service_image_temp = $_FILES['service_image']['tmp_name'];
    $service_description = $_POST['service_description'];

    move_uploaded_file($service_image_temp, "../img/services-images/$service_image");

    if (empty($service_image)) {
      $query = "select*from services where service_id = $the_service_id ";
      $select_image = mysqli_query($conn,$query);
      while ($row = mysqli_fetch_array($select_image)) {
        $service_image = $row['service_image'];
      }
    }

    $query = "update services set ";
    $query.= "service_title = '$service_title', ";
    $query.= "service_price = $service_price, ";
    $query.= "service_hours = $service_hours, ";
    $query.= "service_image = '$service_image', ";
    $query.= "service_description = '$service_description' ";
    $query.= "where service_id = $the_service_id";

    $update_service = mysqli_query($conn,$query);

    if (!$update_service) {
      die('Query Failed ' . mysqli_error($conn));
    }
    else {
      header('Location: admin-services.php');
    }

  }

?>
<div class="page-header-box">
  <div>
    <h2 class="page-heading">Edit Service</h2>
    <span class="page-heading-line"></span>
  </div>
  <a href="admin-services.php" class="btn--cta services-create-btn">
    <i class="fas fa-angle-right"></i>
    <span>Back</span>
  </a>
</div>

<form action="" method="post" enctype="multipart/form-data">
  
  <label class="input-label" for="service_title">Title</label>
  <input value="<?php echo $service_title; ?>" type="text" name="service_title" class="text input-field">

  <label class="input-label" for="service_price">Price</label>
  <input value="<?php echo $service_price; ?>" type="text" name="service_price" class="text input-field">

  <label class="input-label" for="service_hours">Estimated Labour hours</label>
  <input value="<?php echo $service_hours; ?>" type="text" name="service_hours" class="text input-field">

  <label class="input-label" for="service_image">Service Image</label>
  <img width="100px" src="../img/services-images/<?php echo $service_image; ?>" alt="Main image of the service">
  <input class="input-image" type="file" name="service_image">

  <label class="input-label" for="service_description">Description</label>
  <textarea class="text service-description" name="service_description" rows="10"><?php echo $service_description; ?>
  </textarea>  

  <div class="btn--submit">
    <button class="btn--cta" type="submit" name="update_service">
      <i class="fa fa-rotate-left"></i>
      <span>Update</span>
    </button>  
  </div>
  
</form>