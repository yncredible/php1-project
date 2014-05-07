<?php
	
	// Showing restaurants 
	include_once('classes/Restaurant.class.php');
	$restaurant = new Restaurant();
	$restaurantID = $_GET['id'];
	$restaurantList = $restaurant->getSpecificRestaurantfromOwner($restaurantID);

	// Showing menu per specific restaurant
	include_once('classes/Menu.class.php');
	$menu = new Menu();
	$menuList = $menu->getSpecificMenufromRestaurant($restaurantID);

	// Showing tables per specific restaurant
	include_once('classes/Table.class.php');
	$table = new Table();
	$tableList = $table->getSpecificTablesfromRestaurant($restaurantID);

	if(isset($_POST) && !empty($_POST)){
		include_once('classes/Reservation.class.php');
		$reservation = new Reservation();
		$reservation->reservationName = $_POST['reservation_name'];
		$reservation->reservationNumberpeople = $_POST['reservation_numberPeople'];
		$reservation->reservationDay = $_POST['reservation_day'];
		$reservation->reservationHour = $_POST['reservation_hour'];
		$reservation->reservationEmail = $_POST['reservation_email'];


	}
?><html>
<head>
	<title></title>
</head>

<body>
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
	<?php
		foreach ($menuList as $menus) {?> 

		<li> <?php echo $menus['menu_name'];?> </li>
		<li> <?php echo $menus['menu_description'];?> </li>
		<li> <?php echo $menus['menu_price'];?> </li>
		<li> <?php echo $menus['menu_category'];?> </li>
		
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
		<label for="reservationName">Name:</label>
		<input type="text" id="reservationName" name="reservation_name">
		<label for="reservationNumber">Number of people :</label>
		<input type="text" id="reservationNumber" name="reservation_numberPeople">
		<label for="reservationDay">Day :</label>
		<input type="text" id="reservationDay" name="reservation_day">
		<label for="reservationHour">Hour :</label>
		<input type="text" id="reservationHour" name="reservation_hour">
		<input type="checkbox" id="confirmReservation" name="confirm_reservation"><label for="confirmReservation">Send me a confirmation mail</label>
		<label for="reservationEmail" id="lblemail">Email</label>
		<input type="text" name="reservation_email" id="reservationEmail">
		<input type="submit" name="reservationSubmit" value="Make a reservation" display="none">

	</form>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/javascript.js"></script>
</body>
</html>