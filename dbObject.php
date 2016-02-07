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
  ?>
