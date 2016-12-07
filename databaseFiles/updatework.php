<html>
<head>
<title>Update Work</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/workUpdated.php" method="post">

<b>Update Person: Enter the Work's Current Title and Composer, Then Its New Info</b>

<p>Current Title:
<input type="text" name="curTitle" size="30" value="" />
</p>

<p>Current Composer:
<input type="text" name="curComposer" size="30" value="" />
</p>

<p>New Title:
<input type="text" name="newTitle" size="30" value="" />
</p>

<p>New Composer:
<input type="text" name="newComposer" size="30" value="" />
</p>

<p>New Year:
<input type="text" name="newYear" size="30" value="" />
</p>

<p>New File Path:
<input type="text" name="newFilePath" size="30" value="" />
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
