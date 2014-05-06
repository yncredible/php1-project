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
		<title>OpenTable | Uw restaurant</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>


	<body>
		<div class="container">

		<div class="jumbotron">
			<?php 
				foreach ($ownersRestaurants as $restaurant) { ?>
					<h2>Manage <?php echo $restaurant['restaurant_name']; ?></h2>
				<?php }
			 ?>		
		</div>

		<nav>
			<ul class="nav nav-pills">
				<li><a href="index.php">Home</a></li>
				<li><a href="myRestaurants.php">My Restaurants</a></li>
			</ul>
		</nav>


		
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

		<div class="row">
			<div class="col-sm-12">
				<h2>Tables overview</h2>
				<table class="table">
					<thead>
						<tr>
							<th>Table nr.</th>
							<th>Persons</th>
							<th>Description</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($tableList as $tableItem){ ?>
									
									<tr>
										<td><?php echo $tableItem['table_nr']; ?></td>
										<td><?php echo $tableItem['table_persons']; ?></td>
										<td><?php echo $tableItem['table_description']; ?></td>
										<td><?php echo $tableItem['table_status']; ?></td>
									</tr>

							<?php }
						?>
					</tbody>
				</table>
				
				<p><a href="addTable.php?id=<?php echo $restaurantID; ?>">Manage tables</a></p>

			</div>
		</div> 

<!-- 		<div id="tables">
		 	<h1>Tables</h1>
		 	<ul>
				<?php 
					// foreach ($tableList as $tableItem) 
					// {
					// 	echo "<li>";
					// 		echo $tableItem['table_nr'];
					// 		echo $tableItem['table_persons'];
					// 		echo $tableItem['table_description'];
					// 		echo $tableItem['table_status'];
					// 	echo "</li>";
					// }
				 ?>
			</ul>
		 	 <a href="addTable.php?id=<?php echo $restaurantID; ?>">Manage tables</a>
		 </div>
 -->
		</div>
	</body>
</html>