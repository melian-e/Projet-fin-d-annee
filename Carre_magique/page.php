<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="CSS.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<title>Carré Magique</title>
</head>

<?php
session_start();
echo "<body ";
if(isset($_SESSION["error"]) && ($_SESSION["error"] == "wrongPassword" || $_SESSION["error"] == "noAccount")){
	echo "onload=\"autosubmit()\"";
}
echo ">";
?>

	<div class="navbar bg-primary  text-center justify-content-center navbar-dark" style="margin-bottom:0; ">
		<h1 style="font-size: 65px; color: white; text-align: center;">Carré magique</h1>
	</div>
	
	<nav class="navbar navbar-expand-sm bg-primary navbar-dark" style="border: solid black 3px;">
	
		<div class="nav-item">
			<?php
			if(!isset($_SESSION["auth"])){
				echo "<button id=\"connect\" class=\"btn btn-primary\" style=\"margin:20px;\" data-toggle=\"modal\" data-target=\"#connection\">Connexion</button>";
				unset($_SESSION["auth"]);
			}
			else {
				echo "<a href=\"deconnexion.php\" class=\"btn btn-primary\" style=\"margin:20px;\" type=\"button\">Deconnexion</a>";
			}
			?>
			<div class="modal fade" id="connection">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Se connecter :</h4>              
							<button type="button" class="close" data-dismiss="modal">
								<span>&times;</span>
							</button>             
						</div>
						
						<?php
						if(!isset($_SESSION["error"])){
							//
						}else if($_SESSION["error"] == "noAccount"){
							echo "<p style=\"color:red; text-align: center; font-style:bold\">Le compte n'existe pas !</p>";
						}else if($_SESSION["error"] == "wrongPassword"){
							echo "<p style=\"color:red; text-align: center; font-style:bold\">Le password est incorrecte !</p>";
						}
						unset($_SESSION["error"]);
						?>
						<div class="modal-body row">
							<form class="col" action="actionconnexion.php">
								<div class="form-group">
									<label for="email" class="form-control-label">Pseudo</label>
									<input type="text" class="form-control" name ="pseudo" placeholder="Votre pseudo" required>
								</div>
								
								<label for="password" class="form-control-label">Mot de passe</label>
								
								<div class="input-group mb-3">
									<input type="password" class="form-control" name="password1" id="password1" placeholder="Password" required>
									<div class="input-group-append">
										<button type="button" class="btn btn-outline-primary" onclick="togglePassword('password1');">Voir</button>
									</div>
								</div>
						
								<div align="center">
									<button type="submit" class="btn btn-primary center-block">Envoyer</button>
								</div>
							</form>
						</div>
						
						<div class="modal-body row">
							<form class="col" action="creationcompte.php">
								<div align="center">
									<p style="margin-top : 8px;"> Pas de Compte? Créez en un ici ! <p>
									<button class="btn btn-primary center-block" >Créer un compte</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" style="color: white;" id="navbardrop" data-toggle="dropdown">SCORES</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Par niveau</a>
				<a class="dropdown-item" href="#">Par temps</a>
			</div>
		</div>
		
		<div class="nav-item">
			<button type="button" class="btn btn-primary" style="margin:20px;" data-toggle="modal" data-target="#regle">Règles</button>
			<div class="modal fade" id="regle">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Règles :</h4>              
							<button type="button" class="close" data-dismiss="modal">
								<span>&times;</span>
							</button>             
						</div>
						<div class="modal-body row">
							<p style="margin: 5px;"> Le but du jeu du carré magique numérique est d'inscrire les nombres qui sont
							mis à votre disposition dans le quadrillage de cette grille, et de faire en sorte que l'addition des
							nombres qui se trouvent placés sur une même ligne, colonne et diagonale de petites cases se révèlent
							semblables à toutes ses autres sommes. 
							</p>
							<img src="Exemple.png" alt="Exemple"/>
							<p style="margin: 5px;">Un exemple de carré magique normal d’ordre 3 et de constante magique 15.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
	
	<div class="container contenupage">
		<div class="container rounded border border-dark" style="background-color: yellow; margin-top: 40px; margin-bottom: 40px;">
			<div class="container" style="height: 100%; width: 100%;">
				<div class="row">
					<button type="button" class="btn button" style="margin-bottom: 30px;">Choix du niveau</button>
				</div>
			
				<div class="row">
					<button type="button" class="btn button">Création de niveau</button>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

<script>
	function togglePassword(fieldId){
		var field = document.getElementById(fieldId);
		field.type = (field.type == "password") ? "text" : "password";
		field.focus();
		field.setSelectionRange(field.value.length, field.value.length);
	}
	
	function autosubmit(){
	$('#connection').modal('show');
	}
</script>