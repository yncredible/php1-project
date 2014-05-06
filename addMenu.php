 <?php
 	session_start();
 	
 	$restaurantID = $_GET['id'];

 	if(!isset($_SESSION['ownerIdentity']))
 	{
 		header("location: login.php");
 	}

 	include_once("classes/Menu.class.php");
 	$menu = new Menu();
	if(!empty($_POST))
	{
		$menu->menuName = $_POST["menu_name"];
		$menu->menuDescription = $_POST["menu_description"];
		$menu->menuPrice = $_POST["menu_price"];
		$menu->menuCategory = $_POST["menu_category"];

		$menu->addMenu($restaurantID);
	}

	$menuList = $menu->getSpecificMenufromRestaurant($restaurantID);

 ?><!doctype html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>Add menu</title>
 </head>
 <body>
   <form action='#' method="post">
    <label for="menu_name">Name</label>
    <input id="menu_name" name="menu_name" />

    <label for="menu_description">Description</label>
    <input id="menu_description" name="menu_description" />

    <label for="menu_price">Price</label>
    <input id="menu_price" name="menu_price" />

	<label for="menu_category">Category</label>
		<select id="menu_category" name="menu_category">
				<option value="beverages">Beverages</option>
				<option value="alcoholBeverages">Alcoholic beverages</option>
				<option value="appetizers">Appetizers</option>
				<option value="soups">Soups</option>
				<option value="salads">Salads</option>
				<option value="chicken">Chicken</option>
				<option value="pasta">Pasta</option>
				<option value="seafood">Seafood</option>
				<option value="ribSteaks">Rib/Steaks</option>
				<option value="burgerSandwiches">Burger/Sandwiches</option>
				<option value="kidsMenu">Kids Menu</option>
				<option value="desserts">Desserts</option>
		</select>

	 <button type="submit" id='btnSubmit'>Add!</button>
  </form>

  <h1>Beverages</h1>
  <ul>
  	<?php 
  		foreach ($menuList as $menuItem) 
  		{
  			if($menuItem['menu_category'] == "beverages")
  			{
  				echo "<li>";
  					echo $menuItem['menu_name'];
  					echo $menuItem['menu_description'];
  					echo $menuItem['menu_price'];
  				echo "</li>";
  			}
  		}
  	 ?>
  </ul>


  <h1>Burger/Sandwiches</h1>
  <ul>
  	<?php 
  		foreach ($menuList as $menuItem) 
  		{
  			if($menuItem['menu_category'] == "burgerSandwiches")
  			{
  				echo "<li>";
  					echo $menuItem['menu_name'];
  					echo $menuItem['menu_description'];
  					echo $menuItem['menu_price'];
  				echo "</li>";
  			}
  		}
  	 ?>
  </ul>

 </body>
 </html>


 