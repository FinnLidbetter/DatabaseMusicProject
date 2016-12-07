<p>
<a href="../homepage.php">Back</a>
</p>

<?php
  // Get a connection for the database
  require_once('../config.php');

  // Create a query for the database
<<<<<<< HEAD
  $query = "SELECT worksTitle, worksComposer, ensembleName, concertDate FROM ensembleWorksPlayed";
=======
  $query = "SELECT * FROM WorksPlayed";
>>>>>>> 27a2084de4cf1f7f5f937067d96ca0f46b53aaac

  // Get a response from the database by sending the connection
  // and the query
  $response = @mysqli_query($dbc, $query);

  // If the query executed properly proceed
  if($response){

    echo '<table align="left"
    cellspacing="5" cellpadding="8">

<<<<<<< HEAD
    <tr><td align="left"><b>Title</b></td>
    <td align="left"><b>Composer</b></td>
    <td align="left"><b>Performer Name</b></td>
    <td align="left"><b>Concert Date</b></td></tr>';
=======
    <tr><td align="left"><b>Work\'s Title</b></td>
    <td align="left"><b>Work\'s Composer</b></td>
    <td align="left"><b>Performance Title</b></td>
    <td align="left"><b>Performance Date</b></td>
    <td align="left"><b>Performer: Ensemble</b></td>
	<td align="left"><b>Performer: Soloist</b></td></tr>';

>>>>>>> 27a2084de4cf1f7f5f937067d96ca0f46b53aaac

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

      echo '<tr><td align="left">' . 
      $row['worksTitle'] . '</td><td align="left">' . 
      $row['worksComposer'] . '</td><td align="left">' .
<<<<<<< HEAD
=======
      $row['performanceTitle'] . '</td><td align="left">' .
      $row['concertDate'] . '</td><td align="left">' .
>>>>>>> 27a2084de4cf1f7f5f937067d96ca0f46b53aaac
      $row['ensembleName'] . '</td><td align="left">' .
      $row['soloistName'] . '</td><td align="left">';

      echo '</tr>';
    }

    echo '</table>';

  } else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

  }

  // Close connection to the database
  mysqli_close($dbc);

?>
