<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>Log Confirmation</title>
</head>
<body>

<p>You input the following information.<br>
<?php
    echo 'Sport: '.$_POST["sport"].'<br>Weather: '.$_POST["weather"].'<br>Temperature: '.$_POST["temp"].'<br>';
    echo 'Date: '.$_POST["date"].'<br>Distance: '.$_POST["distance"].'<br>Duration: '.$_POST["duration"].'<br>';
    echo 'Journal: '.$_POST["journal"];
?>
</p>
    <?php
    require "dbObject.php";
    $user = $_SESSION["userId"];
    $sport = $_POST["sport"];
    $weather = $_POST["weather"] + 21;
    $temp = $_POST["temp"];
    $date = $_POST["date"];
    $dist = $_POST["distance"];
    $dur = $_POST["duration"];
    $journal = $_POST["journal"];
    $sql = "INSERT INTO workout (userId, sportId, weatherId, tempId, date, distance, duration, journal) values ('".$user."', '".$sport."', '".$weather."', '".$temp."', '".$date."', '".$journal."')";
    $db->exec($sql);

    //header("Location:workoutLogbook.php");
    ?>
<button><a href="workoutLogbook.php">Back to Log</a></button>
</body>
</html>

