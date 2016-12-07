<html>
<head>
<title>Update Ensemble</title>
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
    if(empty($_POST['curDate'])){
        // Adds name to array
        $data_missing[] = 'Current Date';
    } else{
        // Trim white space from the name and store the name
        $curDate = trim($_POST['curDate']);
    }
    if(empty($_POST['newName'])){
        // Adds name to array
        $data_missing[] = 'New Name';
    } else {
        // Trim white space from the name and store the name
        $newName = trim($_POST['newName']);
    }
    if(empty($_POST['newDate'])){
        // Adds name to array
        $data_missing[] = 'New Date';
    } else {
        // Trim white space from the name and store the name
        $newDate = trim($_POST['newDate']);
    }
    if(empty($data_missing)){
        
        //require_once('../mysqlConnect.php');
        include('../session.php');
        $stmt = mysqli_prepare($dbc, "UPDATE Ensembles SET name = ?, date = ? WHERE name = ? AND date = ?");
        mysqli_stmt_bind_param($stmt, 'ssss', $newName, $newDate, $curName, $curDate);
        
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Ensemble Updated';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/ensembleUpdated.php" method="post">

<b>Update Ensemble: Enter the Ensemble's Current Name and Date, Then Its New Info</b>

<p>Current Name:
<input type="text" name="curName" size="30" value="" />
</p>

<p>Current Date:
<input type="text" name="curDate" size="30" value="" />
</p>

<p>New Name:
<input type="text" name="newName" size="30" value="" />
</p>

<p>New Date:
<input type="text" name="newDate" size="30" value="" />
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
