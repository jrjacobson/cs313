<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
try
{
  $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

  if ($openShiftVar === null || $openShiftVar == "")
  {
    $dbHost = "localhost";
    $dbPort = "";
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
    $dbName = "php";
  }
  $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

  return $db;
}
catch (PDOException $ex)
{
   echo 'Error!: ' . $ex->getMessage();
   die();
}
/*
    $sql = "INSERT INTO sport (title) values ('Run')";
    $sql += "INSERT INTO sport (title) values ('Bike')";
    $sql += "INSERT INTO sport (title) values ('Swim')";
    $sql += "INSERT INTO weather (title) values ('Sunny')";
    $sql += "INSERT INTO weather (title) values ('Windy')";
    $sql += "INSERT INTO weather (title) values ('Rainy')";
    $sql += "INSERT INTO weather (title) values ('Cloudy')";
    $sql += "INSERT INTO weather (title) values ('Snowy')";
    $sql += "INSERT INTO user (userEmail, displayName, password) values ('jrjacob@gmail.com', 'Jason Jacobson', 'hello')";
    $sql += "INSERT INTO workout (userId, sportId, weatherId, tempId, date, distance, duration, journal) values (1, 1, 1, 35, '2016-02-02 13:43:00', 5, 40, 'I had a great run!')";
    $sql += "INSERT INTO workout (userId, sportId, weatherId, tempId, date, distance, duration, journal) values (1, 1, 1, 40, '2016-03-02 13:43:00', 6, 47, 'Another great run!')";
    $db->exec($sql);
    for($i = -20; $i < 111; $i++)
    {
      $sql = "INSERT INTO temp (temp) values ($i)";
      $db->exec($sql);
    }
*/
?>
