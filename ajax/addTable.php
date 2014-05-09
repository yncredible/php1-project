<?php 
	include_once('../classes/Table.class.php');
	$table = new Table();

	$restaurantID = $_POST["restaurantID"];

	$table->Number = $_POST['table_number'];
	$table->Persons = $_POST['table_people'];
	$table->Status = $_POST['table_status'];
	$table->Description = $_POST['table_description'];

	$table->addTable($restaurantID);

 ?>