<?php 
session_start();

$TrnNum = $_POST['Valider'];
$date = $_POST['date'];
$chauffeur = $_POST['chauffeur'];
$vehicule = $_POST['vehicule'];
$PEC = $_POST['PEC'];
$Commentaire = $_POST['Commentaire'];

$TrnNum = trim($TrnNum);
$date = trim($date);
$chauffeur = trim($chauffeur);
$vehicule = trim($vehicule);
$PEC = trim($PEC);
$Commentaire = trim($Commentaire);

if (!empty($date) AND !empty($chauffeur) AND !empty($vehicule) AND !empty($PEC)) {
	include "connectAD.php";

	$sql = "UPDATE tournee 
			SET `TRNDTE` = \"$date\",
				`CHFID` = \"$chauffeur\",
				`VEHIMMAT` = \"$vehicule\",
				`TRNPECCHAUFFEUR` = \"$PEC\",
				`TRNCOMMENTAIRE` =\"$Commentaire\"
			WHERE `TRNNUM` = \"$TrnNum\"";

	$result = executeSQL($sql);

	if ($result){
		$_SESSION["AjoutEDIT"] = "<font color=green> Modification realisee</font>";
	 	echo "<meta http-equiv='refresh' content='0;url=AC11.php'>";
	}	
} 
else{
		$_SESSION["ErrorEDIT"] = "<font color=red>  ".erreurSQL().".... </font>";
		echo "<meta http-equiv='refresh' content='0;url=AC11.php'>";
}

?>