<?php
  include 'scripts/debugging.php'; // Remove this line on live site.
  include 'scripts/sessions.php';
  require 'scripts/dbConnect.php';
  require 'scripts/selectQueries.php';

  // OPENING DATABASE CONNECTION.
  $dbConn = dbConnect();
  
  // CLOSING DATABASE CONNECTION.
  mysqli_close($dbConn);
?>
<!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <title>View User Profile - Open Data Visualizer</title>
  </head>
  <body>
<?php
  if (isset($_GET["id"])){
?>
    <h1>View User Profile</h1>
    <p>To be implemented</p>
<?php
  }else{
?>
    <p>You are unable to access this page without an "id" in the URL.</p>
<?php
  }
?>
  </body>
</html>
