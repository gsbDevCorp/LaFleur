<?php
	
	//Initialisation des données de session et données de page.

	session_start();
	$nomPage = "Contact";
	
	//Inclusion du template principal de la page.
	include_once "templates/bodyView.php";
?>

	<div class="container">
	
		<div class="span12">
			<h4 class="titreContact">Contactez le magasin le plus proche de chez vous :</h4>
				<ul class="thumbnails">
					<?php 
						for ($i=1;$i<7;$i++) {
							echo '<li class="span4">';
								echo '<a href="#?w=400" rel="magasinView" class="poplight thumbnail" onClick="popLight();">';
									echo '<img src="ressources/img/boutiques/00'.$i.'.jpg" class="imageProduit" />';
									echo "Ville du magasin";
								echo '</a>';
							echo '</li>';
						}
					?>
				</ul>
		</div>
		
		<div class="span12">	
			<h4 class="titreContact">Contactez nous par Email :</h4>
				<?php 
					include_once 'templates/formMailView.php';
				?>
		</div>
		
		
	</div>

<?php
	//Inclusion de la popUp magasin
	include_once 'templates/magasinView.php'; 

	//Inclusion du footer de la page.
	include_once 'templates/footerView.php';
?>