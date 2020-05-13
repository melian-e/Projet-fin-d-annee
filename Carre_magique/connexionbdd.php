<?php
	$link = mysqli_connect("localhost", "root", "" , "magic_square") ;
	if ($link == false){
		echo "Erreur de connexion : " . mysqli_connect_errno() ;
		die();
	}
	
	if(!mysqli_set_charset($link,"utf8")){
		echo("Error loading character set utf8: %s\n"), mysqli_error($conn);
		exit();
	}
?>