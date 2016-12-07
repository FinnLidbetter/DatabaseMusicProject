<p>
<a href="../homepage.php">Back</a>
</p>

<?php

require_once('../config.php');

$query = "SELECT performanceID, personID, ensembleID, worksTitle, worksComposer, instrumentName, institutionName, institutionCountry, instructorID FROM KeyTable";

$response = @mysqli_query($dbc, $query);

if($response) {

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>performanceID</b></td>
<td align="left"><b>personID</b></td>
<td align="left"><b>ensembleID</b></td>
<td align="left"><b>worksTitle</b></td>
<td align="left"><b>worksComposer</b></td>
<td align="left"><b>instrumentName</b></td>
<td align="left"><b>institutionName</b></td>
<td align="left"><b>institutionCountry</b></td>
<td align="left"><b>instructorID</b></td></tr>';

while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['performanceID'] . '</td><td align="left">' . 
$row['personID'] . '</td><td align="left">' .
$row['ensembleID'] . '</td><td align="left">'.
$row['worksTitle'] . '</td><td align="left">'.
$row['worksComposer'] . '</td><td align="left">'.
$row['instrumentName'] . '</td><td align="left">'.
$row['institutionName'] . '</td><td align="left">'.
$row['institutionCountry'] . '</td><td align="left">'.
$row['instructorID'] . '</td><td align="left">';

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
