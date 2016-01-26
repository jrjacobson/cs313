<?php
$dbHost = '';
$dbPort = '';
$dbUser ='';
$dbPassword = '';
$dbName = 'php';

$dbHost = getenv["OPENSHIFT_MYSQL_DB_HOST"];
$dbPort = getenv["OPENSHIFT_MYSQL_DB_PORT"];
$dbUser =getenv["OPENSHIFT_MYSQL_DB_USERNAME"];
$dbPassword = getenv["OPENSHIFT_MYSQL_DB_PASSWORD"];

echo "host:$dbHost:$dbPort bpName:$dbName User:$dbUser";

$db = new PDD("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
?>
