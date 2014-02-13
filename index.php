<?php
	
	//Initialisation des données de session et données de page.

	session_start();
	$nomPage = "Accueil";
	
	//Inclusion du template principal de la page.
	include_once "templates/bodyView.php";
?>
	<div class="container">
		<div class="span3 imageAccueil">
			<img src="ressources/img/fleuriste.jpg" alt="Portrait fleuriste" />
		</div>
		<div class="span8 textAccueil">
			<p>
				<span class="enluminure">L</span>eader de la transmission florale, La Fleur vous propose à travers son site de vente de fleurs en ligne, 
				la garantie d'un service de qualité pour envoyer des fleurs en France et dans le monde.
				Grâce à son réseau de fleuristes, un envoi fleurs peut s'effectuer 7 jours sur 7, y compris jours fériés et 
				jours de fêtes (Saint Valentin, Fête des Grand-Mères, Fête des Mères... ). Livraison possible en moins de 4h. 
				Le fleuriste le plus proche effectuera alors la livraison de fleurs.
				Il vous suffit de choisir un bouquet, une composition florale ou une plante dans la collection La Fleur, ou 
				découvrir les créations personnelles de nos artisans fleuristes.
			</p>
		</div>
	</div>

<?php 

	//Inclusion du footer de la page.
	include_once 'templates/footerView.php';
?>