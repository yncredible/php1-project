<?php
	include_once('Db.class.php');
	class Restaurant{

		private $m_sNameRestaurant;
		private $m_sStreetRestaurant;
		private $m_sNumberRestaurant;
		private $m_sPostalcodeRestaurant;
		private $m_sCityRestaurant;
		private $m_sEmailRestaurant;
		private $m_sWebsiteRestaurant;


	public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case "nameRestaurant":
				{
					$this->m_sNameRestaurant = $p_vValue;
				}
				break;
				
				case "streetRestaurant":
				{
					$this->m_sStreetRestaurant = $p_vValue;
				}
				break;
				case "numberRestaurant":
				{
					$this->m_sNumberRestaurant = $p_vValue;
				}
				break;
				case "postalcodeRestaurant":
				{
					$this->m_sPostalcodeRestaurant = $p_vValue;
				}
				break;
				case "cityRestaurant":
				{
					$this->m_sCityRestaurant = $p_vValue;
				}
				break;
				case "emailRestaurant":
				{
					$this->m_sEmailRestaurant = $p_vValue;
				}
				break;
				
				case "websiteRestaurant":
				{
					$this->m_sWebsiteRestaurant = $p_vValue;
				}
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case "nameRestaurant":
				return $this->m_sNameRestaurant;
				break;

				case "streetRestaurant":
				return $this->m_sStreetRestaurant;
				break;

				case "numberRestaurant":
				return $this->m_sNumberRestaurant;
				break;

				case "postalcodeRestaurant":
				return $this->m_sPostalcodeRestaurant;
				break;

				case "cityRestaurant":
				return $this->m_sCityRestaurant;
				break;

				case "emailRestaurant":
				return $this->m_sEmailRestaurant;
				break;

				case "websiteRestaurant":
				return $this->m_sWebsiteRestaurant;
				break;
				
			}
		}
		public function addRestaurant($ownerID)
		{

			$db = new Db();

			$sql = "insert INTO restaurant (restaurant_name, restaurant_street, restaurant_number, restaurant_postalCode, restaurant_city, restaurant_email, restaurant_website, owner_id)
						VALUES (
									'". $this->nameRestaurant."',
									'". $this->streetRestaurant."',
									'". $this->numberRestaurant."',
									'". $this->postalcodeRestaurant."',
									'". $this->cityRestaurant."',
									'". $this->emailRestaurant."',
									'". $this->websiteRestaurant."',
									'". $ownerID."'
								)";

			$db->conn->query($sql);
			

		}
		public function search(){
			$db = new Db();
			$searchCity = "SELECT restaurant_city FROM restaurant";

			$result = $db->conn->query($searchCity);
			//echo $searchCity;
			return($result);
			return($searchCity);

		}


		public function getAllRestaurants(){
			$db = new Db();
			$selectALL = "SELECT * FROM restaurant";
			
			$res = $db->conn->query($selectALL);
			
			return($res);
		}

}
?>