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
		<title>Document</title>
	</head>
	<body>
		<form action="" method="POST">
			<?php if(isset($errorLogin)){echo '<p class="inputError">' . $errorLogin . '</p>';} ?>

			<label for="loginEmail">Email</label>
			<input id="loginEmail" type="text" name="login_email">
			
			<label for="loginPassword">Password</label>
			<input id="loginPassword" type="text" name="login_password">

			<input type="submit" value="Log In" name="login">
		</form>
	</body>
</html>