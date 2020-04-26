<?php 
session_start();
include "connectAD.php";

$TrnNum = $_POST['edit-num'];
$LieuID = $_POST['lieu'];
$H_Min_Dte = $_POST['RDV-MIN-DATE'];
$H_Min_Tme = $_POST['RDV-MIN-HEURE'];
$H_Max_Dte = $_POST['RDV-MAX-DATE'];
$H_Max_Tme = $_POST['RDV-MAX-HEURE'];
$H_PEC = $_POST['PEC'];
$Commentaire = $_POST['Commentaire'];

$sql= "SELECT MAX(ETPID) FROM `etape` WHERE `TRNNUM` = $TrnNum";
$etpid = champSQL($sql);
$etpid++;

$TrnNum = trim($TrnNum);
$LieuID = trim($LieuID);
$H_Min = $H_Min_Dte." ".$H_Min_Tme;
$H_Max = $H_Max_Dte." ".$H_Max_Tme;

echo $H_Min." Et ".$H_Max;

$H_PEC = trim($H_PEC);
$Commentaire = trim($Commentaire);

if (!empty($TrnNum) AND !empty($etpid) AND !empty($LieuID) AND !empty($H_PEC) AND !empty($H_Min) AND !empty($H_Max)) {
	

	$sql = "INSERT INTO `etape` (`TRNNUM`, `ETPID`, `LIEUID`, `ETPHREMIN`, `ETPHREMAX`, `ETPHREDEBUT`, `ETPCOMMENTAIRE`) VALUES ('".$TrnNum."','".$etpid."','".$LieuID."','".$H_Min."','".$H_Max."','".$H_PEC."','".$Commentaire."');";

	$result = executeSQL($sql);

	if ($result){
		$_SESSION["AjoutETP"] = "<font color=green> Ajout realise </font>";
	 	echo "<script type=\"text/javascript\">

				function formAutoSubmit () {

				var frm = document.getElementById(\"AjoutETP\");

				frm.submit();

				}

				window.onload = formAutoSubmit;

			  </script>

			<form id=\"AjoutETP\" action=\"AC12-Modif.php\" method =\"post\" onchange=\"formAutoSubmit();\">
				<input id='edit-num' name='edit-num' type='hidden' value='$TrnNum'/>
			</form>";
	}
}
else{
		$_SESSION["ErrorETP"] = "<font color=red>  ".erreurSQL().".... </font>";
				echo "<script type=\"text/javascript\">

				function formAutoSubmit () {

				var frm = document.getElementById(\"ErrorAjoutetp\");

				frm.submit();

				}

				window.onload = formAutoSubmit;

			  </script>

			<form id=\"ErrorAjoutetp\" action=\"AC13-Ajout.php\" method =\"post\" onchange=\"formAutoSubmit();\">
				<input id='edit-num' name='edit-num' type='hidden' value='$TrnNum'/>
			</form>";
	}	
?>
