<html>
<head>
<title>Add Person-Performance Relationship</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['perName'])){
        // Adds name to array
        $data_missing[] = 'Person\'s Name';
    } else {
        // Trim white space from the name and store the name
        $perName = trim($_POST['perName']);
    }
    if(empty($_POST['startDate'])){
        // Adds name to array
        $startDate = NULL;
    } else{
        // Trim white space from the name and store the name
        $startDate = trim($_POST['startDate']);
    }
    if(empty($_POST['endDate'])){
        // Adds name to array
        $endDate = NULL;
    } else{
        // Trim white space from the name and store the name
        $endDate = trim($_POST['endDate']);
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
		
 		if($startDate == NULL) {
			$query1 = 'SELECT id FROM Persons WHERE name = \'' . $perName . '\';';
		} else if ($endDate == NULL){ 
			$query1 = 'SELECT id FROM Persons WHERE name = \'' . $perName . '\' AND MTAStartDate = \'' . $startDate . '\';';
		} else {
			$query1 = 'SELECT id FROM Persons WHERE name = \'' . $perName . '\' AND MTAStartDate = \'' . $startDate . '\' AND MTAEndDate = \'' . $endDate . '\';';
        }
		
		$query2 = 'SELECT id FROM Performances WHERE performanceTitle = \'' . $performanceTitle . '\' AND concertName = \'' . $concertName . '\' AND concertDate = \'' . $concertDate . '\';';
		
		$response1 = @mysqli_query($dbc, $query1);
		$response2 = @mysqli_query($dbc, $query2);
		
		$perID = mysqli_fetch_assoc($response1);
		$performanceID = mysqli_fetch_assoc($response2);
		
		$stmt = mysqli_prepare($dbc, "INSERT INTO KeyTable(personID, performanceID) VALUES(?,?)");
		mysqli_stmt_bind_param($stmt, 'ii', $perID['id'], $performanceID['id']);
		
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Person-Performance Relationship Added';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/individualPerformanceAdded.php" method="post">

<b>Add a relationship that shows an individual performed a performance: enter the person's info, then the performance's info.</b>

<p>Person's Name:
<input type="text" name="perName" size="30" value="" />
</p>

<p>Person's MTA Start Date:
<input type="text" name="startDate" size="30" value="" />
</p>

<p>Person's MTA End Date:
<input type="text" name="endDate" size="30" value="" />
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