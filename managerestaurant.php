<?php 

	session_start();

	if(!isset($_SESSION['ownerIdentity']))
	{
		header("location: login.php");
	}

	$restaurantID = $_GET['id'];

	include_once("classes/Menu.class.php");
 	$menu = new Menu();
	if(!empty($_POST['add_menu']))
	{
		//add a new menu item
		$menu->menuName = $_POST["menu_name"];
		$menu->menuDescription = $_POST["menu_description"];
		$menu->menuPrice = $_POST["menu_price"];
		$menu->menuCategory = $_POST["menu_category"];

		$menu->addMenu($restaurantID);
	}

	include_once('classes/Table.class.php');
	$table = new Table();
	if(!empty($_POST['table_add']))
	{
		//add a new table item
		$table->Number = $_POST['table_number'];
		$table->Persons = $_POST['table_people'];
		$table->Status = $_POST['table_status'];
		$table->Description = $_POST['table_description'];

		$table->addTable($restaurantID);
	}


	//show owner restaurants
	include_once('classes/Restaurant.class.php');
	$restaurant = new Restaurant();
	$ownersRestaurants = $restaurant->getSpecificRestaurantfromOwner($restaurantID);

	//show restaurant menu
	$menuList = $menu->getSpecificMenufromRestaurant($restaurantID);
	
	//show restaurant tables
	$tableList = $table->getSpecificTablesfromRestaurant($restaurantID);

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
		 </div>

		 <form action='#' method="post">
		    <label for="menu_name">Name</label>
		    <input id="menu_name" name="menu_name" />

		    <label for="menu_description">Description</label>
		    <input id="menu_description" name="menu_description" />

		    <label for="menu_price">Price</label>
		    <input id="menu_price" name="menu_price" />

			<label for="menu_category">Category</label>
			<select id="menu_category" name="menu_category">
					<option value="beverages">Beverages</option>
					<option value="alcoholBeverages">Alcoholic beverages</option>
					<option value="appetizers">Appetizers</option>
					<option value="soups">Soups</option>
					<option value="salads">Salads</option>
					<option value="chicken">Chicken</option>
					<option value="pasta">Pasta</option>
					<option value="seafood">Seafood</option>
					<option value="ribSteaks">Rib/Steaks</option>
					<option value="burgerSandwiches">Burger/Sandwiches</option>
					<option value="kidsMenu">Kids Menu</option>
					<option value="desserts">Desserts</option>
			</select>

	 		<button type="submit" id='btnSubmit' name="add_menu">Add!</button>
 		</form>

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
				
			</div>
		</div> 

		<div class="row">
		<div class="col-sm-12">

		<form action="" method="POST" role="form" class="form-inline">
			
			<div class="form-group">
			<label for="tableNumber">Table number</label>
			<select class="form-control" id="tableNumber" name="table_number">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
			</select>
			</div>

			<div class="form-group">
			<label for="tablePeople">Amount of people</label>
			<select class="form-control" id="tablePeople" name="table_people">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
			</div>

			<div class="form-group">
			<label for="tableDescription">Description</label>
   			<input class="form-control" id="tableDescription" name="table_description"/>
			</div>
   			
			<div class="form-group">
   			<label for="tableStatus">Status</label>
			<select class="form-control" id="tableStatus" name="table_status">
				<option value="Free">Free</option>
				<option value="Reserved">Reserved</option>
				<option value="Occupied">Occupied</option>
			</select>
			</div>
			
			<div class="form-group">
			<input class="btn btn-primary" type="submit" name="table_add" value="Add table">
			</div>

		</form>
		</div>
		</div>


		</div>
	</body>
</html>