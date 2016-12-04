<html>
<head>
<title>Add a Person-Institution Relationship</title>
</head>
<body>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/institutionMemberAdded.php" method="post">

<b>Add a relationship that shows a person attended a particular institution: enter the person's Info, then the institution's info</b>

<p>Person's Name:
<input type="text" name="perName" size="30" value="" />
</p>

<p>Person's MTA Start Date:
<input type="text" name="startDate" size="30" value="" />
</p>

<p>Person's MTA End Date:
<input type="text" name="endDate" size="30" value="" />
</p>

<p>Institution's Name:
<input type="text" name="instName" size="30" value="" />
</p>

<p>Institution's Country:
<input type="text" name="instCountry" size="30" value="" />
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