<?php
  include 'scripts/sessions.php';
  $headerVal = 'head.php';
?>
<!DOCTYPE html>
<html>
  <?php
    include 'head.php';
  ?>
  <body>
<?php
  if (empty($_SESSION['LoggedIn'])){ // START NO SESSION HTML
?>
    <p>You are not logged in! <a href="login.php">Click here</a> to login,
    <a href="accountCreation.php">click here</a> to create an account, or 
    <a href="index.php">click here</a> to return to the home page.</p>
<?php
  }else{ // END NO SESSION HTML / START SESSION HTML
    $_SESSION = array();
    session_destroy();
?>
    <p>You are now logged out. You will be redirected to home page in a bit, or <a href="index.php">click here</a> to return now.</p>
<?php
    header('refresh:2;url=index.php');
    exit;
  } // END SESSION HTML
?>
  </body>
</html>
