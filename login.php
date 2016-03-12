<?php
  require 'scripts/dbConnect.php';
  require 'scripts/selectQueries.php';
  include 'scripts/sessions.php';

  // Validate the fields upon submission.
  if ($_POST){
    $loginUsername = trim($_POST["loginUsername"], " \t\n\r\0\x0B"); // Remove trailing whitespace from the field.
    $loginPassword = $_POST["loginPassword"];
    
    $errorMsg = "";
    
    // OPENING DATABASE CONNECTION.
    $dbConn = dbConnect();
    
    // Check that the username exists in the database.
    $userFound = usernameExists($dbConn, strtolower($loginUsername));
    if ($userFound){
      // Check that the password is correct for the user.
      $isValid = passwordExists($dbConn, $loginUsername, $loginPassword);
      if ($isValid){ //TODO Creating PHP sessions for managing user login.
        $_SESSION['LoggedIn'] = true;
        $_SESSION['Username'] = $loginUsername;
        $_SESSION['UserId'] = getUserId($dbConn, $loginUsername);
      }else{
        $errorMsg = "<b>Your password is incorrect. Please try again.</b>";
      }
    }else{
      $errorMsg = "<b>That username was not found. Please select an existing username.</b>";
    }
    
    // CLOSING DATABASE CONNECTION.
    mysqli_close($dbConn);

    // Redirect user after logging in and closing the database.
    if ($errorMsg === ""){
      header('Location: index.php');
      exit;
    }
  }
  $headerVal = 'Login - Open Data Visualizer'
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
<?php
  if (empty($_SESSION['LoggedIn'])){ // START NO SESSION HTML
?>
				<div class="col_right">
                    <h1>Login</h1>
                    <div class="form">
                        <form class="form-horizontal" role="form" method="post" action="login.php">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" placeholder="Enter username" name="loginUsername" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="loginPassword" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Sign in</button>
                                </div>
                            </div>
							<div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label><input type="checkbox"> Remember me</label>
                                    </div>
                                </div>
                                <div class="col-sm-offset-2 col-sm-10">
                                        <a href="accountCreation.php">Register Account</a>
                                </div>
                            </div>
                        </form>
<?php
    if ($_POST){
      if (isset($errorMsg) && $errorMsg !== ""){
        echo $errorMsg;
      }
    }
  }else{ // END NO SESSION HTML / START SESSION HTML
?>
                <p><b>You are already logged in!<br />
                <a href="/logout.php">Click here</a> to logout or <a href="index.php">click here</a> to return to the home page.</b></p>
<?php
  } // END SESSION HTML
?>
					</div>
	            </div>
			</div>
	    </div>

		<?php include 'footer.php';?>

	</body>
</html>
