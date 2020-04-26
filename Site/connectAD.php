<?php

include "AccesDonnees.php";

$ip=explode(".",$_SERVER['SERVER_ADDR']);

switch ($ip[0]) {
    case 127 :
        //local
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $dbname = "mesguen_old";
        $port ="3307";
        break;
    case 192 :
        //local
        $host = "192.168.1.36:1521/ORA08";
        $user = "PPE";
        $password = "estran";
        $dbname = "PPE";
        $port ="1521";
        break;
   
    default :
        exit ("Serveur non reconnu...");
        break;
}

$connexion=connexion($host,$port,$dbname,$user,$password);
global $modeacces;

/*if ($connexion) {
    echo "Connexion reussie $host:$port<br />";
    echo "Base $dbname selectionnee... <br />";
    echo "Mode acces : $modeacces<br />";
}*/
?>