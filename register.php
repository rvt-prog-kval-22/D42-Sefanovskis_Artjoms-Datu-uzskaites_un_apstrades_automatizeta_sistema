<?php include "inc/header.php";?>

<?php
  if(isset($_POST['register'])){
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $phone_code = $_POST['phone_code'];
    $password = $_POST['password'];
    $password_reenter = $_POST['password_reenter'];

    $query = "insert into users(user_first, user_last, user_email, user_phone, user_phone_code, user_password) ";
    $query.= "values('$first','$last','$email','$phone','$phone_code', '$password')";
    
    $create_user_query = mysqli_query($conn,$query);

    if (!$create_user_query) {
      die('Query Failed ' . mysqli_error($conn));
    }
    else {
      $query = "select user_id from users where user_email = '{$email}' ";
      $select_user_query = mysqli_query($conn,$query);

      while ($row = mysqli_fetch_assoc($select_user_query)) {
        $db_user_id = $row['user_id'];
      }
      $_SESSION['user_id'] = $db_user_id;
      $_SESSION['user_first'] = $first;
      $_SESSION['user_last'] = $last;
      $_SESSION['user_email'] = $email;
      $_SESSION['user_phone'] = $phone;
      $_SESSION['user_phone_code'] = $phone_code;
      $_SESSION['user_role'] = 'user';

      header('Location: profile.php');
    }
  }
?>
<link rel="stylesheet" href="css/login.css" />

<main class="container register-container">
  <h3 class="big-heading login-heading">Register</h3>
  <div class="login-box">
      <form action="#" method="post">

        <label class="text login-label" for="firstname">First name:</label>
        <input name="firstname" class="inputfield text" type="text">

        <label class="text login-label" for="lastname">Last Name:</label>
        <input name="lastname" class="inputfield" type="text">

        <label class="text login-label" for="email">Email:</label>
        <input name="email" class="inputfield" type="email">

        <label class="text login-label" for="phone">Phone number:</label>
        <input name="phone" class="inputfield" type="number">

        <label class="text login-label" for="phone_code">Country code of the number:</label>
        <input name="phone_code" class="inputfield" type="number">

        <label class="text login-label" for="password">Enter Password:</label>
        <input name="password" class="inputfield" type="password">
        

        <label class="text login-label" for="password_reenter">Re-enter Password:</label>
        <input name="password_reenter" class="inputfield" type="password">

        <button name="register" type="submit" class="btn--cta">Register</button>
      </form>
  </div>
</main>

<?php include "inc/footer.php";?>