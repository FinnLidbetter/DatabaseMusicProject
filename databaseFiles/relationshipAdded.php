<html>
	<head>
		<title>Add Relation</title>
	</head>
<body>
<?php
//Connect to the database
require_once('../mysqlConnect.php');

//Build a list for the dropdown menu 
$options = '';
$ids = @mysqli_query($dbc, "SELECT id FROM Persons");
while($row = mysqli_fetch_array($ids)) {
	$options .= "<option>" . $row['id'] . "<option>";
}

if(isset($_POST['submit'])) {

	$data_missing = array();

	if(empty($_POST['performanceID'])){
		$data_missing[] = 'performanceID';
	} else {
		$performanceID = trim($_POST['performanceID']);
	}

	if(empty($_POST['personID'])){
		$data_missing[] = 'personID';
	} else {
		$personID = trim($_POST['personID']);
	}
	if(empty($_POST['ensembleID'])){
		$data_missing[] = 'ensembleID';
	} else {
		$ensembleID = trim($_POST['ensembleID']);
	}

	if(empty($_POST['worksTitle'])){
		$data_missing[] = 'worksTitle';
	} else {
		$worksTitle = trim($_POST['worksTitle']);
	}

	if(empty($_POST['worksComposer'])){
		$data_missing[] = 'worksComposer';
	} else {
		$worksComposer = trim($_POST['worksComposer']);
	}

	if(empty($_POST['instrumentName'])){
		$data_missing[] = 'instrumentName';
	} else {
		$instrumentName = trim($_POST['instrumentName']);
	}

	if(empty($_POST['institutionName'])){
		$data_missing[] = 'institutionName';
	} else {
		$institutionName = trim($_POST['institutionName']);
	}

	if(empty($_POST['institutionCountry'])){
		$data_missing[] = 'institutionCountry';
	} else {
		$institutionCountry = trim($_POST['institutionCountry']);
	}

	if(empty($_POST['instructorID'])){
		$data_missing[] = 'instructorID';
	} else {
		$instructorID = trim($_POST['instructorID']);
	}

	if(empty($data_missing)) {
		//do stuff

		$stmt = mysqli_prepare($dbc, "INSERT INTO KeyTable (performanceID, worksTitle, worksComposer, personID, ensembleID, instrumentName, institutionName, institutionCountry, instructorID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param($stmt, 'issiisssi', $performanceID, $worksTitle, 					$worksComposer,$personID, $ensembleID, 
								$instrumentName, $institutionName, 
								$institutionCountry, $instructorID);
	
		mysqli_stmt_execute($stmt);
		$affected_rows = mysqli_stmt_affected_rows($stmt);

		if($affected_rows == 1){         
            echo 'Relationship Entered';
            mysqli_stmt_close($stmt);         
            mysqli_close($dbc);
            
        } else {           
            echo 'Error Occurred<br />';
            echo mysqli_error();        
            mysqli_stmt_close($stmt);         
            mysqli_close($dbc);         
        }

	} else {
		echo 'you need to enter the following data<br />';

		foreach($data_missing as $missing){
			echo "$missing<br />";
		}
	}

}

?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/relationshipAdded.php" method="post">

	<b>Add a New Relationship</b>

	<p> performanceID
	<input type="text" name="performanceID" size="20" value=""/>
	</p>

	<p> personID
		<select name = "personID">  <?php echo $options?> <select/>
	</p>

	<p> ensembleID
	<input type="text" name="ensembleID" size="20" value=""/>
	</p>

	<p> worksTitle
	<input type="text" name="worksTitle" size="30" value=""/>
	</p>

	<p> worksComposer
	<input type="text" name="worksComposer" size="30" value=""/>
	</p>

	<p> instrumentName
	<input type="text" name="instrumentName" size="30" value=""/>
	</p>

	<p> institutionName
	<input type="text" name="institutionName" size="30" value=""/>
	</p>

	<p> institutionCountry
	<input type="text" name="institutionCountry" size="30" value=""/>
	</p>

	<p> instructorID
	<input type="text" name="instructorID" size="20" value=""/>
	</p>

	<p>
    <input type="submit" name="submit" value="Send" />
	</p>

	<p>
<a href="../homepage.php">Back</a>
</p>

</body>
</html>