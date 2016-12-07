<html>
<head>
<title>Add a Student-Instructor Relationship</title>
</head>
<body>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/instructorAdded.php" method="post">

<b>Add a Student-Instructor Relationship: Enter the Student's Info, Then the Instructor's Info</b>

<p>Student's Name:
<input type="text" name="studName" size="30" value="" />
</p>

<p>Student's MTA Start Date:
<input type="text" name="studStartDate" size="30" value="" />
</p>

<p>Student's MTA End Date:
<input type="text" name="studEndDate" size="30" value="" />
</p>

<p>Instructor's Name:
<input type="text" name="instName" size="30" value="" />
</p>

<p>Instructor's MTA Start Date:
<input type="text" name="instStartDate" size="30" value="" />
</p>

<p>Instructor's MTA End Date:
<input type="text" name="instEndDate" size="30" value="" />
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
