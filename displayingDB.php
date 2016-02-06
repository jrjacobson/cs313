<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <?php
  try
  {
    $MAX_WORKOUTS = 1000;
    $user = 'jrjaco86';
    $password = 'help123';
    $server = "localhost";
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

    $db = new PDO('mysql:host=localhost;dbname=workoutlog', $user, $password);

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
     //$sql = "INSERT INTO user (userEmail, displayName, password) values ('jrjacob@gmail.com', 'Jason Jacobson', 'hello')";
     //$sql = "INSERT INTO workout (userId, sportId, weatherId, tempId, date, distance, duration, journal) values (1, 3, 1, 35, '2016-02-02 13:43:00', 5, 40, 'I had a great run!')";
     //$db->exec($sql);
     /*
     for($i = -20; $i < 111; $i++)
     {
       $sql = "INSERT INTO temp (temp) values ($i)";
       $db->exec($sql);
     }



     foreach ($db->query('SELECT displayName, userEmail, id FROM user') as $row)
     {
       echo '<br>'.$row['displayName'].' '.$row['userEmail'].'<br>';
       $rowid = $row['id'];
       foreach ($db->query("SELECT id, userId, sportId, weatherId, tempId, distance, duration, journal FROM workout WHERE userId ='". $rowid."'") as $workoutRow)
       {
         //join tables
         //SELECT * FROM wokout JOIN weather ON workout.weatherId = weather.id;

         echo '<br>'.'Miles: '.$workoutRow['distance'].'<br>Duration: '.$workoutRow['duration'].' minutes<br>';
       }
     }
     */


  }
  catch (PDOException $ex)
  {
     echo 'Error!: ' . $ex->getMessage();
     die();
  }
  ?>
</body>
</html>
