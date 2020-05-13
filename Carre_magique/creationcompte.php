<!DOCTYPE html>
<html lang="fr" >
<head> 
	<meta charset="utf-8" />
	<link rel="stylesheet" href="second site.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<title>Créer un compte</title>
</head>

<body>

	<div class="container-fluid" style="margin-top:70px; ; width:70%; padding:20px">
		<h1 style=" font-size: 40px; text-align: center; margin-top: 20px;">Créer un compte</h1>
		<form method="post" action="actioncreation.php">
			<?php
			session_start();
			if(isset($_SESSION["error"]) && $_SESSION["error"] == "samePseudo"){
				echo "<p style=\"color:red; text-align: center; font-style:bold\">Ce pseudo est déjà utilisé !</p>";
				unset($_SESSION["error"]);
			}
			?>
			<div class="row">
				<div class="col-2"></div>
				<div class="col-8 center-block">
					<div class="form-group">
						<label for="texte" >Pseudo : </label>
						<input name="pseudo" type="text" class="form-control" required>
					</div>
					<label for="password" class="form-control-label">Mot de passe</label>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
						<div class="input-group-append">
							<button type="button" class="btn btn-outline-primary" onclick="togglePassword('password');">Voir</button>
						</div>
					</div>
					<input type="submit" name="modif" class="btn btn-primary" id="modif" value="Créer un compte"/>
					<a class="btn btn-outline-primary " href="page.php" role="button">Retour</a>
				</div>
			</div>
		</form>
	</div>

	<script>
		function togglePassword(fieldId){
			var field = document.getElementById(fieldId);
			field.type = (field.type == "password") ? "text" : "password";
			field.focus();
			field.setSelectionRange(field.value.length, field.value.length);
		}
	</script>

</body>
</html>