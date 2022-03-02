<?php include "inc/header.php";?>

<main class="container">
<link rel="stylesheet" href="css/login.css" />

<div class="second-header-box">
    <div>
      <h2 class="second-heading">Log-In</h2>
      <span class="second-header-line"></span>
    </div>
  </div>
  <div class="login-box">
      <form action="inc/login.php" method="post">
        <label class="text login-label" for="email">Enter Email Address:</label>
        <input name="email" class="inputfield text" type="text" placeholder="">
        <label class="text login-label" for="password">Enter Password:</label>
        <input name="password" class="inputfield" type="password">
        <div class="login-button-box">
          <button name="login" type="submit" class="btn--cta">Log-In</button>
          <a class="text link-to-register" href="register.php">Have no account? Register here!</a>
        </div>
      </form>
  </div>
</main>

<?php include "inc/footer.php";?>