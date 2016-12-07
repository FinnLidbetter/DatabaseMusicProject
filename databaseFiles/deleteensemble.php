<title>Delete Ensemble Entry</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/ensembleDeleted.php" method="post">

<b>Input an Emsemble's ID, or all their info.</b>

<p>ID:
<input type="text" name="id" size="30" value="" />
</p>

<p>
<input type="submit" name="submitID" alt="SubmitID" value="Send" />
</p>

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
