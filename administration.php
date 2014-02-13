<?php
	
	//Initialisation des données de session et données de page.

	session_start();
	$nomPage = "Espace client";
	
	//Inclusion du template principal de la page.
	include_once "templates/bodyView.php";
?>

	<div class="container">
	
		<?php 
			include_once 'templates/administrationView.php';
		?>
			<?php include_once 'includes/fonctions.php';
		if (isset($_POST['subButFichier'])==true){
			
			enrgFichier();
			$categorie = $_POST['selectPage'];
			$fichier = 'csv/'.$_FILES['impFichier']['name'];
			
			if ($categorie != "boutique") {
				convertirProduit($fichier, $categorie);
			}
			if ($categorie == "boutique") {
				convertirBoutique($fichier);
			}	
		}
		if (isset($_POST['subButImage'])){
			enrgImage();
		}
		 
		?>
	</div>
	
<?php
	//Inclusion de la popUp produit
	include_once 'templates/produitView.php'; 

	//Inclusion du footer de la page.
	include_once 'templates/footerView.php';
?>