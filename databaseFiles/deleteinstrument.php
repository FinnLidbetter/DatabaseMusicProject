<title>Delete Instrument Entry</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/instrumentDeleted.php" method="post">

<b>Input an Instrument's Name.</b>

<p>Name:
<input type="text" name="name" size="30" value="" />
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
