<?php 
	include_once('../classes/Table.class.php');
	$table = new Table();
	
	$tableID = $_POST['id'];

	$table->DeleteTable($tableID);
 ?>