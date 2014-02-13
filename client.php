<?php
	
	//Initialisation des données de session et données de page.

	session_start();
	$nomPage = "Espace client";
	
	//Inclusion du template principal de la page.
	include_once "templates/bodyView.php";
?>

	<?php 
	
		include_once 'includes/fonctions.php';
		
		if(isset($_SESSION['NumClient'])) {
			include_once 'templates/espaceClientView.php';
		}
		
		else {
			if(isset($_POST['subLoginClient'])) {
				connecterClient(htmlspecialchars($_POST['textEmailClientLogin']), htmlspecialchars(md5($_POST['mdpClient'])));
			}
			elseif(isset($_POST['subInscriptionClient'])) {
					
			}
			?>
				<div class="container containerClient">
					<div class="span6 divLoginClient">
						<h4>Déjà client :</h4>
						<form id="loginClient" name="loginClient" method="post" action="client.php">
							<label for="textEmailClientLogin">Email :</label><input type="text" id="textEmailClientLogin" name="textEmailClientLogin" />
							<label for="mdpClient">Mot de passe :</label><input type="password" id="mdpClient" name="mdpClient" />
							<br />
							<input type="submit" id="subLoginClient" name="subLoginClient" value="Se connecter" class="btn btn-primary" />
							<br />
							<a href="#?w=550" rel="recuperationMDPView" class="poplight lienAide" OnClick="popLight();">Mot de passe oublié ?</a>
						</form>
					</div>
					
					<div class="span6 divInscriptionClient">
						<h4>Nouveau client :</h4>
						<form id="inscriptionClient" name="inscriptionClient" method="post" action="client.php">
							<label for="nomClient">Nom :</label><input type="text" id="textNomClient" name="textNomClient" />
							<label for="prenomClient">Prénom :</label><input type="text" id="textPrenomClient" name="textPrenomClient" />
							<label for="textEmailClient">Email :</label><input type="text" id="textEmailClient" name="textEmailClient" />
							<label for="passClientInscription">Mot de passe :</label><input type="password" id="passClientInscription" name="passClientInscription" />
							<br />
							<input type="submit" id="subInscriptionClient" name="subInscriptionClient" value="S'inscrire" class="btn btn-primary" />
						</form>
					</div>
				</div>
			<?php
		}
		
		
		
	?>
				
	
	
<?php
	//Inclusion de la popUp de récupération de mot de passe
	include_once 'templates/recuperationMDPView.php'; 

	//Inclusion du footer de la page.
	include_once 'templates/footerView.php';
?>