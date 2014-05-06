<?php 
	session_start();

	if(!isset($_SESSION['ownerIdentity']))
	{
		header("location: login.php");
	}


	var_dump($_SESSION);

	include_once('classes/Restaurant.class.php');
	$restaurant = new Restaurant();
	$ownersRestaurants = $restaurant->getAllRestaurantsFromAnOwner($_SESSION['ownerIdentity']);

 ?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>

	<body>
		<a href="addRestaurant.php">Add a new restaurant</a>

		<ul>
			<?php 
				foreach ($ownersRestaurants as $Orestaurant) 
				{
					echo "<li>";
						echo "<a href='managerestaurant.php?id=". $Orestaurant["restaurant_id"] ."'>" . $Orestaurant['restaurant_name'] . "</a>";
						echo $Orestaurant['restaurant_city'];
					echo "</li>";
				}
			 ?>
		</ul>
	</body>
</html>