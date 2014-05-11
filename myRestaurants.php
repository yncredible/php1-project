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
		
		<nav>
			<ul class="nav nav-pills">
				<li><a class="btn btn-default" href="addRestaurant.php"><span class="glyphicon glyphicon-plus"></span> Add a new restaurant</a></li>
			</ul>
		</nav>

		
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name restaurant</th>
					<th>City</th>
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
								<td><a href='#' class="deleteEntireRestaurant" data-delete-restaurant="<?php echo $Orestaurant["restaurant_id"]; ?>">Delete</a></td>
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