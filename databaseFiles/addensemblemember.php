<html>
<head>
<title>Add a Person-Ensemble Relationship</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/ensembleMemberAdded.php" method="post">

<b>Add a relationship that shows a person is part of an ensemble: enter the person's info, then the ensemble's info, and finally the intstrument he/she plays.</b>

<p>Person's Name:
<input type="text" name="perName" size="30" value="" />
</p>

<p>Person's MTA Start Date:
<input type="text" name="startDate" size="30" value="" />
</p>

<p>Person's MTA End Date:
<input type="text" name="endDate" size="30" value="" />
</p>

<p>Ensemble's Name:
<input type="text" name="ensembleName" size="30" value="" />
</p>

<p>Ensemble's Date:
<input type="text" name="ensembleDate" size="30" value="" />
</p>

<p>Instrument's Name:
<input type="text" name="instName" size="30" value="" />
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
