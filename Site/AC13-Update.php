<?php 
session_start();

$trnnum = $_POST['valider'];
$etpid = $_POST['edit-ETP'];
$LieuID = $_POST['lieu'];
$H_Min = $_POST['RDV-MIN'];
$H_Max = $_POST['RDV-MAX'];
$H_PEC = $_POST['PEC'];
$Commentaire = $_POST['Commentaire'];

$trnnum = trim($trnnum);
$etpid = trim($etpid);
$LieuID = trim($LieuID);
$H_Min = trim($H_Min);
$H_Max = trim($H_Max);
$H_PEC = trim($H_PEC);
$Commentaire = trim($Commentaire);


if (!empty($trnnum) AND !empty($etpid) AND !empty($LieuID) AND !empty($H_PEC) AND !empty($H_Min) AND !empty($H_Max)) {
	include "connectAD.php";

	$sql = "UPDATE etape 
			SET `LIEUID` = \"$LieuID\",
				`ETPHREMIN` = \"$H_Min\",
				`ETPHREMAX` = \"$H_Max\",
				`ETPHREDEBUT` = \"$H_PEC\",
				`ETPCOMMENTAIRE` =\"$Commentaire\"
			WHERE `TRNNUM` = \"$trnnum\"
			AND   `ETPID` = \"$etpid\";";

	$result = executeSQL($sql);

	if ($result){
		$_SESSION["EDITETP"] = "<font color=green> Modification realisee</font>";
	 	echo "<script type=\"text/javascript\">

				function formAutoSubmit () {

				var frm = document.getElementById(\"EDITETP\");

				frm.submit();

				}

				window.onload = formAutoSubmit;

			  </script>

			<form id=\"EDITETP\" action=\"AC12-Modif.php\"method =\"post\" onchange=\"formAutoSubmit();\">
				<input id='edit-num' name='edit-num' type='hidden' value='$trnnum'/>
			</form>";
	}
	else{
		$_SESSION["ErrorEDITetp"] = "<font color=red>  ".erreurSQL().".... </font>";
		echo "<script type=\"text/javascript\">

				function formAutoSubmit () {

				var frm = document.getElementById(\"ErrorEDITetp\");

				frm.submit();

				}

				window.onload = formAutoSubmit;

			  </script>

			<form id=\"ErrorEDITetp\" action=\"AC13-Modif.php\"method =\"post\" onchange=\"formAutoSubmit();\">
				<input id='edit-num' name='edit-num' type='hidden' value='$trnnum'/>
				<input id='edit-ETP' name='edit-ETP' type='hidden' value='$etpid'/>
			</form>";
	}
}
?>