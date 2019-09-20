<?php
include "AccesDonnees.php";

$ip=explode(".",$_SERVER['SERVER_ADDR']);

switch ($ip[0]) {
    case 127 :
        //serveurSkylway
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "mlr2";
        $port='3307';
        break;
    default :
        exit ("Serveur non reconnu...");
        break;
}

	$connexion=connexion($host,$port,$dbname,$user,$password);

	if ($connexion) {
		echo "Connexion reussie $host:$port<br />";
		echo "Base $dbname selectionnee... <br />";
		echo "Mode acces : $modeacces<br />";
	}

	//deconnexion();
?>
