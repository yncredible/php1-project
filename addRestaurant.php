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

		try{
			include_once("classes/Restaurant.class.php");

			$restaurant = new Restaurant();
			$restaurant->nameRestaurant = $_POST["name_restaurant"];
			$restaurant->typeRestaurant = $_POST['type_restaurant'];
			$restaurant->streetRestaurant = $_POST["street_restaurant"];
			$restaurant->numberRestaurant = $_POST["number_restaurant"];
			$restaurant->postalcodeRestaurant = $_POST["postalcode_restaurant"];
			$restaurant->cityRestaurant = $_POST["city_restaurant"];
			$restaurant->emailRestaurant = $_POST["email_restaurant"];
			$restaurant->websiteRestaurant = $_POST["website_restaurant"];
			$restaurant->photoRestaurant = addslashes(file_get_contents($_FILES['photo_restaurant']['tmp_name']));

			$restaurant->addRestaurant($ownerID);

			if(isset($_SESSION['restaurantIdentity']))
			{
				$restaurantID = $_SESSION['restaurantIdentity'];
				session_write_close();
				header("location: managerestaurant.php?id=$restaurantID");
			}
		}catch (Exception $e) 
		{
			$error = $e->getMessage();
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
		<header>&nbsp;</header>

			<div class="jumbotron">
				<div class="container">
					<h2>Add a new restaurant</h2>
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
				<div class="col-sm-12">
					<h3>Add restaurant</h3>

					<form method="post" role="form" enctype="multipart/form-data">
					<?php 
						if(isset($error)){?>
						<p class="alert alert-danger"><?php echo $error; }?></p>

						<div class="form-group">						
						<label for="name_restaurant">Name Restaurant</label>
						<input class="form-control" type="text" name="name_restaurant" id="name_restaurant" required>
						</div>

						<div class="form-group">						
						<label for="type_restaurant">Type : </label>
						<select id="type_restaurant" name="type_restaurant" required>
							<option value="all">All</option>
							<option value="restaurant">Restaurant</option>
							<option value="brasserie">Brasserie</option>
							<option value="cafe">Café</option>
							<option value="fastfood">Fastfood</option>
							<option value="foodtruck">Foodtruck</option>
							<option value="snackbar">Snackbar</option>
						</select>
						</div>

						<div class="form-group">	
						<label for="street_restaurant">Street </label>
						<input class="form-control" type="text" name="street_restaurant" id="street_restaurant" required>
						</div>

						<div class="form-group">
						<label for="number_restaurant">Number</label>
						<input class="form-control" type="text" name="number_restaurant" id="number_restaurant" required>
						</div>

						<div class="form-group">		
						<label for="postalcode_restaurant">Postal code</label>
						<input class="form-control" type="text" name="postalcode_restaurant" id="postalcode_restaurant" required>
						</div>

						<div class="form-group">	
						<label for="city_restaurant">City</label>
						<input class="form-control" type="text" name="city_restaurant" id="city_restaurant" required>
						</div>

						<div class="form-group">	
						<label for="email_restaurant">Email</label>
						<input class="form-control" type="email" name="email_restaurant" id="email_restaurant" required>
						</div>

						<div class="form-group">	
						<label for="website_restaurant">Website</label>
						<input class="form-control" type="text" name="website_restaurant" id="website_restaurant">
						</div>
						<div class="form-group">	
						<label for="photo_restaurant">Upload restaurant picture</label>
						<input class="form-control" type="file" name="photo_restaurant" id="photo_restaurant">
						</div>


						<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Add restaurant" name="register_restaurant" id="register_restaurant">
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