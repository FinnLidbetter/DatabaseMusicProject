<html>
<head>
<title>Add Person-Instrument Relationship</title>
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
    if(empty($_POST['instName'])){
        // Adds name to array
        $data_missing[] = 'Instrument\'s Name';
    } else {
        // Trim white space from the name and store the name
        $instName = trim($_POST['instName']);
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
		
		$response1 = @mysqli_query($dbc, $query1);
		
		$perID = mysqli_fetch_assoc($response1);
		
		$stmt = mysqli_prepare($dbc, "INSERT INTO KeyTable(personID, instrumentName) VALUES(?,?)");
		mysqli_stmt_bind_param($stmt, 'is', $perID['id'], $instName);
		
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Person-Instrument Relationship Added';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/instrumentPlayerAdded.php" method="post">

<b>Add a relationship that shows a person can play a specific instrument: enter the person's Info, then the instrument's name</b>

<p>Person's Name:
<input type="text" name="perName" size="30" value="" />
</p>

<p>Person's MTA Start Date:
<input type="text" name="startDate" size="30" value="" />
</p>

<p>Person's MTA End Date:
<input type="text" name="endDate" size="30" value="" />
</p>

<p>Instrument's Name:
<input type="text" name="instName" size="30" value="" />
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