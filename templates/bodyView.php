<!DOCTYPE html>
<html>
	<head>
		<!-- Informatiosn générales de la page -->
		<meta charset="UTF-8">
		<title><?php echo $nomPage; ?> | La Fleur - Vente de fleurs en ligne</title>
		
		<!-- Inclusion de bootstrap -->
		<link href="ressources/css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
		<script src="ressources/css/bootstrap/js/bootstrap.min.js "></script>
		<!-- JQuery -->
		<script type="text/javascript" src="ressources/js/jquery-1.10.1.js"></script>
		<!-- LightBox -->
		<link href="ressources/lightbox/css/lightbox.css" rel="stylesheet" />
		<script src="ressources/js/holder.js"></script>
		<script src="ressources/lightbox/js/jquery-1.7.2.min.js"></script>
		<script src="ressources/lightbox/js/lightbox.js"></script>
		<!-- PopLight -->
		<script src="ressources/js/poplight/poplight.js"></script>
		<script src="includes/PopLight.js"></script>
		<!-- Inclusion des styles personalisés -->
		<link href="ressources/css/style.css" rel="stylesheet" type="text/css" />
		<script src="ressources/js/fonctions.js"></script>
		
		
	</head>
	
	<body onLoad="recupererCookies('montantPanier');">
	
		<header class="row BDMarron">
		
			<div class="container ">
			
				<div class="span12">
					<h1 class="titre">La Fleur</h1><br />
					<h5 class="sousTitre"><i class="icon-leaf"></i> Votre fleuriste en ligne</h3>
				</div>
				
			</div>
					
		</header>
		
		<div class="row BDVert">
			<div class="container">
			
				<nav class="span12 navigation">
					<ul>
						<li <?php if ($nomPage == "Accueil") { echo 'id="pageActive"';} ?> ><a class="1" href="index.php">Accueil</a></li>
						<li <?php if ($nomPage == "Produits") { echo 'id="pageActive"';} ?> ><a href="produits.php"> Nos produits</a></li>
						<li <?php if ($nomPage == "Contact") { echo 'id="pageActive"';} ?> ><a href="contact.php">Nous contacter</a></li>
					</ul>
				</nav>
				
			</div>
		</div>
		
		<div class="container tamponNavigation"></div>

