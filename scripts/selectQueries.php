<?php
  // CODED BY: Jayme Laso-Barros
  
  // This function finds the given username in the database (in lowercase) and returns true if it exists.
  function usernameExists($dbConn, $username){
    $isFound = true;
    $dbQuery = "SELECT Username FROM USERS WHERE Username = '".$username."' LIMIT 1";
    
    if ($dbRows = mysqli_query($dbConn, $dbQuery)){
      $dbResult = mysqli_num_rows($dbRows);
      if ($dbResult < 1){
        $isFound = false;
      }
    }
    
    return $isFound;
  }
  
  // This function finds the given email in the database (in lowercase) and returns true if it exists.
  function emailExists($dbConn, $email){
    $isFound = true;
    $dbQuery = "SELECT Email FROM USERS WHERE Email = '".$email."' LIMIT 1";
    
    if ($dbRows = mysqli_query($dbConn, $dbQuery)){
      $dbResult = mysqli_num_rows($dbRows);
      if ($dbResult < 1){
        $isFound = false;
      }
    }
    
    return $isFound;
  }
  
  // This function gets the password of the given user and returns true if it matches the database.
  // It also rehashes the password as needed.
  function passwordExists($dbConn, $username, $password){
    $isValid = false;
    $dbQuery = "SELECT Password FROM USERS WHERE Username = '".$username."' LIMIT 1";
    
    $dbRows = mysqli_query($dbConn, $dbQuery);
    $dbValues = mysqli_fetch_assoc($dbRows);
    $dbPassword = $dbValues['Password'];
    
    if (password_verify($password, $dbPassword)){
      $isValid = true;
      // Check if the password needs a rehash.
      if (password_needs_rehash($dbPassword, PASSWORD_DEFAULT)){
        $dbPassword = password_hash($password, PASSWORD_DEFAULT);
        $dbQuery = "UPDATE USERS SET Password = '".$dbPassword."' WHERE Username = '".$username."'";
        $dbRows = mysqli_query($dbConn, $dbQuery);
      }
    }
    
    return $isValid;
  }
  
  // This function gets and returns the ID of the given username.
  function getUserId($dbConn, $username){
    $dbQuery = "SELECT Id FROM USERS WHERE Username = '".$username."'";
    $dbRows = mysqli_query($dbConn, $dbQuery);
    $dbValues = mysqli_fetch_assoc($dbRows);
    
    return $dbValues['Id'];
  }
  
  // This function returns the values needed to display the View User Profile page.
  function getViewUserProfile($dbConn, $userId){
    $dbQuery = "SELECT u.Username, u.First_name, u.Last_name, u.About, u.Date_joined, i.Image "
    ."FROM USERS u LEFT JOIN IMAGES i "
    ."ON u.Id = i.UserId "
    ."WHERE u.UserId = ".$userId;
    $dbRows = mysqli_query($dbConn, $dbQuery);
    $dbValues = mysqli_fetch_assoc($dbRows);
    
    return $dbValues;
  }
  
  // This function performs a Viz-related search.
  // function searchViz($dbConn, $queryString) {
  	// $dbQuery = "SELECT * FROM VIZ WHERE Viz_name LIKE '".$queryString."%'";

  	// $dbRows = mysqli_query($dbConn, $dbQuery); 
  	// $rows = array();

  	// while($r = mysqli_fetch_assoc($dbRows)) {
  		// $userQuery = "Select Username from USERS where Id='".$r['User_id']."' ";
  		// $userRows = mysqli_query($dbConn, $userQuery);
  		// $user;
  		// while($y = mysqli_fetch_assoc($userRows)) {
  			// $user = $y;
  		// }
  		// $rows[] = array('data' => $r, 'userName' => $user);
  	// }	
  	
  	// $json = json_encode($rows);

  	// return $json;
  // }
?>
