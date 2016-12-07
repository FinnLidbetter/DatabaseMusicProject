<html>
<head>
<title>Delete Concert Work</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/concertWorkDeleted.php" method="post">

<b>Enter a Work's Title and Composer, and a Concert's Name and Date</b>

<p>Work Title:
<input type="text" name="title" size="30" value="" />
</p>

<p>Composer:
<input type="text" name="composer" size="30" value="" />
</p>

<p>Concert Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Concert Date:
<input type="text" name="date" size="30" value="" />
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
