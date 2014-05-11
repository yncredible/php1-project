<?php 
	session_start();

	//if there's a session for the inputs, delete it when refreshing
	if(isset($_SESSION['name']))
	{session_unset($_SESSION['name']);}

	if(isset($_SESSION['email']))
	{session_unset($_SESSION['email']);}

	if(isset($_SESSION['password']))
	{session_unset($_SESSION['password']);}

	//if there's a session for the owner identification, delete it
	if(isset($_SESSION['ownerIdentity']))
	{session_unset($_SESSION['ownerIdentity']);}

	
	//when submitting the form
	if(!empty($_POST['register']) && isset($_POST['register']))
	{
		include_once('classes/Restaurateur.class.php');

		$owner = new Restaurateur();
		$owner->Name = $_POST['owner_name'];
		$owner->Email = $_POST['owner_email'];
		$owner->Password = $_POST['owner_password'];

		//if there are errors
		if(!empty($owner->errors) && isset($owner->errors))
		{
			if(isset($owner->errors['errorName']))
			{$errorName = $owner->errors['errorName'];}

			if(isset($owner->errors['errorName_char']))
			{$errorName_char = $owner->errors['errorName_char'];}


			if(isset($owner->errors['errorEmail']))
			{$errorEmail = $owner->errors['errorEmail'];}

			if(isset($owner->errors['errorEmail_val']))
			{$errorEmail_val = $owner->errors['errorEmail_val'];}


			if(isset($owner->errors['errorPassword']))
			{$errorPassword = $owner->errors['errorPassword'];}

			if(isset($owner->errors['errorPassword_len']))
			{$errorPassword_len = $owner->errors['errorPassword_len'];}



			//keep the inputs filled with previous values
			if(!empty($_POST['owner_name']) && isset($_POST['owner_name']))
			{$_SESSION['name'] = $_POST['owner_name'];}
			if(!empty($_POST['owner_email']) && isset($_POST['owner_email']))
			{$_SESSION['email'] = $_POST['owner_email'];}
			if(!empty($_POST['owner_password']) && isset($_POST['owner_password']))
			{$_SESSION['password'] = $_POST['owner_password'];}

		}
		else
		{
			$owner->Save();
			

			if(isset($owner->errors['errorAvailability']))
			{
				$errorAvailability = $owner->errors['errorAvailability'];
			}
			else
			{
				$_SESSION['ownerIdentity'] = $owner->Email;
				session_write_close();

				header('location: index.php');
				
			}

			//keep the inputs filled with previous values
			if(!empty($_POST['owner_name']) && isset($_POST['owner_name']))
			{$_SESSION['name'] = $_POST['owner_name'];}
			if(!empty($_POST['owner_email']) && isset($_POST['owner_email']))
			{$_SESSION['email'] = $_POST['owner_email'];}
			if(!empty($_POST['owner_password']) && isset($_POST['owner_password']))
			{$_SESSION['password'] = $_POST['owner_password'];}

		}
	}

 ?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>OpenTable - Restaurateur registration</title>
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
					<h4>Register</h4>
					<form action="" method="POST" role="form">
						<div class="formgroup">
							<label for="ownerName">Name</label>
							<!--Print out errors-->
							<?php if(isset($errorName)){echo '<p class="inputError">' . $errorName . '</p>';} ?>
							<?php if(isset($errorName_char)){echo '<p class="inputError">' . $errorName_char . '</p>';} ?>
							<input class="form-control" type="text" id="ownerName" placeholder="eg: John Doe, Betty's Cafe" name="owner_name" <?php if(isset($_SESSION['name'])){echo 'value="' . $_SESSION['name'] . '"';} ?>>
						</div>
						<div class="formgroup">
							<label for="ownerEmail">Email</label>
							<!--Print out errors-->
							<?php if(isset($errorEmail)){echo '<p class="inputError">' . $errorEmail . '</p>';} ?>
							<?php if(isset($errorEmail_val)){echo '<p class="inputError">' . $errorEmail_val . '</p>';} ?>
							<?php if(isset($errorAvailability)){echo '<p class="inputError">' . $errorAvailability . '</p>';} ?>
							<input class="form-control" type="text" id="ownerEmail" placeholder="eg: johndoe@domain.com" name="owner_email" <?php if(isset($_SESSION['email'])){echo 'value="' . $_SESSION['email'] . '"';} ?>>
						</div>
						<div class="form-group">
							<label for="ownerPassword">Password</label>
							<!--Print out errors-->
							<?php if(isset($errorPassword)){echo '<p class="inputError">' . $errorPassword . '</p>';} ?>
							<?php if(isset($errorPassword_len)){echo '<p class="inputError">' . $errorPassword_len . '</p>';} ?>
							<input class="form-control" type="password" id="ownerPassword" name="owner_password" <?php if(isset($_SESSION['password'])){echo 'value="' . $_SESSION['password'] . '"';} ?>>
						</div>
							<input type="submit" value="Sign Up" name="register" class="btn btn-default">

							<p class="col-sm-offset-2 col-sm-10">Already registered? <a href="login.php">Login here!</a></p>
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