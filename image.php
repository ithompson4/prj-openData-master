<?php
	include '/home/jayme/firephp-core/lib/FirePHPCore/FirePHP.class.php';
	require 'scripts/dbConnect.php';
  	require 'scripts/selectQueries.php';
  	include 'scripts/sessions.php';
  	include 'scripts/image.php';

  	ob_start();

  	$dbConn = dbConnect();
	$firephp = FirePHP::getinstance(true);
	$image = getImage($dbConn, 23);
	$firephp->log($image, 'dumping an image');
	$headerVal = 'Image Test';
?>
<!DOCTYPE html>
<html>
    <?php
        include 'head.php';
	?>  
	
    <body> 
        <?php include 'header.php';?>		
		<?php include 'carousel_slider.php';?>			
		


        <div id="container">																																																																																		
		    <div id="content">			
			    
				<div class="col_right">
					<div class='imageContainer'>
                    	<p> Test of image </p>  
                    	    
                    </div>            
				</div>			
		    </div>
	    </div> <!-- end container -->
		
        <?php include 'footer.php';?>

    </body>
</html>	
