<?php 
	include_once('../classes/Menu.class.php');
	$menu = new Menu();
	
	$menuItemID = $_POST['id'];

	$menu->DeleteMenuItem($menuItemID);
 ?>