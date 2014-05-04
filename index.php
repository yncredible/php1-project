<?php 
	
	session_start();

	if(isset($_SESSION['ownerIdentity']))
	{
		//delete previous sessions
		if(isset($_SESSION['name']))
		{session_unset($_SESSION['name']);}

		if(isset($_SESSION['email']))
		{session_unset($_SESSION['email']);}

		if(isset($_SESSION['password']))
		{session_unset($_SESSION['password']);}

		
		$ownerIdentity = $_SESSION['ownerIdentity'];
		//user $ownerIdentity to recognize what user you're targetting;
		//login page has to fall on this session as well
		echo $ownerIdentity;
	}
	else
	{
		header('location: login.php');
	}
	

 ?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>


	<body>
		
		<a href="logout.php">Log Out</a>

	</body>
</html>