<?php 
	session_start();

	if(!isset($_SESSION['ownerIdentity']))
	{
		header("location: login.php");
	}

	//var_dump($_SESSION);

	include_once('classes/Restaurant.class.php');
	$restaurant = new Restaurant();
	$ownersRestaurants = $restaurant->getAllRestaurantsFromAnOwner($_SESSION['ownerIdentity']);

	if(!empty($_POST['deleteRestaurant']))
	{
		
	}

 ?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>OpenTable | MyRestaurants</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<div class="container">

		<div class="jumbotron">
			<h2>Overzicht van mijn restaurants</h2>
		</div>
		
		<nav>
			<ul class="nav nav-pills">
				<li><a href="index.php">Home</a></li>
				<li class=""><a href="addRestaurant.php">Add a new restaurant</a></li>
			</ul>
		</nav>

		
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Naam restaurant</th>
					<th>Gemeente</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach($ownersRestaurants as $Orestaurant){ ?>
						
						<tr>
							<form action="#" method="get" role="form">
								<td><a href="managerestaurant.php?id=<?php echo $Orestaurant['restaurant_id'];?>"><?php echo ucfirst($Orestaurant['restaurant_name']); ?></a></td>
								<td><?php echo ucfirst($Orestaurant['restaurant_city']); ?></td>
								<td>
									<input type="submit" value="<?php echo $Orestaurant['restaurant_id'] ?>" name="deleteRestaurant">
								</td>
    						</form>
						</tr>

					<?php }
				?>
			</tbody>
		</table>

 		</div>
 	<footer>
		Php project - Kimberly Gysbrecht Segers - Kristof Van Espen - Yannick Nijs - Jens Ivens
	</footer>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>