<html>
<head>
<title>Add Performance</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
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
        
        //require_once('../mysqlConnect.php');
        include('../session.php');
        $stmt = mysqli_prepare($dbc, "INSERT INTO Performances(performanceTitle, sponsor, imageFilePath, recordingFilePath, concertName, concertDate) VALUES (?, ?, ?, ?, ?, ?)");
        $affected_rows = 0;
        if ($stmt) {
          mysqli_stmt_bind_param($stmt, 'ssssss', $performanceTitle, $sponsor, $imageFilePath, $recordingFilePath, $concertName, $concertDate);
          
          mysqli_stmt_execute($stmt);     
          $affected_rows = mysqli_stmt_affected_rows($stmt);
        }
        if($affected_rows == 1){         
            echo 'Performance Entered';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/performanceAdded.php" method="post">
    
    <b>Add a New Performance</b>
    
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
    <input type="submit" name="submit" value="Send" />
</p>

<p>
<a href="../homepage.php">Back</a>
</p>
    
</form>
</body>
</html>
