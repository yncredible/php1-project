<?php
	
	// Showing restaurants 
	include_once('classes/Restaurant.class.php');
	$restaurant = new Restaurant();
	$restaurantID = $_GET['id'];
	$restaurantList = $restaurant->getSpecificRestaurantfromOwner($restaurantID);

	// Showing menu per specific restaurant
	include_once('classes/Menu.class.php');
	$menu = new Menu();
	// $menuList = $menu->getSpecificMenufromRestaurant($restaurantID);
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


	// Showing tables per specific restaurant
	include_once('classes/Table.class.php');
	$table = new Table();
	$tableList = $table->getSpecificTablesfromRestaurant($restaurantID);

	//saving reservations
	if(isset($_POST) && !empty($_POST)){
		include_once('classes/Reservation.class.php');
		$reservation = new Reservation();
		$reservation->reservationName = $_POST['reservation_name'];
		$reservation->reservationNumberpeople = $_POST['reservation_numberPeople'];
		$reservation->reservationDay = $_POST['reservation_day'];
		$reservation->reservationHour = $_POST['reservation_hour'];
		$reservation->reservationEmail = $_POST['reservation_email'];

	$reservation->saveReservations($restaurantID);
	 // sending an email to restaurant

	$reservation->sendEmail($restaurantID);
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

<body id="detailResto">
	<div class="container">

	<div class="jumbotron">
		<?php 
			foreach ($restaurantList as $restaurants) { ?>
				<h2><?php echo ucfirst($restaurants['restaurant_name']); ?></h2>
			<?php }
		 ?>		
	</div>
	
	<div class="row">
		<div class="col-xs-6 restaurantPhoto">
			<!--<img src="#" alt="foto restuarant?">-->
			<h2>fotoke hier?</h2>
		</div>

		<div class="col-xs-6 restaurantAddress">
		<?php
			foreach ($restaurantList as $restaurants) {?>

			<address>
				<strong><?php echo $restaurants['restaurant_name'];?></strong><br>
				<?php echo $restaurants['restaurant_street']." ".$restaurants['restaurant_number'];?><br>
				<?php echo $restaurants['restaurant_postalCode']." ".$restaurants['restaurant_city'];?><br>
				<abbr title="Email">E: </abbr><a href="mailto:#"><?php echo $restaurants['restaurant_email'];?></a><br>
				<abbr title="Website">W: </abbr><a href="http://<?php echo $restaurants['restaurant_website'];?>"><?php echo $restaurants['restaurant_website'];?> </a>
			</address> 

		<?php } ?>
		</div>
	</div>

	<hr>	

			<div id="menuView">
				<div class="row">
					<div class="col-sm-12">
						<h3>Menu <span class="toggleMenu"><a href="#">(Hide)</a></span></h3>

						<div class="menu">

						<?php if(isset($menuListBeverages) && !empty($menuListBeverages))
						{ ?>
							<div>
								<h4><span class="label label-primary">Beverages</span></h4>
							
								<table class="table table-condensed">
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
								
									<table class="table table-condensed">
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
								
									<table class="table table-condensed">
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
								
									<table class="table table-condensed">
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
								
									<table class="table table-condensed">
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
								
									<table class="table table-condensed">
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
								
									<table class="table table-condensed">
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
								
									<table class="table table-condensed">
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
								
									<table class="table table-condensed">
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
								
									<table class="table table-condensed">
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
								
									<table class="table table-condensed">
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
								
									<table class="table table-condensed">
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
						<tbody id="tableList">
							<?php 
								foreach($tableList as $tableItem)
								{ ?>
										
										<tr>
											<td><?php echo $tableItem['table_nr']; ?></td>
											<td><?php echo $tableItem['table_persons']; ?></td>
											<td><?php echo ucfirst($tableItem['table_description']); ?></td>
											<td class="tableStatusText"><?php echo ucfirst($tableItem['table_status']); ?></td>
											

										</tr>

								<?php }
							?>
						</tbody>
					</table>

					</div>
					
				</div>
			</div>


	

	<hr>

	<div class="row">
		<div class="col-md-12">
			<form action="#" method="post">
				<label for="reservationName" id="lblname">Name:</label>
				<input type="text" id="reservationName" name="reservation_name">
				<label for="reservationNumber" id="lblnumber">Number of people :</label>
				<input type="text" id="reservationNumber" name="reservation_numberPeople">
				<label for="reservationDay" id="lblday">Day :</label>
				<input type="text" id="reservationDay" name="reservation_day">
				<label for="reservationHour" id="lblhour">Hour :</label>
				<input type="text" id="reservationHour" name="reservation_hour">
				<input type="checkbox" id="reservationConfirmation" name="confirm_reservation"><label for="confirmReservation" id="lblconfirmation">Send me a confirmation mail</label>
				<label for="reservationEmail" id="lblemail">Email</label>
				<input type="text" name="reservation_email" id="reservationEmail">
				<input type="submit" id="reservationSubmit" name="reservation_submit" value="Make a reservation">
				<input type="button"  id="reservate" value="Reservate">
			</form>
		</div>
	</div>
	

	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
	<script href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"></script>
	<script type="text/javascript" src="js/script.js"></script>

	<!-- ik zet dit hier, als ik het in script.js zet, doet em niks, oplossing komt nog -->
	<script type="text/javascript">
               $(document).ready(function(){
                     
                 $("#reservationDay").datepicker();
               });
    </script>

    </div>
</body>
</html>