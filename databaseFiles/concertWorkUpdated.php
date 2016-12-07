<html>
<head>
<title>Update Person</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['curTitle'])){
        // Adds name to array
        $data_missing[] = 'Current Work Title';
    } else {
        // Trim white space from the name and store the name
        $curTitle = trim($_POST['curTitle']);
    }
    if(empty($_POST['curComposer'])){
        // Adds name to array
        $data_missing[] = 'Current Composer';
    } else{
        // Trim white space from the name and store the name
        $curComposer = trim($_POST['curComposer']);
    }
    if(empty($_POST['curName'])){
        // Adds name to array
        $data_missing[] = 'Current Concert Name';
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
    if(empty($_POST['newTitle'])){
        // Adds name to array
        $data_missing[] = 'New Work Title';
    } else{
        // Trim white space from the name and store the name
        $newTitle = trim($_POST['newTitle']);
    }
    if(empty($_POST['newComposer'])){
        // Adds name to array
        $data_missing[] = 'New Composer';
    } else {
        // Trim white space from the name and store the name
        $newComposer = trim($_POST['newComposer']);
    }
    if(empty($_POST['newName'])){
        // Adds name to array
        $data_missing[] = 'New Concert Name';
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
    if(empty($_POST['newID'])){
        // Adds name to array
        $data_missing[] = 'New Performance ID';
    } else {
        // Trim white space from the name and store the name
        $newID = trim($_POST['newID']);
    }
    if(empty($data_missing)){

	
        require_once('../mysqlConnect.php');

		$stmt = mysqli_prepare($dbc, "UPDATE ConcertWorks SET workTitle = ?, workComposer = ?, concertName = ?, concertDate = ?, performanceID = ? WHERE workTitle = ? AND workComposer = ? AND concertName = ? AND concertDate = ?");
		mysqli_stmt_bind_param($stmt, 'ssssdssss', $newTitle, $newComposer, $newName, $newDate, $newID, $curTitle, $curComposer, $curName, $curDate);     	
        mysqli_stmt_execute($stmt);  

        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Concert Work Pair Updated';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/concertWorkUpdated.php" method="post">

<b>Update Concert Work Pair: Enter the Current Info, Then Its New Info</b>

<p>Current Work Title:
<input type="text" name="curTitle" size="30" value="" />
</p>

<p>Current Composer:
<input type="text" name="curComposer" size="30" value="" />
</p>

<p>Current Concert Name:
<input type="text" name="curName" size="30" value="" />
</p>

<p>Current Date:
<input type="text" name="curDate" size="30" value="" />
</p>

<p>New Work Title:
<input type="text" name="newTitle" size="30" value="" />
</p>

<p>New Composer:
<input type="text" name="newComposer" size="30" value="" />
</p>

<p>New Concert Name:
<input type="text" name="newName" size="30" value="" />
</p>

<p>New Date:
<input type="text" name="newDate" size="30" value="" />
</p>

<p>New Performance ID:
<input type="text" name="newID" size="30" value="" />
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