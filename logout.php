<?php
  // Note that this code was retrieved from https://www.tutorialspoint.com/php/php_mysql_login.htm
   session_start();
   
   if(session_destroy()) {
      header("Location: login.php");
   }
?>
