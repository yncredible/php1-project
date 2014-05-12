<?php

	include_once('Db.class.php');

	class Feedback
	{

		private $m_sName;
		private $m_sSort;
		private $m_sMessage;


		public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case "feedbackName":
				{
					$this->m_sName = $p_vValue;
				}
				break;
				
				case "feedbackSort":
				{
					$this->m_sSort = $p_vValue;
				}
				break;

				case "feedbackMessage":
				{
					$this->m_sMessage = $p_vValue;
				}
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case "feedbackName":
				return $this->m_sName;
				break;
				
				case "feedbackSort":
				return $this->m_sSort;
				break;

				case "feedbackMessage":
				return $this->m_sMessage;
				break;
			}
		}

		public function saveFeedback($restaurantID){

			$db = new Db();
			$sql = "INSERT INTO feedback 
					(feedback_name,
					feedback_message,
					feedback_sort,
					restaurant_id) 
					VALUES 
					('". $db->conn->real_escape_string($this->name)."',
					 '". $db->conn->real_escape_string($this->message)."',
					 '". $db->conn->real_escape_string($this->sort)."',
					 ". $restaurantID ."
					)";

			$result = $db->conn->query($sql);
			echo $sql;
			return ($result);

		}



	}
?>