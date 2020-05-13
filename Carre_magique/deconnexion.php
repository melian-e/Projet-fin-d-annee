<?php
	session_start();
	
	unset($_SESSION["auth"]);
	unset($_SESSION["error_1"]);

	session_destroy(); 
	
	header("location:page.php");
?>