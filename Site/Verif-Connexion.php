<?php 

session_start();

$login = $_POST['login'];
$password = $_POST['mdp'];
$crypt = md5($password);

if (!empty($login) && !empty($password)) {
	include "connectAD.php";

	//on stocke le numero correspondant au login rentré et on le stocke dans une variable
	$sql2= "SELECT `numero` FROM `user` WHERE `login` = '" .$login. "';";
	$id = champSQL($sql2);

	$sqlLog= "SELECT `login` FROM `user` WHERE `numero` = $id;";
	$sqlPass = "SELECT `password` FROM `user` WHERE `numero` = $id;";

	executeSQL($sqlLog);
	$result = champSQL($sqlLog);

	executeSQL($sqlPass);
	$results = champSQL($sqlPass);

}

if ($results != $crypt) {
	$_SESSION["BadPass"] = "<font color=red> Mauvais Mot de Passe </font>";
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
else{
	$_SESSION["username"] = $login;
	echo "<meta http-equiv='refresh' content='0;url=AC11.php'>";
}
?>