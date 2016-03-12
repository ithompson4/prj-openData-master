<?php

  function getImage($dbConn, $imageId) {
  	$dbQuery = "SELECT Image from IMAGES WHERE User_Id = '$imageId'";

  	$dbRow = mysqli_query($dbConn, $dbQuery);

  	$row = mysqli_fetch_row($dbRow);
    return $row;
  }
?>
