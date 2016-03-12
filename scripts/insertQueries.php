<?php
  // This function inserts a new account into the database.
  // All arguments are assumed to have already been validated.
  function addUser($dbConn, $username, $password, $email){
    // Add user to USERS table.
    $dbQuery = "INSERT INTO USERS(Username, First_name, Last_name, Email, Status, About, Date_joined, Password)"
    ."VALUES('".$username."', '', '', '".$email."', 'active', '', CURDATE(), '".$password."')";
    
    mysqli_query($dbConn, $dbQuery);

    $userId = mysqli_insert_id($dbConn); // ID of the latest created user.
    
    // Add user role for newly created user into USER_ROLES table.
    $dbQuery = "INSERT INTO USER_ROLES(User_Id, Role_Id)"
    ."VALUES(".$userId.", 1)";
    
    mysqli_query($dbConn, $dbQuery);
    
    // Add default avatar for newly created user into IMAGES table.
    $avatar = file('images/default_avatar.png'); // Default avatar for new users.
    $dbQuery = "INSERT INTO IMAGES(Description, Image, User_Id) "
    ."VALUES('test', '".$avatar."', ".$userId.")";
    
    mysqli_query($dbConn, $dbQuery);
  }
?>
