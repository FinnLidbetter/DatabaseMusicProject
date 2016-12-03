<html>
<head>
<title>Delete Performance</title>
</head>
<body>
<?php

if(isset($_POST['submitID'])){
    
    $data_missing = array();
    
    if(empty($_POST['id'])){
        // Adds name to array
        $data_missing[] = 'ID';
    } else {
        // Trim white space from the name and store the name
        $id = trim($_POST['id']);
    }

    if(empty($data_missing)){
        
        require_once('../mysqlConnect.php');
        $stmt = mysqli_prepare($dbc, "DELETE FROM Performances WHERE id = ?");
        mysqli_stmt_bind_param($stmt, 'd', $id);
        
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Performance Deleted';
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

elseif (isset($_POST['submitInfo'])){

    if(empty($_POST['performanceTitle'])){
        // Adds name to array
        $data_missing[] = 'Performance Title';
    } else {
        // Trim white space from the name and store the name
        $performanceTitle = trim($_POST['performanceTitle']);
    }
    if(empty($_POST['sponsor'])){
        // Adds name to array
        $sponsor = NULL;
    } else{
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
    if(empty($_POST['concertName'])){
        // Adds name to array
        $data_missing[] = 'Concert Name';
    } else{
        // Trim white space from the name and store the name
        $concertName = trim($_POST['concertName']);
    }
    if(empty($_POST['concertDate'])){
        // Adds name to array
        $data_missing[] = 'Concert Date';
    } else {
        // Trim white space from the name and store the name
        $concertDate = trim($_POST['concertDate']);
    }
    if(empty($data_missing)){
        
        require_once('../mysqlConnect.php');
        $stmt = mysqli_prepare($dbc, "DELETE FROM Performances WHERE performanceTitle = ? AND sponsor = ? AND imageFilePath = ? AND recordingFilePath = ? AND concertName = ? AND concertDate = ?");
        mysqli_stmt_bind_param($stmt, 'ssssss', $performanceTitle, $sponsor, $imageFilePath, $recordingFilePath, $concertName, $concertDate);
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Performance Deleted';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/performanceDeleted.php" method="post">

<b>Input a performance's ID, or all its info.</b>

<p>ID:
<input type="text" name="id" size="30" value="" />
</p>

<p>
<input type="submit" name="submitID" alt="SubmitID" value="Send" />
</p>

<p>Performance Title:
<input type="text" name="performanceTitle" size="30" value="" />
</p>

<p>Sponsor:
<input type="text" name="sponsor" size="30" value="" />
</p>

<p>Image File Path:
<input type="text" name="imageFilePath" size="30" value="" />
</p>

<p>Recording File Path:
<input type="text" name="recordingFilePath" size="30" value="" />
</p>

<p>Concert Name:
<input type="text" name="concertName" size="30" value="" />
</p>

<p>Concert Date:
<input type="text" name="concertDate" size="30" value="" />
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