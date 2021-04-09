<?php
include("connect.php");
?>

<!DOCTYPE html!>
<html>
	<head>
		<meta charset="utf-8"/>
		  <link rel="stylesheet" type="text/css" href="style.css">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<title>Inscription</title>
	</head>
	<body>
		<h1 class="renseigner">Bonjour veuillez renseigner vos informations! </h1>
		<div class="container" style="margin-top:30px">
			<div id="container">
				<form action="" method="POST">
					<h2>Inscription</h2>
						<p class="afficheid"><?php
							$sql = $bdd->query('SELECT MAX(num_Personnel) AS id FROM personnel');
							while ($_SESSION = $sql->fetch()){
								$id= $_SESSION['id']+1;
							}
							echo "Votre id sera le ".$id." .";
						?></p><br/>
						<label for="nom">Entrez votre nom :</label><br/>
	                  	<input type="text" id="nom" name="nom" /><br /><br />
						<label for="mdp">Mot de passe :</label><br/>
						<input type="password" id="mdp" name="mdp" /><br /><br />
						<label for="mdp2">Confirmation du mot de passe :</label><br/>
	                  	<input type="password" id="mdp2" name="mdp2"/><br/><br/>
	                  	<input type="Submit" name="Submit" value="Je m'inscris" />
						<input type="reset" id="Reset" value="Réinitialiser" /><br/><br/>
						<a href="index.php">Retour au login</a>
				</form>
			</div>		
		</div>

	</body>
</html>


<?php
				if(isset($_POST['Submit'])) {
				$nom_personnel=htmlspecialchars($_POST["nom"]);
				$motdepasse=htmlspecialchars($_POST["mdp"]);
				$motdepasse2=htmlspecialchars($_POST["mdp2"]);
					if($motdepasse <= 25 or $motdepasse >= 5){
						if($motdepasse == $motdepasse2){
							$table=mysqli_connect($dbhost,$dbusername,$dbpassword);
							mysqli_select_db($table,$dbname);
							
							mysqli_query($table,"insert into personnel(motdepasse,nom_personnel) values('$motdepasse','$nom_personnel');")or die ('Erreur :');
						}else{
							echo "MDP pas identique !!!";
						}
					}else{
						echo "MDP trop court ou trop long !!!";
					}
					
				}
?>