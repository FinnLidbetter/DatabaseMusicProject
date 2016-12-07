<html>
<head>
<title>Add an Ensemble-Performance Relationship</title>
</head>
<body>
<?php
  include('../session.php');
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/ensemblePerformanceAdded.php" method="post">

<b>Add a relationship that shows an ensemble performed a performance: enter the ensemble's info, then the performance's info.</b>

<p>Ensemble's Name:
<input type="text" name="ensembleName" size="30" value="" />
</p>

<p>Ensemble's Date:
<input type="text" name="ensembleDate" size="30" value="" />
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
