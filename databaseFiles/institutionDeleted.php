<html>
<head>
<title>Delete Institution</title>
</head>
<body>
<?php


if (isset($_POST['submitInfo'])){

    if(empty($_POST['name'])){
        // Adds name to array
        $data_missing[] = 'Name';
    } else {
        // Trim white space from the name and store the name
        $name = trim($_POST['name']);
    }
    if(empty($_POST['country'])){
        // Adds name to array
        $data_missing[] = 'Country';
    } else{
        // Trim white space from the name and store the name
        $country = trim($_POST['country']);
    }
    if(empty($data_missing)){
        
        require_once('../mysqlConnect.php');
        $stmt = mysqli_prepare($dbc, "DELETE FROM Institutions WHERE name = ? AND country = ?");
        mysqli_stmt_bind_param($stmt, 'ss', $name, $country);
        
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Institution Deleted';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/institutionDeleted.php" method="post">

<b>Input an Institution's Name and Country.</b>

<p>Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Country:
<input type="text" name="country" size="30" value="" />
</p>

<p>
<input type="submit" name="submitInfo" alt="SubmitInfo" value="Send" />
</p>

<p>
<a href="../homepage.php">Back</a>
</p>
    
</form>
</body>
</html>