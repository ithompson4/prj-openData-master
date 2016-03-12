<!DOCTYPE html>
<html>
    <?php
    	$headerVal = 'Home Page';
    	include 'head.php';
    ?>
    <body>
        <?php include 'header.php'; ?>
        <div id="container">
        <?php include 'carousel_slider.php'; ?>
		    <div id="content">
			    <?php include 'sidebar.php'; ?>
				
				<div class="col_right">
          <h1>Welcome to the Open Data Visualizer!</h1>
          <p>Our goal is to provide statistical data visualizations based on the Government of
          Canada's <a href="http://open.canada.ca/en">Open Data Portal</a>.
          </p>
				</div>
		    </div>
	    </div> <!-- end container -->

        <?php include 'footer.php';?>

    </body>
</html>

