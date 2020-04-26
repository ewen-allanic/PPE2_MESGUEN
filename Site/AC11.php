<?php 
include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des tournées</title>
    <link rel="stylesheet" type="text/css" href="Table-CSS/main.css">

</head>

<body>
    <br/>
    <div class="container">
        <p class="bandeau">
            AC11 - Organiser les tournées - Liste des tournées
        </p>
        <table class="table-fill">
            <!-- Header du Tableau -->
            <thead>
                <tr>
                    <th class="text-center">Tournée</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Chauffeur</th>
                    <th class="text-center">Véhicule</th>
                    <th class="text-center">Départ</th>
                    <th class="text-center">Arrivée</th>
                    <th class="text-center">Supprimer</th>
                    <th class="text-center">Modifier</th>
                </tr>
            </thead>

            <?php
                foreach ($result as $ligne) {
                    //on extrait chaque valeur de la ligne courante
                    $chfnom = $ligne[1];
                    $trnnum = $ligne[6];
                    $trnveh = $ligne[7];
                    $trndate = $ligne[11];

                    //on va chercher le nom du lieu qui correspond au numero de l'étape minimum de la tournee
                    $sqlDEP="SELECT `LIEUNOM` 
                           FROM `lieu`, `etape` 
                           WHERE lieu.`LIEUID` = etape.`LIEUID` 
                           AND etape.`TRNNUM`= $trnnum
                           AND `ETPID`= (SELECT MIN(ETPID) FROM `etape` WHERE etape.`TRNNUM` = $trnnum)";

                    //on recupere la valeur de la requete et on la stocke dans une variable départ
                    $depart = champSQL($sqlDEP);

                    //on va chercher le nom du lieu qui correspond au numero de l'étape maximum de la tournee
                    $sqlARR="SELECT `LIEUNOM` 
                           FROM `lieu`, `etape` 
                           WHERE lieu.`LIEUID` = etape.`LIEUID` 
                           AND etape.`TRNNUM`= $trnnum
                           AND `ETPID`= (SELECT MAX(ETPID) FROM `etape` WHERE etape.`TRNNUM` = $trnnum)";

                    //on recupere la valeur de la requete et on la stocke dans une variable arrivée
                    $arrivee = champSQL($sqlARR);
            ?>  

            <!--Body du Tableau -->
            <tbody class="table-hover">  
                    <?php
                        // if ($depart != "" AND $arrivee != "") {
                            //on affiche la ligne courante dans le tableau
                            $trndate = date_create($trndate);  //convertit la date en format "string"
                            $trndate = date_format($trndate, 'd/m/y');   //Formate la date au format jj/mm/aa

                            echo "<tr>";
                            echo "<td class=\"tournee\" style=\"text-align: center; width: 15px;\">$trnnum</td>";
                            echo "<td class=\"date\" style=\"text-align: center; width: 30px;\">$trndate</td>";
                            echo "<td class=\"chauffeur\" style=\"text-align: center; width: 20px;\">$chfnom</td>";
                            echo "<td class=\"vehicule\" style=\"text-align: center; width: 70px;\">$trnveh</td>";
                            echo "<td class=\"depart\" style=\"text-align: center; width: 250px;\">$depart</tsd>";
                            echo "<td class=\"arrivee\" style=\"text-align: center; width: 250px;\">$arrivee</td>";
                            // Création du bouton pour éditer l'entré de la bdd
                            echo "<td class=\"supprimer\" style=\"text-align: center; width: 30px;\">
                                    <form action='Delete-AC11.php' method='post'>
                                        <button type='submit' onclick=\"if(!confirm('Voulez-vous Supprimer')) return false;\">
                                            <img src='images/Delete.png'/>
                                        </button>
                                      <input id='delete' name='delete' type='hidden' value='$trnnum'/>
                                    </form>
                                  </td>";
                            // Création du bouton pour supprimer l'entrée de la bdd
                            echo "<td class=\"edit\" style=\"text-align: center; width: 30px;\">
                                    <form action='AC12-Modif.php' method='post'>
                                        <button type='submit'>
                                            <img src='images/Edit.png'/>
                                        </button>
                                    <input id='edit-num' name='edit-num' type='hidden' value='$trnnum'/>
                                    </form>
                                  </td>";
                            echo"</tr>";
                        // } 
                }
                    ?> 
            </tbody>
        </table>

        <p>
            <a href="AC12-Ajout.php">
            <button name="ajouter" type="button" value="$trnnum" title=""><img src="images\Plus.png"/> Ajouter</button></a>

            &nbsp;&nbsp;&nbsp;
            <?php
                if (isset($_SESSION["Ajout"])) {
                    echo $_SESSION["Ajout"];
                    unset($_SESSION["Ajout"]);
                }

                if (isset($_SESSION["Error"])) {
                    echo $_SESSION["Error"];
                    unset($_SESSION["Error"]);
                }
                
                if (isset($_SESSION["Renseigner"])) {
                    echo $_SESSION["Renseigner"];
                    unset($_SESSION["Renseigner"]);
                }

                if (isset($_SESSION["Suppr"])){
                    echo $_SESSION["Suppr"];
                    unset($_SESSION["Suppr"]);
                }

                if (isset($_SESSION["PbSuppr"])){
                    echo $_SESSION["PbSuppr"];
                    unset($_SESSION["PbSuppr"]);
                }

                if (isset($_SESSION["AjoutEDIT"])) {
                    echo $_SESSION["AjoutEDIT"];
                    unset($_SESSION["AjoutEDIT"]);
                }

                if (isset($_SESSION["ErrorEDIT"])) {
                    echo $_SESSION["ErrorEDIT"];
                    unset($_SESSION["ErrorEDIT"]);
                }
                
            ?>
        </p>
    </div>
</body>
</html>