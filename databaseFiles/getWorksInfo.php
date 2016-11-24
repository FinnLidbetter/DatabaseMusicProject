<?php
// Get a connection for the database
require_once('../mysqlConnect.php');

// Create a query for the database
$query = "SELECT WorksYear.title, WorksYear.composer, WorksYear.year, WorksFilePath.filePath FROM WorksYear, WorksFilePath WHERE 
WorksYear.title = WorksFilePath.title AND WorksYear.composer = WorksFilePath.composer";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>title</b></td>
<td align="left"><b>composer</b></td>
<td align="left"><b>year</b></td>
<td align="left"><b>filePath</b></td></tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['title'] . '</td><td align="left">' . 
$row['composer'] . '</td><td align="left">' .
$row['year'] . '</td><td align="left">' .
$row['filePath'] . '</td><td align="left">';

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