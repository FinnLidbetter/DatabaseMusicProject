<html>
<head>
<title>Add a Work-Performance Relationship</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/workPerformedAdded.php" method="post">

<b>Add a relationship that shows a musical work was performed in a specific performance: enter the work's info, then the performance's info.</b>

<p>Work's Title:
<input type="text" name="workTitle" size="30" value="" />
</p>

<p>Work's Composer:
<input type="text" name="workComposer" size="30" value="" />
</p>

<p>Performance's Title:
<input type="text" name="performanceTitle" size="30" value="" />
</p>

<p>Concert's Name:
<input type="text" name="concertName" size="30" value="" />
</p>

<p>Concert's Date:
<input type="text" name="concertDate" size="30" value="" />
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
