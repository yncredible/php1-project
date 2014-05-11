<?php 
	session_start();

	if(!isset($_SESSION['ownerIdentity']))
	{
		if(isset($_POST['login']) && !empty($_POST['login']))
		{
			include_once('classes/Restaurateur.class.php');

			$owner = new Restaurateur();
			$OwnerEmail = $_POST['login_email'];
			$OwnerPassword = $_POST['login_password'];

			$owner->Login($OwnerEmail, $OwnerPassword);

			if(isset($owner->errors['errorLogin']))
			{
				$errorLogin = $owner->errors['errorLogin'];
			}

			if(isset($_SESSION['ownerIdentity']))
			{
				session_write_close();
				header("location: index.php");
			}
		}
	}
	else
	{
		header("location: index.php");
	}

?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Opentable | Log in</title>
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

			<div class="row">
				<div class="col-sm-12">
					<h4>Login</h4>
					<form action="" method="POST" role="form" class="form-horizontal">
						<?php if(isset($errorLogin)){echo '<p class="inputError">' . $errorLogin . '</p>';} ?>

						<div class="form-group">
							<label for="loginEmail" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">	
								<input id="loginEmail" type="text" name="login_email" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label for="loginPassword" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">	
									<input id="loginPassword" type="password" name="login_password" class="form-control" required>
								</div>
						</div>
						
						<div class="form-group">
	    					<div class="col-sm-offset-2 col-sm-10">
	    						<input type="submit" value="Log In" name="login" class="btn btn-default">
	    					</div>
	    				</div>
					</form>

					<p class="col-sm-offset-2 col-sm-10">
						You don't have an account? No problem! <a href="register.php">Register here.</a>
					</p>
					
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