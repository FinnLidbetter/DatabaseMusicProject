<html>
<head>
<title>Delete Ensemble</title>
</head>
<body>
<?php

  include('../session.php');

  if(isset($_POST['submitID'])){
    
    $data_missing = array();
    
    if(empty($_POST['id'])){
        // Adds name to array
        $data_missing[] = 'ID';
    } else {
        // Trim white space from the name and store the name
        $id = trim($_POST['id']);
    }

    if(empty($data_missing)){
        
        #require_once('../mysqlConnect.php');
        $stmt = mysqli_prepare($dbc, "DELETE FROM Ensembles WHERE id = ?");
        $affected_rows = 0;
        if ($stmt) {
          mysqli_stmt_bind_param($stmt, 'd', $id);
          
          mysqli_stmt_execute($stmt);     
          $affected_rows = mysqli_stmt_affected_rows($stmt);
        }
        if($affected_rows == 1){         
            echo 'Ensemble Deleted';
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

elseif (isset($_POST['submitInfo'])){

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
    if(empty($data_missing)){
        
        require_once('../mysqlConnect.php');
        $stmt = mysqli_prepare($dbc, "DELETE FROM Ensembles WHERE name = ? AND date = ?");
        mysqli_stmt_bind_param($stmt, 'ss', $name, $date);
        
        mysqli_stmt_execute($stmt);     
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){         
            echo 'Ensemble Deleted';
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

<form action="http://localhost/DatabaseMusicProject/databaseFiles/ensembleDeleted.php" method="post">
    

<b>Input an Emsemble's ID, or all their info.</b>

<p>ID:
<input type="text" name="id" size="30" value="" />
</p>

<p>
<input type="submit" name="submitID" alt="SubmitID" value="Send" />
</p>

<p>Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Date:
<input type="text" name="MTAStartDate" size="30" value="" />
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
