<?php
	
	class Reservation{

		private $m_sreservationName;
		private $m_ireservationNumberpeople;
		private $m_sreservationDay;
		private $m_ireservationHour;
		private $m_sreservationEmail;

		public function __set($p_sProperty, $p_vValue)
			{
				switch($p_sProperty)
				{
					case "reservationName":
					{
						$this->m_sreservationName = $p_vValue;
					}
					break;
					
					case "reservationNumberpeople":
					{
						$this->m_ireservationNumberpeople = $p_vValue;
					}
					break;

					case "reservationDay":
					{
						$this->m_sreservationDay = $p_vValue;
					}
					break;

					case "reservationHour":
					{
						$this->m_ireservationHour = $p_vValue;
					}
					break;
					case "reservationEmail":
					{
						$this->m_sreservationEmail = $p_vValue;
					}
					break;
				}
			}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case "reservationName":
				return $this->m_sreservationName;
				break;
				
				case "reservationNumberpeople":
				return $this->m_ireservationNumberpeople;
				break;

				case "reservationDay":
				return $this->m_sreservationDay;
				break;

				case "reservationHour":
				return $this->m_ireservationHour;
				break;

				case "reservationEmail":
				return $this->m_sreservationEmail;
				break;
			}
		}

		public function saveReservations($restaurantID){

			$db = new Db();
			$saveRes = "insert INTO reservations 
								(reservation_name,
								 reservation_number,
								 reservation_day,
								 reservation_hour,
								 reservation_email,
								 restaurant_id)
								VALUES (
								'". $db->conn->real_escape_string($this->reservationName)."',
								'". $db->conn->real_escape_string($this->reservationNumberpeople)."',
								'". $db->conn->real_escape_string($this->reservationDay)."',
								'". $db->conn->real_escape_string($this->reservationHour)."',
								'". $db->conn->real_escape_string($this->reservationEmail)."',
								". $restaurantID ."
								)";
			
			$sql = $db->conn->query($saveRes);
			
			return($sql);
			echo $saveRes;
			
		
		}

		public function sendEmail($restaurantID){
			

			if ( isset ( $_POST ['reservation_submit'] )){

			$db = new Db();
			$getEmail = "SELECT restaurant_email FROM restaurant WHERE restaurant_id = ".$restaurantID;

			$sql = $db->conn->query($getEmail);

			return($sql);

			// REPLACE THE LINE BELOW WITH YOUR E-MAIL ADDRESS.
			$to = $getEmail;
			$subject = 'reservation' ;

			// NOT SUGGESTED TO CHANGE THESE VALUES
			$message = "reservatie op naam van: " ;
			$headers = 'From: ' . $_POST[ "reservationName" ] . PHP_EOL ;
			mail ( $to, $subject, $message, $headers ) ;

			echo "Your e-mail has been sent! You should receive a reply within 24 hours!" ;}

			else
			{
				header('Location:index.php');
			} 
		}


}
?>