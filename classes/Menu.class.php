<?php
	include_once('Db.class.php');
	class Menu{

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
		public function addMenu(){

			$db = new Db();

			$sql = "insert INTO menu (menu_name, menu_description, menu_price, menu_category, restaurant_id)
						VALUES (
									'". $this->menuName."',
									'". $this->menuDescription."',
									". $this->menuPrice.",
									'". $this->menuCategory."',
									". 1 ."
								)";
			echo($sql);
			$db->conn->query($sql);
			

		}
	}
?>