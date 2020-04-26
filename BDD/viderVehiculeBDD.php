<?php 
include "connectAD.php";

$sql="truncate table vehicule";
    echo "Sql : ".$sql."<br/>";
    $result = executeSQL($sql);
 ?>