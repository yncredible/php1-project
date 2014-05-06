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
									'". $db->conn->real_escape_string($this->nameRestaurant)."',
									'". $db->conn->real_escape_string($this->streetRestaurant)."',
									'". $db->conn->real_escape_string($this->numberRestaurant)."',
									'". $db->conn->real_escape_string($this->postalcodeRestaurant)."',
									'". $db->conn->real_escape_string($this->cityRestaurant)."',
									'". $db->conn->real_escape_string($this->emailRestaurant)."',
									'". $db->conn->real_escape_string($this->websiteRestaurant)."',
									'". $ownerID."'
								)";

			$result = $db->conn->query($sql);


			if($result)
				{
					$sql2 = "SELECT restaurant_id FROM restaurant WHERE restaurant_name = '$this->nameRestaurant' AND restaurant_city = '$this->cityRestaurant' AND restaurant_number = '$this->numberRestaurant'" ;

					$result2 = $db->conn->query($sql2);

					if($result2)
					{
						$results = mysqli_fetch_array($result2, MYSQL_ASSOC);

						$restaurantID = $results['restaurant_id'];
						
						$_SESSION['restaurantIdentity'] = $restaurantID;
					}
				}
			

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


		public function getAllRestaurantsFromAnOwner($ownerID)
		{
			$db = new Db();
			$sql = "SELECT * FROM restaurant WHERE owner_id = '$ownerID'";
			
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