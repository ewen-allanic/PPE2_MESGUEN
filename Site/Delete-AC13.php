<?php 
	session_start();

	include "connectAD.php";

	//on recupere les variables issues du formulaire
	$trnnum= $_POST['delete-num'];
	$etpid = $_POST['delete-ETP'];

	$sql = "DELETE FROM `etape` WHERE `TRNNUM` = $trnnum AND `ETPID`= $etpid";

	$result = executeSQL($sql);
	
	if ($result){
		$_SESSION["SupprETP"] = "<font color=green> Suppression realisee </font>";
		echo "<script type=\"text/javascript\">

				function formAutoSubmit () {

				var frm = document.getElementById(\"DeleteETP\");

				frm.submit();

				}

				window.onload = formAutoSubmit;

			  </script>

			<form id=\"DeleteETP\" action=\"AC12-Modif.php\"method =\"post\" onchange=\"formAutoSubmit();\">
				<input id='edit-num' name='edit-num' type='hidden' value='$trnnum'/>
			</form>";
	}
	else{ 
		$_SESSION["PbSupprETP"] = "<font color=red> Probleme de suppression... </font>";
		echo "<script type=\"text/javascript\">

				function formAutoSubmit () {

				var frm = document.getElementById(\"DeleteETPerror\");

				frm.submit();

				}

				window.onload = formAutoSubmit;

			  </script>

			<form id=\"DeleteETPerror\" action=\"AC12-Modif.php\"method =\"post\" onchange=\"formAutoSubmit();\">
				<input id='edit-num' name='edit-num' type='hidden' value='$trnnum'/>
			</form>";
	}

 ?>