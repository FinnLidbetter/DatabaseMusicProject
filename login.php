
<?php
  // Note that this code was retrieved from https://www.tutorialspoint.com/php/php_mysql_login.htm
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($dbc,$_POST['username']);
      $mypassword = mysqli_real_escape_string($dbc,$_POST['password']); 
      
      $sql = "SELECT * FROM mysql.user WHERE User='$myusername' AND Password=PASSWORD('$mypassword')";
      #$sql = "SELECT * FROM mysql.user";
      $result = mysqli_query($dbc,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $fields = mysqli_fetch_fields($result);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
		  $error = '';
      if($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['login_password'] = $mypassword;
        $change =  mysqli_change_user($dbc,$myusername,$mypassword,DB_DATABASE);
         
        echo $change ? 'true' : 'false';
        if ($change) 
          header("location: homepage.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
      <a href="homepage.php">Homepage</a>
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php 
               
               echo $error; ?></div>
					      
            </div>
				
         </div>
			
      </div>

   </body>
</html>
