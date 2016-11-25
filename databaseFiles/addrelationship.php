<!DOCTYPE html>
<html>
<head>
	<title>Add Student</title>
</head>
<body>

<form action="http://localhost/DatabaseMusicProject/databaseFiles/relationshipAdded.php" method="post">

	<b>Add a New Relationship</b>

	<p> performanceID
	<input type="text" name="performanceID" size="20" value=""/>
	</p>

	<p> personID
	<input type="text" name="personID" size="20" value=""/>
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

</body>
</html>