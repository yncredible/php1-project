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
		$openinghours->MondayFrom = $_POST["monday_from"];
		$openinghours->MondayUntil = $_POST["monday_until"];
		$openinghours->TuesdayFrom = $_POST["tuesday_from"];
		$openinghours->TuesdayUntil = $_POST["tuesday_until"];
		$openinghours->WednesdayFrom = $_POST["wednesday_from"];
		$openinghours->WednesdayUntil = $_POST["wednesday_until"];
		$openinghours->ThursdayFrom = $_POST["thursday_from"];
		$openinghours->ThursdayUntil = $_POST["thursday_until"];
		$openinghours->FridayFrom = $_POST["friday_from"];
		$openinghours->FridayUntil = $_POST["friday_until"];
		$openinghours->SaturdayFrom = $_POST["saturday_from"];
		$openinghours->SaturdayUntil = $_POST["saturday_until"];
		$openinghours->SundayFrom = $_POST["sunday_from"];
		$openinghours->SundayUntil = $_POST["sunday_until"];
		$openinghours->Remarks = $_POST["remarks"];

		$openinghours->addOpeninghours();
	}



?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OpenTable | Openingshours</title>
	<link rel="stylesheet" href="css/reset.css">
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

			<!-- STILL HAVE TO LINK RESTAURANT ID -->

			<div class="row">
				<div class="col-sm-12">
					<form action="" method="post" role="form">
						<table class="table">
							<thead>
								<tr>
									<th>&nbsp;</th>
									<th>From</th>
									<th>Until</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><strong>Monday</strong></td>
									<td><input class="form-control" type="text" name="monday_from" id="monday_from"></td>
									<td><input class="form-control" type="text" name="monday_until" id="monday_until"></td>
								</tr>
								<tr>
									<td><strong>Tuesday</strong></td>
									<td><input class="form-control" type="text" name="tuesday_from" id="tuesday_from"></td>
									<td><input class="form-control" type="text" name="tuesday_until" id="tuesday_until"></td>
								</tr>
								<tr>
									<td><strong>Wednesday</strong></td>
									<td><input class="form-control" type="text" name="wednesday_from" id="wednesday_from"></td>
									<td><input class="form-control" type="text" name="wednesday_until" id="wednesday_until"></td>
								</tr>
								<tr>
									<td><strong>Thursday</strong></td>
									<td><input class="form-control" type="text" name="thursday_from" id="thursday_from"></td>
									<td><input class="form-control" type="text" name="thursday_until" id="thursday_until"></td>
								</tr>
								<tr>
									<td><strong>Friday</strong></td>
									<td><input class="form-control" type="text" name="friday_from" id="friday_from"></td>
									<td><input class="form-control" type="text" name="friday_until" id="friday_until"></td>
								</tr>
								<tr>
									<td><strong>Saturday</strong></td>
									<td><input class="form-control" type="text" name="saturday_from" id="saturday_from"></td>
									<td><input class="form-control" type="text" name="saturday_until" id="saturday_until"></td>
								</tr>
								<tr>
									<td><strong>Sunday</strong></td>
									<td><input class="form-control" type="text" name="sunday_from" id="sunday_from"></td>
									<td><input class="form-control" type="text" name="sunday_until" id="sunday_until"></td>
								</tr>
							</tbody>
						</table>

					<div class="form-group">
						<input class="btn btn-default" type="submit" value="Add Openinghours" name="add_openinghours" id="add_openinghours">
					</div>

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