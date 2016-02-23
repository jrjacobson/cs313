<?php
    session_start();
    require "dbObject.php";
    /*
    for($i = -20; $i < 111; $i++)
    {
        $sql = "INSERT INTO temp (temp) values ($i)";
        $db->exec($sql);
    }
    $sql = "INSERT INTO sport (title) values ('Run')";
    $sql += "INSERT INTO sport (title) values ('Bike')";
    $sql += "INSERT INTO sport (title) values ('Swim')";
    $sql += "INSERT INTO weather (title) values ('Sunny')";
    $sql += "INSERT INTO weather (title) values ('Windy')";
    $sql += "INSERT INTO weather (title) values ('Rainy')";
    $sql += "INSERT INTO weather (title) values ('Cloudy')";
    $sql += "INSERT INTO weather (title) values ('Snowy')";
    $db->exec($sql);
    $sql = "INSERT INTO user (userEmail, displayName, password) values ('jrjacob@gmail.com', 'Jason Jacobson', 'hello')";
    $db->exec($sql);
    $sql = "INSERT INTO workout (userId, sportId, weatherId, tempId, date, distance, duration, journal) values (1, 1, 1, 35, '2016-02-02 13:43:00', 5, 40, 'I had a great run!')";
    $sql += "INSERT INTO workout (userId, sportId, weatherId, tempId, date, distance, duration, journal) values (1, 1, 1, 40, '2016-03-02 13:43:00', 6, 47, 'Another great run!')";
    $db->exec($sql);
    */
    $user = $_SESSION["userId"];
    $sport = $_POST["sport"];
    $weather = $_POST["weather"];
    $temp = $_POST["temp"] + 21;
    $date = $_POST["date"];
    $dist = $_POST["distance"] * $_POST["unit"];
    $dur = $_POST["duration"];
    $journal = $_POST["journal"];
    $sql = "INSERT INTO workout (userId, sportId, weatherId, tempId, date, distance, duration, journal) values (".$user.", ".$sport.", ".$weather.", ".$temp.", '".$date."', ".$dist.", ".$dur.", '".$journal."')";
    $db->exec($sql);
    header("Location:workoutLogbook.php");
?>