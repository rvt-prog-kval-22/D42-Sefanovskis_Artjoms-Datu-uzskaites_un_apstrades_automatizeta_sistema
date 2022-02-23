<?php 
  if (isset($_POST['create_user'])) {
    $user_first = $_POST['user_first'];
    $user_last = $_POST['user_last'];
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $user_phone_code = $_POST['user_phone_code'];
    $user_password = $_POST['user_password'];
    
    $query = "insert into users(user_first, user_last, user_email, user_phone, user_phone_code, user_password) ";
    $query.= "values('$user_first','$user_last','$user_email','$user_phone','$user_phone_code', '$user_password')";
    
    $create_user_query = mysqli_query($conn,$query);

    if (!$create_user_query) {
      die('Query Failed ' . mysqli_error($conn));
    }
    else {
      header('Location: admin-users.php');
    }
  }
  ?>

<div class="create-button-box">
  <a href="admin-users.php" class="btn--cta services-create-btn">
  <i class="fas fa-angle-right"></i>
    <span>Back</span>
  </a>
</div>

<form action="" method="post">
  
  <label class="input-label" for="user_first">First Name</label>
  <input type="text" name="user_first" class="text input-field">

  <label class="input-label" for="user_last">Last Name</label>
  <input type="text" name="user_last" class="text input-field">

  <label class="input-label" for="user_email">Email</label>
  <input type="email" name="user_email" class="text input-field">

  <label class="input-label" for="user_phone">Phone number</label>
  <input type="number" name="user_phone" class="text input-field">

  <label class="input-label" for="user_phone_code">Phone number country code</label>
  <input type="number" name="user_phone_code" class="text input-field">

  <label class="input-label" for="user_password">Password</label>
  <input type="text" name="user_password" class="text input-field">

  <div class="create-btn-box">
    <button class="btn--cta" type="submit" name="create_user">Create</button>  
  </div>
  
</form>