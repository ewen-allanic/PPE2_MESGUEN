<?php 
include "connectAD.php";
$Immat="text/alphabet-Immat.txt";

//VEHIMMAT

//GENERER UNE IMMAT : NUMERO

	$taille=1;
    $TabloNumImmat = array();

    while($taille<21){
    
        $numero= rand(111,999);
        $TabloNumImmat[]= "-".$numero."-";
        $taille++;
    }
    echo "<pre>";
    print_r($TabloNumImmat);
    echo "</pre>";
    echo "<br/><br/><br/><br/>";

			//Lettre1
			    $tabloImmat=file($Immat);
			    $compteur=1;

			    while ($compteur<21) {
			    	//on choisit une lettre random
			    	$i=rand(1,25);
			    	$tabloLettre1[]=$tabloImmat[$i];
			    	$compteur++;
			    }
			//Lettre 2
			$tabloImmat2=file($Immat);
			$compteur=1;


			while ($compteur<21) {
				//on choisit une lettre random
				$t=rand(1,25);
				$tabloLettre2[]=$tabloImmat2[$t];
				$compteur++;
			}

//Couple 1
    $x=0;

    while ($x<=19) {
    	 $tabloCouple1[]=substr($tabloLettre1[$x], 0, 1).substr($tabloLettre2[$x], 0, 1);
    	 $x++;
    }
    echo "<pre>";
    print_r($tabloCouple1);
    echo "</pre>";
    echo "<br/><br/><br/><br/>";


			//Lettre 3
			    $tabloImmat3=file($Immat);
			    $compteur=1;

			    while ($compteur<21) {

			    	//on choisit une lettre random
			    	$i=rand(1,25);
			    	$tabloLettre3[]=$tabloImmat3[$i];
			    	$compteur++;
			    }

			//Lettre 4
			$tabloImmat4=file($Immat);
			$compteur=1;


			while ($compteur<21) {
				//on choisit une lettre random
				$t=rand(1,25);
				$tabloLettre4[]=$tabloImmat4[$t];
				$compteur++;
			}

//COUPLE 2
    $c=0;

    while ($c<=19) {
    	 $tabloCouple2[]=substr($tabloLettre3[$c], 0, 1).substr($tabloLettre4[$c], 0, 1);
    	 $c++;
    }
    echo "<pre>";
    print_r($tabloCouple2);
    echo "</pre>";
    echo "<br/><br/><br/><br/>";


//Marque du Camion
    $Marque = "text/VEHNOM.txt";
    $tabloMarque = file($Marque);
    $taille = 1;

    while ($taille < 21){
    	$nom=rand(1,4);
    	$tabloVEHNOM[]=$tabloMarque[$nom];
    	$taille++;
    }
    echo "<pre>";
    print_r($tabloVEHNOM);
    echo "</pre>";
    echo "<br/><br/><br/><br/>";

//REQUETE SQL 
    for($b=0;$b<sizeof($tabloCouple1);$b++) {
    		$sql="INSERT INTO vehicule(`VEHIMMAT`,`VEHNOM`) VALUES ('".$tabloCouple1[$b].$TabloNumImmat[$b].$tabloCouple2[$b]."','".$tabloVEHNOM[$b]."')";
         echo "Sql : ".$sql."<br />";
         executeSQL_GE($sql); 
         }

 ?>