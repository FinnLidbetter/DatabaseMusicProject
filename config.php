<?php
  // Note that this code was retrieved from https://www.tutorialspoint.com/php/php_mysql_login.htm
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'weak');
   define('DB_PASSWORD', 'weak');
   define('DB_DATABASE', 'musicprojectdb');
   $dbc = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
