<html>
<head>
<title>Delete Instrument</title>
</head>
<body>
<?php

  include('../session.php');

  if (isset($_POST['submitInfo'])){

    if(empty($_POST['name'])){
        // Adds name to array
        $data_missing[] = 'Name';
    } else {
        // Trim white space from the name and store the name
        $name = trim($_POST['name']);
    }
    if(empty($data_missing)){
        
        #require_once('../mysqlConnect.php');
        $stmt = mysqli_prepare($dbc, "DELETE FROM Instruments WHERE name = ?");
        $affected_rows = 0;
        if ($stmt) {
          mysqli_stmt_bind_param($stmt, 's', $name);
          
          mysqli_stmt_execute($stmt);     
          $affected_rows = mysqli_stmt_affected_rows($stmt);
        }
        if($affected_rows == 1){         
            echo 'Instrument Deleted';
            mysqli_stmt_close($stmt);         
            mysqli_close($dbc);
            
        } else {           
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);    
            if ($stmt) {
              mysqli_stmt_close($stmt);
            }
            mysqli_close($dbc);         
        }       
    } else {      
        echo 'You need to enter the following data<br />';     
        foreach($data_missing as $missing){          
            echo "$missing<br />";          
        }        
    }   
}
?>

<form action="http://localhost/DatabaseMusicProject/databaseFiles/instrumentDeleted.php" method="post">

<b>Input an Instrument's Name.</b>

<p>Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>
<input type="submit" name="submitInfo" alt="SubmitInfo" value="Send" />
</p>

<p>
<a href="../homepage.php">Back</a>
</p>
    
</form>
</body>
</html>
