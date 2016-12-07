<html>
<head>
<title>Add Musical Work</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['title'])){
        // Adds name to array
        $data_missing[] = 'Title';
    } else {
        // Trim white space from the name and store the name
        $title = trim($_POST['title']);
    }
    if(empty($_POST['composer'])){
        // Adds name to array
        $data_missing[] = 'Composer';
    } else{
        // Trim white space from the name and store the name
        $composer = trim($_POST['composer']);
    }
    if(empty($_POST['year'])){
        // Adds name to array
        $year = NULL;
    } else {
        // Trim white space from the name and store the name
        $year = trim($_POST['year']);
    }
    if(empty($_POST['filePath'])){
        // Adds name to array
        $filePath = NULL;
    } else {
        // Trim white space from the name and store the name
        $filePath = trim($_POST['filePath']);
    }
    if(empty($data_missing)){
        
        //require_once('../mysqlConnect.php');
        include('../session.php');
        $stmt = mysqli_prepare($dbc, "INSERT INTO WorksYear (title, composer, year) VALUES (?, ?, ?)");
        
        $affected_rows = 0;
        if ($stmt) {
          mysqli_stmt_bind_param($stmt, 'ssd', $title,
                                 $composer, $year);
          
          mysqli_stmt_execute($stmt); 
		    }
        $stmt = mysqli_prepare($dbc, "INSERT INTO WorksFilePath (title, composer, filePath) VALUES (?, ?, ?)");
        if ($stmt) {
          mysqli_stmt_bind_param($stmt, 'sss', $title,
                                 $composer, $filePath);
          
          mysqli_stmt_execute($stmt);    
          $affected_rows = mysqli_stmt_affected_rows($stmt);
        }
        if($affected_rows == 1){         
            echo 'Work Entered';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/workAdded.php" method="post">
    
    <b>Add a New Musical Work</b>
    
    <p>Title:
<input type="text" name="title" size="30" value="" />
</p>

<p>Composer:
<input type="text" name="composer" size="30" value="" />
</p>

<p>Year Composed:
<input type="text" name="year" size="30" value="" />
</p>

<p>File Path:
<input type="text" name="filePath" size="30" value="" />
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
