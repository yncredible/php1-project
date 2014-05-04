<?php 
	include_once('Db.class.php');

	Class Restaurateur
	{
		private $m_sName;
		private $m_sEmail;
		private $m_sPassword;

		private $salt = "WRSAERG34223HTYRWER339GS97GSSR";


		//Array to hold different errors
		public $errors = array();

		public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case "Name":
				if(empty($p_vValue)) //if Name is kept empty
				{
					$this->errors['errorName'] = "Please enter your name!";
				}
				elseif(!preg_match("#^[-A-Za-z\&\#0-9\;' .]*$#", $p_vValue)) //if Name has weird characters
				{
					$this->errors['errorName_char'] = "Your name contains invalid characters!";
				}
				else
				{
					$this->m_sName = $p_vValue;
				}
				break;


				case "Email":
				if(empty($p_vValue))  //if Email is kept empty
				{
					$this->errors['errorEmail'] = "Please enter your email!";
				}
				elseif(!filter_var($p_vValue, FILTER_VALIDATE_EMAIL)) //if Email isn't formed as an email adress
				{
					$this->errors['errorEmail_val'] = "Invalid email!";
				}
				else
				{
					$this->m_sEmail = $p_vValue;
				}
				break;



				case "Password":
				if(empty($p_vValue))  //if Password is kept empty
				{
					$this->errors['errorPassword'] = "Please enter your password!";
				}
				elseif(strlen($p_vValue) < 8) //if the length of Password is smaller than 8 characters long
				{
					$this->errors['errorPassword_len'] = "Password must be atleast 8 characters long";
				}
				else
				{
					$hashedPass = md5($p_vValue . $this->salt);
					
					$this->m_sPassword = $hashedPass;
				}
				break;

				default:
				echo "Property " . $p_sProperty . " does not exist.</br>";
			}
		}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case "Name":
				return $this->m_sName;
				break;

				case "Email":
				return $this->m_sEmail;
				break;

				case "Password":
				return $this->m_sPassword;
				break;

				default:
				echo "Property " . $p_sProperty . " does not exist.</br>";
			}
		}

		//Save registration information into database
		public function Save()
		{
			$db = new Db();
			$isAvailable = $this->CheckAvailability($db);

			//if the email adress is available save the information
			if($isAvailable)
			{
				$sql = "insert into restaurateur (owner_name, owner_email, owner_password)
						values (
									'". $db->conn->real_escape_string($this->Name)."',
									'". $db->conn->real_escape_string($this->Email)."',
									'". $db->conn->real_escape_string($this->Password)."'
								)";

				$result = $db->conn->query($sql);
			}
			//if the email is already in the database
			else
			{
				$this->errors['errorAvailability'] = "This email already exists!";
			}
			mysqli_close($db->conn);
		}

		//Check if the email is available
		public function CheckAvailability($db)
		{
			$sql = 	'select *
					 from restaurateur
					 where owner_email = "'. $db->conn->real_escape_string($this->Email) .'"';

			$result = $db->conn->query($sql);

			//if query ran successfully
			if($result)
			{
				$rows = mysqli_num_rows($result);
				//if the resulting rows is 1 or more
				if($rows >= 1)
				{
					//email not available
					$available = false;
				}
				else
				{
					//email is available
					$available = true;
				}
			}
			//if query ran unsuccesfully
			else
			{
				$available = false;
			}
			return $available;
		}

		public function Login($email, $password)
		{
			$db = new Db();

			//hash the password first
			$hashedPass = md5($password . $this->salt);

			//check if the given email matches the given password
			$sql = "SELECT * FROM restaurateur WHERE owner_email = '$email' AND owner_password = '$hashedPass'";

			$result = $db->conn->query($sql);

			$countRecords_Account = mysqli_num_rows($result);
			echo $countRecords_Account;
			if($result)
			{
				//if the inputs match and only 1 record gets thrown, give him an idintification key
				if($countRecords_Account == 1)
				{
					$_SESSION['ownerIdentity'] = $email;
				}
				//if they don't match, throw an error and no key
				else
				{
					$this->errors['errorLogin'] = "Your email and/or password are wrong!";
				}
			}
		}
	}
 ?>