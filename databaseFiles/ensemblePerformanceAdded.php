<html>
<head>
<title>Add Ensemble-Performance Relationship</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['ensembleName'])){
        // Adds name to array
        $data_missing[] = 'Ensemble\'s Name';
    } else {
        // Trim white space from the name and store the name
        $ensembleName = trim($_POST['ensembleName']);
    }
    if(empty($_POST['ensembleDate'])){
        // Adds name to array
        $data_missing[] = 'Ensemble\'s Date';
    } else {
        // Trim white space from the name and store the name
        $ensembleDate = trim($_POST['ensembleDate']);
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

	
        require_once('../mysqlConnect.php');
		
		$query1 = 'SELECT id FROM Ensembles WHERE name = \'' . $ensembleName . '\' AND date = \'' . $ensembleDate . '\';';	
		$query2 = 'SELECT id FROM Performances WHERE performanceTitle = \'' . $performanceTitle . '\' AND concertName = \'' . $concertName . '\' AND concertDate = \'' . $concertDate . '\';';
		
		$response1 = @mysqli_query($dbc, $query1);
		$response2 = @mysqli_query($dbc, $query2);
		
		$ensembleID = mysqli_fetch_assoc($response1);
		$performanceID = mysqli_fetch_assoc($response2);
		
		$stmt = mysqli_prepare($dbc, "INSERT INTO KeyTable(ensembleID, performanceID) VALUES(?,?)");
		mysqli_stmt_bind_param($stmt, 'ii', $ensembleID['id'], $performanceID['id']);
		
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Ensemble-Performance Relationship Added';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/ensemblePerformanceAdded.php" method="post">

<b>Add a relationship that shows an ensemble performed a performance: enter the ensemble's info, then the performance's info.</b>

<p>Ensemble's Name:
<input type="text" name="ensembleName" size="30" value="" />
</p>

<p>Ensemble's Date:
<input type="text" name="ensembleDate" size="30" value="" />
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