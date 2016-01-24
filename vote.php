<!DOCTYPE html>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- bootstrap theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- my theme -->
  <link rel="stylesheet" type="text/css" href="mystyle.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <title>Voteing Results</title>
</head>
<body>
<?php
//get content of textfile
$filename = "result.txt";
$content = file($filename);

//put content in array
$array = explode(" ", $content[0]);
$dominoes = $array[0];
$pizzaHut = $array[1];
$papaJohn = $array[2];
$littleCeasars = $array[3];
$pizzaPie = $array[4];
$deepDish = $array[5];
$normalCrust = $array[6];
$thinCrust = $array[7];
$pepperoni = $array[8];
$sausage = $array[9];
$peppers = $array[10];
$olives = $array[11];
$mushrooms = $array[12];
$takeOut = $array[13];
$delivery = $array[14];
$dineIn = $array[15];

//restaurant
if ($_POST["restaurant"] == 0) {
    $dominoes = $dominoes + 1;
}
if ($_POST["restaurant"] == 1) {
    $pizzaHut = $pizzaHut + 1;
}
if ($_POST["restaurant"] == 2) {
    $papaJohn = $papaJohn + 1;
}
if ($_POST["restaurant"] == 3) {
    $littleCeasars = $littleCeasars + 1;
}
if ($_POST["restaurant"] == 4) {
    $pizzaPie = $pizzaPie + 1;
}

//crust type
if ($_POST["crust"] == 0) {
    $deepDish = $deepDish+ 1;
}
if ($_POST["crust"] == 1) {
    $normalCrust = $normalCrust + 1;
}
if ($_POST["crust"] == 2) {
    $thinCrust = $thinCrust + 1;
}

//topping
if ($_POST["toppings"] == 0) {
    $pepperoni = $pepperoni + 1;
}
if ($_POST["toppings"] == 1) {
    $sausage = $sausage + 1;
}
if ($_POST["toppings"] == 2) {
    $peppers = $peppers + 1;
}
if ($_POST["toppings"] == 3) {
    $olives = $olives + 1;
}
if ($_POST["toppings"] == 4) {
    $mushrooms = $mushrooms + 1;
}

//dine in or out
if ($_POST["dine"] == 0) {
    $takeOut = $takeOut + 1;
}
if ($_POST["dine"] == 1) {
    $delivery = $delivery + 1;
}
if ($_POST["dine"] == 2) {
    $dineIn = $dineIn + 1;
}


//insert votes to txt file
$insertvote = $dominoes." ".$pizzaHut." ".$papaJohn." ".$littleCeasars." ".
$pizzaPie." ".$deepDish." ".$normalCrust." ".$thinCrust." ".$pepperoni." ".
$sausage." ".$peppers." ".$olives." ".$mushrooms." ".$takeOut." ".$delivery.
" ".$dineIn;

$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<h2>Result:</h2>
<table>

  <tr>
    <th colspan="2">Favorite Restaurant&nbsp</th>
    <th colspan="2">Favorite Crust Type&nbsp</th>
    <th colspan="2">Favorite Topping&nbsp</th>
    <th colspan="2">Favorite Dinning Choice&nbsp</th>
  </tr>

  <tr>
    <td>Dominoes</td>
    <td>
      <?php
      //echo "$dominoes";
      echo (100*round($dominoes/($dominoes+$pizzaHut+$papaJohn+$littleCeasars+$pizzaPie),2));
      ?>%
    </td>
    <td>Deep Dish</td>
    <td>
      <?php
      echo (100*round($deepDish/($deepDish+$normalCrust+$thinCrust),2));
      ?>%
    </td>
    <td>Pepperoni</td>
    <td>
      <?php
      echo (100*round($pepperoni/($pepperoni+$peppers+$sausage+$olives+$mushrooms),2));
      ?>%
    </td>
    <td>Take Out</td>
    <td>
      <?php
      echo (100*round($takeOut/($takeOut+$delivery+$dineIn),2));
      ?>%
    </td>
  </tr>

  <tr>
    <td>Pizza Hut</td>
    <td>
      <?php
      //echo "$pizzaHut";
      echo (100*round($pizzaHut/($dominoes+$pizzaHut+$papaJohn+$littleCeasars+$pizzaPie),2));
      ?>%
    </td>
    <td>Normal</td>
    <td>
      <?php
      echo (100*round($normalCrust/($deepDish+$normalCrust+$thinCrust),2));
      ?>%
    </td>
    <td>Sausage</td>
    <td>
      <?php
      echo (100*round($sausage/($pepperoni+$peppers+$sausage+$olives+$mushrooms),2));
      ?>%
    </td>
    <td>Delivery</td>
    <td>
      <?php
      echo (100*round($delivery/($takeOut+$delivery+$dineIn),2));
      ?>%
    </td>
  </tr>

  <tr>
    <td>Papa Johns</td>
    <td>
      <?php
      //echo "$papaJohn";
      echo (100*round($papaJohn/($dominoes+$pizzaHut+$papaJohn+$littleCeasars+$pizzaPie),2));
      ?>%
    </td>
    <td>Thin</td>
    <td>
      <?php
      echo (100*round($thinCrust/($deepDish+$normalCrust+$thinCrust),2));
      ?>%
    </td>
    <td>Peppers</td>
    <td>
      <?php
      echo (100*round($peppers/($pepperoni+$peppers+$sausage+$olives+$mushrooms),2));
      ?>%
    </td>
    <td>Dine In</td>
    <td>
      <?php
      echo (100*round($dineIn/($takeOut+$delivery+$dineIn),2));
      ?>%
    </td>
  </tr>

  <tr>
    <td>Little Caesars</td>
    <td>
      <?php
      //echo "$littleCeasars";
      echo (100*round($littleCeasars/($dominoes+$pizzaHut+$papaJohn+$littleCeasars+$pizzaPie),2));
      ?>%
    </td>
    <td></td>
    <td></td>
    <td>Olives</td>
    <td>
      <?php
      echo (100*round($olives/($pepperoni+$peppers+$sausage+$olives+$mushrooms),2));
      ?>%
    </td>
    <td></td>
    <td></td>
  </tr>

  <tr>
    <td>Pizza Pie</td>
    <td>
      <?php
      //echo "$pizzaPie";
      echo (100*round($pizzaPie/($dominoes+$pizzaHut+$papaJohn+$littleCeasars+$pizzaPie),2));
      ?>%
    </td>
    <td></td>
    <td></td>
    <td>Mushrooms</td>
    <td>
      <?php
      echo (100*round($mushrooms/($pepperoni+$peppers+$sausage+$olives+$mushrooms),2));
      ?>%
    </td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
