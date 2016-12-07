<html>
<head>
<title>Add Work-Performance Relationship</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['workTitle'])){
        // Adds name to array
        $data_missing[] = 'Work\'s Title';
    } else {
        // Trim white space from the name and store the name
        $workTitle = trim($_POST['workTitle']);
    }
    if(empty($_POST['workComposer'])){
        // Adds name to array
        $data_missing[] = 'Work\'s Composer';
    } else {
        // Trim white space from the name and store the name
        $workComposer = trim($_POST['workComposer']);
    }
    if(empty($_POST['performanceTitle'])){
        // Adds name to array
        $data_missing[] = 'Performance\'s Title';
    } else {
        // Trim white space from the name and store the name
        $performanceTitle = trim($_POST['performanceTitle']);
    }
    if(empty($_POST['concertName'])){
        // Adds name to array
        $data_missing[] = 'Concert\'s Name';
    } else {
        // Trim white space from the name and store the name
        $concertName = trim($_POST['concertName']);
    }
    if(empty($_POST['concertDate'])){
        // Adds name to array
        $data_missing[] = 'Concert\'s Date';
    } else {
        // Trim white space from the name and store the name
        $concertDate = trim($_POST['concertDate']);
    }
    if(empty($data_missing)){

	
        //require_once('../mysqlConnect.php');
        include('../session.php');
		
		$query1 = 'SELECT id FROM Performances WHERE performanceTitle = \'' . $performanceTitle . '\' AND concertName = \'' . $concertName . '\' AND concertDate = \'' . $concertDate . '\';';
		
		$response1 = @mysqli_query($dbc, $query1);
		
		$performanceID = mysqli_fetch_assoc($response1);
		
		$stmt = mysqli_prepare($dbc, "INSERT INTO KeyTable(worksTitle, worksComposer, performanceID) VALUES(?,?,?)");
		$affected_rows = 0;
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssi', $workTitle, $workComposer, $performanceID['id']);
		
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
    }
        if($affected_rows == 1){         
            echo 'Work-Performance Relationship Added';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/workPerformedAdded.php" method="post">

<b>Add a relationship that shows a musical work was performed in a specific performance: enter the work's info, then the performance's info.</b>

<p>Work's Title:
<input type="text" name="workTitle" size="30" value="" />
</p>

<p>Work's Composer:
<input type="text" name="workComposer" size="30" value="" />
</p>

<p>Performance's Title:
<input type="text" name="performanceTitle" size="30" value="" />
</p>

<p>Concert's Name:
<input type="text" name="concertName" size="30" value="" />
</p>

<p>Concert's Date:
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
