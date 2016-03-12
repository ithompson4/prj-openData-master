<?php
  require 'scripts/dbConnect.php';
  require 'scripts/selectQueries.php';
  require 'scripts/insertQueries.php';

  // Validate the fields upon submission.
  if ($_POST){
    $acUsername = trim($_POST["acUsername"], " \t\n\r\0\x0B"); // Remove trailing whitespace from the field.
    $acPassword = $_POST["acPassword"];
    $acPasswordConfirm = $_POST["acPasswordConfirm"];
    $acEmail = $_POST["acEmail"];
    
    $errorMsg = "";
    
    // Username field.
    if (strlen($acUsername) < 3){
      $errorMsg .= "<br><b>Your username must have a minimum of 3 characters.</b>";
    }
    
    // OPENING DATABASE CONNECTION.
    $dbConn = dbConnect();
    
    // Check that the username does not exist already.
    $userFound = usernameExists($dbConn, strtolower($acUsername));
    if ($userFound){
      $errorMsg .= "<br><b>The chosen username already exists, please insert a new one.</b>";
    }
    
    // Password fields.
    if ($acPassword != $acPasswordConfirm){
      $errorMsg .= "<br><b>Your passwords do not match.</b>";
    }
    
    if (strlen($acPassword) < 8){
      $errorMsg .= "<br><b>Your password must have a minimum length of 8 characters.</b>";
    }
    
    // Email field
    $emailFound = emailExists($dbConn, strtolower($acEmail));
    if ($emailFound){
      $errorMsg .= "<br><b>The chosen email address is already in use by another user.</b>";
    }
    
// Create a new user account in the database when all fields are valid.
    if ($errorMsg === ""){
      $acPassword = password_hash($acPassword, PASSWORD_DEFAULT);
      addUser($dbConn, $acUsername, $acPassword, $acEmail);
    }
    
    // CLOSING DATABASE CONNECTION.
    mysqli_close($dbConn);

    // Redirect user after creating an account and closing the database.
    if ($errorMsg === ""){
      header('Location: login.php');
      exit;
    }
  }
  $headerVal = 'Account Create';
?>
<!DOCTYPE html>
<html>
<?php
    include 'head.php';
?>
    <body>
<?php
        include 'header.php';
	    include 'carousel_slider.php';
?>    
        <div id="container">
		    <div id="content">
			    <?php include 'sidebar.php'; ?>
				
				<div class="col_right">
                    <h1>Account Creation</h1>
                    <div class="form">
                        <form class="form-horizontal" role="form" method="post" action="accountCreation.php">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" placeholder="Enter user name" name="acUsername" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="acPassword" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="c_pwd" placeholder="Confirm password" name="acPasswordConfirm" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="acEmail" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
									<button type="reset" class="btn btn-default">Reset</button>
                                </div>
                            </div>
                        </form>
<?php
  if ($_POST){
    if (isset($errorMsg) && $errorMsg !== ""){
?>
                <p>We are unable to create an account for you due to the following: <?php echo $errorMsg ?></p>
<?php
    }
  }
?>
					</div>
	            </div>
			</div>
	    </div>
      
		<?php include 'footer.php';?>

	</body>
</html>
