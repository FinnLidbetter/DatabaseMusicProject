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
    if(empty($_POST['date'])){
        // Adds name to array
        $data_missing[] = 'Date';
    } else{
        // Trim white space from the name and store the name
        $date = trim($_POST['date']);
    }
    if(empty($_POST['venue'])){
        // Adds name to array
        $data_missing[] = 'Venue';
    } else {
        // Trim white space from the name and store the name
        $venue = trim($_POST['venue']);
    }
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO Concerts (name, date, venue) VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);		
        mysqli_stmt_bind_param($stmt, "sss", $name,
                               $date, $venue);
        
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Concert Entered';
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

<form action="http://localhost/studentadded.php" method="post">
    
    <b>Add a New Concert</b>
    
    <p>Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Date:
<input type="text" name="date" size="30" value="" />
</p>

<p>Venue:
<input type="text" name="venue" size="30" value="" />
</p>

<p>
    <input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>