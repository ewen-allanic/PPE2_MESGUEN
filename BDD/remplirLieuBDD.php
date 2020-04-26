<?php 

include"connectAD.php";
echo "<br/><br/><br/><br/>";

//LieuID

$TabloLieuID=array();

$lieuid=rand(1000,2000);

while (sizeof($TabloLieuID) < 30) {
        $TabloLieuID[]=$lieuid;
        $lieuid++;
    }

	echo "<pre>";
    print_r($TabloLieuID);
    echo "</pre>";
    echo "<br/><br/><br/><br/>";

//VILID

    $TabloVILID=array();
    $sqlImmat= "SELECT VILID FROM commune LIMIT 30";

    //on recupère le résultat sous forme d'un tableau
    $results = tableSQL($sqlImmat);

    //pour chaque ligne du tableau résultat
    foreach ($results as $ligne) {
        //on extrait chaque valeur de la ligne courante
        $VILID = $ligne[0];
        $TabloVILID[]=$VILID;
    }

    echo "<pre>";
    print_r($TabloVILID);
    echo "</pre>";
    echo "<br/><br/><br/><br/>";

//LIEUNOM

   $TabloLieuNom=array();

   $lieunom="text/Lieu-Nom.txt";
   $tablolieunom=file($lieunom);	

   // Mise en Tableau de 30 Noms choisis aléatoirement
    for($compteur=1;$compteur<31;$compteur++){
        $i=rand(0,10); // choisis un nombre aléatoire en 1 et le nombre max de lignes ( chaque lignes = 1 nom)
        $TabloLieuNom[]=rtrim($tablolieunom[$i], ' 
            '); // rtrim (chaine à modifier, caractère à supprimer) supprime le caractère invisible de retour à la ligne à chauqe fois, puis l'ajoute dans la TabloNoms.
        }

    echo"<pre>";
    print_r($TabloLieuNom); //affiche TabloLieuNom
    echo "</pre>";
    echo "<br/><br/><br/><br/>";

//REQUETE SQL POUR INSERER LES DONNEES DANS LA TABLE CHAUFFEUR

    for($x=0; $x< sizeof($TabloLieuID);$x++) {
        
         $sql="INSERT INTO lieu(`LIEUID`,`VILID`,`LIEUNOM`,`LIEUCOORDGPS`)      
         		VALUES ('".$TabloLieuID[$x]."','".$TabloVILID[$x]."', '".$TabloLieuNom[$x]."',NULL)";
         echo "Sql : ".$sql."<br />";
         executeSQL($sql)
         or die ("Requete invalide");
    }
 ?>