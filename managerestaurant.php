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

	include_once('classes/Menu.class.php');
	$menu = new Menu();
	$menuList = $menu->getSpecificMenufromRestaurant($restaurantID);
	
	include_once('classes/Table.class.php');
	$table = new Table();
	$tableList = $table->getSpecificTablesfromRestaurant($restaurantID);
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
		 <h1>Menu</h1>
		 	 <h2>Beverages</h2>
			  <ul>
			  	<?php 
			  		foreach ($menuList as $menuItem) 
			  		{
			  			if($menuItem['menu_category'] == "beverages")
			  			{
			  				echo "<li>";
			  					echo $menuItem['menu_name'];
			  					echo $menuItem['menu_description'];
			  					echo $menuItem['menu_price'];
			  				echo "</li>";
			  			}
			  		}
			  	 ?>
			  </ul>


			  <h2>Burger/Sandwiches</h2>
			  <ul>
			  	<?php 
			  		foreach ($menuList as $menuItem) 
			  		{
			  			if($menuItem['menu_category'] == "burgerSandwiches")
			  			{
			  				echo "<li>";
			  					echo $menuItem['menu_name'];
			  					echo $menuItem['menu_description'];
			  					echo $menuItem['menu_price'];
			  				echo "</li>";
			  			}
			  		}
			  	 ?>
			  </ul>
		 	 <a href="addMenu.php?id=<?php echo $restaurantID; ?>">Manage menu</a>
		 </div>

		<div id="tables">
		 	<h1>Tables</h1>
		 	<ul>
				<?php 
					foreach ($tableList as $tableItem) 
					{
						echo "<li>";
							echo $tableItem['table_nr'];
							echo $tableItem['table_persons'];
							echo $tableItem['table_description'];
							echo $tableItem['table_status'];
						echo "</li>";
					}
				 ?>
			</ul>
		 	 <a href="addTable.php?id=<?php echo $restaurantID; ?>">Manage tables</a>
		 </div>


	</body>
</html>