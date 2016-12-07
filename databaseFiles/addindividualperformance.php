<html>
<head>
<title>Add a Person-Performance Relationship</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/individualPerformanceAdded.php" method="post">

<b>Add a relationship that shows an individual performed a performance: enter the person's info, then the performance's info.</b>

<p>Person's Name:
<input type="text" name="perName" size="30" value="" />
</p>

<p>Person's MTA Start Date:
<input type="text" name="startDate" size="30" value="" />
</p>

<p>Person's MTA End Date:
<input type="text" name="endDate" size="30" value="" />
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
