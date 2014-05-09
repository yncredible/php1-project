<?php 
	include_once('../classes/Menu.class.php');
	$menu = new Menu();

	$restaurantID = $_POST["restaurantID"];

	$menu->menuName = $_POST["menu_name"];
	$menu->menuDescription = $_POST["menu_description"];
	$menu->menuPrice = $_POST["menu_price"];
	$menu->menuCategory = $_POST["menu_category"];

	$menu->addMenu($restaurantID);
 ?>