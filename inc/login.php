<?php
  include 'db.php';
  session_start();
  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn,$email);
    $password = mysqli_real_escape_string($conn,$password);

    $query = "select*from users where user_email = '{$email}' ";
    $select_user_query = mysqli_query($conn,$query);

    if (!$select_user_query) {
      die("Query Failed" . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($select_user_query)) {
      $db_user_id = $row['user_id'];
      $db_user_first = $row['user_first'];
      $db_user_last = $row['user_last'];
      $db_user_email = $row['user_email'];
      $db_user_phone = $row['user_phone'];
      $db_user_phone_code = $row['user_phone_code'];
      $db_user_role = $row['user_role'];
      $db_user_password = $row['user_password'];
    }
    if($email === $db_user_email && $password === $db_user_password){
      $_SESSION['user_id'] = $db_user_id;
      $_SESSION['user_first'] = $db_user_first;
      $_SESSION['user_last'] = $db_user_last;
      $_SESSION['user_email'] = $db_user_email;
      $_SESSION['user_phone'] = $db_user_phone;
      $_SESSION['user_phone_code'] = $db_user_phone_code;
      $_SESSION['user_role'] = $db_user_role;
      header("Location: ../profile.php");
    }
    else {
      header("Location: ../login.php");
      
    }
    
  }
?>