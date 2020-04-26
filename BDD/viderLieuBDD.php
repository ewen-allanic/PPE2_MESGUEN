<?php 


// SE CONNECTER A LA BDD
include "connectAD.php";
echo "<br/><br/><br/><br/>";

$sql="truncate table lieu";
    echo "Sql : ".$sql."<br/>";
    $result = executeSQL($sql);

 ?>