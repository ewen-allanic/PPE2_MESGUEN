<?php 
include "connectAD.php";

$sql="truncate table tournee";
    echo "Sql : ".$sql."<br/>";
    $result = executeSQL($sql);

 ?>