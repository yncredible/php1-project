<?php 

	session_start();

	if(!isset($_SESSION['ownerIdentity']))
	{
		header("location: login.php");
	}

	$restaurantID = $_GET['id'];

	include_once('classes/Restaurant.class.php');
	$restaurant = new Restaurant();
	$ownersRestaurants = $restaurant->getSpecificRestaurantfromOwner($restaurantID);
	
	//var_dump($ownersRestaurants);

 ?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>


	<body>
		<?php 
			foreach ($ownersRestaurants as $restaurant) 
			{
				echo $restaurant['restaurant_name'];
			}
		 ?>

		
		 <div id="menu">
		 	 <h1>Echo out Menu here too</h1>
		 	 <a href="addMenu.php?id=<?php echo $restaurantID; ?>">Manage menu</a>
		 </div>

		<div id="tables">
		 	 <h1>Echo out Tables here too</h1>
		 	 <a href="addTable.php?id=" <?php echo $restaurantID; ?>>Manage tables</a>
		 </div>


	</body>
</html>