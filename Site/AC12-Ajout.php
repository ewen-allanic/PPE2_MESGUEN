<?php
include "header.php";
?>

<!DOCTYPE html>
<html>

<head>
	<title>Fiche Tournée</title>
</head>

<body>
	<div class="container">
		<br />
		<p class="bandeau">
			AC12 - Organiser les tournées
		</p>
		<form id="formulaire" action="AC12-Inser.php" method="GET">
			<div class="bloc1">

				<label for="date">Date</label>
				<input id="date" name="date" type="date" class="liste1" />

				<br />
				<br />

				<label for="time">Heure</label>
				<input id="time" name="time" type="time" class="liste1" />

				<br />
				<br />

				<label for="liste">Chauffeur</label>
				<?php

				$sql = "SELECT * FROM chauffeur";
				$cpt = compteSQL($sql);
				$results = tableSQL($sql);
				?>

				<!-- Creation de la liste deroulante -->
				<select size="1" name="chauffeur" id="chauffeur" class="liste2">
					<?php
					if ($cpt == 0)
						echo "disabled=\"disabled\"";
					?> >

					<!-- Remplissage  la liste deroulante -->
					<?php
					if ($cpt > 0) {
						foreach ($results as $ligne) {
							//on extrait chaque valeur de la ligne courante
							$CHFID = $ligne[0];
							$Nom = $ligne[1];

							echo "<option value=$CHFID>$Nom </option>";
						}
					} else {
						echo "<option>Aucune information...</option>";
					}
					?>
				</select>

				<br />
				<br />

				<label for="liste">Véhicule</label>
				<?php
				$sqlImmat = "SELECT * FROM vehicule";
				$cptImmat = compteSQL($sqlImmat);
				$resultsImmat = tableSQL($sqlImmat);
				?>

				<select size="1" name="vehicule" id="vehicule" class="liste2">
					<?php
					if ($cptImmat == 0)
						echo "disabled=\"disabled\"";
					?> >

					<?php
					if ($cptImmat > 0) {
						foreach ($resultsImmat as $ligneImmat) {
							//on extrait chaque valeur de la ligne courante
							$Immat = $ligneImmat[0];
							$Marque = $ligneImmat[1];

							echo "<option value=$Immat>$Immat</option>";
						}
					} else {
						echo "<option>Aucune information...</option>";
					}
					?>

				</select>

				<br />
				<br />

				<label>Remorque</label>
				<?php
				$sqlRemor = "SELECT * FROM remorque";
				$cptRemor = compteSQL($sqlRemor);
				$resultsRemor = tableSQL($sqlRemor);
				?>

				<select size="1" name="remorque" id="remorque" class="liste2">
					<?php
					if ($cptRemor == 0)
						echo "disabled=\"disabled\"";
					?> >

					<?php
					if ($cptRemor > 0) {
						foreach ($resultsRemor as $ligneRemor) {
							//on extrait chaque valeur de la ligne courante
							$Id = $ligneRemor[0];
							// $Marque = $ligneRemor[1];

							echo "<option value=$Id>$Id</option>";
						}
						$NoRemorque = "NULL";
						echo "<option value=$NoRemorque>Pas de remorques </option>";
					} else {
						echo "<option>Aucune information...</option>";
					}
					?>

				</select>


				<br />
				<br />

				<label for="PEC">Pris en charge le </label>
				<input id="example-date-input" name="PEC" type="text" value="<?php echo date('d/m/y H:i'); ?>" readonly="readonly" />

				<br />
				<br />

				<p>
					<label for="Commentaire">Commentaire</label>
					<textarea id="Commentaire" name="Commentaire" rows="5" cols="15"></textarea>
				</p>

				<button class="bouton" name="ajouter" type="submit" value="Ajouter" title=""><img src="images\Valider.png" /> Valider</button>

				<a href="AC11.php">
					<button class="bouton2" name="retour" type="button" value="Retour" title=""><img src="images\Annuler.png" /> Retour</button>
				</a>

				<p>
					<?php
					if (isset($_SESSION["Verif"])) {
						echo $_SESSION["Verif"];
						unset($_SESSION["Verif"]);
					}
					?>
				</p>
			</div>

			<div class="separation"></div>

			<div class="bloc2">
				<div class="contenu2">
					ETAPES

					<p class="AfficheETP">
						Aucune étape en cours ...
					</p>

					<button id="ajouter" class="boutonETP" name="ajouter" type="submit" value="Ajouter" disabled="disabled" /><img src="images\Plus.png"> Ajouter</button>
				</div>
			</div>
		</form>
	</div>
</body>

</html>