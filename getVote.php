<?php
session_start();

if(isset($_SESSION['voted']) && $_SESSION['voted'] == true){
	header("Location:vote.php");
	//window.location.href = "vote.php";
}
else{
	header("Location:getVote.php");
	//window.location.replace("getVote.php");
}

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

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script>
	document.getElementById("myForm").addEventListener("submit",onFormSubmit);
	function onFormSubmit(){
		<?php $_SESSION['voted'] = true;?>
	}
	</script>
	<title>php poll</title>
</head>
<body>

<div>
  <form id = "myForm" action = "vote.php" method = "POST">
    <h3>What pizza place do you like most?</h3>
    <input type="radio" name="restaurant" value="0">Dominoes<br>
    <input type="radio" name="restaurant" value="1">Pizza Hut<br>
    <input type="radio" name="restaurant" value="2">Papa John's<br>
    <input type="radio" name="restaurant" value="3">Little Caesars<br>
    <input type="radio" name="restaurant" value="4">Pizza Pie<br>

    <h3>What type of pizza crust do you prefer?</h3>
    <input type="radio" name="crust" value="0">Deep Dish<br>
    <input type="radio" name="crust" value="1">Normal<br>
    <input type="radio" name="crust" value="2">Thin<br>


    <h3>What pizza topping do you like most?</h3>
    <input type="radio" name="toppings" value="0">Pepperoni<br>
    <input type="radio" name="toppings" value="1">Sausage<br>
    <input type="radio" name="toppings" value="2">Peppers<br>
    <input type="radio" name="toppings" value="3">Olives<br>
    <input type="radio" name="toppings" value="4">Mushrooms<br>

    <h3>How do you prefer to dine when getting pizza? </h3>
    <input type="radio" name="dine" value="0">Take Out<br>
    <input type="radio" name="dine" value="1">Delivery<br>
    <input type="radio" name="dine" value="2">Dine In<br>
    <input type = "submit">
		<button href= "vote.php">Results</button>
  </form>

</div>

</body>
