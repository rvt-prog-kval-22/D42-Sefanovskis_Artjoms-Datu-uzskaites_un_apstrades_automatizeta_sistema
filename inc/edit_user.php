<?php
  if(isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];

    $query = "select*from users where user_id = $user_id";
    $select_user = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($select_user)){
      $first_name = $row['user_first'];
      $last_name = $row['user_last'];
      $email = $row['user_email'];
      $phone = $row['user_phone'];
      $phone_code = $row['user_phone_code'];
      $password = $row['user_password'];
    }

    if(isset($_POST['update_user'])){

      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $phone_code = $_POST['phone_code'];
      $password = $_POST['password'];

      $query = "update users set ";
      $query.= "user_first = '$first_name', ";
      $query.= "user_last = '$last_name', ";
      $query.= "user_email = '$email', ";
      $query.= "user_phone = $phone, ";
      $query.= "user_phone_code = $phone_code, ";
      $query.= "user_password = '$password' ";
      $query.= "where user_id = $user_id";

      $update_user = mysqli_query($conn,$query);

      if (!$update_user) {
        die('Query Failed ' . mysqli_error($conn));
      }
      else {
        header('Location: profile.php');
      }
    }
  ?>
  <div class="second-header-box">
    <div>
      <h2 class="second-heading">Edit Profile Information</h2>
      <span class="second-header-line"></span>
    </div>
    
    <a href="profile.php" class="btn--cta user-edit-btn" >
      <i class="fas fa-angle-right"></i>
      <span>Back</span>
    </a>
  </div>

  <form action="profile.php?source=edit_user" method="post">

  
    <table class="user-data-box">
      <tr>
        <td class="user-data-label">First Name: </td>
        <td><input class="text user-data-input" name="first_name" type="text" value="<?php echo $first_name; ?>"></td>
      </tr>
      <tr>
        <td class="user-data-label">Last Name: </td>
        <td><input class="text user-data-input" name="last_name" value="<?php echo $last_name; ?>"></td>
      </tr>
      <tr>
        <td class="user-data-label">Email: </td>
        <td><input class="text user-data-input" name="email" value="<?php echo $email; ?>"></td>
      </tr>
      <tr>
        <td class="user-data-label">Phone: </td>
        <td><input class="text user-data-input" name="phone" value="<?php echo $phone; ?>"></td>
      </tr>
      <tr>
        <td class="user-data-label">Phone Code: </td>
        <td><input class="text user-data-input" name="phone_code" value="<?php echo $phone_code; ?>"></td>
      </tr>
      <tr>
        <td class="user-data-label">Password: </td>
        <td><input class="text user-data-input" name="password" value="<?php echo $password; ?>"></td>
      </tr>
    </table>
    <div class="update-profile-btn-box">
      <button type="submit" name="update_user" class="btn--cta">Submit</button>
    </div>

  </form>
  <?php  
  }
?>