<html>
<head>
<title>Update Instrument</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/instrumentUpdated.php" method="post">

<b>Update Instrument: Enter the Instrument's Current Name, Then Its New Info</b>

<p>Current Name:
<input type="text" name="curName" size="30" value="" />
</p>

<p>New Name:
<input type="text" name="newName" size="30" value="" />
</p>

<p>New Family:
<input type="text" name="newFamily" size="30" value="" />
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
