<html>
<head>
<title>Delete Work</title>
</head>
<body>
<?php


if (isset($_POST['submit'])){

    if(empty($_POST['title'])){
        // Adds name to array
        $data_missing[] = 'Work Title';
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
    if(empty($_POST['name'])){
        // Adds name to array
        $data_missing[] = 'Concert Name';
    } else {
        // Trim white space from the name and store the name
        $name = trim($_POST['name']);
    }
    if(empty($_POST['date'])){
        // Adds name to array
        $data_missing[] = 'Concert Date';
    } else{
        // Trim white space from the name and store the name
        $date = trim($_POST['date']);
    }
    if(empty($data_missing)){
        
        require_once('../mysqlConnect.php');
        $stmt = mysqli_prepare($dbc, "DELETE FROM ConcertWorks WHERE workTitle = ? AND workComposer = ? AND concertName = ? AND concertDate = ?");
        mysqli_stmt_bind_param($stmt, 'ssss', $title, $composer, $name, $date);
        mysqli_stmt_execute($stmt);   

		
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Concert Work Pair Deleted';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/concertWorkDeleted.php" method="post">

<b>Enter a Work's Title and Composer, and a Concert's Name and Date</b>

<p>Work Title:
<input type="text" name="title" size="30" value="" />
</p>

<p>Composer:
<input type="text" name="composer" size="30" value="" />
</p>

<p>Concert Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Concert Date:
<input type="text" name="date" size="30" value="" />
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