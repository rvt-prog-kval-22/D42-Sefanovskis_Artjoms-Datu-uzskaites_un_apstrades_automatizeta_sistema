<?php

  $errors = [];
  $user_id = $_SESSION['user_id'];

  if(isset($_POST['change-password'])){
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $password_reenter = mysqli_real_escape_string($conn,$_POST['password_reenter']);
    
    if(validatePassword($password)){
      $errors["password"] = validatePassword($password);
    }
    if($password !== $password_reenter){
      $errors["reenter"] = "Password does not match";
    }
    
    if(empty($errors)){
      $query = "update users set ";
      $query.= "user_password = $password ";
      $query.= "where user_id = $user_id ";
    
      $update_password_query = mysqli_query($conn, $query);
    
      if (!$update_password_query) {
        die('Query Failed ' . mysqli_error($conn));
      }
      else {
        header('Location: profile.php');
      }
    }
  }
?>

<div class="second-header-box">
  <div>
    <h2 class="second-heading">Change Password</h2>
    <span class="second-header-line"></span>
  </div>
  <a href="profile.php" class="btn--cta user-edit-btn" >
    <i class="fas fa-angle-right"></i>
    <span>Back</span>
  </a>
</div>

<form action="#" method="post">
  <label class="password-change-label" for="password">Enter Password:</label>
  <input name="password" class="change-password-inputfield" type="password">
  <p class="error-message marbo-1-8"><?php echo $errors['password'] ?? '&nbsp;'; ?></p>

  <label class="password-change-label" for="password_reenter">Re-enter Password:</label>
  <input name="password_reenter" class="change-password-inputfield" type="password">
  <p class="error-message marbo-1-8"><?php echo $errors['reenter'] ?? '&nbsp;'; ?></p>

  <button name="change-password" type="submit" class="btn--cta">Confirm</button>
</form>

