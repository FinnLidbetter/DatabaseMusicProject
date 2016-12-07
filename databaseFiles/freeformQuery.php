<html>
<head>
<title> Freeform SQL Query </title>
</head>
<body>
<?php
  
  include('../session.php');
  /*
  $usercheck = mysqli_query($dbc, 'SELECT USER()');
  $userRow = mysqli_fetch_assoc($usercheck);
  foreach ($userRow as $entry) {
    echo $entry;
  }
  */

  $query = '';

  if (isset($_POST['submit'])) {
    $query = $_POST['query'];
  

    // Get a connection for the database
    #require_once('../mysqlConnect.php');

    // Get a response from the database by sending the connection
    // and the query
    $response = @mysqli_query($dbc, $query);

    // If the query executed properly proceed
    if($response){
      
      echo 'Query executed successfully';
      if (strcasecmp(substr($query,0,6),'SELECT')==0) {

        $fields = mysqli_fetch_fields($response);
        $table_heading = '<table align="left" cellspacing="5" cellpadding="8"><tr>';
        foreach ($fields as $value) {
          $table_heading = $table_heading . '<td align="left"><b>' . $value->name . '</b></td>';
        }
        $table_heading = $table_heading . '</tr>';

        echo $table_heading;

        // mysqli_fetch_array will return a row of data from the query
        // until no further data is available
        while($row = mysqli_fetch_assoc($response)){
          $row_contents = '<tr>';
          foreach ($row as $entry) {
            $row_contents = $row_contents . '<td align="left">' . $entry . '</td>';
          }
          $row_contents = $row_contents . '</tr>';
          echo $row_contents;
        }

        echo '</table>';
      }
    } else {

      echo "Couldn't issue database query<br />";

      echo mysqli_error($dbc);

    }

    // Close connection to the database
    mysqli_close($dbc);
  }
?>
<form action="http://localhost/DatabaseMusicProject/databaseFiles/freeformQuery.php" method="post">

<b>Free form SQL Query</b>

<p>Query:
  <input type="text" name="query" size="200" value="" />
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
