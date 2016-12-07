<html>
<head>
<title>Add Musical Work and Concert</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/concertWorkAdded.php" method="post">

<b>Add a the info for a work, the concert it was performed in, and the corresponding performance ID</b>

<p>Work Title:
<input type="text" name="workTitle" size="30" value="" />
</p>

<p>Composer:
<input type="text" name="composer" size="30" value="" />
</p>

<p>Concert Name:
<input type="text" name="conName" size="30" value="" />
</p>

<p>Concert Date:
<input type="text" name="date" size="30" value="" />
</p>

<p>Performance ID:
<input type="text" name="perfID" size="30" value="" />
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
