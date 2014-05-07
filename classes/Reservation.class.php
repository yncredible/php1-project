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
				return $this->m_iTableNumber;
				break;
				
				case "reservationNumberpeople":
				return $this->m_iTablePersons;
				break;

				case "reservationDay":
				return $this->m_sTableDescription;
				break;

				case "reservationHour":
				return $this->m_sTableStatus;
				break;

				case "reservationEmail":
				return $this->m_sTableStatus;
				break;
			}
		}

	}



?>