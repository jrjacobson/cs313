<?php
    session_start();
    require "dbObject.php";
    $user = $_SESSION["userId"];
    $sport = $_POST["sport"];
    $weather = $_POST["weather"];
    $temp = $_POST["temp"] + 21;
    $date = $_POST["date"];
    $dist = $_POST["distance"] * $_POST["unit"];
    $dur = $_POST["duration"];
    $journal = $_POST["journal"];
    $sql = "INSERT INTO workout (userId, sportId, weatherId, tempId, date, distance, duration, journal) values (".$user.", ".$sport.", ".$weather.", ".$temp.", '".$date."', ".$dist.", ".$dur.", '".$journal."')";
    echo $sql;
    $db->exec($sql);
    header("Location:workoutLogbook.php");
?>

