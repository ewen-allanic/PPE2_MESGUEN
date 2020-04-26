<?php 
    session_start();
    if(isset($_SESSION["username"])) {

        include "connectAD.php";
        //on va chercher toutes les infos de la table tournée et on les ranges par ordre croissant du numero
        $sql= "SELECT * 
            FROM `chauffeur`, `tournee`
            WHERE  chauffeur.`CHFID` = tournee.`CHFID` 
            ORDER BY tournee.`TRNNUM`";
        $cpt = compteSQL($sql);
        $result = tableSQL($sql);
    }else {
        //This will return the user to login page if the user is not logged in
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="fr" />
    
</head>
<body>
    <div class="topnav">
        <a href="index.php">Deconnexion</a>
        <a href="AC11.php">Accueil</a>
    </div>

