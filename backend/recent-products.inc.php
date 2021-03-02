<?php

require_once 'dbh.inc.php';
require_once 'functions/functions-product-list.inc.php';

$annunci = fetchAnnunciRecenti($conn);
if ($annunci!== false) {
    while ($row = mysqli_fetch_assoc($annunci)) {
        if (isset($_SESSION["CF"])) {
            if ($row["TipoA"]=="pubblico" || $row["TipoA"]=="ristretto" && $row["AreaGeo"]==$_SESSION["Regione"]) {
                include "common/product-list-sliders.php";
            }
        } elseif (!isset($_SESSION["CF"]) && $row["TipoA"]=="pubblico") {
            include "common/product-list-sliders.php";
        }
    }
} else {
    ?>
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3>Non ci sono annunci da mostrare!</h3>
        </div>
      </div>
  </div>
  <?php
}
