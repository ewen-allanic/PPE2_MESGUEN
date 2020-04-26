<?php 

// SE CONNECTER A LA BDD
    include "connectAD.php";
    echo "<br/><br/><br/><br/>";

//TRNNUM :
    $nbTournees=1;
    $TabloTournees=array();

    $trnnum=rand(1000000,2000000);

    while ($nbTournees < 11) {
        $TabloTournees[]=$trnnum;
        $trnnum++;
        $nbTournees++;
    }

    echo "<pre>";
    print_r($TabloTournees);
    echo "</pre>";
    echo "<br/><br/><br/><br/>";

//VEHIMMAT:

    $TabloVEHIMMAT=array();
    $sqlImmat= "SELECT VEHIMMAT FROM vehicule LIMIT 10";

    //on recupère le résultat sous forme d'un tableau
    $results = tableSQL($sqlImmat);

    //pour chaque ligne du tableau résultat
    foreach ($results as $ligne) {
        //on extrait chaque valeur de la ligne courante
        $VEHIMMAT = $ligne[0];
        $TabloVEHIMMAT[]=$VEHIMMAT;
    }
    echo "<pre>";
    print_r($TabloVEHIMMAT);
    echo "</pre>";
    echo "<br/><br/><br/><br/>";
    

//CHFID :
    $TabloCHFID = array();
    $sqlCHFID="SELECT CHFID FROM chauffeur Limit 10";


    $result = tableSQL($sqlCHFID);

    foreach ($result as $ligne) {
         $CHFID = $ligne[0];
        $TabloCHFID[]=$CHFID;
    }

    echo "<pre>";
    print_r($TabloCHFID);
    echo "</pre>";
    echo "<br/><br/><br/><br/>";

//TRNDTE
    $nbDates=1;

    while ($nbDates < 11) {
        $trndtemois=rand(1,12);
        $trndtejour=rand(1,30);

            if ($trndtemois == 2) {
                $trndtejour=rand(1,28);

            }
            if ($trndtemois == 4 OR $trndtemois == 6 OR $trndtemois == 9 OR $trndtemois == 11) {
                $trndtejour=rand(1,31);
            }

            if ($trndtejour < 10) {
                $trndtejour = str_pad($trndtejour, 2, "0",STR_PAD_LEFT);
            }

            if ($trndtemois < 10) {
                $trndtemois = str_pad($trndtemois, 2, "0",STR_PAD_LEFT);
            }

        $TabloDates[]="2018-".$trndtemois."-".$trndtejour;
        $nbDates++;
    }

    
    echo "<pre>";
    print_r($TabloDates);
    echo "</pre>";
    echo "<br/><br/><br/><br/>";

//REQUETE SQL POUR INSERER LES DONNEES DANS LA TABLE CHAUFFEUR

    for($x=0; $x< sizeof($TabloTournees);$x++) {
        
         $sql="INSERT INTO tournee(`TRNNUM`,`VEHIMMAT`,`CHFID`,`TRNCOMMENTAIRE`,`TRNPECCHAUFFEUR`,`TRNDTE`)      VALUES ('".$TabloTournees[$x]."','".$TabloVEHIMMAT[$x]."', '".$TabloCHFID[$x]."',NULL,NULL,'".$TabloDates[$x]."')";
         echo "Sql : ".$sql."<br />";
         executeSQL($sql)
         or die ("Requete invalide");
    }
?>