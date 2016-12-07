<html>
<head>
<title>Update Person</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/personUpdated.php" method="post">

<b>Update Person: Enter the Person's Current Info, Then Its New Info</b>

<p>Current Name:
<input type="text" name="curName" size="30" value="" />
</p>

<p>Current MTA Start Date:
<input type="text" name="curStartDate" size="30" value="" />
</p>

<p>Current MTA End Date:
<input type="text" name="curEndDate" size="30" value="" />
</p>

<p>New Name:
<input type="text" name="newName" size="30" value="" />
</p>

<p>New MTA Start Date:
<input type="text" name="newStartDate" size="30" value="" />
</p>

<p>New MTA End Date:
<input type="text" name="newEndDate" size="30" value="" />
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
