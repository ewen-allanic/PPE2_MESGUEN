<?php 
	include "header.php";

	$trnnum = $_POST['edit-num'];

	$sqlChauff = "SELECT `CHFNOM` FROM `chauffeur`,`tournee` WHERE chauffeur.`CHFID` = tournee.`CHFID` AND TRNNUM = $trnnum";

	$sqlVEH = "SELECT `VEHIMMAT` FROM `tournee` WHERE `TRNNUM` = $trnnum";

	$sqlComment = "SELECT `TRNCOMMENTAIRE` FROM `tournee` where `TRNNUM` = $trnnum";

	$sqlDte = "SELECT `TRNDTE` FROM `tournee` WHERE `TRNNUM` = $trnnum";

	$chauffeur = champSQL($sqlChauff);
	$trnveh = champSQL($sqlVEH);
	$Comment = champSQL($sqlComment);
	$date = champSQL($sqlDte);
?>

<!DOCTYPE html>
<html>
<head>
	<title>AC12 - Organiser les tournées</title>
</head>
<body>
	<div class="container">
		<br/>
		<p class="bandeau">
			AC12 - Organiser les tournées - tournée <?php echo $trnnum; ?>
		</p>
		<form id="formulaire" action="AC12-Update.php" method="POST">
				<div class="bloc1">
					
					<label for="Date" >Date</label>
						<input id ="date" name="date" type="date"  value="<?php echo $date; ?>" class="liste1"/>

					<br/>				
					<br/>

					<label for="liste">Chauffeur </label>
			    		<?php

							$sql="SELECT * FROM chauffeur";
							$cpt = compteSQL($sql);
							$results = tableSQL($sql);
						?>

				    	<!-- Creation de la liste deroulante -->
				    	<select size="1" 
				    			name="chauffeur" 
				    			id ="chauffeur"
				    			class="liste2">
				    			<?php 
			                 		if ($cpt==0) 
			                   			echo "disabled=\"disabled\""; 
			                 	?>	     									>
				    	
				    			<!-- Remplissage le la liste deroulante -->
								<?php  
									if ($cpt>0){						
										foreach ($results as $ligne) {
											//on extrait chaque valeur de la ligne courante
											$CHFID = $ligne[0];
											$Nom = $ligne[1];

											if ($Nom == $chauffeur) {
												echo "<option selected = \"selected\"value=$CHFID>$chauffeur </option>";
											}else{
												echo "<option value=$CHFID>$Nom </option>";
											}
										}
									}else {
										echo "<option>Aucune information...</option>";
									}
								?>
						</select>

			   		<br/>
					<br/>

			    	<label for="liste">Véhicule</label>
			    		<?php
		    				$sqlImmat= "SELECT * FROM vehicule";
		    				$cptImmat = compteSQL($sqlImmat);
							$resultsImmat = tableSQL($sqlImmat);
						?>

				    	<select size="1"
				    			name="vehicule"
				    			id="vehicule"
				    			class="liste2">
				    			<?php 
				                 	if ($cptImmat==0) 
				                   	echo "disabled=\"disabled\""; 
		                 		?>    									>
				    
					    	<?php 
								if ($cptImmat>0) {						
									foreach ($resultsImmat as $ligneImmat) {
										//on extrait chaque valeur de la ligne courante
										$Immat = $ligneImmat[0];
										$Marque = $ligneImmat[1];
										
										if ($Immat== $trnveh) {
												echo "<option selected = \"selected\"value=$Immat>$trnveh </option>";
										}else{
											echo "<option value=$Immat>$Immat </option>";
										}
									}											
								}else {
									echo "<option>Aucune information...</option>";
								}
							?>
				    
				    	</select>

			    	<br/>
					<br/>

					<label for="PEC">Pris en charge le</label>
						<input id ="example-date-input" name="PEC" type="text" value="<?php echo date('d/m/y H:i')?>" readonly="readonly"/>

			    	<p>
						<label for="Commentaire">Commentaire</label>
						<textarea id="Commentaire" name="Commentaire" rows="5" cols="15"><?php if ($Comment != "NULL") {echo $Comment;}?></textarea>
					</p>
			    	
       				<button class="bouton" name="Valider" type="submit" value="<?php echo $trnnum; ?>" title="" onclick="if(!confirm('Voulez-vous vraiment modifier ?')) return false;"><img src="images/Valider.png"/> Valider</button>

        			<a href="AC11.php">
        				<button class="bouton2" name="retour" type="button" value="Retour" title=""><img src="images/Annuler.png"/> Retour</button>
        			</a>
				</div>
		</form>

				<div class="separation"></div>

				<div class="bloc2">
					<div class="contenu2">
					ETAPES
					<?php 

						$sqlL = "SELECT ETPID,LIEUNOM FROM etape, lieu WHERE etape.`LIEUID`= lieu.`LIEUID` AND etape.`TRNNUM`=$trnnum ORDER BY ETPID";

						$cptL = compteSQL($sqlL);
						$resultL = tableSQL($sqlL);
							
					    if($cptL == 0){
							echo "<p class=\"AfficheETP\">
									Aucune étape en cours ...
								  </p>	";
						}
						foreach ($resultL as $ligneL) {
							//on extrait chaque valeur de la ligne courante
							$ETPID = $ligneL[0];
							$LieuNom = $ligneL[1];
							
					?>
					
						<table>
							<?php 
								echo "<tr class=\"AfficheETP\">";
								echo "<td>$ETPID</td>";
								echo "<td>$LieuNom</td>";
								// Création du bouton pour éditer l'entré de la bdd
	                            echo "<td class=\"DelETP\">
	                                    <form action='Delete-AC13.php' method='post'>
	                                        <button type='submit' onclick=\"if(!confirm('Voulez-vous Supprimer')) return false;\">
	                                            <img src='images/Delete.png'/>
	                                        </button>
	                                      <input id='delete-num' name='delete-num' type='hidden' value='$trnnum'/>
	                                      <input id='delete-ETP' name='delete-ETP' type='hidden' value='$ETPID'/>
	                                    </form>
	                                  </td>";

	                            // Création du bouton pour supprimer l'entrée de la bdd
	                            echo "<td class=\"EditETP\">
	                                    <form action='AC13-Modif.php' method='POST'>
	                                        <button type='submit'>
	                                            <img src='images/Edit.png'/>
	                                        </button>
	                                    <input id='edit-num' name='edit-num' type='hidden' value='$trnnum'/>
	                                    <input id='edit-ETP' name='edit-ETP' type='hidden' value='$ETPID'/>
	                                    </form>
	                                  </td>";
	                            echo"</tr>";
	                    }
							 ?>
						</table>

						<?php
							echo "<div class=\"textETP\">";
			                	if (isset($_SESSION["SupprETP"])){
			                   		echo $_SESSION["SupprETP"];
			                    	unset($_SESSION["SupprETP"]);
			                	}

				                if (isset($_SESSION["PbSupprETP"])){
				                    echo $_SESSION["PbSupprETP"];
				                    unset($_SESSION["PbSupprETP"]);
				                }

				                 if (isset($_SESSION["AjoutETP"])){
				                    echo $_SESSION["AjoutETP"];
				                    unset($_SESSION["AjoutETP"]);
				                }

				          		if (isset($_SESSION["EDITETP"])){
				                    echo $_SESSION["EDITETP"];
				                    unset($_SESSION["EDITETP"]);
				                }
			               	echo "</div>";
			            ?>
		    		</div>
				</div>
		

		<form action='AC13-Ajout.php' method='post'>
	    	<button type='submit' class="boutonETP">
	            <img src='images/Plus.png'/>
	            Ajouter
	        </button>
			<input id='edit-num' name='edit-num' type='hidden' value='<?php echo $trnnum; ?>'/>
			<input id='edit-ETP' name='edit-ETP' type='hidden' value='<?php echo $ETPID; ?>'/>
	    </form>
	</div>
</body>
</html>