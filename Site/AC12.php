<!DOCTYPE html>
<html>
<head>
	<title>AC12 - Organiser les tournees</title>
</head>
<body>
	<div>
		<hr class="separation" />
	</div>

	<form id="formulaire" action="" method="get">
		<fieldset style="width:720px;">
				
				<label for="Date">Date </label>
					<input id ="date" name="date" type="date" value="<?php date('d/n/Y'); ?>"/>

				<br/>
				<br/>

				<label for="liste">Chauffeur</label>
		    		<?php
						include "connectAD.php";

						$sql="SELECT * FROM chauffeur";
						$cpt = compteSQL($sql);
						$results = tableSQL($sql);
					?>

			    	<!-- Creation de la liste deroulante -->
			    	<select size="1" 
			    			name="chauffeur" 
			    			id ="chauffeur"  
			    			<?php 
		                 		if ($cpt==0) 
		                   			echo "disabled=\"disabled\""; 
		                 	?>	     									>
			    	
			    			<!-- Remplissage le la liste deroulante -->
							<?php 
								if ($cpt>0) {						
									foreach ($results as $ligne) {
										//on extrait chaque valeur de la ligne courante
										$CHFID = $ligne[0];
										$Nom = $ligne[1];
										//on affiche la ligne courante dans le select
										echo "<option value=$CHFID>$Nom</option>";
									}											
								} else {
									echo "<option>Aucune information...</option>";
								}
							?>
					</select>

		   		<br/>
				<br/>

		    	<label for="liste">V&eacute;hicule </label>
		    		<?php
	    				$sqlVEH= "SELECT * FROM vehicule";
	    				$cptVEH = compteSQL($sqlVEH);
						$resultsVEH = tableSQL($sqlVEH);
					?>

			    	<select size="1"
			    			name="vehicule"
			    			id="vehicule"
			    			<?php 
			                 	if ($cptVEH==0) 
			                   	echo "disabled=\"disabled\""; 
	                 		?>    									>
			    
				    	<?php 
							if ($cptVEH>0) {						
								foreach ($resultsVEH as $ligneVEH) {
									//on extrait chaque valeur de la ligne courante
									$Immat = $ligneVEH[0];
									$Marque = $ligneVEH[1];
									//on affiche la ligne courante dans le select
									echo "<option value=$Immat>$Immat</option>";
								}											
							} else {
								echo "<option>Aucune information...</option>";
							}
						?>
			    
			    	</select>

		    	<br/>
				<br/>

				<label for="Date">Pris en charge le </label>
					<input id ="date" name="date" type="datetime-local" value="<?php echo date("d/m/Y H:i"); ?>" />

		    	<p>
				
					<label for="zonetexte">Commentaire </label> 
					<textarea id="zonetexte" name="zonetexte" rows="5" cols="20"></textarea>
					
				</p>
		    	
		    	

		   
		    	<input type="reset" value="Annuler"/>
		    	<input type="submit" value="Valider" img src="4558-32199.png"/>

		</fieldset>
		    
	</form>

	<style type="text/css">
		label{
			display: block;
			width: 150px;
			float: left;
		}

		input, select{
			width: 160px;
		}
		
		.separation{
			clear: both;
			position: absolute;
			margin-top :10px;
			margin-left: 400px;
			height: 280px;
			width : 1px;
			background: black;
	}
	</style>
</body>
</html>