<?php
try
{
   $user = 'jrjaco86';
   $password = 'help123';
   $server = "localhost";
   $db = new PDO('mysql:host=localhost;dbname=in_class', $user, $password);
   foreach ($db->query('SELECT book, chapter, verse, content FROM scripture') as $row)
   {
     echo '<br>'.$row['book'].' '.$row['chapter'].':'.$row['verse'].' - "'.$row['content'].'"'.'<br>';
   }
}
catch (PDOException $ex)
{
   echo 'Error!: ' . $ex->getMessage();
   die();
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

</body>
</html>
