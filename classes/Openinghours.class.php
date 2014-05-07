<?php 
	include_once('Db.class.php');
	
	class Openinghours
	{

		private $opening_monday_from;
		private $opening_monday_until;
		private $opening_tuesday_from;
		private $opening_tuesday_until;
		private $opening_wednesday_from;
		private $opening_wednesday_until;
		private $opening_thursday_from;
		private $opening_thursday_until;
		private $opening_friday_from;
		private $opening_friday_until;
		private $opening_saturday_from;
		private $opening_saturday_until;
		private $opening_sunday_from;
		private $opening_sunday_until;
		private $opening_remarks;

	public function __set($p_sProperty, $p_vValue)
	{
		switch($p_sProperty)
		{
			case "MondayFrom":
			{
				$this->opening_monday_from = $p_vValue;
			}
			break;

			case "MondayUntil":
			{
				$this->opening_monday_until = $p_vValue;
			}
			break;

			case "TuesdayFrom":
			{
				$this->opening_tuesday_from = $p_vValue;
			}
			break;

			case "TuesdayUntil":
			{
				$this->opening_tuesday_until = $p_vValue;
			}
			break;

			case "WednesdayFrom":
			{
				$this->opening_wednesday_from = $p_vValue;
			}
			break;

			case "WednesdayUntil":
			{
				$this->opening_wednesday_until = $p_vValue;
			}
			break;

			case "ThursdayFrom":
			{
				$this->opening_thursday_from = $p_vValue;
			}
			break;

			case "ThursdayUntil":
			{
				$this->opening_thursday_until = $p_vValue;
			}
			break;

			case "FridayFrom":
			{
				$this->opening_friday_from = $p_vValue;
			}
			break;

			case "FridayUntil":
			{
				$this->opening_friday_until = $p_vValue;
			}
			break;

			case "SaturdayFrom":
			{
				$this->opening_saturday_from = $p_vValue;
			}
			break;

			case "SaturdayUntil":
			{
				$this->opening_saturday_until = $p_vValue;
			}
			break;

			case "SundayFrom":
			{
				$this->opening_sunday_from = $p_vValue;
			}
			break;

			case "SundayUntil":
			{
				$this->opening_sunday_until = $p_vValue;
			}
			break;

			case "Remarks":
			{
				$this->opening_remarks = $p_vValue;
			}
			break;
		}
	}

	public function __get($p_sProperty)
	{
		switch($p_sProperty)
		{
			case "MondayFrom":
			return $this->opening_monday_from;
			break;

			case "MondayUntil":
			return $this->opening_monday_until;
			break;

			case "TuesdayFrom":
			return $this->opening_tuesday_from;
			break;

			case "TuesdayUntil":
			return $this->opening_tuesday_until;
			break;

			case "WednesdayFrom":
			return $this->opening_wednesday_from;
			break;

			case "WednesdayUntil":
			return $this->opening_wednesday_until;
			break;

			case "ThursdayFrom":
			return $this->opening_thursday_from;
			break;

			case "ThursdayUntil":
			return $this->opening_thursday_until;
			break;

			case "FridayFrom":
			return $this->opening_friday_from;
			break;

			case "FridayUntil":
			return $this->opening_friday_until;
			break;

			case "SaturdayFrom":
			return $this->opening_saturday_from;
			break;

			case "SaturdayUntil":
			return $this->opening_saturday_until;
			break;

			case "SundayFrom":
			return $this->opening_sunday_from;
			break;

			case "SundayUntil":
			return $this->opening_sunday_until;
			break;

			case "Remarks":
			return $this->opening_remarks;
			break;
		}
	}

	public function addOpeninghours($restaurantID)
	{
		$db = new Db();

			$sql = "INSERT INTO openinghours (
												opening_monday_from,
												opening_monday_until,
												opening_tuesday_from,
												opening_tuesday_until,
												opening_wednesday_from,
												opening_wednesday_until,
												opening_thurday_from,
												opening_thurday_until,
												opening_friday_from,
												opening_friday_until,
												opening_saturday_from,
												opening_saturday_until,
												opening_sunday_from,
												opening_sunday_until,
												opening_remarks,
												restaurant_id
											 )
						VALUES (
									'". $db->conn->real_escape_string($this->MondayFrom)."',
									'". $db->conn->real_escape_string($this->MondayUntil)."',
									'". $db->conn->real_escape_string($this->TuesdayFrom)."',
									'". $db->conn->real_escape_string($this->TuesdayUntil)."',
									'". $db->conn->real_escape_string($this->WednesdayFrom)."',
									'". $db->conn->real_escape_string($this->WednesdayUntil)."',
									'". $db->conn->real_escape_string($this->ThursdayFrom)."',
									'". $db->conn->real_escape_string($this->ThursdayUntil)."',
									'". $db->conn->real_escape_string($this->FridayFrom)."',
									'". $db->conn->real_escape_string($this->FridayUntil)."',
									'". $db->conn->real_escape_string($this->SaturdayFrom)."',
									'". $db->conn->real_escape_string($this->SaturdayUntil)."',
									'". $db->conn->real_escape_string($this->SundayFrom)."',
									'". $db->conn->real_escape_string($this->SundayUntil)."',
									'". $db->conn->real_escape_string($this->Remarks)."',
									'". $restaurantID."'
								)";

			$result = $db->conn->query($sql);
	}
	}

 ?>