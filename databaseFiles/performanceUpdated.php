<html>
<head>
<title>Update Person</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['curPerfTitle'])){
        // Adds name to array
        $data_missing[] = 'Current Performance Title';
    } else {
        // Trim white space from the name and store the name
        $curPerfTitle = trim($_POST['curPerfTitle']);
    }
    if(empty($_POST['curConName'])){
        // Adds name to array
        $data_missing[] = 'Current Concert Name';
    } else{
        // Trim white space from the name and store the name
        $curConName = trim($_POST['curConName']);
    }
    if(empty($_POST['curConDate'])){
        // Adds name to array
        $data_missing[] = 'Current Concert Date';
    } else{
        // Trim white space from the name and store the name
        $curConDate = trim($_POST['curConDate']);
    }
    if(empty($_POST['newPerfTitle'])){
        // Adds name to array
        $data_missing[] = 'New Performance Title';
    } else {
        // Trim white space from the name and store the name
        $newPerfTitle = trim($_POST['newPerfTitle']);
    }
    if(empty($_POST['sponsor'])){
        // Adds name to array
        $sponsor = NULL;
    } else {
        // Trim white space from the name and store the name
        $sponsor = trim($_POST['sponsor']);
    }
    if(empty($_POST['imageFilePath'])){
        // Adds name to array
        $imageFilePath = NULL;
    } else {
        // Trim white space from the name and store the name
        $imageFilePath = trim($_POST['imageFilePath']);
    }
	if(empty($_POST['recordingFilePath'])){
        // Adds name to array
        $recordingFilePath = NULL;
    } else {
        // Trim white space from the name and store the name
        $recordingFilePath = trim($_POST['recordingFilePath']);
    }
    if(empty($_POST['newConName'])){
        // Adds name to array
        $data_missing[] = 'New Concert Name';
    } else {
        // Trim white space from the name and store the name
        $newConName = trim($_POST['newConName']);
    }
    if(empty($_POST['newConDate'])){
        // Adds name to array
        $data_missing[] = 'New Concert Date';
    } else {
        // Trim white space from the name and store the name
        $newConDate = trim($_POST['newConDate']);
    }
    if(empty($data_missing)){

	
        //require_once('../mysqlConnect.php');
        include('../session.php');
		$stmt = mysqli_prepare($dbc, "UPDATE Performances SET performanceTitle = ?, sponsor = ?, imageFilePath = ?, recordingFilePath = ?, concertName = ?, concertDate = ? WHERE performanceTitle = ? AND concertName = ? AND concertDate = ?");
		mysqli_stmt_bind_param($stmt, 'sssssssss', $newPerfTitle, $sponsor, $imageFilePath, $recordingFilePath, $newConName, $newConDate, $curPerfTitle, $curConName, $curConDate);     
		
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Performances Updated';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/performanceUpdated.php" method="post">

<b>Update Performance: Enter the Performance's Current Info, Then Its New Info</b>

<p>Current Performance Title:
<input type="text" name="curPerfTitle" size="30" value="" />
</p>

<p>Current Concert Name:
<input type="text" name="curConName" size="30" value="" />
</p>

<p>Current Concert Date:
<input type="text" name="curConDate" size="30" value="" />
</p>

<p>New Performance Title:
<input type="text" name="newPerfTitle" size="30" value="" />
</p>

<p>New Sponsor:
<input type="text" name="sponsor" size="30" value="" />
</p>

<p>New Image File Path:
<input type="text" name="imageFilePath" size="30" value="" />
</p>

<p>New Recording File Path:
<input type="text" name="recordingFilePath" size="30" value="" />
</p>

<p>New Concert Name:
<input type="text" name="newConName" size="30" value="" />
</p>

<p>New Concert Date:
<input type="text" name="newConDate" size="30" value="" />
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
