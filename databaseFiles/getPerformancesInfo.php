<?php
// Get a connection for the database
require_once('../mysqlConnect.php');

// Create a query for the database
$query = "SELECT id, performanceTitle, sponsor, imageFilePath,
	recordingFilePath, concertName, concertDate FROM Performances";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>id</b></td>
<td align="left"><b>performanceTitle</b></td>
<td align="left"><b>sponsor</b></td>
<td align="left"><b>imageFilePath</b></td>
<td align="left"><b>recordingFilePath</b></td>
<td align="left"><b>concertName</b></td>
<td align="left"><b>concertDate</b></td></tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .
$row['id'] . '</td><td align="left">' . 
$row['performanceTitle'] . '</td><td align="left">' . 
$row['sponsor'] . '</td><td align="left">' .
$row['imageFilePath'] . '</td><td align="left">' .
$row['recordingFilePath'] . '</td><td align="left">' . 
$row['concertName'] . '</td><td align="left">' .
$row['concertDate'] . '</td><td align="left">';

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