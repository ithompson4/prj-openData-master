<?php
  require 'scripts/dbConnect.php';
  require 'scripts/selectQueries.php';
  require 'scripts/insertQueries.php';

  // Validate the fields upon submission.
  if ($_POST){
    
  }
  $headerVal = 'Create A Viz Test'
?>
<!DOCTYPE html>
<html>
<?php
        include 'head.php';
?>   
    <body>
<?php
        include 'header.php';
?>    
        <div id="container">
		    <div id="content">
			    <?php include 'sidebar.php'; ?>
				
				<div class="col_right">
                    <h1>Account Creation</h1>
                    <div class="form">
                        <form class="form-horizontal" role="form" method="post" action="accountCreation.php">
                            <div class="form-group">
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="name" placeholder="Enter a name for your viz" name="vizName" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10">
                                    <textarea  class="form-control" id="styled" name="vizName" required>
                                    </textarea>
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
