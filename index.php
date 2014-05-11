<?php 
	// email = admin@thomasmore.be
	// password = adminadmin

	session_start();

		include_once('classes/Restaurant.class.php');

		//delete previous sessions
		if(isset($_SESSION['name']))
		{session_unset($_SESSION['name']);}

		if(isset($_SESSION['email']))
		{session_unset($_SESSION['email']);}

		if(isset($_SESSION['password']))
		{session_unset($_SESSION['password']);}

		$restaurant = new Restaurant();
		$allRestaurants = $restaurant->getAllRestaurants();

	if(isset($_POST['search'])){
		$restaurantsSearch = new Restaurant();
		$restaurantType = $_POST["search_type"];
		$restaurantCity = $_POST["search_city"];
	
		$restaurantwithSearch = $restaurantsSearch->Search($restaurantType,$restaurantCity);
	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opentable | Home</title>
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
	

	
	<ul class="flow">
		<li>
			<img src="images/search.png"/>
			<p>Search restaurants in your area</p>
		</li>
		<li>
			<img src="images/food.png"/>
			<p>Check their menu</p>
		</li>
		<li>
			<img src="images/table.png"/>
			<p>Reserve a table</p>
		</li>
	</ul>

	<div class="row">
		<div class="col-sm-12">
			<h4>Our restaurants</h4>
			<form action="#" method="post" role="form" id="search">
				<label>Search a restaurant</label></br>
				<label for="search_city">City :</label>
				<input type="input" name="search_city" id="search_city" placeholder="Postal code"/>
				<label for="search_type">Type : </label>
				<select id="search_type" name="search_type">
							<option value="all">All</option>
							<option value="restaurant">restaurant</option>
							<option value="brasserie">brasserie</option>
							<option value="cafe">café</option>
							<option value="fastfood">fastfood</option>
							<option value="foodtruck">Foodtruck</option>
							<option value="snackbar">Snackbar</option>
				</select>
				<input type="submit" name="search" id="search" value="filter">
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			

			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Postal code</th>
						<th>City</th>
					</tr>
				</thead>
				<tbody>
				<?php
				if(empty($restaurantCity))
				{
					foreach($allRestaurants as $rest){ ?>
										
										<tr>
											<td><a href="detailRestaurant.php?id=<?php echo $rest['restaurant_id'];?>"><?php echo ucfirst($rest['restaurant_name']); ?></a></td>
											<td><?php echo ucfirst($rest['restaurant_street']) . " " . ucfirst($rest['restaurant_number']); ?></td>
											<td><?php echo $rest['restaurant_postalCode']; ?></td>
											<td><?php echo ucfirst($rest['restaurant_city']); ?></td>
										</tr>

								<?php }	
				}
				else
				{
					foreach ($restaurantwithSearch as $restSearch)
					{?>
					  	<tr>
											<td><a href="detailRestaurant.php?id=<?php echo $restSearch['restaurant_id'];?>"><?php echo ucfirst($restSearch['restaurant_name']); ?></a></td>
											<td><?php echo ucfirst($restSearch['restaurant_street']) . " " . ucfirst($restSearch['restaurant_number']); ?></td>
											<td><?php echo $restSearch['restaurant_postalCode']; ?></td>
											<td><?php echo ucfirst($restSearch['restaurant_city']); ?></td>
										</tr>
					 <?php } 
				}
				?>
			</tbody>
				
			</table>
			

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