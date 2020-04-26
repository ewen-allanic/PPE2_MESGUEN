<?php 
include "header.php";

$sql= "SELECT * FROM lieu";
$cpt = compteSQL($sql);
$result = tableSQL($sql);

$trnnum = $_POST["edit-num"];
$etpid = $_POST["edit-ETP"];

$sqlLieuNom = "SELECT `LIEUNOM` FROM `lieu`,`etape` WHERE etape.`LIEUID` = lieu.`LIEUID` AND etape.`TRNNUM` = $trnnum AND etape.`ETPID` = $etpid ";
$LieuNomModif = champSQL($sqlLieuNom);

$sqlETPcom ="SELECT `ETPCOMMENTAIRE` FROM `etape` WHERE etape.`TRNNUM` = $trnnum AND etape.`ETPID` = $etpid ";
$Comment = champSQL($sqlETPcom);

$sqlHREMIN = "SELECT `ETPHREMIN` FROM `etape` WHERE  etape.`TRNNUM` = $trnnum AND etape.`ETPID` = $etpid ";
$HREMIN = champSQL($sqlHREMIN);

// Passe le datetime du format 2019-09-13 15:30:00  au format  2019-09-13T15:30  afin de pouvoir le datetime dans l'attribut value 
$HREMIN = date_create($HREMIN);
$HREMIN = date_format($HREMIN, 'Y-m-d H:i');
$HREMIN = substr_replace($HREMIN,'T',10,1);

$sqlHREMAX = "SELECT `ETPHREMAX` FROM `etape` WHERE  etape.`TRNNUM` = $trnnum AND etape.`ETPID` = $etpid ";
$HREMAX = champSQL($sqlHREMAX);

// Passe le datetime du format 2019-09-13 15:30:00  au format  2019-09-13T15:30  afin de pouvoir le datetime dans l'attribut value 
$HREMAX = date_create($HREMAX);
$HREMAX = date_format($HREMAX, 'Y-m-d H:i');
$HREMAX = substr_replace($HREMAX,'T',10,1);
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
			AC13 - Organiser les tournées  - Tournée <?php echo $trnnum; ?> - Etape <?php echo $etpid; ?>
		</p>

		<div class="bloc13">
			<form id="formulaire" action="AC13-Update.php" method="POST">
				
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
									
									if ($LieuNom== $LieuNomModif) {
												echo "<option selected = \"selected\"value=$LieuID>$LieuNomModif </option>";
											}else{
												echo "<option value=$LieuID>$LieuNom</option>";
											}
								}											
							}else {
								echo "<option>Aucune information...</option>";
							}
						?>    
					</select>

					<br/>
					<br/>

					<p>
						<label for="RDV-MIN">Rendez vous entre </label>
						<input id ="example-date-input" name="RDV-MIN" type="datetime-local" value="<?php echo $HREMIN; ?>"/>
					</p>

					<br/>

					<p>
						<label for="et">					et </label>
						<input id ="example-date-input" name="RDV-MAX" type="datetime-local" value="<?php echo $HREMAX; ?>"/>
					</p>

					<br/>

					<p>
						<label for="PEC">Pris en charge le </label>
						<input id ="example-date-input" name="PEC" type="text" value="<?php echo date('d/m/y H:i');?>" readonly ="readonly" />
					</p>

					<br/>

					<p>
						<label for="Commentaire">Commentaire</label>
						<textarea id="Commentaire" name="Commentaire" rows="5" cols="15"><?php if($Comment != "NULL") {echo $Comment;}?></textarea>
					</p>

					<button class="boutonMA" name="valider" type="submit" value="<?php echo $trnnum; ?>" title=""><img src="images\Valider.png" width="14" height="14"/> Valider</button>
					<input type="hidden" name="edit-ETP" class="boutonMA" value="<?php echo $etpid; ?>" title="">
			</form>

			<form action='AC12-Modif.php' method='post'>
				<button type='submit' class="bouton2MA"><img src='images/Annuler.png' width="14" height="14"/> Retour</button>
				<input id='edit-num' name='edit-num' type='hidden' value='<?php echo $trnnum; ?>'/>
			</form>	

			<p>
				<?php 

                	if (isset($_SESSION["ErrorEDITetp"])) {
                    	echo $_SESSION["ErrorEDITetpetp"];
                    	unset($_SESSION["ErrorEDITetp"]);
					}

				 ?>
			</p>
		</div>	
	</div>
</body>
</html>