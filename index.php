<?php 
	
	session_start();

	include_once('classes/Restaurant.class.php');

	//delete previous sessions
	if(isset($_SESSION['name']))
	{session_unset($_SESSION['name']);}

	if(isset($_SESSION['email']))
	{session_unset($_SESSION['email']);}

	if(isset($_SESSION['password']))
	{session_unset($_SESSION['password']);}

	$restaurant = new Restaurant();
	$allRestaurants = $restaurant->getAllRestaurants();
	$allRestaurants = $restaurant->search();


	if(isset($_SESSION['ownerIdentity']))
	{
		//$ownerNavigation = "<a href="">"
		echo "<a href='addNewRestaurant.php'>Add another restaurant</a>";
		echo "<a href='logout.php'>Log Out</a>";
	}


 ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>
		<form action="" method="post">
			<label for="zoek_gemeente">Zoek op gemeente</label><br/>
			<input type="input" name="zoek_gemeente" id="zoek_gemeente">

		</form>
	<ul>
	<?php
	
	while ($alleRestauranten = $allRestaurants->fetch_assoc())
		{
			//if($restaurant->m_sCityRestaurant == $searchCity){
			
			echo "<a href='#'><li class='opmaak'><p>" . $alleRestauranten['restaurant_city'] . "</p></li></a>";
			//}
		}
	
	
	?>
	</ul>
	</div>
</body>
</html>