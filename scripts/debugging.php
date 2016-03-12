<?php
  // CODED BY: Jayme Laso-Barros

  ini_set('display_errors', 1);
  error_reporting(E_ALL | E_STRICT);
  include '/home/jayme/firephp-core/lib/FirePHPCore/fb.php';
  
  checkSession('LoggedIn');
  checkSession('Username');
  checkSession('UserId');
  
  // This function sends a FirePHP log that reports whether or not the given session name is empty.
  function checkSession($sessionName){
    if (isset($_SESSION[$sessionName]) || empty($_SESSION[$sessionName])){
      FB::log($sessionName.' session empty.');
    }else{
      FB::log($sessionName.' session not empty. Value: '.$_SESSION[$sessionName]);
    }
  }
?>