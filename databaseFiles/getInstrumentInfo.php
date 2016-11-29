<p>
<a href="../homepage.php">Back</a>
</p>

<?php
// Get a connection for the database
require_once('../mysqlConnect.php');

// Create a query for the database
$query = "SELECT name, family FROM Instruments";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>name</b></td>
<td align="left"><b>family</b></td></tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['name'] . '</td><td align="left">' . 
$row['family'] . '</td><td align="left">';

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