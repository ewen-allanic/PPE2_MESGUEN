<?php 
session_start();
include "connectAD.php";

$date = $_GET['date'];
$time = $_GET['time'];
$chfid = $_GET['chauffeur'];
$vehicule = $_GET['vehicule'];
$remorque = $_GET['remorque'];
$PEC = $_GET['PEC'];
$Commentaire = $_GET['Commentaire'];

$date = $date." ".$time;
$chfid = trim($chfid);
$vehicule = trim($vehicule);
$PEC = trim($PEC);
$Commentaire = trim($Commentaire);

// Vérification du permis du chauffeur

if ($remorque =="NULL"){
	if(!empty($date) AND !empty($chfid) AND !empty($vehicule) AND !empty($PEC)){
		$sql = "INSERT INTO `tournee` (`TRNNUM`, `VEHIMMAT`, `CHFID`, `TRNCOMMENTAIRE`, `TRNPECCHAUFFEUR`, `TRNDTE`,`REMORQUE`) VALUES ('".$vehicule."','".$chfid."','".$Commentaire."','".$PEC."','".$date."',$remorque);";
		$result = executeSQL($sql);
		
		if ($result){
			$_SESSION["Ajout"] = "<font color=green> Ajout realise </font>";
			echo "<meta http-equiv='refresh' content='0;url=AC11.php'>";
		}else{
			$_SESSION["Error"] = "<font color=red>  ".erreurSQL().".... </font>";
			echo "<meta http-equiv='refresh' content='0;url=AC11.php'>";
		}
	}	
}

elseif($remorque != "NULL"){
	$sqlVerif = "SELECT `CHFPERMIS` FROM `chauffeur` WHERE `CHFID` = '".$chfid."'";
	$Verif = champSQL($sqlVerif);

	if ($Verif == 1 OR $Verif == 3) {
		if(!empty($date) AND !empty($chfid) AND !empty($vehicule) AND !empty($PEC)){
			$sql = "INSERT INTO `tournee` (`VEHIMMAT`, `CHFID`, `TRNCOMMENTAIRE`, `TRNPECCHAUFFEUR`, `TRNDTE`,`REMORQUE`) VALUES ('".$vehicule."','".$chfid."','".$Commentaire."','".$PEC."','".$date."',$remorque);";
			$result = executeSQL($sql);
			
			if ($result){
				$_SESSION["Ajout"] = "<font color=green> Ajout realise </font>";
				echo "<meta http-equiv='refresh' content='0;url=AC11.php'>";
			}else{
				$_SESSION["Error"] = "<font color=red>  ".erreurSQL().".... </font>";
				echo "<meta http-equiv='refresh' content='0;url=AC11.php'>";
			}
		}
	}
	else{
		$_SESSION["Verif"] = "<font color=red> Assigner un chauffeur habilité </font>";
		echo "<meta http-equiv='refresh' content='0;url=AC12-Ajout.php'>";
	}
}
else{
$_SESSION["Renseigner"] = "<font color=red> Renseigner l&#039;information... </font>";
echo "<meta http-equiv='refresh' content='0;url=AC11.php'>";
}
?>