<html>
<head>
<title>Add Intrument</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/instrumentadded.php" method="post">

<b>Add a New Instrument</b>

<p>Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Family:
<input type="text" name="family" size="30" value="" />
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
