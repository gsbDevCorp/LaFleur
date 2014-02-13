
	<div class="container containerEspaceClient textCentre">
		<div class="span12">
			<h4 class="textCentre"><?php echo $_SESSION['PrenomClient'] . " " . $_SESSION['NomClient']; ?> - Espace client</h4>
		</div>
		
		<div class="span3 tuilesEspaceClient tuile1">
			<a href="#">Informations personnelles</a>
		</div>
		<div class="span3 tuilesEspaceClient tuile2">
			<a href="#">Suivi des commandes</a>
		</div>
		
		<?php 
			if(isset($_SESSION['NumClient']) && $_SESSION['TypeClient'] == "Administrateur") {
			
		?>
				<div class="span3 tuilesEspaceClient tuile3">
					<a href="administration.php">Administration du site</a>
				</div>
		<?php 
			}
		?>
	</div>