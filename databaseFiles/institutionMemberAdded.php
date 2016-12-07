<html>
<head>
<title>Add Person-Institution Relationship</title>
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
        $data_missing[] = 'Institution\'s Name';
    } else {
        // Trim white space from the name and store the name
        $instName = trim($_POST['instName']);
    }
    if(empty($_POST['instCountry'])){
        // Adds name to array
        $data_missing[] = 'Institution\'s Country';
    } else {
        // Trim white space from the name and store the name
        $instCountry = trim($_POST['instCountry']);
    }
    if(empty($data_missing)){

	
        //require_once('../mysqlConnect.php');
        include('../session.php');
		
 		if($startDate == NULL) {
			$query1 = 'SELECT id FROM Persons WHERE name = \'' . $perName . '\';';
		} else if ($endDate == NULL){ 
			$query1 = 'SELECT id FROM Persons WHERE name = \'' . $perName . '\' AND MTAStartDate = \'' . $startDate . '\';';
		} else {
			$query1 = 'SELECT id FROM Persons WHERE name = \'' . $perName . '\' AND MTAStartDate = \'' . $startDate . '\' AND MTAEndDate = \'' . $endDate . '\';';
        }
		
		$response1 = @mysqli_query($dbc, $query1);
		
		$perID = mysqli_fetch_assoc($response1);
		
		$stmt = mysqli_prepare($dbc, "INSERT INTO KeyTable(personID, institutionName, institutionCountry) VALUES(?,?,?)");
		$affected_rows = 0;
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, 'iss', $perID['id'], $instName, $instCountry);
      
          mysqli_stmt_execute($stmt);     
          $affected_rows = mysqli_stmt_affected_rows($stmt);
    }
        if($affected_rows == 1){         
            echo 'Person-Institution Relationship Added';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/institutionMemberAdded.php" method="post">

<b>Add a relationship that shows a person attended a particular institution: enter the person's Info, then the institution's info</b>

<p>Person's Name:
<input type="text" name="perName" size="30" value="" />
</p>

<p>Person's MTA Start Date:
<input type="text" name="startDate" size="30" value="" />
</p>

<p>Person's MTA End Date:
<input type="text" name="endDate" size="30" value="" />
</p>

<p>Institution's Name:
<input type="text" name="instName" size="30" value="" />
</p>

<p>Institution's Country:
<input type="text" name="instCountry" size="30" value="" />
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
