<?php

require_once 'dbh.inc.php';
require_once 'functions/functions-product-list.inc.php';

$annunci = fetchAnnunciRecenti($conn);
while ($row = mysqli_fetch_assoc($annunci)) {
    if (isset($_SESSION["CF"])) {
        if ($row["TipoA"]=="pubblico" || $row["TipoA"]=="ristretto" && $row["AreaGeo"]==$_SESSION["Regione"]) {
            include "common/product-list-sliders.php";
        }
    } elseif (!isset($_SESSION["CF"]) && $row["TipoA"]=="pubblico") {
        include "common/product-list-sliders.php";
    }
}
