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
		<title>OpenTable | Add and manage tables</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>


	<body>
		
		<div class="container">	
		
		<div class="jumbotron">
			<h2>Add and manage tables</h2>
		</div>

		<nav>
			<ul class="nav nav-pills">
				<li><a href="index.php">Home</a></li>
				<li><a href="managerestaurant.php?id=<?php echo $restaurantID; ?>">Manage overview</a></li>
			</ul>
		</nav>
		
		<div class="row">
		<div class="col-sm-12">

		<form action="" method="POST" role="form" class="form-inline">
			
			<div class="form-group">
			<label for="tableNumber">Table number</label>
			<select class="form-control" id="tableNumber" name="table_number">
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
			</div>

			<div class="form-group">
			<label for="tablePeople">Amount of people</label>
			<select class="form-control" id="tablePeople" name="table_people">
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
			</div>

			<div class="form-group">
			<label for="tableDescription">Description</label>
   			<input class="form-control" id="tableDescription" name="table_description"/>
			</div>
   			
			<div class="form-group">
   			<label for="tableStatus">Status</label>
			<select class="form-control" id="tableStatus" name="table_status">
				<option value="Free">Free</option>
				<option value="Reserved">Reserved</option>
				<option value="Occupied">Occupied</option>
			</select>
			</div>
			
			<div class="form-group">
			<input class="btn btn-primary" type="submit" name="table_add" value="Add table">
			</div>

		</form>
		</div>
		</div>


		<div class="row">
			<div class="col-sm-12">
				<h2>Tables of the restaurant</h2>

				<table class="table table-hover">
					<thead>
						<tr>
							<th>Table nr.</th>
							<th>Persons</th>
							<th>Description</th>
							<th>Status</th>
							<th>Manage</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($tableList as $tableItem){ ?>
								
								<tr>
									<td><?php echo $tableItem['table_nr']; ?></td>
									<td><?php echo $tableItem['table_persons']; ?></td>
									<td><?php echo $tableItem['table_description']; ?></td>
									<td><?php echo $tableItem['table_status']; ?></td>
									<td><a href="changeStatus.php?id=<?php echo $tableItem['table_id']; ?>">Change Status</a></td>
								</tr>
			

							<?php }
						?>
					</tbody>
				</table>




<!-- 				<ul>
					<?php 
						// foreach ($tableList as $tableItem) 
						// {
						// 	echo "<li>";
						// 		echo $tableItem['table_nr'];
						// 		echo " ";
						// 		echo $tableItem['table_persons'];
						// 		echo " ";
						// 		echo $tableItem['table_description'];
						// 		echo " ";
						// 		echo $tableItem['table_status'];
						// 		echo " ";
						// 		echo "<a href='changeStatus.php?".$tableItem['table_id']."'>Change status</a>";
						// 	echo "</li>";
						// }
					 ?>
				</ul>
 -->				
			</div>
		</div>

		</div>
	</body>
</html>