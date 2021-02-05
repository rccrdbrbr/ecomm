<?php

  require_once 'dbh.inc.php';
  require_once 'functions/functions-product-list.inc.php';

  $annunci = fetchAnnunci($conn);

while ($row = mysqli_fetch_assoc($annunci)) {
    if (isset($_SESSION["CF"])) {
        if ($row["TipoA"]=="pubblico" || $row["TipoA"]=="ristretto" && $row["AreaGeo"]==$_SESSION["Regione"]) {
            include "common/product-list-items.php";
        }
    } elseif (!isset($_SESSION["CF"]) && $row["TipoA"]=="pubblico") {
        include "common/product-list-items.php";
    }
}
