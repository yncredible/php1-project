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

			$db->conn->query($sql);
		}

		public function getSpecificMenufromRestaurant($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE restaurant_id = '$restaurantID'";
			
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
	}
?>