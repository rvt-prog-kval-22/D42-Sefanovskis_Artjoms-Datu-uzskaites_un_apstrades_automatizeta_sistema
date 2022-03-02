<?php 

if(isset($_GET['u_id'])){
  $the_user_id = $_GET['u_id'];
}

$query = "select*from users where user_id = $the_user_id";
$select_user = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($select_user)){

  $user_id = $row['user_id'];
  $user_first = $row['user_first'];
  $user_last = $row['user_last'];
  $user_email = $row['user_email'];
  $user_phone = $row['user_phone'];
  $user_phone_code = $row['user_phone_code'];
  $user_password = $row['user_password'];
}

if(isset($_POST['update_user'])){

  $user_id = $_POST['user_id'];
  $user_first = $_POST['user_first'];
  $user_last = $_POST['user_last'];
  $user_email = $_POST['user_email'];
  $user_phone = $_POST['user_phone'];
  $user_phone_code = $_POST['user_phone_code'];
  $user_password = $_POST['user_password'];

  $query = "update users set ";
  $query.= "user_first = '$user_first', ";
  $query.= "user_last = '$user_last', ";
  $query.= "user_email = '$user_email', ";
  $query.= "user_phone = $user_phone, ";
  $query.= "user_phone_code = $user_phone_code, ";
  $query.= "user_password = '$user_password' ";
  $query.= "where user_id = $the_user_id";

  $update_user = mysqli_query($conn,$query);

  if (!$update_user) {
    die('Query Failed ' . mysqli_error($conn));
  }
  else {
    header('Location: admin-users.php');
  }
}

?>

<div class="page-header-box">
  <div>
    <h2 class="page-heading">Edit user</h2>
    <span class="page-heading-line"></span>
  </div>
  <a href="admin-users.php" class="btn--cta services-create-btn">
    <i class="fas fa-angle-right"></i>
    <span>Back</span>
  </a>
</div>

<form action="" method="post">
  
  <label class="input-label" for="user_first">First Name</label>
  <input value="<?php echo $user_first; ?>" type="text" name="user_first" class="text input-field">

  <label class="input-label" for="user_last">Last Name</label>
  <input value="<?php echo $user_last; ?>" type="text" name="user_last" class="text input-field">

  <label class="input-label" for="user_email">Email</label>
  <input value="<?php echo $user_email; ?>" type="email" name="user_email" class="text input-field">

  <label class="input-label" for="user_phone">Phone number</label>
  <input value="<?php echo $user_phone; ?>" type="number" name="user_phone" class="text input-field">

  <label class="input-label" for="user_phone_code">Phone number country code</label>
  <input value="<?php echo $user_phone_code; ?>" type="number" name="user_phone_code" class="text input-field">

  <label class="input-label" for="user_password">Password</label>
  <input value="<?php echo $user_password; ?>" type="password" name="user_password" class="text input-field">

  <div class="btn--submit">
    <button class="btn--cta" type="submit" name="update_user">
      <i class="fa fa-rotate-left"></i>
      <span>Update User</span>
    </button>  
  </div>
  
</form>