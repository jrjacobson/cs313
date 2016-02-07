<?php require "dbObject.php";
    $MAX_WORKOUTS = 1000;
    $currentUserEmail = "jrjacob@gmail.com";
    $userName = "";
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
    echo '
    <table>
      <thead>
      <tr>
        <th>Sport</th>
        <th>Weather</th>
        <th>Tempreture</th>
        <th>Distance</th>
        <th>Duration</th>
        <th>Journal</th>
      </tr>
      </thead>
      <tbody>';
    for($i = 0; $i < $rowIndex; $i++)
    {
      echo '
        <tr>
          <td class="filterable-cell">'.$sport[$i].'</td>
          <td class="filterable-cell">'.$weather[$i].'</td>
          <td class="filterable-cell">'.$temp[$i].'</td>
          <td class="filterable-cell">'.$distance[$i].'</td>
          <td class="filterable-cell">'.$duration[$i].'</td>
          <td class="filterable-cell">'.$journal[$i].'</td>
        </tr>';
    }
    echo "</tbody>
    </table>";
?>
