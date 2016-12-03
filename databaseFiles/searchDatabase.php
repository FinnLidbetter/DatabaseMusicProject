<html>
<head>
<title> Search Database </title>
</head>
<body>

<p>
<a href="../databaseFiles/giveSearch.php">Back to search</a>
</p>

<?php

  $searchString = '';
  $tableName = '';
  $startDate = '';
  $endDate = '';

  if (isset($_POST['submit'])) {
    $searchString = $_POST['search'];
    $tableName = $_POST['tableChoice'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    
    $datePattern = '[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]';
    $whereStart = ereg($datePattern,$startDate,$regs);
    $whereEnd = ereg($datePattern,$endDate,$regs);
    
    $fromString = 'FROM ';
    $whereString = 'WHERE ';
    if ($tableName == 'Persons') {
      $fromString .= 'Persons INNER JOIN KeyTable ON Persons.id=KeyTable.personID';
      $whereString .= 'TRUE';
      if ($whereStart) {
        $whereString .= ' AND MTAEndDate>=\''.$startDate.'\'';
      }
      if ($whereEnd) {
        $whereString .= ' AND MTAStartDate<=\''.$endDate.'\'';
      }
    } else if ($tableName == 'Concerts') {
      $fromString .= 'Concerts NATURAL JOIN ConcertWorks';
      $whereString .= '1=1';
      if ($whereStart) {
        $whereString .= ' AND concertDate>=\''.$startDate.'\'';
      }
      if ($whereEnd) {
        $whereString .= ' AND concertDate<=\''.$endDate.'\'';
      }
    } else if ($tableName == 'Performances') {
      $fromString .= 'Performances INNER JOIN KeyTable ON Performances.id=KeyTable.performanceID';
      $whereString .= '1=1';
      if ($whereStart) {
        $whereString .= ' AND concertDate>=\''.$startDate.'\'';
      }
      if ($whereEnd) {
        $whereString .= ' AND concertDate<=\''.$endDate.'\'';
      }
    } else if ($tableName == 'Ensembles') {
      $fromString .= 'Ensembles INNER JOIN KeyTable ON Ensembles.id=KeyTable.ensembleID';
      $whereString .= '1=1';
      if ($whereStart) {
        $whereString .= ' AND date>=\''.$startDate.'\'';
      }
      if ($whereEnd) {
        $whereString .= ' AND date<=\''.$endDate.'\'';
      }
    } else if ($tableName == 'Institutions') {
      $fromString .= 'Institutions INNER JOIN KeyTable ON (Institutions.name=KeyTable.institutionName AND Institutions.country=KeyTable.institutionCountry)';
      $whereString .= '1=1';
    } else if ($tableName == 'ConcertWorks') {
      $fromString .= 'ConcertWorks INNER JOIN (WorksYear NATURAL JOIN WorksFilePath) ON (ConcertWorks.workTitle=title AND ConcertWorks.workComposer=composer)';
      $whereString .= '1=1';
      if ($whereStart) {
        $whereString .= ' AND (concertDate>=\''.$startDate.'\'' . 'OR year>='.substr($startDate,0,4) . ')';
      }
      if ($whereEnd) {
        $whereString .= ' AND (concertDate<=\''.$endDate.'\'' . 'OR year<='.substr($endDate,0,4) . ')';
      }

    } else if ($tableName == 'EnsembleMembers') {
      $fromString .= 'EnsembleMembers';
      $whereString .= '1=1';
      if ($whereStart) {
        $whereString .= ' AND date>=\''.$startDate.'\'';
      }
      if ($whereEnd) {
        $whereString .= ' AND date<=\''.$endDate.'\'';
      }
    } else if ($tableName == 'MtaAttendees') {
      $fromString .= 'MtaAttendees';
      $whereString .= '1=1';
      if ($whereStart) {
        $whereString .= ' AND MTAEndDate>=\''.$startDate.'\'';
      }
      if ($whereEnd) {
        $whereString .= ' AND MTAStartDate<=\''.$endDate.'\'';
      }
    } else if ($tableName == 'Students') {
      $fromString .= 'Students';  
      $whereString .= '1=1';
    }

    

    // Get a connection for the database
    require_once('../mysqlConnect.php');
    
    $queryForWhere = 'SELECT * ' . $fromString . ' ' . $whereString . ';';
    $response1 = @mysqli_query($dbc, $queryForWhere);
    if ($response1) {
      $fieldsForRegex = mysqli_fetch_fields($response1);
      $whereString .= ' AND (';
      foreach($fieldsForRegex as $value) {
        $whereString .= $value->name . ' LIKE \'%' . $searchString . '%\' OR ';
      }
      $whereString .= 'FALSE)';
      $realQuery = 'SELECT * ' . $fromString . ' ' . $whereString . ';';

      $response2 = @mysqli_query($dbc, $realQuery);

      if ($response2) {
        $fields = mysqli_fetch_fields($response2);
        $table_heading = '<table align="left" cellspacing="5" cellpadding="8"><tr>';
        foreach ($fields as $value) {
          $table_heading = $table_heading . '<td align="left"><b>' . $value->name . '</b></td>';
        }
        $table_heading = $table_heading . '</tr>';

        echo $table_heading;

        // mysqli_fetch_array will return a row of data from the query
        // until no further data is available
        while($row = mysqli_fetch_assoc($response2)){
          $row_contents = '<tr>';
          foreach ($row as $entry) {
            $row_contents = $row_contents . '<td align="left">' . $entry . '</td>';
          }
          $row_contents = $row_contents . '</tr>';
          echo $row_contents;
        }

        echo '</table>';

      } else {
        echo "Couldn't issue database query<br />";
        echo mysqli_error($dbc);
      }
    } else {
      echo "Couldn't issue database query<br />";
      echo mysqli_error($dbc);
    }
    mysqli_close($dbc);
  }
?>


</form>
</body>
</html>
