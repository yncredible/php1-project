<?php 
	include_once('../classes/Table.class.php');
	$table = new Table();
	
	$tableID = $_POST['id'];
	$tableChange = $_POST['status_change'];

	$table->ChangeStatus($tableID, $tableChange);
 ?>