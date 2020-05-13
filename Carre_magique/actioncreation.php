<?php
	include 'connexionbdd.php';
	session_start();
	
	$pseudo = $_POST['pseudo'];
	$requete = "SELECT pseudo FROM personal_information WHERE pseudo = '$pseudo'";
	$result = mysqli_query($link, $requete);
	
	if(NULL == mysqli_fetch_assoc($result)) {
		$passwordhash = password_hash($_POST["password"], PASSWORD_DEFAULT);
		$requete = "INSERT INTO personal_information (pseudo, password, leaderboard) VALUES ('$pseudo','$passwordhash',0)";
		$result = mysqli_query($link,$requete);
		$_SESSION["auth"] = $pseudo;
		header("location:page.php");
	}
	else {
		$_SESSION["error"] = "samePseudo";
		header("location: creationcompte.php");
	}
?>