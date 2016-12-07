<html>
<head>
<title>Update Performance</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/performanceUpdated.php" method="post">

<b>Update Performance: Enter the Performance's Current Info, Then Its New Info</b>

<p>Current Performance Title:
<input type="text" name="curPerfTitle" size="30" value="" />
</p>

<p>Current Concert Name:
<input type="text" name="curConName" size="30" value="" />
</p>

<p>Current Concert Date:
<input type="text" name="curConDate" size="30" value="" />
</p>

<p>New Performance Title:
<input type="text" name="newPerfTitle" size="30" value="" />
</p>

<p>New Sponsor:
<input type="text" name="sponsor" size="30" value="" />
</p>

<p>New Image File Path:
<input type="text" name="imageFilePath" size="30" value="" />
</p>

<p>New Recording File Path:
<input type="text" name="recordingFilePath" size="30" value="" />
</p>

<p>New Concert Name:
<input type="text" name="newConName" size="30" value="" />
</p>

<p>New Concert Date:
<input type="text" name="newConDate" size="30" value="" />
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
