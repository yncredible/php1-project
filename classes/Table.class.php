<?php
	include_once('Db.class.php');

	class Table
	{

		private $m_iTableNumber;
		private $m_iTablePersons;
		private $m_sTableDescription;
		private $m_sTableStatus;


	public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case "Number":
				{
					$this->m_iTableNumber = $p_vValue;
				}
				break;
				
				case "Persons":
				{
					$this->m_iTablePersons = $p_vValue;
				}
				break;

				case "Description":
				{
					$this->m_sTableDescription = $p_vValue;
				}
				break;

				case "Status":
				{
					$this->m_sTableStatus = $p_vValue;
				}
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case "Number":
				return $this->m_iTableNumber;
				break;
				
				case "Persons":
				return $this->m_iTablePersons;
				break;

				case "Description":
				return $this->m_sTableDescription;
				break;

				case "Status":
				return $this->m_sTableStatus;
				break;
			}
		}
		public function addTable($restaurantID)
		{

			$db = new Db();

			$sql = "INSERT INTO `table` (table_nr, table_persons, table_status, table_description, restaurant_id)
						VALUES (
									". $db->conn->real_escape_string($this->Number).",
									". $db->conn->real_escape_string($this->Persons).",
									'". $db->conn->real_escape_string($this->Status)."',
									'". $db->conn->real_escape_string($this->Description)."',
									". $restaurantID ."
								)";

			$result = $db->conn->query($sql);

			if($result)
			{
				$sql2 = "SELECT LAST_INSERT_ID() FROM `table` order by table_id desc limit 1";
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

		public function getSpecificTablesfromRestaurant($restaurantID)
		{
			$db = new Db();
			$sql = "SELECT * FROM `table` WHERE restaurant_id = '$restaurantID'";
			
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

		function DeleteTable($tableID)
		{
			$db = new Db();

			$sql = "DELETE FROM `table`
					WHERE table_id = '$tableID'";

			$result = $db->conn->query($sql);
			echo $sql;
		}

		function ChangeStatus($tableID, $tableChange)
		{
			$db = new Db();

			$sql = "UPDATE `table` SET table_status = '$tableChange' WHERE table_id = '$tableID'";

			$result = $db->conn->query($sql);

			if($result)
			{
				$sql2 = "SELECT * FROM `table` WHERE table_id = '$tableID'";

				$result2 = $db->conn->query($sql2);

				if($result2)
				{
					$rows = array();
					while ($row = mysqli_fetch_array($result2, MYSQL_ASSOC)) 
					{
					    $rows[] = $row;
					}
					$alarmInfo = $rows;
					echo json_encode($alarmInfo);
				}

			}
		}
	}
?>