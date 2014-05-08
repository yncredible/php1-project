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
	// var_dump($_SESSION);

?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>OpenTable | Add restaurant</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<div class="container">
			<div class="jumbotron">
				<h2>Add a new restaurant</h2>
			</div>

			<nav>
				<ul class="nav nav-pills">
					<li><a href="index.php">Home</a></li>
					<li><a href="myRestaurants.php">My Restaurants</a></li>
				</ul>
			</nav>
			
			<div class="row">
				<div class="col-sm-12">
					<h4>Add restaurant</h4>

					<form method="post" role="form">
						<div class="form-group">						
						<label for="name_restaurant">Name Restaurant</label>
						<input class="form-control" type="text" name="name_restaurant" id="name_restaurant">
						</div>

						<div class="form-group">	
						<label for="street_restaurant">Street </label>
						<input class="form-control" type="text" name="street_restaurant" id="street_restaurant">
						</div>

						<div class="form-group">
						<label for="number_restaurant">Number</label>
						<input class="form-control" type="text" name="number_restaurant" id="number_restaurant">
						</div>

						<div class="form-group">		
						<label for="postalcode_restaurant">Postal code</label>
						<input class="form-control" type="text" name="postalcode_restaurant" id="postalcode_restaurant">
						</div>

						<div class="form-group">	
						<label for="city_restaurant">City</label>
						<input class="form-control" type="text" name="city_restaurant" id="city_restaurant">
						</div>

						<div class="form-group">	
						<label for="email_restaurant">Email</label>
						<input class="form-control" type="email" name="email_restaurant" id="email_restaurant">
						</div>

						<div class="form-group">	
						<label for="website_restaurant">Website</label>
						<input class="form-control" type="text" name="website_restaurant" id="website_restaurant">
						</div>

						<div class="form-group">
						<input class="btn btn-default" type="submit" value="Add restaurant" name="register_restaurant" id="register_restaurant">
						</div>
					</form>
			
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