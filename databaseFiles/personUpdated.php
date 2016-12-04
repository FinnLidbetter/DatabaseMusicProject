<html>
<head>
<title>Update Person</title>
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
    if(empty($_POST['curStartDate'])){
        // Adds name to array
        $curStartDate = NULL;
    } else{
        // Trim white space from the name and store the name
        $curStartDate = trim($_POST['curStartDate']);
    }
    if(empty($_POST['curEndDate'])){
        // Adds name to array
        $curEndDate = NULL;
    } else{
        // Trim white space from the name and store the name
        $curEndDate = trim($_POST['curEndDate']);
    }
    if(empty($_POST['newName'])){
        // Adds name to array
        $data_missing[] = 'New Name';
    } else {
        // Trim white space from the name and store the name
        $newName = trim($_POST['newName']);
    }
    if(empty($_POST['newStartDate'])){
        // Adds name to array
        $newStartDate = NULL;
    } else {
        // Trim white space from the name and store the name
        $newStartDate = trim($_POST['newStartDate']);
    }
    if(empty($_POST['newEndDate'])){
        // Adds name to array
        $newEndDate = NULL;
    } else {
        // Trim white space from the name and store the name
        $newEndDate = trim($_POST['newEndDate']);
    }
    if(empty($data_missing)){

	
        require_once('../mysqlConnect.php');
 		if($newStartDate == NULL) {
			$stmt = mysqli_prepare($dbc, "UPDATE Persons SET name = ?, MTAStartDate = ?, MTAEndDate = ? WHERE name = ?");
			mysqli_stmt_bind_param($stmt, 'ssss', $newName, $newStartDate, $newEndDate, $curName);
		} else if ($newEndDate == NULL){ 
			$stmt = mysqli_prepare($dbc, "UPDATE Persons SET name = ?, MTAStartDate = ?, MTAEndDate = ? WHERE name = ? AND MTAStartDate = ?");
			mysqli_stmt_bind_param($stmt, 'sssss', $newName, $newStartDate, $newEndDate, $curName, $curStartDate);
		} else {
			$stmt = mysqli_prepare($dbc, "UPDATE Persons SET name = ?, MTAStartDate = ?, MTAEndDate = ? WHERE name = ? AND MTAStartDate = ? AND MTAEndDate = ?");
			mysqli_stmt_bind_param($stmt, 'ssssss', $newName, $newStartDate, $newEndDate, $curName, $curStartDate, $curEndDate);
        }       
		
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Persons Updated';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/personUpdated.php" method="post">

<b>Update Person: Enter the Person's Current Info, Then Its New Info</b>

<p>Current Name:
<input type="text" name="curName" size="30" value="" />
</p>

<p>Current MTA Start Date:
<input type="text" name="curStartDate" size="30" value="" />
</p>

<p>Current MTA End Date:
<input type="text" name="curEndDate" size="30" value="" />
</p>

<p>New Name:
<input type="text" name="newName" size="30" value="" />
</p>

<p>New MTA Start Date:
<input type="text" name="newStartDate" size="30" value="" />
</p>

<p>New MTA End Date:
<input type="text" name="newEndDate" size="30" value="" />
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