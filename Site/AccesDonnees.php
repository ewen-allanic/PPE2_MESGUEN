<?php
/**
 *  Bibliotheque de fonctions AccesDonnees.php
 *
 *
 * @author Erwan
 * @copyright Erwan
 * @version 5.71 Vendredi 24 Mai 2019
 *
 * Test PHP7 avec EasyPHP 17 DevEnv en 64 bits
 * Utilisation de code sniffer
 * Bug MYSQL_BOTH --> MYSQLI_BOTH
 * Bug avec PDO
 *
 */

/////////VARIABLES DE CONFIGURATION DE L'ACCES AUX DONNEES ////////////////////

// nom du moteur d'acces a la base : mysql - mysqli - pdo
$modeacces = "mysqli";

// type de la base de donnees : mysql - oracle
$typebase = "mysql";

// enregistrement des logs de connexion : true - false
$logcnx = false;

// enregistrement des requetes SQL : none - all - modif
$logsql = "none";

//////////////////////////////////////////////////////////////////////

$mysql_data_type_hash = array(
    1=>'tinyint',
    2=>'smallint',
    3=>'int',
    4=>'float',
    5=>'double',
    7=>'timestamp',
    8=>'bigint',
    9=>'mediumint',
    10=>'date',
    11=>'time',
    12=>'datetime',
    13=>'year',
    16=>'bit',
    //252 is currently mapped to all text and blob types (MySQL 5.0.51a)
    252=>'blob',
    253=>'string',
    254=>'string',
    246=>'decimal'
);


/**
 * Retourne le numero de version de AccesDonnees.php.
 *
 * @return string - Retourne une chaine de caracteres representant le numero de la version de la
 *         bibliotheque "AccesDonnees.php".
 */
function numeroVersion()
{
    return "5.71";
}


/**
 * Retourne la date de la version de AccesDonnees.php.
 *
 * @return string - Retourne une chaine de caracteres representant le date de la version de la
 *         bibliotheque "AccesDonnees.php".
 */
function dateVersion()
{
    return "Mardi 28 Mai 2019";
}



  /////////////////////////////////////////////////////////////////////////
 ////////// AJOUTER LES PRIMITIVES D'ACCES AUX BASES DE DONNEES //////////
/////////////////////////////////////////////////////////////////////////
/**
 * Ouvre une connexion a un serveur de base de donnees et selectionne une base.
 *
 * @param string $host Adresse du serveur.
 * @param integer $port Numero du port du serveur.
 * @param string $dbname Nom de la base de donnees.
 * @param string $user Nom de l'utilisateur.
 * @param string $password Mot de passe de l'utilisateur.</p>
 *
 * @return resource - Retourne l'identifiant de connexion en cas de succes
 *         ou <b>false</b> si une erreur survient.
 */
function connexion($host, $port, $dbname, $user, $password)
{
    global $modeacces, $logcnx, $connexion, $typebase;
    $chaine="";
    
    /*  TEST CNX ORACLE
     *
     */
    if ($modeacces=="pdo") {
        if ($typebase=="mysql") {
            // ceation du Data Source Name, ou DSN, qui contient les infos
            // requises pour se connecter a la base de donnees MySQL en
            // utilisant un driver PDO.
            // $dsn='mysql:host='.$host.';port='.$port.';dbname='.$dbname;
            $dsn = 'mysql:dbname='.$dbname.';host='.$host.';port='.$port;
        }
        
        if ($typebase=="oracle") {
            // ceation du Data Source Name, ou DSN, qui contient les infos
            // requises pour se connecter a la base en PDO driver oracle.
            // exemple : oci:dbname=//10.100.22.20:1521/ora18sdis29
            $dsn='oci:dbname=//'.$host.':'.$port.'/'.$dbname;
        }
        
        try {
            $connexion = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            /*echo 'Erreur : '.$e->getMessage().'<br />';
             echo 'Numero : '.$e->getCode();
             die();*/
            $chaine = "Connexion PB - ".date("j M Y - G:i:s - ").$user;
            $chaine .= " - ". $e->getCode() . " - ". $e->getMessage()."\r\n";
            $connexion = false;
        }
        
        if ($connexion) {
            $chaine = "Connexion OK - ".date("j M Y - G:i:s - ").$user."\r\n";
        }
    }
    
    if ($modeacces=="mysql") {
        @$link = mysql_connect("$host:$port", "$user", "$password");
        if (!$link) {
            $chaine = "Connexion PB - ".date("j M Y - G:i:s - ").$user." - ". mysql_error()."\r\n";
            $connexion = false;
        } else {
            @$connexion = mysql_select_db("$dbname");
            if (!$connexion) {
                $chaine = "Selection base PB - ".date("j M Y - G:i:s - ").$user." - ". mysql_error()."\r\n";
                $connexion = false;
            } else {
                $chaine = "Connexion OK - ".date("j M Y - G:i:s - ").$user."\r\n";
            }
        }
    }
    
    if ($modeacces=="mysqli") {
        @$connexion = mysqli_connect("$host", "$user", "$password", "$dbname", $port);
        if (mysqli_connect_errno($connexion)) {
            $chaine = "Connexion PB - ".date("j M Y - G:i:s - ").$user." - ". $connexion->connect_error."\r\n";
            $connexion = false;
        } else {
            $chaine = "Connexion OK - ".date("j M Y - G:i:s - ").$user."\r\n";
        }
    }
    
    if ($logcnx) {
        $handle=fopen("log.txt", "a");
        fwrite($handle, $chaine);
        fclose($handle);
    }
    
    return $connexion;
}



/**
 * Retourne le texte associe avec l'erreur generee lors de la derniere requete.
 *
 * @return string - Retourne le texte de l'erreur de la derniere fonction MySQL,
 *         ou '' (chaine vide) si aucune erreur survient.
 */
function erreurSQL()
{
    global $modeacces, $connexion, $typebase;
    
    if ($modeacces=="mysql") {
        return mysql_error();
    }
    
    if ($modeacces=="mysqli") {
        return mysqli_error_list($connexion)[0]['error'];     //$mysqli->error_list;
    }
    
    if ($modeacces=="pdo") {
        if ($typebase=="mysql") {
            return $connexion->errorInfo()[2];
        }
        if ($typebase=="oracle") {
            return $connexion->errorInfo()[2];
        }
    }
}



/**
 * Ouvre une connexion a un serveur de base de donnees.
 *
 * IMPOSSIBLE EN PDO !!!!!
 *
 * @param string $host Adresse du serveur.
 * @param integer $port Numero du port du serveur.
 * @param string $user Nom de l'utilisateur.
 * @param string $password Mot de passe de l'utilisateur.
 *
 * @return resource - Retourne l'identifiant de connexion MySQL en cas de succes
 *         ou <b>false</b> si une erreur survient.
 */
function cnxserveur($host, $port, $user, $password)
{
    global $modeacces, $typebase;
    
    if ($modeacces=="pdo") {
        if ($typebase=="mysql") {
        }
        if ($typebase=="oracle") {
        }
        @$link = flase;
    }

    if ($modeacces=="mysql") {
        @$link = mysql_connect("$host:$port", "$user", "$password");
    }

    if ($modeacces=="mysqli") {
        @$link = mysqli_connect($host, $user, $password);
    }

    if (!$link) {
        return false;
    } else {
        return $link;
    }
}



/**
 * Selectionne une base de donnee sur la connexion ouverte.
 *
 * @param string $dbname Nom de la base de donnees a selectionner.
 *
 * @return resource - Retourne <b>TRUE</b> en cas de succes
 *         ou <b>false</b> si une erreur survient.
 */
function selectDB($dbname)
{
    global $modeacces, $connexion;

    if ($modeacces=="pdo") {
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connexion->exec("use ".$dbname);
    }

    if ($modeacces=="mysql") {
        return (@$connexion = mysql_select_db("$dbname"));
    }

    if ($modeacces=="mysqli") {
        return (mysqli_select_db($connexion, $dbname));
    }
}



/**
 * Ferme la connexion SQL.
 */
function deconnexion()
{
    global $modeacces, $connexion;

    if ($modeacces=="pdo") {
        @$connexion=null;
    }

    if ($modeacces=="mysql") {
        @mysql_close();
    }

    if ($modeacces=="mysqli") {
        @mysqli_close($connexion);
    }
}



/**
 * Protege une commande SQL de la presence de caracteres speciaux.
 *
 * @param string $sql Requete SQL.
 *
 * @return string - Requete SQL sans les caracteres speciaux, ou
 *         <b>false</b> si une erreur survient.
 */
function protectSQL($sql)
{
    global $modeacces, $connexion;

    if ($modeacces=="pdo") {
        //protect SQL ne sert a rien en PDO
        //utiliser les requetes preparees
        return $sql;
    }

    if ($modeacces=="mysql") {
        return mysql_real_escape_string($sql);
    }

    if ($modeacces=="mysqli") {
        return mysqli_real_escape_string($connexion, $sql);
    }
}



/**
 * Envoie une requete a un serveur SQL.
 *
 * @param string $sql Requete SQL.
 *
 * @return resource - Pour les requetes du type SELECT, SHOW, DESCRIBE, EXPLAIN et
 *          les autres requetes retournant un jeu de resultats, <b>executeSQL</b>
 *          retournera une ressource en cas de succes, ou <b>DIE</b> en cas d'erreur.
 *
 *          Pour les autres types de requetes, INSERT, UPDATE, DELETE, DROP, etc.,
 *          <b>executeSQL</b> retourne <b>TRUE</b> en cas de succes ou <b>DIE</b> en cas d'erreur.
 */
function executeSQL($sql)
{
    global $modeacces, $connexion, $logsql;

    $uneChaine = date("j M Y - G:i:s --> ").$sql."\r\n";

    if ($logsql=="all") {
        ecritRequeteSQL($uneChaine);
    } else {
        if ($logsql=="modif") {
            $mot = strtolower(substr($sql, 0, 6));
            if ($mot=="insert" || $mot=="update" || $mot=="delete") {
                ecritRequeteSQL($uneChaine);
            }
        }
    }

    if ($modeacces=="pdo") {
        $result = $connexion->query($sql)
        or die(afficheErreur($sql));
    }
    
    if ($modeacces=="mysql") {
        $result = mysql_query($sql)
        or die(afficheErreur($sql));
    }

    if ($modeacces=="mysqli") {
        $result = mysqli_query($connexion, $sql)
        or die(afficheErreur($sql));
        //or die (afficheErreur($sql, mysqli_error_list($connexion)[0]['error']));
        //or die (afficheErreur($sql, $connexion->error_list[0]['error']));
    }

    return $result;
}



/**
 *Envoie une requete a un serveur SQL laisse le programmeur gerer les Erreurs.
 *
 * @param string $sql Requete SQL.
 *
 * @return resource - Pour les requetes du type SELECT, SHOW, DESCRIBE, EXPLAIN et
 *          les autres requetes retournant un jeu de resultats, <b>executeSQL</b>
 *          retournera une ressource en cas de succes, ou <b>false</b> en cas d'erreur.
 *
 *          Pour les autres types de requetes, INSERT, UPDATE, DELETE, DROP, etc.,
 *          <b>executeSQL</b> retourne <b>TRUE</b> en cas de succes ou <b>false</b> en cas d'erreur.
 */
function executeSQL_GE($sql)
{
    global $modeacces, $connexion;

    if ($modeacces=="pdo") {
        $result = $connexion->query($sql);
    }

    if ($modeacces=="mysql") {
        $result = mysql_query($sql);
    }

    if ($modeacces=="mysqli") {
        $result = mysqli_query($connexion, $sql);
    }

    return $result;
}



/**
 * Retourne un tableau resultat d'une requete SQL.
 *
 * @param string $sql Requete SQL.
 *
 * @return array - Tableau indexe et associatif resultat de la requete SQL.
 *
 * @example
 * <code>
 * $sql = "select * from user";            <br />
 * $results = tableSQL($sql);              <br />
 * foreach ($results as $row) {            <br />
 * &nbsp;&nbsp;$login = $row['login'];     <br />
 * &nbsp;&nbsp;$password = $row[3];        <br />
 * &nbsp;&nbsp;echo $login." ".$password;  <br />
 * }                                       <br />
 * </code>
 */
function tableSQL($sql)
{
    global $modeacces;

    $result = executeSQL($sql);
    $rows = array();

    if ($modeacces=="pdo") {
        //while ($row = $result->fetch(PDO::FETCH_BOTH)) {
        //array_push($rows,$row);
        //}
        $rows = $result->fetchAll(PDO::FETCH_BOTH);
    }

    if ($modeacces=="mysql") {
        while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
            array_push($rows, $row);
        }
    }

    if ($modeacces=="mysqli") {
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            array_push($rows, $row);
        }
        //$rows = $result->fetch_all(MYSQLI_BOTH);
    }

    return $rows;
}



/**
 * Retourne le nombre de lignes d'un resultat SQL.
 *
 * @param string $sql Requete SQL.
 *
 * @return integer - Le nombre de lignes dans le jeu de resultats en cas de succes
 *         ou <b>false</b> si une erreur survient.
 */
function compteSQL($sql)
{
    global $modeacces, $connexion, $typebase;

    if ($modeacces=="pdo") {
        if ($typebase=="mysql") {
            $repueteP = $connexion->prepare($sql);
            $repueteP->execute();
            $num_rows = $repueteP->rowCount();
        }
        if ($typebase=="oracle") {
            $recordset = $connexion->query($sql);
            $fields = $recordset->fetchAll(PDO::FETCH_ASSOC);
            $num_rows = sizeof($fields);
        }
    }

    if ($modeacces=="mysql") {
        $result = executeSQL($sql);
        $num_rows = mysql_num_rows($result);
    }

    if ($modeacces=="mysqli") {
        $result = executeSQL($sql);
        $num_rows = mysqli_num_rows($result);
    }

    return $num_rows;
}



/**
 * Retourne un seul champ resultat d'une requete SQL.
 *
 * @param string $sql Requete SQL.
 *
 * @return string - une chaine resultat de la requete SQL.
 */
function champSQL($sql)
{
    global $modeacces;

    $result = executeSQL($sql);

    if ($modeacces=="pdo") {
        $rows = $result->fetch(PDO::FETCH_BOTH);
    }

    if ($modeacces=="mysql") {
        $rows = mysql_fetch_array($result, MYSQL_NUM);
    }

    if ($modeacces=="mysqli") {
        $rows = mysqli_fetch_array($result, MYSQLI_NUM);
    }

    return $rows[0];
}



/**
 * Retourne un seule ligne resultat d'une requete SQL.
 *
 * @param string $sql Requete SQL.
 *
 * @return array - un tableau indexe et associatif representant la ligne.
 *
 * <br />
 * @example
 * <code>
 * $sql = "select * from user where numero = 1 "; <br />
 * $results = ligneSQL($sql);                     <br />
 * $login = $results['login'];                    <br />
 * $password = $results[3];                       <br />
 * echo $login." ".$password;                     <br />
 * </code>
 */
function ligneSQL($sql)
{
    global $modeacces;

    $result = executeSQL($sql);

    if ($modeacces=="pdo") {
        $rows = $result->fetch(PDO::FETCH_BOTH);
    }

    if ($modeacces=="mysql") {
        $rows = mysql_fetch_array($result, MYSQL_BOTH);
    }

    if ($modeacces=="mysqli") {
        $rows = mysqli_fetch_array($result, MYSQLI_BOTH);
    }

    return $rows;
}



/**
 * Retourne le nombre de champs d'une requete SQL.
 *
 * @param string $sql Requete SQL.
 *
 * @return integer - le nombre de champs d'un jeu de resultat en cas de succes
 *         ou <b>false</b> si une erreur survient.
 */
function nombreChamp($sql)
{
    global $modeacces, $connexion;

    if ($modeacces=="pdo") {
        //utilisation d'une requete preparee
        $requeteP = $connexion->prepare($sql);
        $requeteP->execute();
        $num_rows = $requeteP->columnCount();
        return $num_rows;
    }

    if ($modeacces=="mysql") {
        $result = executeSQL($sql);
        return mysql_num_fields($result);
    }

    if ($modeacces=="mysqli") {
        $result = executeSQL($sql);
        return mysqli_num_fields($result);
    }
}



/**
 * Retourne le nom d'une colonne SQL specifique.
 *
 * @param string $sql Requete SQL.
 * @param integer $field_offset Position numerique du champ. field_offset commence a 0.
 *        Si field_offset n'existe pas, une alerte <b>E_WARNING</b> sera egalement generee.
 *
 * @return string - Retourne le nom du champ d'une colonne specifique.
 */
function nomChamp($sql, $field_offset)
{
    global $modeacces, $connexion, $mysql_data_type_hash, $typebase;
    
    /* getColumnMeta est EXPERIMENTALE. Cela signifie que le comportement de cette fonction, son nom et,
     * concretement, TOUT ce qui est documente ici peut changer dans un futur proche, SANS PREAVIS !
     * Soyez-en conscient, et utilisez cette fonction a vos risques et perils.
     *
     *    $select = $connexion->query($sql);
     *    $meta = $select->getColumnMeta($field_offset);
     *    return ($meta["name"]);
     */

    if ($modeacces=="pdo") {
        if ($typebase=="mysql") {
            $select = $connexion->query($sql);
            $meta = $select->getColumnMeta($field_offset);
            return ($meta["name"]);
        } else {
            $requeteP = $connexion->prepare($sql);
            $requeteP->execute();
            $fields = $requeteP->fetch(PDO::FETCH_BOTH);
            return (array_keys($fields)[$field_offset*2]);
        }
    }
    
    if ($modeacces=="mysql") {
        $result = executeSQL($sql);
        return mysql_field_name($result, $field_offset);
    }
    
    if ($modeacces=="mysqli") {
        $result = executeSQL($sql);
        $infos = (array)mysqli_fetch_field_direct($result, $field_offset);
        return $infos["name"];
        //$finfo = $result->fetch_field_direct($field_offset);
        //return $finfo->name;
    }
}



/**
 * Retourne le type d'une colonne SQL specifique.
 *
 * @param string $sql Requete SQL.
 * @param integer $field_offset Position numerique du champ. field_offset commence a 0.
 *        Si field_offset n'existe pas, une alerte <b>E_WARNING</b> sera egalement generee.
 *
 * @return string - Retourne le type du champ il peut etre : "int", "real", "string", "blob"
 *         ou autres, comme detaille dans la documentation MySQL.
 */
function typeChamp($sql, $field_offset)
{
    global $modeacces, $connexion, $mysql_data_type_hash, $typebase;

    $result = executeSQL($sql);

    if ($modeacces=="pdo") {
        //recupere le  nom de la table
        $posfrom = strpos(strtoupper($sql), "FROM");
        $newsql = substr($sql, $posfrom+5, strlen($sql)-5-$posfrom);
        $nomtables = explode(' ', $newsql);
        $nomtable = trim($nomtables[0]);
        //gestion des , plusieurs tables
        $nomtables = explode(',', $nomtable);
        $nomtable = trim($nomtables[0]);

        if ($typebase=="mysql") {
            //$select = $connexion->query($sql);
            //$meta = $select->getColumnMeta($field_offset);
            //var_dump($meta);
            //$letype = $mysql_data_type_hash[$meta["pdo_type"]];
            
            $recordset = $connexion->query("SHOW COLUMNS FROM $nomtable");
            $fields = $recordset->fetchAll(PDO::FETCH_ASSOC);
            $letype = ($fields[$field_offset]["Type"]);
        }

        if ($typebase=="oracle") {
            $nomDuChamp = nomChamp($sql, $field_offset);
            $sqlD =" SELECT data_type
			FROM user_tab_cols
			WHERE COLUMN_NAME='$nomDuChamp' AND TABLE_NAME='$nomtable'";
            $letype =  champSQL($sqlD);
        }

        // harmonisation entre les differents types des bases de donnees
        if (stristr($letype, 'varchar')!=false) {
            $letype="string";
        }
        if (stristr($letype, 'char')!=false) {
            $letype="string";
        }
        if (stristr($letype, 'int')!=false) {
            $letype="int";
        }
        if (stristr($letype, 'number')!=false) {
            $letype="int";
        }
        if (stristr($letype, 'date')!=false) {
            $letype="date";
        }

        return $letype;
    }

    if ($modeacces=="mysql") {
        return mysql_field_type($result, $field_offset);
    }

    if ($modeacces=="mysqli") {
        //transforme l'objet renvoye par mysqli_fetch_field_direct en tableau
        $infos = (array)mysqli_fetch_field_direct($result, $field_offset);
        //recherche dans le tableau $mysql_data_type_hash la correspondance en chaine du type
        return  $mysql_data_type_hash[$infos["type"]];
        //notation objet
        // return  $mysql_data_type_hash[$result->fetch_field_direct($field_offset)->type];
    }
}



/**
 * Retourne la version du serveur.
 *
 * @return string - Retourne une chaine de caracteres representant la version du serveur
 *         auquel l'extension est connectee (represente par le parametre $connexion).
 */
function versionBase()
{
    global $typebase;

    if ($typebase=="mysql") {
        return "Mysql - Version ".versionMYSQL();
    }
    
    if ($typebase=="oracle") {
        return "Oracle - Version ".versionOracle();
    }
}



/**
 * Retourne la version du serveur MySQL.
 *
 * @return string - Retourne une chaine de caracteres representant la version du serveur MySQL
 *         auquel l'extension est connectee (represente par le parametre $connexion).
 */
function versionMYSQL()
{
    global $modeacces, $connexion;

    if ($modeacces=="pdo") {
        return $connexion->getAttribute(constant("PDO::ATTR_SERVER_VERSION"));
    }

    if ($modeacces=="mysql") {
        return mysql_get_server_info();
    }

    if ($modeacces=="mysqli") {
        return mysqli_get_server_info($connexion);
    }
}



/**
 * Retourne la version du serveur ORACLE.
 *
 * @return string - Retourne une chaine de caracteres representant la version du serveur ORACLE
 *         auquel l'extension est connectee (represente par le parametre $connexion).
 */
function versionOracle()
{
    $sql="select banner from v\$version where banner like 'Oracle%'";
    $version = champSQL($sql);
    
    return $version;
}

  /////////////////////////////////////////////////////////////////////////
 ////////////////////////// FIN DES MODIFICATIONS ////////////////////////
/////////////////////////////////////////////////////////////////////////



/**
 * Converti une adresse IPV6 en IPV4, ne fait rien si une adresse IPV4
 * est passee en parametre.
 *
 * @param string $uneAdresse Adresse sous la forme IPV6 ou IPV4.
 *
 * @return string - Retourne l'adresse IPV4
 */
function adresseIPV4($uneAdresse)
{
    if (strpos($uneAdresse, ":")>0) {
        $test = explode(":", $uneAdresse);
        $ip = hexdec(substr($test[1], 0, 2));
        $ip .= ".".hexdec(substr($test[1], 2, 2));
        $ip .= ".".hexdec(substr($test[2], 0, 2));
        $ip .= ".".hexdec(substr($test[2], 2, 2));
    } else {
        $ip = $uneAdresse;
    }

    return $ip;
}



/**
 *Affiche les informations de connexion pour le debugage.
 *
 * @param string $dbname Nom de la base de donnees.
 */
function info($dbname)
{
    global $modeacces, $typebase;

    echo "<br />Base : ". $dbname." <br />";
    echo "Mode acces : ".$modeacces."<br />";
    echo "Type base : ".versionBase()."<br />";
    echo version()."<br />";
}



/**
 * Retourne le chemin courant absolu.
 *
 * @return string - Retourne une chaine de caracteres representant le chemin courant absolu.
 */
function chemin()
{
    return realpath(getcwd());
}



/**
 * Retourne les infomations sur la version de la bibliotheque "AccesDonnee.php".
 *
 * @return string - Retourne une chaine de caracteres representant le numero de la version de la
 *         bibliotheque "AccesDonnees.php".
 */
function version()
{
    return "AccesDonnees.php -- Version ".numeroVersion()." du ".dateVersion();
}



/**
 * Formate l'erreur de la requete SQL pour afficher les informations :
 * <ul> <li>Nom du serveur</li>
 *      <li>Nom du fichier</li>
 *      <li>Ligne de l'erreur</li>
 *      <li>Erreur SQL</li>
 *      <li><b>Requete SQL (en gras)</b></li></ul>
 *
 * @param string $sql Requete SQL.
 *
 * @return string - Chaine de carateres bien formatee.
 */
function afficheErreur($sql)
{
    $erreur = erreurSQL();
    $uneChaine = "ERREUR SQL : ".date("j M Y - G:i:s.u --> ").$sql." : ($erreur) \r\n";

    ecritRequeteSQL($uneChaine);

    return "<br />Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"].
    "</b>.<br />Dans le fichier : ".__FILE__.
    " a la ligne : ".__LINE__.
    "<br />".$erreur.
    "<br /><br /><b>REQUETE SQL : </b>$sql<br />";
}



/**
 * Ecrit une requete SQL a la fin du fichier <i>"requete.sql"</i>.
 *
 * @param string $sql Requete SQL.
 */
function ecritRequeteSQL($sql)
{
    $handle = fopen("requete.sql", "a");
    fwrite($handle, $sql);
    fclose($handle);
}



/**
 * Retourne le nom de la base courante.
 *
 * @return string - Retourne une chaine de caracteres representant le nom de la base de donnees
 *         auquel l'extension est connectee (represente par le parametre $connexion).
 */
function nomBase()
{
    global $modeacces;

    $sql = "SELECT DATABASE()";
    return champSQL($sql);
}



/**
 * Affiche sous forme d'un tableau le resultat d'une requete SQL.
 *
 * @param string $sql Requete SQL.
 */
function afficheRequete($sql)
{
    $results = tableSQL($sql);
    $nbchamps = nombreChamp($sql);

    echo "<pre><table style=\"border: 2px solid blue; border-collapse: collapse; \">";
    echo "   <caption style=\"color:green;font-weight:bold\">$sql</caption>
	<tr style=\"border: 2px solid blue; border-collapse: collapse; \" >";
    for ($i=0; $i<$nbchamps; $i++) {
        echo "<th style=\"border: 2px solid blue; border-collapse: collapse; \">".nomChamp($sql, $i);
        echo "(".typeChamp($sql, $i).")</th>";
    }
    echo "   </tr>";
 
    foreach ($results as $ligne) {
        echo "<tr style=\"border: 1px solid red; border-collapse: collapse; \">";
        //on extrait chaque valeur de la ligne courante
        for ($i=0; $i<$nbchamps; $i++) {
            echo "<td style=\"border: 1px solid red; border-collapse: collapse; \">".$ligne[$i]."</td>";
        }
        echo "</tr>";
    }
    
    echo "</table></pre>";
}



/**
 * Sauvegarde (DUMP) dans un fichier texte la base de donnees courante.
 *
 * @param string $mode Mode de la sauvegarde.
 *    <ul>
 *      <li><b>S</b> pour la structure de la base de donnees</li>
 *      <li><b>D</b> pour les donnees de la base</li>
 *      <li><b>A</b> pour la structure et les donnees de la base</li>
 *    </ul>
 * @param string $repertoire Nom du repertoire dans lequel le fichier dump sera sauvagarde
 *        si <b>null</b> on sauvegarde dans le repertoire courant.
 * @param string $nomfichier Nom du fichier pour le dump (ajout de l'extension .slq)
 *        si <b>null</b> on utilise <em>'nomDeLaBase'.sql</em>.
 *
 * @return string - Retourne des informations sur l'exportation.
 */
function export($mode, $repertoire, $nomfichier)
{
    global $modeacces, $dbname;

    date_default_timezone_set('Europe/Paris');
    // --- La setlocale() fonctionnne pour strftime mais pas pour DateTime->format()
    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');// OK
    // strftime("jourEnLettres jour moisEnLettres annee") de la date courante
    $datefr1 = ucfirst(strftime("%A %d"));
    $datefr2 = ucfirst(strftime("%B %Y").date(" \a H:i:s"));
    $datefr = $datefr1 ." ". $datefr2;
    $entete  = "-- ----------------------\n";
    $entete .= "-- Dump de la base ".$dbname." du ".$datefr."\n";
    $entete .= "-- ----------------------\n";

    $creations = "";
    $insertions = "\n\n";

    $sql = "show tables";
    $results = tableSQL($sql);

    foreach ($results as $ligne) {
        //on extrait chaque valeur de la ligne courante
        $table = $ligne[0];

        // structure de la table
        $creations .= "-- -----------------------------\n";
        $creations .= "-- Structure de la table ".$table."\n";
        $creations .= "-- -----------------------------\n";

        $sql1 = "show create table ".$table;
        $requetes = ligneSQL($sql1);

        $creations .= $requetes[1].";\n";

        // donnees de la table
        $sql2 = "SELECT * FROM ".$table;
        $results2 = tableSQL($sql2);

        $insertions .= "-- -----------------------------\n";
        $insertions .= "-- Contenu de la table ".$table."\n";
        $insertions .= "-- -----------------------------\n";
        
        foreach ($results2 as $ligne2) {
            $nombredechamps = nombrechamp($sql2);
            $insertions .= "INSERT INTO ".$table." VALUES(";
            for ($i=0; $i<$nombredechamps; $i++) {
                $letypeduchamp = typechamp($sql2, $i);
                $lavaleurduchamp =  $ligne2[$i];
                if ($i!=0) {
                    $insertions .=  ", ";
                }
                if ($letypeduchamp=="string" || $letypeduchamp=="blob") {
                    $insertions .=  "'";
                }
                //ajouter un null a la place d'un '' pour un champ de type INT
                if ($letypeduchamp=="int" && $lavaleurduchamp=='') {
                    $insertions .="null";
                } else {
                    $insertions .= addslashes($lavaleurduchamp);
                }
                if ($letypeduchamp=="string" || $letypeduchamp=="blob") {
                    $insertions .=  "'";
                }
            }
            $insertions .=  ");\n";
        }
        $insertions .= "\n";
    }

    $chret="";

    if ($repertoire==null) {
        $repertoire = ".";
    }
    
    if ($nomfichier==null) {
        $info = date("dMy(H-i-s)");
        $nomfichier = $dbname."_".$info.".sql";
    }

    $nf =  $repertoire."/".$nomfichier;
    $fichierDump = fopen($nf, "w");
    fwrite($fichierDump, $entete);
    $chret .= "Entete $dbname sauvegardee...<br />";
    if ($mode=='S' or $mode=='A') {
         fwrite($fichierDump, $creations);
         $chret .= "Structure de la base $dbname sauvegardee...<br />";
    }
    if ($mode=='D' or $mode=='A') {
        fwrite($fichierDump, $insertions);
        $chret .= "Donnees de la base $dbname sauvegardee...<br />";
    }
    fclose($fichierDump);

    return $chret;
}



/**
 * Exporte la structure et les donnees de la base de donnees courante a la racine
 * avec pour nom le nom de la base de donnees.
 *
 * @return string - Retourne des informations sur l'exportation.
 */
function dump()
{
    return export("A", null, nomBase().".sql");
}



/**
 * Exporte la structure de la base de donnees courante dans le repertoire <em>"db"</em>
 * avec pour nom le nom de la base de donnees avec l'extention <em>".sql"</em>.
 *
 *  @return string - Retourne des informations sur l'exportation.
 */
function exportBase()
{
    return export("S", "db", nomBase().".sql");
}



/**
 * Sauvegarde dans le repertoire <em>"$repertoire"</em> les donnees de la base.
 * le nom du fichier est genere en fonction de la date et de l'heure.
 *
 * @param string $repertoire Nom du repertoire dans lequel le fichier dump sera sauvagarde,
 *        si <b>null</b> on sauvegarde dans le repertoire courant.
 *
 * @return string - Retourne des informations sur l'exportation.
 */
function sauvegarde($repertoire)
{
    return export("D", $repertoire, null);
}



/**
 * Sauvegarde dans le repertoire <em>"sauvegarde"</emW les donnees de la base.
 * le nom du fichier est genere en fonction de la date et de l'heure
 *
 * @return string - Retourne des informations sur l'exportation.
 */
function sauvegardeDonnees()
{
    return export("D", "sauvegarde", null);
}



/**
 * Restaure depuis un fichier texte la base de donnees <em>dbname</em>.
 *
 * @param string $mode
 *     <ul><li><b>S</b> pour la structure de la base de donnees.</li>
 *         <li><b>D</b> pour les donnees de la base.</li></ul>
 * @param string $fichier Nom du repertoire dans lequel le fichier dump sera sauvagarde.
 * @param string $dbname Nom de la base de donnees.
 *
 *  @return string - Retourne des informations sur l'importation.
 */
function import($mode, $fichier, $dbname)
{
    global $modeacces;

    //quelques informations importantes
    $ipsrv = $_SERVER['SERVER_ADDR'];
    $versionPHP = getenv("SERVER_SOFTWARE");
    $namesrv = $_SERVER['SERVER_NAME'];

    //on utilise la base de donnees
    $sql = "USE `$dbname`";
    //echo "<br />SQL : $sql<br>";
    $result = executeSQL_GE($sql);

    if ($result) {
        //si la basee existe
        $sql = "SHOW tables";
        $results = tableSQL($sql);
        foreach ($results as $ligne) {
            //on extrait chaque valeur de la ligne courante
            $nomTable = $ligne[0];
            if ($mode=="S") {
                //on supprime toutes les tables
                $sql = "DROP TABLE `$nomTable`";
            } else {
                    //on vide toutes les tables
                    $sql = "TRUNCATE `$nomTable`";
                    //echo "<br />SQL : $sql<br>";
                    $result = executeSQL($sql);
            }
        }
    } else {
        //sinon on cree la base
        $sql = "CREATE DATABASE `$dbname` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
        //echo "<br />SQL : $sql<br>";
        $result = executeSQL($sql);
        //on utilise la base de donnees
        $sql = "USE `$dbname`";
        //echo "<br />SQL : $sql<br>";
        $result = executeSQL_GE($sql);
    }

    //desactive les cle etrangere pour pouvoir effacer les tables de la base
    $sql = "SET FOREIGN_KEY_CHECKS = 0";
    $result = executeSQL($sql);
    //echo "<br />SQL : $sql<br>";

    $versionMySQL=versionMYSQL();

    //restaure la base en fonction du fichier creer par le dump (V2)
    //Lit le fichier et renvoie le resultat dans un tableau
    $lines = file($fichier);
    $versionBase = $lines[1];

    $sql="";

    //execute toutes les requetes du fichier de dump
    for ($i=0; $i<count($lines); $i++) {
        $line=$lines[$i];
        if ($line[0]!='-' && $line[0]!='/' && strlen($line)>2) {
            $sql = $sql.$line;
            $test = strrev($line);
            $pospv = strpos($test, ";");
            if ($pospv>0 && $pospv<5) {
                //echo "<br />SQL : $sql<br>";
                $result = executeSQL($sql);
                $sql = "";
            }
        }
    }

    //reactive les cle etrangere la base
    $sql = "SET FOREIGN_KEY_CHECKS = 1";
    $result = executeSQL($sql);
    //echo "<br />SQL : $sql<br>";

    $versionBase = substr($versionBase, 23+strlen($dbname), strlen($versionBase)-23-strlen($dbname));
    $versionBase = str_replace("a", "<br />", $versionBase);

    //retourne les infos
    return "<font color=green> Version base  $dbname <br /> $versionBase <br />$namesrv(IP : $ipsrv)<br />
	$versionPHP<br />MySQL : $versionMySQL</font>";
}



/**
 * Importe le fichier <em>"dbname.sql"</em> (a la racine) sur le serveur MYSQL
 * avec pour nom le nom de la base de donnees.
 *
 * @param string $dbname Nom du repertoire dans lequel le fichier dump sera sauvagarde.
 *
 * @return string - Retourne des informations sur l'importation.
 */
function importBase($dbname)
{
    return import("S", $dbname.".sql", $dbname);
}



/**
 * Creation la base de donnees <em>"dbname"</em> a partir du fichier <em>"dbname.sql"</em>
 * qui est dans le repertoire <em>"db"</em> sur le serveur MYSQL.
 *
 * @param string $dbname Nom du repertoire dans lequel le fichier dump sera sauvagarde.
 *
 * @return string - Retourne des informations sur l'importation.
 */
function createBase($dbname)
{
    return import("S", "db\\".$dbname.".sql", $dbname);
}



/**
 * Importation des donnees a partir du fichier "$nomfichier" qui est dans le
 * repertoire "sauvegarde" dans la base de donnee connectee.
 *
 * @param string $fichier Nom du repertoire dans lequel le fichier dump sera sauvagarde.
 * @param string $dbname Nom de la base de donnees.
 *
 * @return string - Retourne des informations sur l'importation.
 */
function importDonnees($nomfichier, $dbname)
{
    return import("D", "sauvegarde\\".$nomfichier, $dbname);
}
