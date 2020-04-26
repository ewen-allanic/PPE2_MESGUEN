<?php 
include "header.php";

$sql= "SELECT * FROM lieu";
$cpt = compteSQL($sql);
$result = tableSQL($sql);

$trnnum = $_POST["edit-num"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Fiche Etape</title>
</head>
<body>
	<div class="container">
		<br/>
		<p class="bandeau">
			AC13 - Organiser les tournées  - Tournée <?php echo $trnnum; ?> - Nouvelle étape
		</p>

		<div class="bloc13">
			<form id="formulaire" action="AC13_Inser.php" method="post">
				
					<label for="liste">Lieu </label>

					<select size="1" name="lieu" id="lieu" class="liste2">
		    			<?php 
		                 	if ($cpt==0) 
		                   		echo "disabled=\"disabled\""; 
		         		?>    									>
		    
				    	<?php 
							if ($cpt>0) {						
								foreach ($result as $ligne) {
									//on extrait chaque valeur de la ligne courante
									$LieuID = $ligne[0];
									$LieuNom = $ligne[2];
									
									echo "<option value=$LieuID>$LieuNom</option>";

								}											
							}else {
								echo "<option>Aucune information...</option>";
							}
						?>    
					</select>

					<br/>
					<br/>

					<p>
						<label for="RDV-MIN-DATE">Rendez vous entre </label>
						<input id ="example-date-input" name="RDV-MIN-DATE" type="date" />
						<input id ="example-date-input" name="RDV-MIN-HEURE" type="time" />
					</p>

					<br/>

					<p>
						<label for="et">					et </label>
						<input id ="example-date-input" name="RDV-MAX-DATE" type="date" />
						<input id ="example-date-input" name="RDV-MAX-HEURE" type="time" />
					</p>

					<br/>

					<p>
						<label for="PEC">Pris en charge le </label>
						<input id ="example-date-input" name="PEC" type="text" value="<?php echo date('d/m/y H:i');?>" readonly ="readonly" />
					</p>

					<br/>

					<p>
						<label for="Commentaire">Commentaire</label>
						<textarea id="Commentaire" name="Commentaire" rows="5" cols="15"></textarea>
					</p>
				
					

					<button class="boutonMA" name="edit-num" type="submit" value="<?php echo $trnnum; ?>" title=""><img src="images\Valider.png" width="14" height="14"/> Valider</button>

			</form>

			<form action='AC12-Modif.php' method='post'>
				<button type='submit' class="bouton2MA"><img src='images/Annuler.png' width="14" height="14"/> Retour</button>
				<input id='edit-num' name='edit-num' type='hidden' value='<?php echo $trnnum; ?>'/>
			</form>	

			<p>
				<?php 
                	if (isset($_SESSION["ErrorETP"])) {
                    	echo $_SESSION["ErrorETP"];
                    	unset($_SESSION["ErrorETP"]);
                	}
				 ?>
			</p>
		</div>	
	</div>
</body>
</html>