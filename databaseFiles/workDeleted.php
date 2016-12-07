<html>
<head>
<title>Delete Work</title>
</head>
<body>
<?php


if (isset($_POST['submit'])){

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
    if(empty($data_missing)){
        
        //require_once('../mysqlConnect.php');
        include('../session.php');
        $stmt = mysqli_prepare($dbc, "DELETE FROM WorksYear WHERE title = ? AND composer = ?");
        mysqli_stmt_bind_param($stmt, 'ss', $title, $composer);
        mysqli_stmt_execute($stmt);   
		
        $stmt = mysqli_prepare($dbc, "DELETE FROM WorksFilePath WHERE title = ? AND composer = ?");
        mysqli_stmt_bind_param($stmt, 'ss', $title, $composer);
        mysqli_stmt_execute($stmt);  

		
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Work Deleted';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/workDeleted.php" method="post">

<b>Enter a Work's Title and Composer</b>

<p>Title:
<input type="text" name="title" size="30" value="" />
</p>

<p>Composer:
<input type="text" name="composer" size="30" value="" />
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
