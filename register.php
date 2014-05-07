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
		<div class="container">

		<div class="jumbotron">
			<h2>Registreer uzelf als restauranthouder</h2>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
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

						<p>Bent u al geregistreerd? <a href="login.php">Log dan snel in!</a></p>
				</form>
			</div>
		</div>
		

		</div>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>