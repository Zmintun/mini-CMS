<?php 

	session_start();

	if ($_SESSION['uname']) {
		session_unset();
		session_destroy();
		header("location:login.php");
	}else{
		header("location:login.php");		
	}


 ?>