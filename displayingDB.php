<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <?php
  try
  {
    //db login stuff
    $dbHost = "";
    $dbPort = "";
    $dbUser = "";
    $dbPassword = "";
    $dbName = "";

    $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

    if ($openShiftVar === null || $openShiftVar == "")
    {
      $dbHost = "localhost";
      $dbUser = "jrjaco86";
      $dbPassword = "help123";
      $dbName = "workoutlog";
    }
    else
    {
      $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
      $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
      $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
      $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    }
    $db = new PDO('mysql:host=dbHost:$dbPort;dbname=$dbName', $dbuser, $dbpassword);

    //working with the database
    $MAX_WORKOUTS = 1000;
    $currentUserEmail = "jrjacob@gmail.com";
    $userName;
    $sport[$MAX_WORKOUTS] = "";
    $temp[$MAX_WORKOUTS] = 0;
    $weather[$MAX_WORKOUTS] = "";
    $date[$MAX_WORKOUTS] = "";
    $distance[$MAX_WORKOUTS] = 0;
    $duration[$MAX_WORKOUTS] = 0;
    $journal[$MAX_WORKOUTS] = "";
    $rowIndex = 0;

    $queryString = "SELECT * FROM user JOIN workout ON user.id
    = workout.userId WHERE user.userEmail ='". $currentUserEmail."'";
    foreach ($db->query($queryString)as $row)
    {
      $userName = $row['displayName']; //sets userName to the one in the db
      $workoutSportId = $row['sportId'];
      $workoutTempId = $row['tempId'];
      $workoutWeatherId = $row['weatherId'];
      //Joining workout to weather, temp, and sport tables
      $querySport = "SELECT * FROM workout JOIN sport ON workout.sportId
      = sport.id WHERE workout.sportId ='".$workoutSportId."'";
      $queryWeather = "SELECT * FROM workout JOIN weather ON workout.weatherId
      = weather.id WHERE workout.weatherId ='".$workoutWeatherId."'";
      $queryTemp = "SELECT * FROM workout JOIN temp ON workout.tempId
      = temp.id WHERE workout.tempId ='".$workoutTempId."'";
      //pulling data from joined tables
      foreach($db->query($querySport) as $workoutRow)
      {
        $sport[$rowIndex] = $workoutRow['title'];
        //echo '<br>'.'Workout Type: '.$workoutRow['title'].'<br>';
      }
      foreach($db->query($queryTemp) as $tempRow)
      {
        $temp[$rowIndex] = $tempRow['temp'];
        //echo '<br>'.'Tempreture: '.$tempRow['temp'].'F<br>';
      }
      foreach($db->query($queryWeather) as $weatherRow)
      {
        $weather[$rowIndex] = $weatherRow['title'];
        //echo '<br>'.'Weather: '.$weatherRow['title'].'<br>';
      }
      $date[$rowIndex] = $row['date'];
      $distance[$rowIndex] = $row['distance'];
      $duration[$rowIndex] = $row['duration'];
      $journal[$rowIndex] = $row['journal'];
      $rowIndex++;
    }
    echo '<h2>'.$userName.'</h2>';
    echo '<table>
    <tr>
      <th>Sport</th>
      <th>Weather</th>
      <th>Tempreture</th>
      <th>Distance</th>
      <th>Duration</th>
      <th>Journal</th>
    </tr>';
    for($i = 0; $i < $rowIndex; $i++)
    {
      echo '<tr>
        <td>'.$sport[$i].'</td>
        <td>'.$weather[$i].'</td>
        <td>'.$temp[$i].'</td>
        <td>'.$distance[$i].'</td>
        <td>'.$duration[$i].'</td>
        <td>'.$journal[$i].'</td>
      </tr>';
    }
    echo "</table>";

    $sql = "INSERT INTO sport (title) values (Run)";
    $sql += "INSERT INTO sport (title) values (Bike)";
    $sql += "INSERT INTO sport (title) values (Swim)";
    $sql += "INSERT INTO Weather (title) values (Sunny)";
    $sql += "INSERT INTO Weather (title) values (Windy)";
    $sql += "INSERT INTO Weather (title) values (Rainy)";
    $sql += "INSERT INTO Weather (title) values (Cloudy)";
    $sql += "INSERT INTO Weather (title) values (Snowy)";
    $sql += "INSERT INTO user (userEmail, displayName, password) values ('jrjacob@gmail.com', 'Jason Jacobson', 'hello')";
    $sql += "INSERT INTO workout (userId, sportId, weatherId, tempId, date, distance, duration, journal) values (1, 1, 1, 35, '2016-02-02 13:43:00', 5, 40, 'I had a great run!')";
    $sql += "INSERT INTO workout (userId, sportId, weatherId, tempId, date, distance, duration, journal) values (1, 1, 1, 40, '2016-03-02 13:43:00', 6, 47, 'Another great run!')";
    $db->exec($sql);

    for($i = -20; $i < 111; $i++)
    {
      $sql = "INSERT INTO temp (temp) values ($i)";
      $db->exec($sql);
    }

  }
  catch (PDOException $ex)
  {
     echo 'Error!: ' . $ex->getMessage();
     die();
  }
  ?>
</body>
</html>
