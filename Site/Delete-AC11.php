<?php 
	session_start();
	include "connectAD.php";

	//on recupere les variables issues du formulaire
	$trnnum= $_POST['delete'];

	$sql = "DELETE FROM `tournee` WHERE `TRNNUM` = $trnnum ";

	$result = executeSQL($sql);
	
	if ($result){
		$_SESSION["Suppr"] = "<font color=green> Suppression realisee </font>";
		echo "<meta http-equiv='refresh' content='0;url=AC11.php'>";
	}
	else{ 
		$_SESSION["PbSuppr"] = "<font color=red> Probleme de suppression... </font>";
		echo "<meta http-equiv='refresh' content='0;url=AC11.php'>";
	}
?>