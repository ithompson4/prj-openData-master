<?php
  function searchViz($dbConn, $queryString) {
  	$dbQuery = "SELECT * from VIZ WHERE VIz_name like '".$queryString."%'";

  	$dbRows = mysqli_query($dbConn, $dbQuery);
  	$rows = array();

  	while($r = mysqli_fetch_assoc($dbRows)) {
  		$userQuery = "Select Username from USERS where Id='".$r['User_id']."' ";
  		$userRows = mysqli_query($dbConn, $userQuery);
  		$user;
  		while($y = mysqli_fetch_assoc($userRows)) {
  			$user = $y;
  		}
  		$rows[] = array('data' => $r, 'userName' => $user);
  	}

  	$json = json_encode($rows);

  	return $json;
  }
?>
