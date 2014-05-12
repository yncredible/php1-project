<?php 

	session_start();

	if(!isset($_SESSION['ownerIdentity']))
	{
		header("location: login.php");
	}

	$restaurantID = $_GET['id'];

	include_once("classes/Menu.class.php");
 	$menu = new Menu();
 	//show restaurant menu
	$menuListBeverages = $menu->getBeverages($restaurantID);
	$menuListAlcohol = $menu->getAlcoholBeverages($restaurantID);
	$menuListAppetizer = $menu->getAppetizers($restaurantID);
	$menuListSoup = $menu->getSoups($restaurantID);
	$menuListSalads = $menu->getSalads($restaurantID);
	$menuListChicken = $menu->getChicken($restaurantID);
	$menuListPasta = $menu->getPasta($restaurantID);
	$menuListSeafood = $menu->getSeafood($restaurantID);
	$menuListRibsteak = $menu->getRibSteaks($restaurantID);
	$menuListBurgerSandwiches = $menu->getBurgerSandwiches($restaurantID);
	$menuListKidsMenu = $menu->getKidsMenu($restaurantID);
	$menuListDessert = $menu->getDesserts($restaurantID);


	//show owner restaurants
	include_once('classes/Restaurant.class.php');
	$restaurant = new Restaurant();
	$ownersRestaurants = $restaurant->getSpecificRestaurantfromOwner($restaurantID);
	
	//show restaurant tables
	include_once('classes/Table.class.php');
	$table = new Table();
	$tableList = $table->getSpecificTablesfromRestaurant($restaurantID);


	if(!empty($_POST['add_openinghours']))
	{
		include_once("classes/Openinghours.class.php");

		$openinghours = new Openinghours();
		$openinghours->MondayFrom = $_POST["monday_from"];
		$openinghours->MondayUntil = $_POST["monday_until"];
		$openinghours->TuesdayFrom = $_POST["tuesday_from"];
		$openinghours->TuesdayUntil = $_POST["tuesday_until"];
		$openinghours->WednesdayFrom = $_POST["wednesday_from"];
		$openinghours->WednesdayUntil = $_POST["wednesday_until"];
		$openinghours->ThursdayFrom = $_POST["thursday_from"];
		$openinghours->ThursdayUntil = $_POST["thursday_until"];
		$openinghours->FridayFrom = $_POST["friday_from"];
		$openinghours->FridayUntil = $_POST["friday_until"];
		$openinghours->SaturdayFrom = $_POST["saturday_from"];
		$openinghours->SaturdayUntil = $_POST["saturday_until"];
		$openinghours->SundayFrom = $_POST["sunday_from"];
		$openinghours->SundayUntil = $_POST["sunday_until"];
		$openinghours->Remarks = $_POST["remarks"];

		$openinghours->addOpeninghours($restaurantID);
	}


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
	<header>
		&nbsp;
	</header>
	
	<div class="jumbotron">
		<div class="container">
			<section id="userLog">
			<?php 

				if(isset($_SESSION['ownerIdentity'])) { ?>

					<ul class="nav nav-pills">
						<li><a class="btn btn-default" href="logout.php">Log Out</a></li>
					</ul>

				<?php } 

				else { ?>
				
					<ul class="nav nav-pills">
						<li><a class="btn btn-default" href="login.php">Log In</a></li>
					</ul>

				<?php }

			?>
			</section>

			<h2>OpenTable</h2>
			<h3 class="slogan">Going out to dinner was never so easy.</h3>

		</div>
	</div>
	
    <!-- Navigation -->
    <div class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">OpenTable</a>
        </div>
        <div class="navbar-collapse collapse">

			<?php 

			if(isset($_SESSION['ownerIdentity'])) { ?>

				<ul class="nav navbar-nav">
					<li><a href="index.php">All restaurants</a></li>
					<li><a href="myRestaurants.php">My restaurants</a></li>
				</ul>

			<?php } 

			else { ?>
			
				<ul class="nav navbar-nav">
					<li><a href="index.php">All restaurants</a></li>
				</ul>

			<?php }

			?> 

		</div><!--/.nav-collapse -->
      </div>
    </div>
    <!-- End Navigation -->


	<div class="container">
		<div id="menuView">
			<div class="row">
				<div class="col-sm-12">

					<p><span class="label label-default">Add menu items</span></p>

					
					<form action='' method="post" role="form" class="form-inline">
						<div class="form-group">
							<label for="menu_name">Name</label>
							<input class="form-control" id="menu_name" type="text" name="menu_name" required>
						</div>
						<div class="form-group">
							<label for="menu_description">Description</label>
							<input class="form-control" type="text" id="menu_description" name="menu_description" required>
						</div>
						<div class="form-group">
							<label for="menu_price">Price</label>
							<input class="form-control" type="text" id="menu_price" name="menu_price" required>
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
						<input type="hidden" id="specificRestaurantMenu" value="<?php echo $restaurantID; ?>">
						<div class="form-group">
							<input class="btn btn-primary" type="submit" id='btnSubmit' name="add_menu" value="add">
						</div>
					</form>
				</div>
			</div>
				
				<div class="row">
					<div class="col-sm-12">
						<h3>Menu <span class="toggleMenu"><a href="#">(Hide / Show)</a></span></h3>

						<div class="menu">

						<?php if(isset($menuListBeverages) && !empty($menuListBeverages))
						{ ?>
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

									<tbody id="beveragesList">
										<?php 
											foreach ($menuListBeverages as $menuItem) 
											{
												?>

												<tr>
													<td><?php echo ucfirst($menuItem['menu_name']); ?></td>
													<td><?php echo ucfirst($menuItem['menu_description']); ?></td>
													<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
													<td><a href='#' class="deleteMenuItem" data-delete-menu-item="<?php echo $menuItem["menu_id"]; ?>">Delete</a></td>
												</tr>


											<?php } ?>
									</tbody>

								</table>
							</div>
						<?php } ?>


							<?php if(isset($menuListAlcohol) && !empty($menuListAlcohol))
							{ ?>
								<div>
									<h4><span class="label label-primary">Alcoholic Beverages</span></h4>
								
									<table class="table">
										<thead>
											<tr>
												<th>Name</th>
												<th>Description</th>
												<th>Price</th>
											</tr>
										</thead>

										<tbody id="alcoholList">
											<?php 
												foreach ($menuListAlcohol as $menuItem) 
												{
													?>

													<tr>
														<td><?php echo ucfirst($menuItem['menu_name']); ?></td>
														<td><?php echo ucfirst($menuItem['menu_description']); ?></td>
														<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
														<td><a href='#' class="deleteMenuItem" data-delete-menu-item="<?php echo $menuItem["menu_id"]; ?>">Delete</a></td>
													</tr>


												<?php } ?>
										</tbody>

									</table>
								</div>
							<?php } ?>


							<?php if(isset($menuListAppetizer) && !empty($menuListAppetizer))
							{ ?>
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

										<tbody id="appetizerList">
											<?php 
												foreach ($menuListAppetizer as $menuItem) 
												{
													?>

													<tr>
														<td><?php echo ucfirst($menuItem['menu_name']); ?></td>
														<td><?php echo ucfirst($menuItem['menu_description']); ?></td>
														<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
														<td><a href='#' class="deleteMenuItem" data-delete-menu-item="<?php echo $menuItem["menu_id"]; ?>">Delete</a></td>
													</tr>


												<?php } ?>
										</tbody>

									</table>
								</div>
							<?php } ?>

							<?php if(isset($menuListSoup) && !empty($menuListSoup))
							{ ?>
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

										<tbody id="soupList">
											<?php 
												foreach ($menuListSoup as $menuItem) 
												{
													?>

													<tr>
														<td><?php echo ucfirst($menuItem['menu_name']); ?></td>
														<td><?php echo ucfirst($menuItem['menu_description']); ?></td>
														<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
														<td><a href='#' class="deleteMenuItem" data-delete-menu-item="<?php echo $menuItem["menu_id"]; ?>">Delete</a></td>
													</tr>


												<?php } ?>
										</tbody>

									</table>
								</div>
							<?php } ?>

							<?php if(isset($menuListSalads) && !empty($menuListSalads))
							{ ?>
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

										<tbody id="saladList">
											<?php 
												foreach ($menuListSalads as $menuItem) 
												{
													?>

													<tr>
														<td><?php echo ucfirst($menuItem['menu_name']); ?></td>
														<td><?php echo ucfirst($menuItem['menu_description']); ?></td>
														<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
														<td><a href='#' class="deleteMenuItem" data-delete-menu-item="<?php echo $menuItem["menu_id"]; ?>">Delete</a></td>
													</tr>


												<?php } ?>
										</tbody>

									</table>
								</div>
							<?php } ?>

							<?php if(isset($menuListChicken) && !empty($menuListChicken))
							{ ?>
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

										<tbody id="chickenList">
											<?php 
												foreach ($menuListChicken as $menuItem) 
												{
													?>

													<tr>
														<td><?php echo ucfirst($menuItem['menu_name']); ?></td>
														<td><?php echo ucfirst($menuItem['menu_description']); ?></td>
														<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
														<td><a href='#' class="deleteMenuItem" data-delete-menu-item="<?php echo $menuItem["menu_id"]; ?>">Delete</a></td>
													</tr>


												<?php } ?>
										</tbody>

									</table>
								</div>
							<?php } ?>

							<?php if(isset($menuListPasta) && !empty($menuListPasta))
							{ ?>
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

										<tbody id="pastaList">
											<?php 
												foreach ($menuListPasta as $menuItem) 
												{
													?>

													<tr>
														<td><?php echo ucfirst($menuItem['menu_name']); ?></td>
														<td><?php echo ucfirst($menuItem['menu_description']); ?></td>
														<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
														<td><a href='#' class="deleteMenuItem" data-delete-menu-item="<?php echo $menuItem["menu_id"]; ?>">Delete</a></td>
													</tr>


												<?php } ?>
										</tbody>

									</table>
								</div>
							<?php } ?>

							<?php if(isset($menuListSeafood) && !empty($menuListSeafood))
							{ ?>
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

										<tbody id="seafoodList">
											<?php 
												foreach ($menuListSeafood as $menuItem) 
												{
													?>

													<tr>
														<td><?php echo ucfirst($menuItem['menu_name']); ?></td>
														<td><?php echo ucfirst($menuItem['menu_description']); ?></td>
														<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
														<td><a href='#' class="deleteMenuItem" data-delete-menu-item="<?php echo $menuItem["menu_id"]; ?>">Delete</a></td>
													</tr>


												<?php } ?>
										</tbody>

									</table>
								</div>
							<?php } ?>

							<?php if(isset($menuListRibsteak) && !empty($menuListRibsteak))
							{ ?>
								<div>
									<h4><span class="label label-primary">Ribsteaks</span></h4>
								
									<table class="table">
										<thead>
											<tr>
												<th>Name</th>
												<th>Description</th>
												<th>Price</th>
											</tr>
										</thead>

										<tbody id="ribsteakList">
											<?php 
												foreach ($menuListRibsteak as $menuItem) 
												{
													?>

													<tr>
														<td><?php echo ucfirst($menuItem['menu_name']); ?></td>
														<td><?php echo ucfirst($menuItem['menu_description']); ?></td>
														<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
														<td><a href='#' class="deleteMenuItem" data-delete-menu-item="<?php echo $menuItem["menu_id"]; ?>">Delete</a></td>
													</tr>


												<?php } ?>
										</tbody>

									</table>
								</div>
							<?php } ?>

							<?php if(isset($menuListBurgerSandwiches) && !empty($menuListBurgerSandwiches))
							{ ?>
								<div>
									<h4><span class="label label-primary">Burgers/Sandwiches</span></h4>
								
									<table class="table">
										<thead>
											<tr>
												<th>Name</th>
												<th>Description</th>
												<th>Price</th>
											</tr>
										</thead>

										<tbody id="burgerList">
											<?php 
												foreach ($menuListBurgerSandwiches as $menuItem) 
												{
													?>

													<tr>
														<td><?php echo ucfirst($menuItem['menu_name']); ?></td>
														<td><?php echo ucfirst($menuItem['menu_description']); ?></td>
														<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
														<td><a href='#' class="deleteMenuItem" data-delete-menu-item="<?php echo $menuItem["menu_id"]; ?>">Delete</a></td>
													</tr>


												<?php } ?>
										</tbody>

									</table>
								</div>
							<?php } ?>

							<?php if(isset($menuListKidsMenu) && !empty($menuListKidsMenu))
							{ ?>
								<div>
									<h4><span class="label label-primary">Kids menu</span></h4>
								
									<table class="table">
										<thead>
											<tr>
												<th>Name</th>
												<th>Description</th>
												<th>Price</th>
											</tr>
										</thead>

										<tbody id="kidsList">
											<?php 
												foreach ($menuListKidsMenu as $menuItem) 
												{
													?>

													<tr>
														<td><?php echo ucfirst($menuItem['menu_name']); ?></td>
														<td><?php echo ucfirst($menuItem['menu_description']); ?></td>
														<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
														<td><a href='#' class="deleteMenuItem" data-delete-menu-item="<?php echo $menuItem["menu_id"]; ?>">Delete</a></td>
													</tr>


												<?php } ?>
										</tbody>

									</table>
								</div>
							<?php } ?>

							<?php if(isset($menuListDessert) && !empty($menuListDessert))
							{ ?>
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

										<tbody id="dessertList">
											<?php 
												foreach ($menuListDessert as $menuItem) 
												{
													?>

													<tr>
														<td><?php echo ucfirst($menuItem['menu_name']); ?></td>
														<td><?php echo ucfirst($menuItem['menu_description']); ?></td>
														<td><?php echo "€ " . $menuItem['menu_price']; ?></td>
														<td><a href='#' class="deleteMenuItem" data-delete-menu-item="<?php echo $menuItem["menu_id"]; ?>">Delete</a></td>
													</tr>


												<?php } ?>
										</tbody>

									</table>
								</div>
							<?php } ?>

						
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
				<select class="form-control" id="tablePeople" name="table_people" required>
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
				<input type="hidden" id="specificRestaurantTable" value="<?php echo $restaurantID; ?>">
				<input class="btn btn-primary" type="submit" id="tableSave" name="table_add" value="Add table">
				</div>

			</form>
			</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<h3>Tables overview <span class="toggleTable"><a href="#">(Hide / Show)</a></span></h3>

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
						<tbody id="tableList">
							<?php 
								foreach($tableList as $tableItem)
								{ ?>
										
										<tr>
											<td><?php echo $tableItem['table_nr']; ?></td>
											<td><?php echo $tableItem['table_persons']; ?></td>
											<td><?php echo ucfirst($tableItem['table_description']); ?></td>
											<td class="tableStatusText"><?php echo ucfirst($tableItem['table_status']); ?></td>
											
											<td>
												<select class="form-control changeTableStatus" name="change_table_status" data-change-status-table="<?php echo $tableItem["table_id"]; ?>">
													<option value="" disabled selected>Change status</option>
													<option value="Free">Free</option>
													<option value="Reserved">Reserved</option>
													<option value="Occupied">Occupied</option>
												</select>
											</td>

											<td><a href='#' class="deleteTable" data-delete-table="<?php echo $tableItem["table_id"]; ?>">Delete</a></td>
										</tr>

								<?php }
							?>
						</tbody>
					</table>

					<!-- hier begint de openingsuren pagina -->
					
					
				</div>

				<hr>
					
				<div id="openingshoursview">
					<p><span class="label label-default">Add openingshours</span></p>
					<h3>Openingshours <span class="toggleHours"><a href="#">(Hide / Show)</a></span></h3>

					<div class="ohoursToggle">

				
					<form action="" method="post" role="form">
						<table class="table">
							<thead>
								<tr>
									<th>&nbsp;</th>
									<th>From</th>
									<th>Until</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><strong>Monday</strong></td>
									<td><input class="form-control" type="time" name="monday_from" id="monday_from"></td>
									<td><input class="form-control" type="time" name="monday_until" id="monday_until"></td>
								</tr>
								<tr>
									<td><strong>Tuesday</strong></td>
									<td><input class="form-control" type="time" name="tuesday_from" id="tuesday_from"></td>
									<td><input class="form-control" type="time" name="tuesday_until" id="tuesday_until"></td>
								</tr>
								<tr>
									<td><strong>Wednesday</strong></td>
									<td><input class="form-control" type="time" name="wednesday_from" id="wednesday_from"></td>
									<td><input class="form-control" type="time" name="wednesday_until" id="wednesday_until"></td>
								</tr>
								<tr>
									<td><strong>Thursday</strong></td>
									<td><input class="form-control" type="time" name="thursday_from" id="thursday_from"></td>
									<td><input class="form-control" type="time" name="thursday_until" id="thursday_until"></td>
								</tr>
								<tr>
									<td><strong>Friday</strong></td>
									<td><input class="form-control" type="time" name="friday_from" id="friday_from"></td>
									<td><input class="form-control" type="time" name="friday_until" id="friday_until"></td>
								</tr>
								<tr>
									<td><strong>Saturday</strong></td>
									<td><input class="form-control" type="time" name="saturday_from" id="saturday_from"></td>
									<td><input class="form-control" type="time" name="saturday_until" id="saturday_until"></td>
								</tr>
								<tr>
									<td><strong>Sunday</strong></td>
									<td><input class="form-control" type="time" name="sunday_from" id="sunday_from"></td>
									<td><input class="form-control" type="time" name="sunday_until" id="sunday_until"></td>
								</tr>
								<tr>
									<td><strong><span class="label label-primary">Remarks</span></strong></td>
									<td colspan="2"><input class="form-control" type="text" name="remarks" id="remarks"></td>
								</tr>
							</tbody>
						</table>

					<div class="form-group">
						<input class="btn btn-default" type="submit" value="Add Openinghours" name="add_openinghours" id="add_openinghours">
					</div>

					</form>
						</div>
							
						<!-- end openingshours-->

					</div>


				</div> 


			</div>
		</div>
	</div>
		
	<footer>
		Php project - Kimberly Gysbrecht Segers - Kristof Van Espen - Yannick Nijs - Jens Ivens
	</footer>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>