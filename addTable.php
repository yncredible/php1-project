<?php 
	session_start();

	if(!isset($_SESSION['ownerIdentity']))
	{
		header("location: login.php");
	}

	$restaurantID = $_GET['id'];

	include_once('classes/Table.class.php');
	$table = new Table();
	if(!empty($_POST['table_add']))
	{
		$table->Number = $_POST['table_number'];
		$table->Persons = $_POST['table_people'];
		$table->Status = $_POST['table_status'];
		$table->Description = $_POST['table_description'];

		$table->addTable($restaurantID);
	}

	$tableList = $table->getSpecificTablesfromRestaurant($restaurantID);

 ?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>


	<body>
		<form action="" method="POST">
			
			<label for="tableNumber">Table number</label>
			<select id="tableNumber" name="table_number">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
			</select>

			<label for="tablePeople">Amount of people</label>
			<select id="tablePeople" name="table_people">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>

			<label for="tableDescription">Description</label>
   			<input id="tableDescription" name="table_description"/>

   			<label for="tableStatus">Status</label>
			<select id="tableStatus" name="table_status">
				<option value="Free">Free</option>
				<option value="Reserved">Reserved</option>
				<option value="Occupied">Occupied</option>
			</select>

			<input type="submit" name="table_add" value="Add table">

		</form>

		<h1>Tables of the restaurant</h1>
		<ul>
			<?php 
				foreach ($tableList as $tableItem) 
				{
					echo "<li>";
						echo $tableItem['table_nr'];
						echo $tableItem['table_persons'];
						echo $tableItem['table_description'];
						echo $tableItem['table_status'];
					echo "</li>";
				}
			 ?>
		</ul>
	</body>
</html>