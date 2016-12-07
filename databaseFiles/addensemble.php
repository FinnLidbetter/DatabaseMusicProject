<html>
<head>
<title>Add Ensemble</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/ensembleadded.php" method="post">

<b>Add a New Ensemble</b>

<p>Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Date:
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
