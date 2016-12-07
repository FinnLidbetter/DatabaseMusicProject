<title>Delete Concert Entry</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/concertDeleted.php" method="post">

<b>Input a Concert's Name and Date.</b>

<p>Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Date:
<input type="text" name="date" size="30" value="" />
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
