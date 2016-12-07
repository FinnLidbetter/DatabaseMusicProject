<title>Delete Institution Entry</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/institutionDeleted.php" method="post">

<b>Input an Institution's Name and Country.</b>

<p>Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Country:
<input type="text" name="country" size="30" value="" />
</p>

<p>
<input type="submit" name="submitInfo" alt="SubmitInfo" value="Send" />
</p>

<p>
<a href="../homepage.php">Back</a>
</p>

</form>
</body>
</html>
