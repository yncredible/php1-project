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
		// private $m_Photo;
		private $m_sTypeRestaurant;

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
				case "typeRestaurant":
				{
					$this->m_sTypeRestaurant = $p_vValue;
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
				/*case "photoRestaurant":
				{
					$image_size = getimagesize($_FILES['photo_restaurant']['tmp_name']);
					echo $image_size;
					if($image_size == false){
						throw new Exception("This is not an image, please insert an image");
					}
					else
					{
						$this->m_Photo = $p_vValue;
					}	
				}
				break;*/
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

				case "typeRestaurant":
				return $this->m_sTypeRestaurant;
				break;

				case "emailRestaurant":
				return $this->m_sEmailRestaurant;
				break;

				case "websiteRestaurant":
				return $this->m_sWebsiteRestaurant;
				break;

				/*case "photoRestaurant":
				return $this->m_Photo;
				break;*/
				
			}
		}
		public function addRestaurant($ownerID)
		{

			$db = new Db();
			
					$sql = "insert INTO restaurant (restaurant_name, restaurant_street, restaurant_number, restaurant_postalCode, restaurant_city, restaurant_type, restaurant_email, restaurant_website, owner_id)
								VALUES (
											'". $db->conn->real_escape_string($this->nameRestaurant)."',
											'". $db->conn->real_escape_string($this->streetRestaurant)."',
											'". $db->conn->real_escape_string($this->numberRestaurant)."',
											'". $db->conn->real_escape_string($this->postalcodeRestaurant)."',
											'". $db->conn->real_escape_string($this->cityRestaurant)."',
											'". $db->conn->real_escape_string($this->typeRestaurant)."',
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

		public function getSpecificRestaurantfromOwner($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM restaurant WHERE restaurant_id = '$restaurantID'";
			
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
		
		public function deleteRestaurant($restaurantID)
		{
			$db = new Db();
			$deleteRestaurant = "DELETE FROM restaurant WHERE restaurant_id = '$restaurantID'";
			$deleteMenu = "DELETE FROM menu WHERE restaurant_id = '$restaurantID'";
			$deleteTable = "DELETE FROM `table` WHERE restaurant_id = '$restaurantID'";
			$deleteOpeninghours = "DELETE FROM openinghours WHERE restaurant_id = '$restaurantID'";
			
			$db->conn->query($deleteRestaurant);		
			$db->conn->query($deleteMenu);		
			$db->conn->query($deleteTable);		
			$db->conn->query($deleteOpeninghours);		
		}

		
		public function Search($type,$city){
			$db = new Db();
			$search = "SELECT * FROM restaurant WHERE restaurant_city = '$city' OR restaurant_type = '$type'";
			$res = $db->conn->query($search);
			return ($res);

		}
}
?>