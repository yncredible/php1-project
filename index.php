<?php 
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
		// $allRestaurants = $restaurant->search();

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opentable | Home</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
	
	<div class="jumbotron">
		<h2>Opentable</h2>
	</div>

	
	<nav>
	<?php 

		if(isset($_SESSION['ownerIdentity'])) { ?>
			<!--$ownerNavigation = "<a href="">" -->

			<ul class="nav nav-pills">
				<li><a href="myRestaurants.php">My restaurants</a></li>
				<li><a href="logout.php">Log Out</a></li>
			</ul>

		<?php }
	?>
	</nav>

	<div class="row">
		<div class="col-sm-12">
		<form action="" method="post" role="form">
			<label for="zoek_gemeente">Zoek op gemeente</label><br/>
			<input type="input" name="zoek_gemeente" id="zoek_gemeente" class="">
		</form>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			

			<table class="table">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Straat</th>
						<th>Postcode</th>
						<th>Gemeente</th>
					</tr>
				</thead>
				<tbody>
					
						<?php 
							while($alleRestauranten = $allRestaurants->fetch_assoc()){ ?>
								<tr>
								<td><a href="#"><?php echo $alleRestauranten['restaurant_name']; ?></a></td>
								<td><?php echo $alleRestauranten['restaurant_street'] . " " . $alleRestauranten['restaurant_number'] ; ?></td>
								<td><?php echo $alleRestauranten['restaurant_postalCode']; ?></td>
								<td><?php echo $alleRestauranten['restaurant_city']; ?></td>
								</tr>
							<?php }
						?>
					
				</tbody>
				
			</table>
		

			<!-- 		
			//<ul>
			//<?php
			
				//while ($alleRestauranten = $allRestaurants->fetch_assoc()) {
					
					//if($restaurant->m_sCityRestaurant == $searchCity){
					//echo "<a href='#'><li class='opmaak'><p>" . $alleRestauranten['restaurant_city'] . "</p></li></a>";
					//}
				//}
			//?>
			//</ul> 
			-->



		</div>
	</div>

	</div>
</body>
</html>