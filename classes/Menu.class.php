<?php
	include_once('Db.class.php');
	class Menu
	{

		private $m_sMenuName;
		private $m_sMenuDescription;
		private $m_sMenuPrice;
		private $m_sMenuCategory;

	public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case "menuName":
				{
					$this->m_sMenuName = $p_vValue;
				}
				break;
				
				case "menuDescription":
				{
					$this->m_sMenuDescription = $p_vValue;
				}
				break;
				case "menuPrice":
				{
					$this->m_sMenuPrice = $p_vValue;
				}
				break;
				case "menuCategory":
				{
					$this->m_sMenuCategory = $p_vValue;
				}
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case "menuName":
					return $this->m_sMenuName;
				break;
				
				case "menuDescription":
					return $this->m_sMenuDescription;
				break;
				case "menuPrice":
					return $this->m_sMenuPrice;
				break;
				case "menuCategory":
					return $this->m_sMenuCategory;
				break;
			}
		}
		public function addMenu($restaurantID)
		{

			$db = new Db();

			$sql = "INSERT INTO menu (menu_name, menu_description, menu_price, menu_category, restaurant_id)
						VALUES (
									'". $db->conn->real_escape_string($this->menuName)."',
									'". $db->conn->real_escape_string($this->menuDescription)."',
									". $db->conn->real_escape_string($this->menuPrice).",
									'". $db->conn->real_escape_string($this->menuCategory)."',
									". $restaurantID ."
								)";

			$result = $db->conn->query($sql);

			if($result)
			{
				$sql2 = "SELECT LAST_INSERT_ID() FROM menu order by menu_id desc limit 1";
				$result2 = $db->conn->query($sql2);

				if($result2)
				{
					$results = mysqli_fetch_array($result2, MYSQL_ASSOC);

					$lastEntryID = $results['LAST_INSERT_ID()'];

					json_encode($lastEntryID);
					echo $lastEntryID;
				}
			}
		}


		public function getBeverages($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE menu_category = 'beverages' AND restaurant_id = '$restaurantID'";
			
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
				{
				    $rows[] = $row;
				}
				return $rows;
			}
		}

		public function getAlcoholBeverages($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE menu_category = 'alcoholBeverages' AND restaurant_id = '$restaurantID'";
			
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
				{
				    $rows[] = $row;
				}
				return $rows;
			}
		}

		public function getAppetizers($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE menu_category = 'appetizers' AND restaurant_id = '$restaurantID'";
			
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
				{
				    $rows[] = $row;
				}
				return $rows;
			}
		}

		public function getSoups($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE menu_category = 'soups' AND restaurant_id = '$restaurantID'";
			
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
				{
				    $rows[] = $row;
				}
				return $rows;
			}
		}

		public function getSalads($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE menu_category = 'salads' AND restaurant_id = '$restaurantID'";
			
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
				{
				    $rows[] = $row;
				}
				return $rows;
			}
		}

		public function getChicken($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE menu_category = 'chicken' AND restaurant_id = '$restaurantID'";
			
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
				{
				    $rows[] = $row;
				}
				return $rows;
			}
		}

		public function getPasta($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE menu_category = 'pasta' AND restaurant_id = '$restaurantID'";
			
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
				{
				    $rows[] = $row;
				}
				return $rows;
			}
		}

		public function getSeafood($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE menu_category = 'seafood' AND restaurant_id = '$restaurantID'";
			
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
				{
				    $rows[] = $row;
				}
				return $rows;
			}
		}

		public function getRibSteaks($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE menu_category = 'ribSteaks' AND restaurant_id = '$restaurantID'";
			
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
				{
				    $rows[] = $row;
				}
				return $rows;
			}
		}

		public function getBurgerSandwiches($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE menu_category = 'burgerSandwiches' AND restaurant_id = '$restaurantID'";
			
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
				{
				    $rows[] = $row;
				}
				return $rows;
			}
		}

		public function getKidsMenu($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE menu_category = 'kidsMenu' AND restaurant_id = '$restaurantID'";
			
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
				{
				    $rows[] = $row;
				}
				return $rows;
			}
		}

		public function getDesserts($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE menu_category = 'desserts' AND restaurant_id = '$restaurantID'";
			
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
				{
				    $rows[] = $row;
				}
				return $rows;
			}
		}

		function DeleteMenuItem($MenuItemID)
		{
			$db = new Db();

			$sql = "DELETE FROM menu
					WHERE menu_id = '$MenuItemID'";

			$result = $db->conn->query($sql);
		}
	}
?>