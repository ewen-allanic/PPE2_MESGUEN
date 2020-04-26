<?php

// SE CONNECTER A LA BDD
    include "connectAD.php";
    echo "<br/><br/><br/><br/>";

// GENERER NOMS DE FAMILLE

    //initialisation et du Tableau Noms
    $TabloNoms=array();


    // Importation des Noms et Mise en Tableau
    $nom = 'text/nom.txt';
    $tablonom = file($nom);

    // Mise en Tableau de 30 Noms choisis al�atoirement
    for($compteur=1;$compteur<31;$compteur++){
        $i=rand(1,94); // choisis un nombre al�atoire en 1 et le nombre max de lignes ( chaque lignes = 1 nom)
        $TabloNoms[]=rtrim($tablonom[$i], ' 
            '); // rtrim (chaine � modifier, caract�re � supprimer) supprime le caract�re invisible de retour � la ligne � chauqe fois, puis l'ajoute dans la TabloNoms.
        }
    print_r($TabloNoms); //affiche TabloNoms
    echo "<br/><br/><br/><br/>";
    
// GENERER PRENOMS 

    //initialisation du Tableau Prenoms
    $TabloPrenoms=array();


    // Importation des prenoms Garcon et Filles et Mises en Tableaux
    $garcon = 'text/garcon.txt';
    $tablogarcon = file($garcon);

    $fille = 'text/fille.txt';
    $tablofille = file($fille);

    // Mise en Tableau de 15 Prenoms de Garcons choisis al�atoirement
    for($compteurG=1;$compteurG<16;$compteurG++){
        $i=rand(1,99);
        $TabloPrenoms[]=rtrim($tablogarcon[$i], ' 
            '); // rtrim (chaine � modifier, caract�re � supprimer) supprime le caract�re invisible de retour � la ligne � chauqe fois, puis l'ajoute dans TabloPrenoms.
    }

    // Mise en Tableau de 15 Prenoms de Filles choisis al�atoirement
    for($compteurF=1;$compteurF<16;$compteurF++){
        $y=rand(1,99);
        $TabloPrenoms[]=rtrim($tablofille[$y], ' 
            '); // rtrim (chaine � modifier, caract�re � supprimer) supprime le caract�re invisible de retour � la ligne � chauqe fois, puis l'ajoute dans TabloPrenoms.
    }

    print_r($TabloPrenoms);
    echo "<br/><br/><br/><br/>";



// GENERER NUMEROS DE TELEPHONE 

    $taille=1;
    $TabloTel = array();

    while($taille<31){
    
        $numero= rand(611111111,699999999);
        $TabloTel[]= str_pad($numero, 10, "0",STR_PAD_LEFT); // ajoute un "0" devant le 6 pour chaque num�ro
        $taille++;
    }
    print_r($TabloTel);
    echo "<br/><br/><br/><br/>";
    
// GENERER EMAILS

    $email="text/email.txt";
    $tabloemail = file($email);
    $tabloemails=array();
 

       
//REQUETE SQL POUR INSERER LES DONNEES DANS LA TABLE CHAUFFEUR

    for($x=0;$x<sizeof($TabloNoms);$x++) {
         $tabloemails[]=$TabloNoms[$x].$TabloPrenoms[$x].$tabloemail[$x]; // ajoute dans tabloemails : un nom, un pr�nom et un email de type @mesguen.fr. R�sultat : Dupond Pierre @mesguen.fr

         $tabloemails=preg_replace('/\s/', '', $tabloemails);
         //supprime les espaces entre les chaines, R�sultat : DupondPierre@mesguen.fr

                //CHFID
                $tabloTrigrammes[] = substr($TabloPrenoms[$x], 0, 1).substr($TabloNoms[$x], 0, 1).substr(strtoupper($TabloNoms[$x]), strlen($TabloNoms[$x]) -1,1); 

/* On ins�re dans tabloTrigrammes, la 1ere lettre du Prenom, La 1�re lettre du Nom, puis la derni�re lettre du Nom, que l'on transforme en majuscule gr�ce � srttoupper au niveau de la chaine de caract�re :$TabloNoms[$x]
Rappel de substr : (chaine, rang o� on commence, longeur)

Pour la derni�re lettre du Nom:
substr(Chaine de TabloNoms, longeur totale de la chaine -1, 1 lettre selectionn�e)*/
            
    

         $sql="INSERT INTO chauffeur(`CHFID`,`CHFNOM`,`CHFPRENOM`,`CHFTEL`,`CHFMAIL`) VALUES ('".$tabloTrigrammes[$x]."','".$TabloNoms[$x]."','".$TabloPrenoms[$x]."','".$TabloTel[$x]."','".$tabloemails[$x]."')"; 
         echo "Sql : ".$sql."<br />";
         executeSQL_GE($sql); 
         }

        echo "<br/><br/><br/><br/>";

        echo "<pre>";
        print_r($tabloemails); // affiche les emails
        echo "</pre>";

        echo "<pre>";
        print_r($tabloTrigrammes); //affiche les trigrammes pour CHFID.
        echo "</pre>";
?>