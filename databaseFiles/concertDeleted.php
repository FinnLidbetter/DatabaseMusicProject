<html>
<head>
<title>Delete Concert</title>
</head>
<body>
<?php


if (isset($_POST['submitInfo'])){

    if(empty($_POST['name'])){
        // Adds name to array
        $data_missing[] = 'Name';
    } else {
        // Trim white space from the name and store the name
        $name = trim($_POST['name']);
    }
    if(empty($_POST['date'])){
        // Adds name to array
        $data_missing[] = 'Date';
    } else{
        // Trim white space from the name and store the name
        $date = trim($_POST['date']);
    }
    if(empty($data_missing)){
        
        //require_once('../mysqlConnect.php');
        include('../session.php');
        $stmt = mysqli_prepare($dbc, "DELETE FROM Concerts WHERE name = ? AND date = ?");
        $affected_rows = 0;
        if ($stmt) {
          mysqli_stmt_bind_param($stmt, 'ss', $name, $date);
          
          mysqli_stmt_execute($stmt);     
          $affected_rows = mysqli_stmt_affected_rows($stmt);
        }
        if($affected_rows == 1){         
            echo 'Concert Deleted';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/concertDeleted.php" method="post">

<b>Input a Concert's Name and Date.</b>

<p>Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Date:
<input type="text" name="date" size="30" value="" />
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
