<?php
  session_start();
  require_once('config.php');
  
  if(!isset($_SESSION['login_user'])){
    header("location:../login.php");
  }
   
  $change = mysqli_change_user($dbc, $_SESSION['login_user'], $_SESSION['login_password'], DB_DATABASE);
  
  if (!$change) {
    header('location:../login.php');
  }
  
  
  /*
  $current_user_result = mysqli_query($dbc, 'SELECT USER()');
  $current_user_row = mysqli_fetch_assoc($current_user_result);
  $current_user = '';
  foreach ($current_user_row as $entry) {
    $current_user = $entry;
  }

  echo $current_user;
  if (isset($_SESSION['login_user'])) {
    echo $_SESSION['login_user'];
  }

  */

?>
