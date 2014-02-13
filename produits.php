<?php
	
	//Initialisation des données de session et données de page.

	session_start();
	$nomPage = "Produits";
	
	//Inclusion du template principal de la page.
	include_once "templates/bodyView.php";
?>

	<div class="container">
	
		<?php 
			//Inclusion du template de recherche produits.
			include_once 'templates/searchView.php';
		?>
	
		<div class="span12">
		
			<ul class="thumbnails">
				<?php 
					/* for ($i=1;$i<8;$i++) {
						echo '<li class="span3">';
						$nProd='15';
							echo '<a href="#?w=500&n=15" rel="produitView" class="poplight thumbnail id="Produit" onClick="popLight();">';
								echo '<img src="ressources/img/plantes/00'.$i.'.gif" class="imageProduit" />';
								echo "30 €";
							echo '</a>';
						echo '</li>';
					} */
					include_once 'includes/fonctions.php';
					recupProduitLiteView();
				?>
		    </ul>
		
		</div>
	
	</div>
	

<?php
	//Inclusion de la popUp produit
	include_once 'templates/produitView.php'; 

	//Inclusion du footer de la page.
	include_once 'templates/footerView.php';
?>