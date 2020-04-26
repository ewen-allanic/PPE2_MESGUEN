<?php 

// SE CONNECTER A LA BDD
    include "connectAD.php";
    echo "<br/><br/><br/><br/>";

//TRNNUM:

    $TabloTournees=array();
    $sqlTournees ="SELECT TRNNUM FROM tournee";

    //on recupère le résultat sous forme d'un tableau
    $results = tableSQL($sqlTournees);

    //pour chaque ligne du tableau résultat
    foreach ($results as $ligne) {
        //on extrait chaque valeur de la ligne courante
        $TRNNUM = $ligne[0];
        $TabloTournees[]=$TRNNUM;
    }

    echo "<pre>";
    print_r($TabloTournees);
    echo "</pre>";
    echo "<br/><br/><br/><br/>";

//ETPID
    
 ?>