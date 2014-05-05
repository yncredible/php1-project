<?php
	session_start();
	
	if(!isset($_SESSION['ownerIdentity']))
 	{
 		header("location: login.php");
 	}
 	else
 	{
 		$ownerID = $_SESSION['ownerIdentity'];
 	}

	if(!empty($_POST))
	{
		include_once("classes/Restaurant.class.php");

		$restaurant = new Restaurant();
		$restaurant->nameRestaurant = $_POST["name_restaurant"];
		$restaurant->streetRestaurant = $_POST["street_restaurant"];
		$restaurant->numberRestaurant = $_POST["number_restaurant"];
		$restaurant->postalcodeRestaurant = $_POST["postalcode_restaurant"];
		$restaurant->cityRestaurant = $_POST["city_restaurant"];
		$restaurant->emailRestaurant = $_POST["email_restaurant"];
		$restaurant->websiteRestaurant = $_POST["website_restaurant"];

		$restaurant->addRestaurant($ownerID);

		if(isset($_SESSION['restaurantIdentity']))
		{
			$restaurantID = $_SESSION['restaurantIdentity'];
			session_write_close();
			header("location: managerestaurant.php?id=$restaurantID");
		}
	}

?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Add restaurants</title>
	</head>

	<body>
		<form method="post">
			<label>Name Restaurant</label>
			<input type="text" name="name_restaurant" id="name_restaurant"><br/>
			<label>Street </label>
			<input type="text" name="street_restaurant" id="street_restaurant"><br/>
			<label>Number</label>
			<input type="text" name="number_restaurant" id="number_restaurant"><br/>
			<label>Postalcode</label>
			<input type="text" name="postalcode_restaurant" id="postalcode_restaurant"><br/>
			<label>City</label>
			<input type="text" name="city_restaurant" id="city_restaurant"><br/>
			<label>Email</label>
			<input type="email" name="email_restaurant" id="email_restaurant"><br/>
			<label>Website</label>
			<input type="text" name="website_restaurant" id="website_restaurant"><br/>


			<input type="submit" value="Add restaurant" name="register_restaurant" id="register_restaurant">
		</form>
	</body>
</html>