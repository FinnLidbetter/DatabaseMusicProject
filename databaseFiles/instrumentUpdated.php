<html>
<head>
<title>Update Instrument</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['curName'])){
        // Adds name to array
        $data_missing[] = 'Current Name';
    } else {
        // Trim white space from the name and store the name
        $curName = trim($_POST['curName']);
    }
    if(empty($_POST['newName'])){
        // Adds name to array
        $data_missing[] = 'New Name';
    } else {
        // Trim white space from the name and store the name
        $newName = trim($_POST['newName']);
    }
    if(empty($_POST['newFamily'])){
        // Adds name to array
        $newFamily = NULL;
    } else {
        // Trim white space from the name and store the name
        $newFamily = trim($_POST['newFamily']);
    }
    if(empty($data_missing)){
        
        //require_once('../mysqlConnect.php');
        include('../session.php');
        $stmt = mysqli_prepare($dbc, "UPDATE Instruments SET name = ?, family = ? WHERE name = ?");
        mysqli_stmt_bind_param($stmt, 'sss', $newName, $newFamily, $curName);
        
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Instrument Updated';
            mysqli_stmt_close($stmt);         
            mysqli_close($dbc);
            
        } else {           
            echo 'Error Occurred<br />';
            echo mysqli_error();        
            mysqli_stmt_close($stmt);         
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
<form action="http://localhost/DatabaseMusicProject/databaseFiles/instrumentUpdated.php" method="post">

<b>Update Instrument: Enter the Instrument's Current Name, Then Its New Info</b>

<p>Current Name:
<input type="text" name="curName" size="30" value="" />
</p>

<p>New Name:
<input type="text" name="newName" size="30" value="" />
</p>

<p>New Family:
<input type="text" name="newFamily" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

<p>
<a href="../homepage.php">Back</a>
</p>
    
</form>
</body>
</html>
