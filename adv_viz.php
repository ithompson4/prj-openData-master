<!DOCTYPE html>
<html>
	<?php
    	$headerVal = 'Advanced Viz Search';
    	include 'head.php';
    ?>
    <body>
        <?php include 'header.php';?>
		<?php include 'carousel_slider.php';?>

        <div id="container">
		    <div id="content">
			    <?php include 'sidebar.php'; ?>
				
				<div class="col_right">
                    <h1>Search a Visualization</h1>
					<div class="form">
                    	<form method="post" id="searchBar" action="/~scherman/prj5-site-design/viz.php">
                        Enter Name: <input type="text" name="name"><br />
						Enter Type: <input type="text" name="type"><br />
						Enter Date: <input type="text" name="date"><br />
                        <input type="submit" name="submit" value="Search">
                    </form>
                    </div>
				</div>
		    </div>
	    </div> <!-- end container -->

        <?php include 'footer.php';?>

    </body>
</html>
