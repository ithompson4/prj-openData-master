<?php
  require 'scripts/dbConnect.php';
  require 'scripts/selectQueries.php';
  include 'scripts/sessions.php';

  
  if (isset($_SESSION['loggedin']) && ($_SESSION['LoggedIn'])){
	     
     // OPENING DATABASE CONNECTION.
     $dbConn = dbConnect();
     
	     
      // CLOSING DATABASE CONNECTION.
      mysqli_close($dbConn);		
  }
?>      
  
<!DOCTYPE html>
<html>
    <head>
        <title>View User Profile - Open Data Visualizer</title>
        <?php require_once 'head.php';?>
    </head>
    <body>
        <?php require_once 'header.php';?>  
		
        <div id="container">
		    <div id="content">
			    <div class="col_left">	
				    <div class="nav_left">
					    <ul>
                            <li><a class="active" href="viewUserProfile.php">View My Profile</a></li>
                            <li><a href="editProfile.php">Edit My Profile</a></li>
                            <li><a href="removeAccount.php">Remove My Account</a></li>      
                        </ul>
					</div>
				</div> <!-- end col_left -->
								
				<div class="col_right">
				       <h1>View User Profile</h1>
				<?php
   if ($_SESSION['LoggedIn']){
	    $dbConn = dbConnect();
		 		 
        if (!$dbConn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT Date_joined, Status, About FROM USERS WHERE Username = '".$_SESSION['Username']."'";
        $result = mysqli_query($dbConn, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "Member since: " .  $row["Date_joined"]. "<br />";
				echo "Status: " .  $row["Status"]. "<br />";
				echo "About: " .  $row["About"]. "<br />";
            }
        } else {
            echo "0 results";
        }
    ?>             
                    
					<form action="viewUserProfile.php" method="GET">
                    <p>
                        <label for="your-name">Username</label> 
                    </p>			
                    </form>
					
<?php
  }else{
?>
                    <p>You are unable to access this page without an "id" in the URL.</p>
<?php
  }
?>
				</div>
	        </div>			
	    </div>
      
		<?php require_once 'footer.php';?>

	</body>
</html>




