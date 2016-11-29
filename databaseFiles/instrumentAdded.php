<html>
<head>
<title>Add Concert</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['name'])){
        // Adds name to array
        $data_missing[] = 'Name';
    } else {
        // Trim white space from the name and store the name
        $name = trim($_POST['name']);
    }
    if(empty($_POST['family'])){
        // Adds name to array
        $data_missing[] = 'Family';
    } else{
        // Trim white space from the name and store the name
        $family = trim($_POST['family']);
    }
    if(empty($data_missing)){
        
        require_once('../mysqlConnect.php');
        $stmt = mysqli_prepare($dbc, "INSERT INTO Instruments (name, family) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, 'ss', $name,
                               $family);
        
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Instrument Entered';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/instrumentAdded.php" method="post">
    
    <b>Add a New Instrument</b>
    
    <p>Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Family:
<input type="text" name="family" size="30" value="" />
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