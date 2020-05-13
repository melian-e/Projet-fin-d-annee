<?php
	session_start();
	unset($_SESSION["error"]);
	unset($_SESSION["auth"]);
	
	$pseudo = $_GET['pseudo'];
	$password =  $_GET['password1'];
	
	include 'connexionbdd.php';
	$requete = "SELECT pseudo, password FROM personal_information WHERE pseudo = '$pseudo'";
	$result = mysqli_query($link, $requete);
	$row = mysqli_fetch_assoc($result);
		
	if(mysqli_num_rows($result) == 0){
		$_SESSION["error"] = "noAccount";
	}
	else if (password_verify($password, $row['password'])){
		$_SESSION["auth"] = $pseudo;
	}
	else{
		$_SESSION["error"] = "wrongPassword";
	}
	
	header("location:page.php");
?>