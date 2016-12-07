<html>
<head>
<title>Add a Concert Work</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['workTitle'])){
        // Adds name to array
        $data_missing[] = 'Work Title';
    } else {
        // Trim white space from the name and store the name
        $workTitle = trim($_POST['workTitle']);
    }
    if(empty($_POST['composer'])){
        // Adds name to array
        $data_missing[] = 'Composer';
    } else{
        // Trim white space from the name and store the name
        $composer = trim($_POST['composer']);
    }
    if(empty($_POST['conName'])){
        // Adds name to array
        $data_missing[] = 'Concert Name';
    } else {
        // Trim white space from the name and store the name
        $conName = trim($_POST['conName']);
    }
    if(empty($_POST['date'])){
        // Adds name to array
        $data_missing[] = 'Concert Date';
    } else {
        // Trim white space from the name and store the name
        $date = trim($_POST['date']);
    }
    if(empty($_POST['perfID'])){
        // Adds name to array
        $data_missing[] = 'Performance ID';
    } else {
        // Trim white space from the name and store the name
        $perfID = trim($_POST['perfID']);
    }
    if(empty($data_missing)){
        
        //require_once('../mysqlConnect.php');
        include('../session.php');
        $stmt = mysqli_prepare($dbc, "INSERT INTO ConcertWorks (concertName, concertDate, workTitle, workComposer, performanceID) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'ssssd', $conName, $date, $workTitle, $composer, $perfID);
        
        mysqli_stmt_execute($stmt); 
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Concert Work Pair Entered';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/concertWorkAdded.php" method="post">

<b>Add a the info for a work, the concert it was performed in, and the corresponding performance ID</b>

<p>Work Title:
<input type="text" name="workTitle" size="30" value="" />
</p>

<p>Composer:
<input type="text" name="composer" size="30" value="" />
</p>

<p>Concert Name:
<input type="text" name="conName" size="30" value="" />
</p>

<p>Concert Date:
<input type="text" name="date" size="30" value="" />
</p>

<p>Performance ID:
<input type="text" name="perfID" size="30" value="" />
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
