<?php

require "dbh.inc.php";

if (!$conn->connect_errno) {
    $sql = "SELECT DISTINCT regione FROM regioni order by regione";

    $res = $conn->query($sql);
    if ($res==null) {
        $risultato["status"]="ko";
        $risultato["msg"]="errore nella esecuzione della interrogazione " . $cid->error;
    } else {
        $regioni= array();
        while ($row=$res->fetch_row()) {
            $regioni[]=$row[0];
        }
        $risultato["contenuto"]=$regioni;
    }
}
echo json_encode($risultato);
