<h4>Importer de nouveaux produits :</h4>
					<form method="post" action="administration.php" id="formulaire2" enctype="multipart/form-data" >
					<p>
					Selectionner votre page :
						<select name="selectPage" size="1" >
							<option value="compos" >Compositions florales</option>
							<option value="fleurs" >Nos fleurs</option>
							<option value="plantes" >Nos plantes</option>
							<option value="boutique">Boutique</option>
						</select> 
					</p>
					<h4>Votre dossier :</h4>
					<p>
						<input name="impFichier" type="file"  /><br /><br />
						<input type="submit" name="subButFichier" value="Envoyer" />
						<input type="reset" name="delete" value="Effacer" />
					</p>
					<p class="info"><img src="img/danger.bmp" width="20px" height="20px"/> Les fichiers doivent avoir une extention .csv</p>
					</form>
					
					<hr />
					
					<h4>Importer de nouvelles images :</h4>
					<form method="post" action="administration.php" id="formulaire" enctype="multipart/form-data" >
					<p>
					Selectionner le type d'images:
						<select name="selectPage" size="1" >
							<option value="compos" >Composition florale</option>
							<option value="fleurs" >Fleurs</option>
							<option value="plantes" >Plante</option>
						</select> 
					</p>
					
					<h4>Votre image :</h4>
					<p>
						<input name="impImage" type="file"  /><br /><br />
						<input type="submit" name="subButImage" value="Envoyer" />
						<input type="reset" name="delete" value="Effacer" />
					</p>
					<p class="info"><img src="img/danger.bmp" width="20px" height="20px"/> Les fichiers doivent avoir une extention .jpg, .jpeg, .gif ou .bmp</p>
					</form>
		
				</div>
			</div>