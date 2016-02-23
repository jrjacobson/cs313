<?php session_start();
require "password.php";
?>
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
        <p>If you don't have a user name and password create a new user</p>
      </div>
    </div>
      <?php
      if(isset($_POST['email']))
      {
          require "dbObject.php";
          $email = $_POST['email'];
          $pass = $_POST['psw'];
          $sql = "SELECT * FROM user WHERE userEmail ='".$email."'";
          foreach($db->query($sql) as $row)
          {
              if(password_verify($pass, $row['password']))
              {
                  $_SESSION["userEmail"] = $email;
                  $_SESSION["userId"] = $row['id'];
                  header("Location:workoutLogbook.php");
              }
              else{
                  echo '<p>Invalid user email or password</p>';
              }
          }
      }
      ?>
    <div class="white">
      <form id = "userLogin" action = "workoutLog.php" method = "POST">
        User email:<input type="email" name="email" placeholder="something@whatever.com"><br>
        User password:<input type="password" name="psw"><br>
        <input type="submit" value = "Log In">
        <a href="newUser.php">New User</a>
      </form>
    </div>
  </div>
</body>
</html>
