<?php 
	include_once('../classes/Restaurant.class.php');
	$restaurant = new Restaurant();

	$restaurantID = $_POST['id'];

	$restaurant->deleteRestaurant($restaurantID);

 ?>