<?php 
	
	session_start();
	if(isset($_SESSION['ownerIdentity']))
	{
		unset($_SESSION['ownerIdentity']);
		session_write_close();
		header("location: login.php");
	}
	else
	{
		header("location: login.php");
	}

 ?>