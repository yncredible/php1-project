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

<body>
	<div class="container">

	<h2>info restaurant</h2>
	<?php
		foreach ($restaurantList as $restaurants) {?> 

		<li> <?php echo $restaurants['restaurant_name'];?> </li>
		<li> <?php echo $restaurants['restaurant_street'];?> </li>
		<li> <?php echo $restaurants['restaurant_number'];?> </li>
		<li> <?php echo $restaurants['restaurant_postalCode'];?> </li>
		<li> <?php echo $restaurants['restaurant_city'];?> </li>
		<li> <?php echo $restaurants['restaurant_email'];?> </li>
		<li> <a href="http://<?php echo $restaurants['restaurant_website'];?>"><?php echo $restaurants['restaurant_website'];?> </a></li>

	<?php } ?>

	<h2>Menu lijst</h2>

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
								<td><?php echo ucfirst($menuItem['menu_price']); ?> €</td>
							</tr>


						<?php } ?>
				</tbody>

			</table>
		</div>
	<?php } ?>


	<h2>Tafels</h2>
	<?php
		foreach ($tableList as $tables) {?> 

		<li> <?php echo $tables['table_nr'];?> </li>
		<li> <?php echo $tables['table_persons'];?> </li>
		<li> <?php echo $tables['table_status'];?> </li>
		<li> <?php echo $tables['table_description'];?> </li>
		
	<?php } ?>
	
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