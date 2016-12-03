<html>
<head>
<title>Search Database</title>
</head>
<body>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/searchDatabase.php" method="post">

<b>Search Database</b>

<p>Search for:
  <input type="text" name="search" size="50" value="" />
</p>

<p> Choose a table to search in:
<select name="tableChoice">
  <option value="Persons"> People </option>
  <option value="Concerts"> Concerts </option>
  <option value="Performances"> Performances </option>
  <option value="Ensembles"> Ensembles </option>
  <option value="Institutions"> Institutions </option>
  <option value="ConcertWorks"> Works </option>
  <option value="EnsembleMembers"> Ensemble Members </option>
  <option value="MtaAttendees"> MtA Attendees </option>
  <option value="Students"> Students </option>
</select>
</p>

<p>Only include entries dated after: (YYYY-MM-DD)
  <input type="text" name="startDate" size="10" value="" />
</p>

<p>Only include entries dated before: (YYYY-MM-DD)
  <input type="text" name="endDate" size="10" value="" />
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
