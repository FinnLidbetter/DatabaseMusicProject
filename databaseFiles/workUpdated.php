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
        $data_missing[] = 'Current Title';
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
    if(empty($_POST['newTitle'])){
        // Adds name to array
        $data_missing[] = 'New Title';
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
    if(empty($_POST['newYear'])){
        // Adds name to array
        $newYear = NULL;
    } else {
        // Trim white space from the name and store the name
        $newYear = trim($_POST['newYear']);
    }
    if(empty($_POST['newFilePath'])){
        // Adds name to array
        $newFilePath = NULL;
    } else {
        // Trim white space from the name and store the name
        $newFilePath = trim($_POST['newFilePath']);
    }
    if(empty($data_missing)){

	
        //require_once('../mysqlConnect.php');
        include('../session.php');

		$stmt = mysqli_prepare($dbc, "UPDATE WorksYear SET title = ?, composer = ?, year = ? WHERE title = ? AND composer = ?");
		$affected_rows = 0;
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, 'sssss', $newTitle, $newComposer, $newYear, $curTitle, $curComposer);     	
          mysqli_stmt_execute($stmt);  
    }
		$stmt = mysqli_prepare($dbc, "UPDATE WorksFilePath SET title = ?, composer = ?, filePath = ? WHERE title = ? AND composer = ?");
		if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssss', $newTitle, $newComposer, $newFilePath, $curTitle, $curComposer);     	
        mysqli_stmt_execute($stmt);    
		
        $affected_rows = mysqli_stmt_affected_rows($stmt);
    }
        if($affected_rows == 1){         
            echo 'Works Updated';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/workUpdated.php" method="post">

<b>Update Person: Enter the Work's Current Title and Composer, Then Its New Info</b>

<p>Current Title:
<input type="text" name="curTitle" size="30" value="" />
</p>

<p>Current Composer:
<input type="text" name="curComposer" size="30" value="" />
</p>

<p>New Title:
<input type="text" name="newTitle" size="30" value="" />
</p>

<p>New Composer:
<input type="text" name="newComposer" size="30" value="" />
</p>

<p>New Year:
<input type="text" name="newYear" size="30" value="" />
</p>

<p>New File Path:
<input type="text" name="newFilePath" size="30" value="" />
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
