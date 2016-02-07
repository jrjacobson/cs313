<!DOCTYPE html>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- bootstrap theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- my theme -->
  <link rel="stylesheet" type="text/css" href="mystyle.css">

  <!-- lightbox -->
  <link href="dist/css/lightbox.css" rel="stylesheet">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <style>
  img.thumbnailSmall{
    width: 30px;
    height: 25px;
  }
  </style>
  <title>Workout Log</title>
</head>
<body>
  <div class="container">
    <div class="green navbar-nav space">
      <ul class="nav nav-pills" role="tablist">
        <li role="presentation"><a href="index.php">Home</a></li>
        <li role="presentation"><a href="assignments.php">Assignments</a></li>
        <li role="presentation" class="active"><a href="workoutLog.php">Training Log</a></li>
      </ul>
    </div>
    <div class = "jumbotron text-center">
      <div class="container">
        <h1>Welcome to The Tri-Training Log</h1>
        <p>Here you can see all of your logged workouts</p>
      </div>
    </div>
<?php require "displayLog.php"; // this should display my workout log?>
      <div class="white">
        <h4 class="center">Add a workout to you training log</h4>
        <form id = "logWorkout" action = "workoutLog.php" method = "POST">
          Sport:<select name="sport">
            <option value="1">Run</option>
            <option value="2">Bike</option>
            <option value="3">Swim</option>
          </select>
          Weather:<select name="weather">
            <option value="1">Sunny</option>
            <option value="2">Windy</option>
            <option value="3">Rainy</option>
            <option value="4">Cloudy</option>
            <option value="5">Snowy</option>
          </select>
          Tempreture:<select name="temp">
            <?php
            for($i = -20; $i < 111; $i++)
            {
              if($i != 60)
              {
              echo '<option value="'.$i.' + 21">'.$i.'</option>';
              }
              else
              {
                echo '<option value="'.$i.' + 21" selected>'.$i.'</option>';
              }
            }
            ?>
          </select>
          <br>
          Date:<input type="datetime-local" name="date">
          Distance:<input type="number" name="distance" min="1" max="300" placeholder="In miles">
          <br>
          Duration:<input type="number" name="duration" min="1" max="600" placeholder="In minutes">
          Journal:<input type="text" name="journal" placeholder="How did you feel">
          <br><input type="submit" value = "Log Workout">
        </form>
      </div>
    </div>
  </body>
</html>
