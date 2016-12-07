<html>
<head>
<title>Add Institution</title>
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
    if(empty($_POST['country'])){
        // Adds name to array
        $data_missing[] = 'Country';
    } else{
        // Trim white space from the name and store the name
        $country = trim($_POST['country']);
    }
    if(empty($_POST['city'])){
        // Adds name to array
        $city = NULL;
    } else {
        // Trim white space from the name and store the name
        $city = trim($_POST['city']);
    }
    if(empty($data_missing)){
        
        //require_once('../mysqlConnect.php');
        include('../session.php');
        $stmt = mysqli_prepare($dbc, "INSERT INTO Institutions (name, country, city) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $name,
                               $country, $city);
        
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Institution Entered';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/institutionAdded.php" method="post">
    
    <b>Add a New Institution</b>
    
    <p>Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Date:
<input type="text" name="country" size="30" value="" />
</p>

<p>Venue:
<input type="text" name="city" size="30" value="" />
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
