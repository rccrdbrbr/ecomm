<?php

require "dbh.inc.php";

if (!$conn->connect_errno) {
    $regione= $_GET["regione"];
    $sql = "SELECT provincia, sigla FROM regioni WHERE regione = '$regione'";

    $res = $conn->query($sql);
    if ($res==null) {
        $risultato["status"]="ko";
        $risultato["msg"]="errore nella esecuzione della interrogazione " . $cid->error;
    } else {
        $prov= array();
        while ($row=$res->fetch_row()) {
            $prov[]=array("prov"=>$row[0],"sigla"=>$row[1]);
        }
        $risultato["contenuto"]=$prov;
    }
}
echo json_encode($risultato);
