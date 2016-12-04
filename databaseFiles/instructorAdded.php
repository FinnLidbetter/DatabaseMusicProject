<html>
<head>
<title>Add Student-Instructor Relationship</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['studName'])){
        // Adds name to array
        $data_missing[] = 'Student\'s Name';
    } else {
        // Trim white space from the name and store the name
        $studName = trim($_POST['studName']);
    }
    if(empty($_POST['studStartDate'])){
        // Adds name to array
        $studStartDate = NULL;
    } else{
        // Trim white space from the name and store the name
        $studStartDate = trim($_POST['studStartDate']);
    }
    if(empty($_POST['studEndDate'])){
        // Adds name to array
        $studEndDate = NULL;
    } else{
        // Trim white space from the name and store the name
        $studEndDate = trim($_POST['studEndDate']);
    }
    if(empty($_POST['instName'])){
        // Adds name to array
        $data_missing[] = 'Instructor\'s Name';
    } else {
        // Trim white space from the name and store the name
        $instName = trim($_POST['instName']);
    }
    if(empty($_POST['instStartDate'])){
        // Adds name to array
        $instStartDate = NULL;
    } else {
        // Trim white space from the name and store the name
        $instStartDate = trim($_POST['instStartDate']);
    }
    if(empty($_POST['instEndDate'])){
        // Adds name to array
        $instEndDate = NULL;
    } else {
        // Trim white space from the name and store the name
        $instEndDate = trim($_POST['instEndDate']);
    }
    if(empty($data_missing)){

	
        require_once('../mysqlConnect.php');
 		if($studStartDate == NULL) {
			$query1 = 'SELECT id FROM Persons WHERE name = \'' . $studName . '\';';
		} else if ($studEndDate == NULL){ 
			$query1 = 'SELECT id FROM Persons WHERE name = \'' . $studName . '\' AND MTAStartDate = \'' . $studStartDate . '\';';
		} else {
			$query1 = 'SELECT id FROM Persons WHERE name = \'' . $studName . '\' AND MTAStartDate = \'' . $studStartDate . '\' AND MTAEndDate = \'' . $studEndDate . '\';';
        }
		if($instStartDate == NULL) {
			$query2 = 'SELECT id FROM Persons WHERE name = \'' . $instName . '\';';
		} else if ($instEndDate == NULL){
			$query2 = 'SELECT id FROM Persons WHERE name = \'' . $instName . '\' AND MTAStartDate = \'' . $instStartDate . '\';';
		} else {
			$query2 = 'SELECT id FROM Persons WHERE name = \'' . $instName . '\' AND MTAStartDate = \'' . $instStartDate . '\' AND MTAEndDate = \'' . $instEndDate . '\';';
		}
		
		$response1 = @mysqli_query($dbc, $query1);
		$response2 = @mysqli_query($dbc, $query2);
		
		$studID = mysqli_fetch_assoc($response1);
		$instID = mysqli_fetch_assoc($response2);
		
		$stmt = mysqli_prepare($dbc, "INSERT INTO KeyTable(personID, instructorID) VALUES(?,?)");
		mysqli_stmt_bind_param($stmt, 'ii', $studID['id'], $instID['id']);
		
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Student-Instructor Relationship Added';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/instructorAdded.php" method="post">

<b>Add a Student-Instructor Relationship: Enter the Student's Info, Then the Instructor's Info</b>

<p>Student's Name:
<input type="text" name="studName" size="30" value="" />
</p>

<p>Student's MTA Start Date:
<input type="text" name="studStartDate" size="30" value="" />
</p>

<p>Student's MTA End Date:
<input type="text" name="studEndDate" size="30" value="" />
</p>

<p>Instructor's Name:
<input type="text" name="instName" size="30" value="" />
</p>

<p>Instructor's MTA Start Date:
<input type="text" name="instStartDate" size="30" value="" />
</p>

<p>Instructor's MTA End Date:
<input type="text" name="instEndDate" size="30" value="" />
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