<html>
<head>
<title>Update Institution</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['curName'])){
        // Adds name to array
        $data_missing[] = 'Current Name';
    } else {
        // Trim white space from the name and store the name
        $curName = trim($_POST['curName']);
    }
    if(empty($_POST['curCountry'])){
        // Adds name to array
        $data_missing[] = 'Current Country';
    } else{
        // Trim white space from the name and store the name
        $curCountry = trim($_POST['curCountry']);
    }
    if(empty($_POST['newName'])){
        // Adds name to array
        $data_missing[] = 'New Name';
    } else {
        // Trim white space from the name and store the name
        $newName = trim($_POST['newName']);
    }
    if(empty($_POST['newCountry'])){
        // Adds name to array
        $data_missing[] = 'New Country';
    } else {
        // Trim white space from the name and store the name
        $newCountry = trim($_POST['newCountry']);
    }
    if(empty($_POST['newCity'])){
        // Adds name to array
        $newCity = NULL;
    } else {
        // Trim white space from the name and store the name
        $newCity = trim($_POST['newCity']);
    }
    if(empty($data_missing)){
        
        //require_once('../mysqlConnect.php');
        include('../session.php');
        $stmt = mysqli_prepare($dbc, "UPDATE Institutions SET name = ?, country = ?, city = ? WHERE name = ? AND country = ?");
        $affected_rows = 0;
        if ($stmt) {
          mysqli_stmt_bind_param($stmt, 'sssss', $newName, $newCountry, $newCity, $curName, $curCountry);
          
          mysqli_stmt_execute($stmt);     
          $affected_rows = mysqli_stmt_affected_rows($stmt);
        }
        if($affected_rows == 1){         
            echo 'Institution Updated';
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
<form action="http://localhost/DatabaseMusicProject/databaseFiles/institutionUpdated.php" method="post">

<b>Update Institution: Enter the Institution's Current Name and Country, Then Its New Info</b>

<p>Current Name:
<input type="text" name="curName" size="30" value="" />
</p>

<p>Current Country:
<input type="text" name="curCountry" size="30" value="" />
</p>

<p>New Name:
<input type="text" name="newName" size="30" value="" />
</p>

<p>New Country:
<input type="text" name="newCountry" size="30" value="" />
</p>

<p>New City:
<input type="text" name="newCity" size="30" value="" />
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
