<?php 

include"connectAD.php";
echo "<br/><br/><br/><br/>";

//TYPEDOCID

 $TabloDOCID=array();

   $docid="text/TypeDocID.txt";
   $tablodocid=file($docid);	

   // Mise en Tableau de 30 Noms choisis aléatoirement
    for($compteur=1;$compteur<31;$compteur++){
        $i=rand(0,1); // choisit un nombre aléatoire en 1 et le nombre max de lignes ( chaque lignes = 1 nom)
        $TabloDOCID[]=rtrim($tablodocid[$i], ' 
            '); // rtrim (chaine à modifier, caractère à supprimer) supprime le caractère invisible de retour à la ligne à chauqe fois, puis l'ajoute dans la TabloDocID.
        }

    echo"<pre>";
    print_r($TabloDOCID); //affiche TabloDocID
    echo "</pre>";
    echo "<br/><br/><br/><br/>";

//TYPEDOCLIB
	$TabloDOCLIB=array();

	$doclib="text/TypeDocLIB.txt";
   $tablodoclib=file($doclib);	

   // Mise en Tableau de 30 Noms choisis aléatoirement
    for($compteur=1;$compteur<31;$compteur++){
        $i=rand(0,1); // choisit un nombre aléatoire en 1 et le nombre max de lignes ( chaque lignes = 1 nom)
        $TabloDOCLIB[]=rtrim($tablodoclib[$i], ' 
            '); // rtrim (chaine à modifier, caractère à supprimer) supprime le caractère invisible de retour à la ligne à chauqe fois, puis l'ajoute dans la TabloDocID.
        }

    echo"<pre>";
    print_r($TabloDOCLIB); //affiche TabloDocID
    echo "</pre>";
    echo "<br/><br/><br/><br/>";
 ?>