<?php

	/**
	 * 
	 */
	function recupProduitLiteView() {
		
		include 'db.php';
		
		try {
			$db = new PDO('mysql:host='.$host.';dbname='.$dname.'', $user, $pass);
		
			$dataArticle=$db->query('SELECT NumArticle, NomArticle, PrixArticle, PhotoArticle FROM ARTICLE');
			
			while ($donnees = $dataArticle->fetch()) {
				echo '<li class="span3">';
					echo '<a href="#?w=500&n='.$donnees['NumArticle'].'" rel="produitView" class="poplight thumbnail id="Produit" onClick="popLight();">';
						echo '<img src="'.$donnees['PhotoArticle'].'" class="imageProduit" />';
						echo $donnees['NomArticle']." - ";
						echo $donnees['PrixArticle']." €";
						echo '<a href="#" class="btn btn-success" onClick="ajouterPanier('.$donnees['NumArticle'].','.$donnees['PrixArticle'].');">Ajouter au panier <i class="icon-plus-sign icon-white iconProduit"></i></a>';
					echo '</a>';
				echo '</li>';
			}
			
			$dataArticle->closeCursor();
			
		}
		catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
		
	}
	
	/**
	 * 
	 */
	function connecterClient($email, $passClient) {
		
		include 'db.php';
		
		try {
			$db = new PDO('mysql:host='.$host.';dbname='.$dname.'', $user, $pass);
			
			$dataClient=$db->prepare('SELECT * FROM CLIENT WHERE EmailClient = :EmailClient AND PassClient = :PassClient');
			$dataClient->bindValue(':EmailClient',$email, PDO::PARAM_STR);
			$dataClient->bindValue(':PassClient',$passClient, PDO::PARAM_STR);
			$dataClient->execute();
			
			if ($dataClient->rowCount() >= 1) {
				while ($donnees = $dataClient->fetch()) {
						
					$_SESSION['NumClient'] = $donnees['numClient'];
					$_SESSION['CiviliteClient'] = $donnees['CiviliteClient'];
					$_SESSION['NomClient'] = $donnees['NomClient'];
					$_SESSION['PrenomClient'] = $donnees['PrenomClient'];
					$_SESSION['TypeClient'] = $donnees['TypeClient'];
					$_SESSION['EmailClient'] = $donnees['EmailClient'];
					
					echo "Connecté !";
					header("Refresh: 0;");
				}
			}
			else {
				echo "Client inconnu";
			}	
		}
		catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
		
	}
	
	function convertirProduit($fichier, $categorie){
	
		if (($handle = fopen($fichier, "r")) !== FALSE) {
			$i=0;
			while(($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
				if($i != 0) {
					$nom = $data[0];
					$description = $data[1];
					$prix = $data[2];
					$photo = $data[3];
					enregistrerProduit($nom, $description, $prix, $photo, $categorie);
				}
				$i++;
			}
			fclose($handle);
		}
		else {
			echo ("fichier pas ouvert");
		}
	}
	
	function convertirBoutique($fichier){
	
		if (($handle = fopen($fichier, "r")) !== FALSE) {
			$i=0;
			while(($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
				if($i != 0) {
					$nom = $data[0];
					$adresse = $data[1];
					$codePostal = $data[2];
					$ville = $data[3];
					$photo = $data[4];
					$telephone = $data[5];
					$horaires = $data[6];
	
					enregistrerBoutique($nom, $adresse, $codePostal, $ville, $photo, $telephone, $horaires);
				}
				$i++;
			}
			fclose($handle);
		}
		else {
			echo ("fichier pas ouvert");
		}
	}
	
	function enregistrerProduit($nom, $description, $prix, $photo, $categorie) {
	
		$hote = 'localhost';
		$dbName = 'LaFleur';
		$user = 'root';
		$passwd = '';
	
		try {
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
			$insertion = $bdd->prepare('INSERT INTO ARTICLE (NumArticle, NomArticle, CategorieArticle, PrixArticle, DescriptionArticle, PhotoArticle)
					VALUES (\'\', :nomArticle, :categorieArticle, :prixArticle, :descriptionArticle, :photoArticle)');
			$insertion->execute(array(
					'nomArticle' => $nom,
					'categorieArticle' => $categorie,
					'prixArticle' => $prix,
					'descriptionArticle' => $description,
					'photoArticle' => $photo ));
			$insertion->closeCursor();
		}
		catch (Exception $erreur) {
			die('Erreur : ' . $erreur->getMessage());
		}
	}
	
	function enregistrerBoutique($nom, $adresse, $codePostal, $ville, $photo, $telephone, $horaires) {
	
		$hote = 'localhost';
		$dbName = 'LaFleur';
		$user = 'root';
		$passwd = '';
	
		try {
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
			$insertion = $bdd->prepare('INSERT INTO boutique (NomBoutique, AdresseBoutique, CPBoutique, VilleBoutique, TelephoneBoutique, HorairesBoutique, PhotoBoutique)
					VALUES (:nomBoutique, :adresseBoutique, :cpBoutique, :villeBoutique, :telephoneBoutique, :horairesBoutique, :photoBoutique)');
			$insertion->execute(array(
					'nomBoutique' => $nom,
					'adresseBoutique' => $adresse,
					'cpBoutique' => $codePostal,
					'villeBoutique' => $ville,
					'telephoneBoutique' => $telephone,
					'horairesBoutique' => $horaires,
					'photoBoutique' => $photo ));
			$insertion->closeCursor();
		}
		catch (Exception $erreur) {
			die('Erreur : ' . $erreur->getMessage());
		}
	}
	
	function importProduits($page) {
	
		$hote = 'localhost';
		$dbName = 'LaFleur';
		$user = 'root';
		$passwd = '';
	
		try {
			$db = new PDO('mysql:host='.$hote.';dbname='.$dbName, $user, $passwd);
	
			$reponse = $db->query('SELECT * FROM article WHERE CategorieArticle = "'.$page.'"');
	
			while ($donnees = $reponse->fetch()) {
					
				echo'<a href="descriptif.php?nom='.$donnees['NomArticle'].'"><img width="150px" height="150px" class="img1" src="img/'.$donnees['CategorieArticle'].'/'.$donnees['PhotoArticle'].'" "alt=" '.$donnees['NomArticle'].' " /></a>';
			}
				
			$reponse->closeCursor();
		}
			
		catch(Exception $e) {
			echo 'Erreur : '.$e->getMessage().'<br />';
			echo 'N° : '.$e->getCode();
		}
	}
	
	function importBoutique() {
	
		$hote = 'localhost';
		$dbName = 'LaFleur';
		$user = 'root';
		$passwd = '';
	
		try {
			$db = new PDO('mysql:host='.$hote.';dbname='.$dbName, $user, $passwd);
	
			$reponse = $db->query('SELECT * FROM BOUTIQUE');
				
			while ($donnees = $reponse->fetch()) {
	
				echo'<a href="descriptif.php?nom='.$donnees['NomBoutique'].'"><img width="150px" height="150px" src="img/boutiques/'.$donnees['PhotoBoutique'].'" "alt=" '.$donnees['NomBoutique'].' " /></a>';
			}
	
			$reponse->closeCursor();
		}
			
		catch(Exception $e) {
			echo 'Erreur : '.$e->getMessage().'<br />';
			echo 'N° : '.$e->getCode();
		}
	}
	
	function enrgFichier() {
	
		if ( isset($_POST['subButFichier'])&& isset($_FILES['impFichier']) ) {
	
			if ( $_FILES['impFichier']['error'] == 0 ) {
					
				// Récupération des informations du fichier
				$tailleFichier = $_FILES['impFichier']['size'];
				$typeFichier = $_FILES['impFichier']['type'];
				$nomFichier = $_FILES['impFichier']['name'];
				$detailsFichier = pathinfo($_FILES['impFichier']['name']);
				$extensionFichier = $detailsFichier['extension'];
					
				// Récupération de la page à modifier
				$page = $_POST['selectPage'];
					
				if ( $tailleFichier <= 1000000 ) {
	
					// Extension autorisée
					$extensionsPossibles = array('csv');
	
					if (in_array($extensionFichier, $extensionsPossibles)) {
							
						// Modification du nom du fichier
						if ( $page == "compos") {
	
							$newNomFichier = 'compositions.csv';
						}
							
						if ( $page == "fleurs") {
								
							$newNomFichier = 'fleurs.csv';
						}
						if ( $page == "plantes") {
								
							$newNomFichier = 'plantes.csv';
						}
						if ( $page == "boutique") {
	
							$newNomFichier = 'boutiques.csv';
						}
							
						rename('csv/'.$nomFichier, 'csv/'.$newNomFichier);
							
						// Ecriture du fichier télécharger
						$repertoireDestination = 'csv/';
						$resultat = move_uploaded_file($_FILES['impFichier']['tmp_name'],
								$repertoireDestination.$nomFichier);
							
						if ( $resultat ) {
	
							echo '<h4 class="goood">L\'envoi a bien été effectué !</h4>';
							echo 'Vous pouvez télécharger votre fichier <b>'.$nomFichier.'</b> en
						cliquant <a href="csv/'.$nomFichier.'">ici</a>';
						}
							
						else {
	
							echo '<h4 class="error">Désolé, mais nous n\'avons pas pu télécharger le
						fichier !</h4>';
						}
							
					}
	
					else {
							
						// L'extension n'est pas autorisée
						echo '<h4 class="error">Désolé, mais l\'extension <b>'.$extensionFichier.'</b>
					du fichier '.$_FILES['impFichier']['name'].' n\'est pas autorisé !</h4>';
					}
				}
					
				else {
	
					// La taille du fichier n'est pas autorisée
					echo '<h4 class="error">Désolé, la taille du fichier
				'.$_FILES['impFichier']['name'].' dépasse 1 Mo !</h4>';
				}
			}
	
			else {
					
				// Une erreur est survenue au téléchargement
				echo '<h4 class="error">Désolé mais il y a eu une erreur au téléchargement du
			fichier '.$_FILES['impFichier']['name'].' !</h4>';
			}
		}
	
		else {
	
			echo '<h4 class="error">Erreur, vous n\'avez pas saisi tous les champs !</h4>';
		}
	}
	
	function enrgImage() {
	
		if ( isset($_POST['subButImage'])&& isset($_FILES['impImage']) ) {
	
			if ( $_FILES['impImage']['error'] == 0 ) {
	
				// Récupération des informations du fichier
				$tailleFichier = $_FILES['impImage']['size'];
				$typeFichier = $_FILES['impImage']['type'];
				$nomFichier = $_FILES['impImage']['name'];
				$detailsFichier = pathinfo($_FILES['impImage']['name']);
				$extensionFichier = $detailsFichier['extension'];
	
				// Récupération de la page Ã  modifier
				$page = $_POST['selectPage'];
	
				if ( $tailleFichier <= 10000000 ) {
	
					// Extension autorisé
					$extensionsPossibles = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
	
					if (in_array($extensionFichier, $extensionsPossibles)) {
	
						// Modification du nom du fichier
						if ( $page == "compos") {
	
							$repertoireDestination = 'img/compo/';
						}
	
						if ( $page == "fleurs") {
								
							$repertoireDestination = 'img/fleurs/';
						}
						if ( $page == "plantes") {
								
							$repertoireDestination = 'img/plantes/';
						}
	
						// Ecriture du fichier téléchargé
						$resultat = move_uploaded_file($_FILES['impImage']['tmp_name'],
								$repertoireDestination.$nomFichier);
	
						if ( $resultat ) {
	
							echo '<h4 class="goood">L\'envoi a bien été effectué !</h4>';
							echo 'Vous pouvez télécharger votre fichier <b>'.$nomFichier.'</b> en
						cliquant <a href="'.$repertoireDestination.$nomFichier.'">ici</a>';
						}
	
						else {
	
							echo '<h4 class="error">Désolé, mais nous n\'avons pas pu télécharger le
						fichier !</h4>';
						}
	
					}
	
					else {
	
						// L'extension n'est pas autorisé
						echo '<h4 class="error">Désolé, mais l\'extension <b>'.$extensionFichier.'</b>
					du fichier '.$_FILES['impImage']['name'].' n\'est pas autorisé !</h4>';
					}
				}
	
				else {
	
					// La taille du fichier n'est pas autorisé
					echo '<h4 class="error">Désolé, la taille du fichier
				'.$_FILES['impFichier']['name'].' dépasse 1 Mo !</h4>';
				}
			}
	
			else {
	
				// Une erreur est survenue au téléchargement
				echo '<h4 class="error">Désolé, mais il y a eu une erreur au téléchargement du
			fichier '.$_FILES['impImage']['name'].' !</h4>';
			}
		}
	
		else {
	
			echo '<h4 class="error">Erreur, vous n\'avez pas saisi tous les champs !</h4>';
		}
	}
	