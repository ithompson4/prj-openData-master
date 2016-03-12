<?php
	require 'scripts/searchQuery.php';
	require 'scripts/dbConnect.php';
	if($_POST) {
		$queryString = trim($_POST["query"], " \t\n\r\0\x0B");
		$dbConn = dbConnect();

		$results = searchViz($dbConn, $queryString);

		mysqli_close($dbConn);
	}
	$headerVal = 'Search For a Data Viz';
?>
<!DOCTYPE html>
<html>
    <?php
    	$headerVal = 'Simple Viz Search';
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
                    	<form method="post" id="searchBar" action="simple_viz.php">
                        </form>
                    </div>	
                    <div id="results"></div>
				</div>			
		    </div>
	    </div>        
        
		<?php include 'footer.php';?>
		<script src='bundle.js'></script>
<?php
  if ($_POST){
?>
    <script>
    	var results = <?php echo $results; ?>;
    	var el = document.getElementById('results');
    	console.log(results);
    	for(var i = 0; i < results.length; i++) {
    		//change the next two lines for prod
    		var imagePath = results[i].data.Script_path;
    		var relativePath = imagePath.split('/');
    		console.log(relativePath);
    		el.innerHTML += '<img width="140" height="200" src="maps/' + relativePath[4] + '/vizImage.png">';
    		//href may need changing for prod
    		el.innerHTML += '<p class="results">Viz Name: <a href="maps/'+ relativePath[4] + '"> ' 
    			+ results[i].data.Viz_name + ' </a></p>';
    		
    		el.innerHTML += '<p class="results">Created By: ' + results[i].userName.Username + ' </p>';
    		el.innerHTML += '<p class="results">Creation Date: ' + results[i].data.Date_Added + ' </p>';
    		el.innerHTML += '<hr class="horizontal" />';
    	}
    </script>	
<?php
  }
?>
	</body>
</html>	
	
