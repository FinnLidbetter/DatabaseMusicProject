<html>
<head>
<title>Update Institution</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/institutionUpdated.php" method="post">

<b>Update Institution: Enter the Institution's Current Name and Country, Then Its New Info</b>

<p>Current Name:
<input type="text" name="curName" size="30" value="" />
</p>

<p>Current Country:
<input type="text" name="curCountry" size="30" value="" />
</p>

<p>New Name:
<input type="text" name="newName" size="30" value="" />
</p>

<p>New Country:
<input type="text" name="newCountry" size="30" value="" />
</p>

<p>New City:
<input type="text" name="newCity" size="30" value="" />
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
