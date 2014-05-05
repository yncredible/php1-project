 <?php
 	session_start();
 	
 	if(!isset($_SESSION['ownerIdentity']))
 	{
 		header("location: login.php");
 	}

	if(!empty($_POST))
	{
		include_once("classes/Menu.class.php");

		$menu = new Menu();
		$menu->menuName = $_POST["menu_name"];
		$menu->menuDescription = $_POST["menu_description"];
		$menu->menuPrice = $_POST["menu_price"];
		$menu->menuCategory = $_POST["menu_category"];

		$menu->addMenu();
	}



 ?><!doctype html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>Add menu</title>
 </head>
 <body>
   <form action='#' method="post">
    <label for="menu_name">Name:</label>
    <input id="menu_name" name="menu_name" />

    <label for="menu_description">Description:</label>
    <input id="menu_description" name="menu_description" />

    <label for="menu_price">Price:</label>
    <input id="menu_price" name="menu_price" />

	<label for="menu_category">Category</label>
		<select id="menu_category" name="menu_category">
				<option value="voorgerecht">Voorgerecht</option>
				<option value="hoofdgerecht">Hoofdgerecht</option>
				<option value="dessert">Dessert</option>
		</select>

	 <button type="submit" id='btnSubmit'>Add!</button>
  </form>
 </body>
 </html>


 