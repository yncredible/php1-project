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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<link rel="stylesheet" href="css/reset.css">
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

		<hr>
		
		<div id="menuView">
			<div class="row">
			<div class="col-sm-12">

			<p><span class="label label-default">Add menu items</span></p>

			
			<form action='' method="post" role="form" class="form-inline">
				<div class="form-group">
					<label for="menu_name">Name</label>
					<input class="form-control" id="menu_name" name="menu_name" />
				</div>
				<div class="form-group">
					<label for="menu_description">Description</label>
					<input class="form-control" id="menu_description" name="menu_description" />
				</div>
				<div class="form-group">
					<label for="menu_price">Price</label>
					<input class="form-control" id="menu_price" name="menu_price" />
				</div>
				<div class="form-group">
					<label for="menu_category">Category</label>
					<select class="form-control" id="menu_category" name="menu_category">
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
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" id='btnSubmit' name="add_menu" value="add">
				</div>
			</form>
			</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<h3>Menu <span class="toggleMenu"><a href="#">(Hide)</a></span></h3>

					<div class="menu">
					<div>
					<h4><span class="label label-primary">Beverages</span></h4>
					
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($menuList as $menuItem) 
								{
									if($menuItem['menu_category'] == "beverages")
									{ ?>

										<tr>
											<td><?php echo $menuItem['menu_name']; ?></td>
											<td><?php echo $menuItem['menu_description']; ?></td>
											<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
										</tr>


									<?php }
								}
							?>
						</tbody>
					</table>

					</div>

					<div>
					<h4><span class="label label-primary">Burger/Sandwiches</span></h4>
					
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($menuList as $menuItem) 
								{
									if($menuItem['menu_category'] == "burgerSandwiches")
									{ ?>

										<tr>
											<td><?php echo $menuItem['menu_name']; ?></td>
											<td><?php echo $menuItem['menu_description']; ?></td>
											<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
										</tr>


									<?php }
								}
							?>
						</tbody>
					</table>
					
					</div>

					<div>
					<h4><span class="label label-primary">Alcoholic beverages</span></h4>
					
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($menuList as $menuItem) 
								{
									if($menuItem['menu_category'] == "alcoholBeverages")
									{ ?>

										<tr>
											<td><?php echo $menuItem['menu_name']; ?></td>
											<td><?php echo $menuItem['menu_description']; ?></td>
											<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
										</tr>


									<?php }
								}
							?>
						</tbody>
					</table>
					
					</div>

					<div>
					<h4><span class="label label-primary">Appetizers</span></h4>
					
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($menuList as $menuItem) 
								{
									if($menuItem['menu_category'] == "appetizers")
									{ ?>

										<tr>
											<td><?php echo $menuItem['menu_name']; ?></td>
											<td><?php echo $menuItem['menu_description']; ?></td>
											<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
										</tr>


									<?php }
								}
							?>
						</tbody>
					</table>
					
					</div>

					<div>
					<h4><span class="label label-primary">Soups</span></h4>
					
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($menuList as $menuItem) 
								{
									if($menuItem['menu_category'] == "soups")
									{ ?>

										<tr>
											<td><?php echo $menuItem['menu_name']; ?></td>
											<td><?php echo $menuItem['menu_description']; ?></td>
											<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
										</tr>


									<?php }
								}
							?>
						</tbody>
					</table>
					
					</div>

					<div>
					<h4><span class="label label-primary">Salads</span></h4>
					
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($menuList as $menuItem) 
								{
									if($menuItem['menu_category'] == "salads")
									{ ?>

										<tr>
											<td><?php echo $menuItem['menu_name']; ?></td>
											<td><?php echo $menuItem['menu_description']; ?></td>
											<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
										</tr>


									<?php }
								}
							?>
						</tbody>
					</table>
					
					</div>

					<div>
					<h4><span class="label label-primary">Chicken</span></h4>
					
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($menuList as $menuItem) 
								{
									if($menuItem['menu_category'] == "chicken")
									{ ?>

										<tr>
											<td><?php echo $menuItem['menu_name']; ?></td>
											<td><?php echo $menuItem['menu_description']; ?></td>
											<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
										</tr>


									<?php }
								}
							?>
						</tbody>
					</table>
					
					</div>

					<div>
					<h4><span class="label label-primary">Pasta</span></h4>
					
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($menuList as $menuItem) 
								{
									if($menuItem['menu_category'] == "pasta")
									{ ?>

										<tr>
											<td><?php echo $menuItem['menu_name']; ?></td>
											<td><?php echo $menuItem['menu_description']; ?></td>
											<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
										</tr>


									<?php }
								}
							?>
						</tbody>
					</table>
					
					</div>

					<div>
					<h4><span class="label label-primary">Seafood</span></h4>
					
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($menuList as $menuItem) 
								{
									if($menuItem['menu_category'] == "seafood")
									{ ?>

										<tr>
											<td><?php echo $menuItem['menu_name']; ?></td>
											<td><?php echo $menuItem['menu_description']; ?></td>
											<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
										</tr>


									<?php }
								}
							?>
						</tbody>
					</table>
					
					</div>

					<div>
					<h4><span class="label label-primary">Rib / Steaks</span></h4>
					
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($menuList as $menuItem) 
								{
									if($menuItem['menu_category'] == "ribSteaks")
									{ ?>

										<tr>
											<td><?php echo $menuItem['menu_name']; ?></td>
											<td><?php echo $menuItem['menu_description']; ?></td>
											<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
										</tr>


									<?php }
								}
							?>
						</tbody>
					</table>
					
					</div>

					<div>
					<h4><span class="label label-primary">Kids Menu</span></h4>
					
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($menuList as $menuItem) 
								{
									if($menuItem['menu_category'] == "kidsMenu")
									{ ?>

										<tr>
											<td><?php echo $menuItem['menu_name']; ?></td>
											<td><?php echo $menuItem['menu_description']; ?></td>
											<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
										</tr>


									<?php }
								}
							?>
						</tbody>
					</table>
					
					</div>

					<div>
					<h4><span class="label label-primary">Desserts</span></h4>
					
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($menuList as $menuItem) 
								{
									if($menuItem['menu_category'] == "desserts")
									{ ?>

										<tr>
											<td><?php echo $menuItem['menu_name']; ?></td>
											<td><?php echo $menuItem['menu_description']; ?></td>
											<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
										</tr>


									<?php }
								}
							?>
						</tbody>
					</table>
					
					</div>
				</div>
				</div>
			</div>


		</div>

		<hr>	

		<div id="tableView">
		<div class="row">
		<div class="col-sm-12">
		<p><span class="label label-default">Add table</span></p>
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

		<div class="row">
			<div class="col-sm-12">
				<h3>Tables overview <span class="toggleTable"><a href="#">(Hide)</a></span></h3>

				<div class="tableToggle">

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
		</div> 


		<hr>

		</div>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>