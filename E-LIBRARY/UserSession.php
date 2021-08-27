<?php
	session_start();
	$inactive = 60;
	if(isset($_SESSION['start']))
	{
		$session_life = time() - $_SESSION['start'];
		if($session_life>$inactive)
		{
			unset($_SESSION['ulogin']);
			session_destroy(); // destroy session
			echo "<script>alert('Session Timeout');</script>" ;
			header("location:index.php"); 
		}
	}
	$_SESSION['start'] = time();
?>