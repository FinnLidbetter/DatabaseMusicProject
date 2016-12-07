<html>
<head>
<title>Update Concert</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/concertUpdated.php" method="post">

<b>Update Concert: Enter the Concert's Current Name and Date, Then Its New Info</b>

<p>Current Name:
<input type="text" name="curName" size="30" value="" />
</p>

<p>Current Date:
<input type="text" name="curDate" size="30" value="" />
</p>

<p>New Name:
<input type="text" name="newName" size="30" value="" />
</p>

<p>New Date:
<input type="text" name="newDate" size="30" value="" />
</p>

<p>New Venue:
<input type="text" name="newVenue" size="30" value="" />
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
