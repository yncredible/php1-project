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

	$FreeTables = $table->getFreeTables($restaurantID);

	// getting openingshours from restaurant
	include_once('classes/Openinghours.class.php');
	$openinghour = new Openinghours();
	$openingshoursRestaurant = $openinghour->getOpeningHoursFromSpecificRestaurant($restaurantID);

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
	<title>OpenTable | Your restaurant</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body id="detailResto">
	<header>&nbsp;</header>

	<div class="jumbotron">
		<div class="container">
		<?php 
			foreach ($restaurantList as $restaurants) { ?>
				<h2><?php echo ucfirst($restaurants['restaurant_name']); ?></h2>
			<?php }
		 ?>
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

	<div class="row">
		<div class="col-xs-6 restaurantPhoto">
			<img id="restoPic" src="images/tpl.jpg" alt="tpl pic">
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

		<h3 class="callToAction"><a class="btn btn-primary" href="#reserveNow">Reserve a table now at <?php echo ucfirst($restaurants['restaurant_name']); ?> !</a></h3>

		</div>
	</div>

	<hr>	
	
	<div class="row">
	<div class="col-md-5">
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
</div>
	

	<div class="col-md-7">
	<div id="tableView">
			
			<h3>Tables overview <span class="toggleTable"><a href="#">(Hide)</a></span></h3>

			<div class="tableToggle">

			<table class="table table-condensed">
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
	
	<hr>

			<h2>Reserve a table now at <?php echo ucfirst($restaurants['restaurant_name']); ?>!</h2>

			<form action="#" method="post" role="form" >
				<div class="formgroup">
					<label for="reservationName" id="lblname">Name:</label>
					<input type="text" id="reservationName" name="reservation_name" required>
				</div>
				<div class='formgroup'>
					<label for="reservationNumber" id="lblnumber">Number of people :</label>
					<input type="text" id="reservationNumber" name="reservation_numberPeople" required>
				</div>
				<div class='formgroup'>
					<label for="reservationNumber" id="lblnumber">Select the table :</label>
					<select>
						<?php
						foreach ($FreeTables as $free) {?>
							<option value=' . <?php echo $free["table_nr"]; ?> .'><?php echo $free['table_description'] ."," .$free['table_status']; ?></option>
						<?php }

						?>
					</select>	
				</div>

				<div class="formgroup">
					<label for="reservationDay" id="lblday">Day :</label>
					<input type="date" id="reservationDay" name="reservation_day" required>
				</div>
				<div class="formgroup">
					<label for="reservationHour" id="lblhour">Hour :</label>
					<input type="time" id="reservationHour" name="reservation_hour" required>
				</div>
				<div class="formgroup">
					<input type="checkbox" id="reservationConfirmation" name="confirm_reservation"><label for="confirmReservation" id="lblconfirmation">Send me a confirmation mail</label>
					<label for="reservationEmail" id="lblemail">Email:</label>
					<input type="text" name="reservation_email" id="reservationEmail">
				</div>
				<div class="formgroup">
					<input type="submit" id="reservationSubmit" name="reservation_submit" class="btn btn-primary" value="Make a reservation">
				</div>
				<a name="reserveNow"></a>

			</form>
			<?php
				if (is_array($FreeTables)){
			
					foreach ($FreeTables as $free) {?>
						<p><?php echo $free['table_description']; ?></p>
									
					<?php }
								
				}

			?>
			</div>
		</div> <!-- /row -->
		<!-- begin openingshours-->
		<hr>
					<div id="openingshoursview">
						<p><span class="label label-default">Add openingshours</span></p>
						<h3>Openingshours <span class="ohoursToggle"><a href="#">(Hide)</a></span></h3>
					
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
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
													<?php echo date('h:i A', strtotime($opening['opening_monday_from'])); ?>
												<?php }
											?>
										</td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_monday_until'])); ?>
												<?php }
											?>
										</td>
									</tr>
									<tr>
										<td><strong>Tuesday</strong></td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_tuesday_from'])); ?>
												<?php }
											?>
										</td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_tuesday_until'])); ?>
												<?php }
											?>
									</td>
									</tr>
									<tr>
										<td><strong>Wednesday</strong></td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_wednesday_from'])); ?>
												<?php }
											?>
										</td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_wednesday_until'])); ?>
												<?php }
											?>
										</td>
									</tr>
									<tr>
										<td><strong>Thursday</strong></td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_thursday_from'])); ?>
												<?php }
											?>
										</td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_thursday_until'])); ?>
												<?php }
											?>
										</td>
									</tr>
									<tr>
										<td><strong>Friday</strong></td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_friday_from'])); ?>
												<?php }
											?>
										</td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_friday_until'])); ?>
												<?php }
											?>
										</td>
									</tr>
									<tr>
										<td><strong>Saturday</strong></td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_saturday_from'])); ?>
												<?php }
											?>
										</td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_saturday_until'])); ?>
												<?php }
											?>
										</td>
									</tr>
									<tr>
										<td><strong>Sunday</strong></td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_sunday_from'])); ?>
												<?php }
											?>
										</td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo date('h:i A', strtotime($opening['opening_sunday_until'])); ?>
												<?php }
											?>
										</td>
									</tr>
									<tr>
										<td><strong>Remarks</strong></td>
										<td>
											<?php 
												foreach ($openingshoursRestaurant as $opening) { ?>
												<?php echo $opening['opening_remarks']; ?>
												<?php }
											?>
										</td>
									</tr>
								</tbody>
							</table>

						</form>
					
		<!-- einde openingshours-->
    </div>



    <footer>
			Php project - Kimberly Gysbrecht Segers - Kristof Van Espen - Yannick Nijs - Jens Ivens
	</footer>

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
</body>
</html>