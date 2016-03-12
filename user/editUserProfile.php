﻿<?php
  include 'scripts/debugging.php'; // Remove this line on live site.
  include 'scripts/sessions.php';
  require 'scripts/dbConnect.php';
  require 'scripts/selectQueries.php';
  
  if ($_POST){
    $eupAvatar = $_POST['eupAvatar'];
    $eupPassword = $_POST['eupCurrentPassword'];
    $eupNewPassword = $_POST['eupNewPassword'];
    $eupPasswordConfirm = $_POST['eupNewPasswordConfirm'];
    $eupEmail = $_POST['eupEmail'];
    $eupAbout = $_POST['eupAboutMe'];
    
    $errorMsg = "";
    
    // OPENING DATABASE CONNECTION.
    $dbConn = dbConnect();
    
    // Password fields.
    $isValid = passwordExists($dbConn, $loginUsername, $loginPassword);
    if (!$isValid){
      $errorMsg .= "<br><b>You must enter your current password in order to change it.</b>";
    }
    
    if ($eupNewPassword != $eupPasswordConfirm){
      $errorMsg .= "<br><b>The new password fields do not match.</b>";
    }
    
    if (strlen($eupNewPassword) < 8){
      $errorMsg .= "<br><b>Your new password must have a minimum length of 8 characters.</b>";
    }
    
    // Email field
    $isValid = emailExists($dbConn, strtolower($acEmail));
    if ($isValid){
      $errorMsg .= "<br><b>The chosen email address is already in use by another user.</b>";
    }
    
    // CLOSING DATABASE CONNECTION.
    mysqli_close($dbConn);
  }
  ?>
<!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <title>Edit User Profile - Open Data Visualizer</title>
  </head>
  <body>
    <h1>Edit Profile Information</h1>
    <form method="post" action="editUserProfile.php">
      Select an image to upload as your avatar.<br>
      <input type="file" name="eupAvatar" id="avatar">
      <br><br>
      Current Password<br>
      <input type="password" name="eupCurrentPassword">
      <br><br>
      New Password<br>
      <input type="password" name="eupNewPassword">
      <br><br>
      Confirm New Password<br>
      <input type="password" name="eupNewPasswordConfirm">
      <br><br>
      Email<br>
      <input type="email" name="eupEmail">
      <br><br>
      About Me<br>
      <textarea name="eupAboutMe" cols="40" rows="5" wrap="physical" maxlength="4000"></textarea>
      <br><br>
      <input type="submit" value="Save Changes">
    </form>
  </body>
</html>
