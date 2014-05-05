<?php 
	session_start();

	if(!isset($_SESSION['ownerIdentity']))
	{
		header("location: login.php");
	}

	var_dump($_SESSION);


 ?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>

	<body>
		<a href="addRestaurant.php">Add a new restaurant</a>
	</body>
</html>