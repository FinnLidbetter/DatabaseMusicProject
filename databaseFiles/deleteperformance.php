<html>
<head>
<title>Delete Performance Entry</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/performanceDeleted.php" method="post">

<b>Input a performance's ID, or all its info.</b>

<p>ID:
<input type="text" name="id" size="30" value="" />
</p>

<p>
<input type="submit" name="submitID" alt="SubmitID" value="Send" />
</p>

<p>Performance Title:
<input type="text" name="performanceTitle" size="30" value="" />
</p>

<p>Sponsor:
<input type="text" name="sponsor" size="30" value="" />
</p>

<p>Image File Path:
<input type="text" name="imageFilePath" size="30" value="" />
</p>

<p>Recording File Path:
<input type="text" name="recordingFilePath" size="30" value="" />
</p>

<p>Concert Name:
<input type="text" name="concertName" size="30" value="" />
</p>

<p>Concert Date:
<input type="text" name="concertDate" size="30" value="" />
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
