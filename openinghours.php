<?php 
	session_start();

	if(!isset($_SESSION['ownerIdentity']))
 	{
 		header("location: login.php");
 	}
 	else
 	{
 		$ownerID = $_SESSION['ownerIdentity'];
 	}


	if(!empty($_POST['add_openinghours']))
	{
		include_once("classes/Openinghours.class.php");

		$openinghours = new Openinghours();
		$openinghours->opening_monday_from = $_POST["monday_from"];
		$openinghours->opening_monday_until = $_POST["monday_until"];
		$openinghours->opening_tuesday_from = $_POST["tuesday_from"];
		$openinghours->opening_tuesday_until = $_POST["tuesday_until"];
		$openinghours->opening_wednesday_from = $_POST["wednesday_from"];
		$openinghours->opening_wednesday_until = $_POST["wednesday_until"];
		$openinghours->opening_thursday_from = $_POST["thursday_from"];
		$openinghours->opening_thursday_until = $_POST["thursday_until"];
		$openinghours->opening_friday_from = $_POST["friday_from"];
		$openinghours->opening_friday_until = $_POST["friday_until"];
		$openinghours->opening_saturday_from = $_POST["saturday_from"];
		$openinghours->opening_saturday_until = $_POST["saturday_until"];
		$openinghours->opening_sunday_from = $_POST["sunday_from"];
		$openinghours->opening_sunday_until = $_POST["sunday_until"];
		$openinghours->opening_remarks = $_POST["remarks"];

		$openinghours->addOpeninghours();
	}



?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
			<div class="jumbotron">
				<h2>Changing openhours</h2>
			</div>

			<nav>
				<ul class="nav nav-pills">
					<li><a href="index.php">Home</a></li>
					<li><a href="myRestaurants.php">My Restaurants</a></li>
				</ul>
			</nav>
			
			<div class="row">
				<div class="col-sm-12">

				<form method="post" role="form">
					<div class="form-group">
					<h4>Monday</h4>						
					<label for="monday_from">From</label>
					<input class="form-control" type="text" name="monday_from" id="monday_from">
					<label for="monday_until">Until</label>
					<input class="form-control" type="text" name="monday_until" id="monday_until">
					</div>

					<div class="form-group">
					<h4>Tuesday</h4>						
					<label for="tuesday_from">From</label>
					<input class="form-control" type="text" name="tuesday_from" id="tuesday_from">
					<label for="tuesday_until">Until</label>
					<input class="form-control" type="text" name="tuesday_until" id="tuesday_until">
					</div>

					<div class="form-group">
					<h4>Wednesday</h4>						
					<label for="wednesday_from">From</label>
					<input class="form-control" type="text" name="wednesday_from" id="wednesday_from">
					<label for="wednesday_until">Until</label>
					<input class="form-control" type="text" name="wednesday_until" id="wednesday_until">
					</div>

					<div class="form-group">
					<h4>Wednesday</h4>						
					<label for="wednesday_from">From</label>
					<input class="form-control" type="text" name="wednesday_from" id="wednesday_from">
					<label for="wednesday_until">Until</label>
					<input class="form-control" type="text" name="wednesday_until" id="wednesday_until">
					</div>

					<div class="form-group">
					<h4>Thursday</h4>						
					<label for="thursday_from">From</label>
					<input class="form-control" type="text" name="thursday_from" id="thursday_from">
					<label for="thursday_until">Until</label>
					<input class="form-control" type="text" name="thursday_until" id="thursday_until">
					</div>

					<div class="form-group">
					<h4>Friday</h4>						
					<label for="friday_from">From</label>
					<input class="form-control" type="text" name="friday_from" id="friday_from">
					<label for="friday_until">Until</label>
					<input class="form-control" type="text" name="friday_until" id="friday_until">
					</div>

					<div class="form-group">
					<h4>Saturday</h4>						
					<label for="saturday_from">From</label>
					<input class="form-control" type="text" name="saturday_from" id="saturday_from">
					<label for="saturday_until">Until</label>
					<input class="form-control" type="text" name="saturday_until" id="saturday_until">
					</div>

					<div class="form-group">
					<h4>Sunday</h4>						
					<label for="sunday_from">From</label>
					<input class="form-control" type="text" name="sunday_from" id="sunday_from">
					<label for="sunday_until">Until</label>
					<input class="form-control" type="text" name="sunday_until" id="sunday_until">
					</div>

					<div class="form-group">
					<h4>Remarks</h4>						
					<label for="remarks">Remarks:</label>
					<input class="form-control" type="text" name="remarks" id="remarks">
					</div>

					<div class="form-group">
					<input class="btn btn-default" type="submit" value="Add Openinghours" name="add_openinghours" id="add_openinghours">
					</div>
				</form>
			
				</div>
			</div>
		</div>
</body>
</html>