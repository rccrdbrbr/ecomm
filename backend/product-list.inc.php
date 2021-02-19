<?php

  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }

  require_once 'dbh.inc.php';
  require_once 'functions/functions-product-list.inc.php';

  $f=0;

  if (isset($_GET["category"])) {
      $annunci = fetchAnnunciCat($conn, $_GET["category"]);
      if ($annunci == true) {
          while ($row = mysqli_fetch_assoc($annunci)) {
              if (isset($_SESSION["CF"])) {
                  if ($row["TipoA"]=="pubblico" || $row["TipoA"]=="ristretto" && $row["AreaGeo"]==$_SESSION["Regione"]) {
                      ?>
                    <div class="col-md-4">
                    <?php
                      include "common/product-list-items.php"; ?>
                      </div>
                      <?php
                      $f=1;
                  }
              } elseif (!isset($_SESSION["CF"]) && $row["TipoA"]=="pubblico") {
                  ?>
                <div class="col-md-4">
                <?php
                  include "common/product-list-items.php"; ?>
                  </div>
                  <?php
                  $f=1;
              }
          }
          if ($f==0) {
              ?>
            <p>Nessun prodotto nella categoria selezionata!</p>
            <?php
          }
      } else {
          ?>
          <p>Nessun prodotto nella categoria selezionata!</p>
          <?php
      }
  } elseif (isset($_GET["subcategory"])) {
      $annunci = fetchAnnunciSubcat($conn, $_GET["subcategory"]);
      if ($annunci == true) {
          while ($row = mysqli_fetch_assoc($annunci)) {
              if (isset($_SESSION["CF"])) {
                  if ($row["TipoA"]=="pubblico" || $row["TipoA"]=="ristretto" && $row["AreaGeo"]==$_SESSION["Regione"]) {
                      ?>
                    <div class="col-md-4">
                    <?php
                      include "common/product-list-items.php"; ?>
                      </div>
                      <?php
                      $f=1;
                  }
              } elseif (!isset($_SESSION["CF"]) && $row["TipoA"]=="pubblico") {
                  ?>
                <div class="col-md-4">
                <?php
                  include "common/product-list-items.php"; ?>
                  </div>
                  <?php
                  $f=1;
              }
          }
          if ($f==0) {
              ?>
            <p>Nessun prodotto nella categoria selezionata!</p>
            <?php
          }
      } else {
          ?>
          <p>Nessun prodotto nella sottocategoria selezionata!</p>
          <?php
      }
  } elseif (isset($_GET["prov"])) {
      $annunci = fetchAnnunciProv($conn, $_GET["prov"]);

      if ($annunci == true) {
          while ($row = mysqli_fetch_assoc($annunci)) {
              if (isset($_SESSION["CF"])) {
                  if ($row["TipoA"]=="pubblico" || $row["TipoA"]=="ristretto" && $row["AreaGeo"]==$_SESSION["Regione"]) {
                      ?>
                  <div class="col-md-4">
                  <?php
                    include "common/product-list-items.php"; ?>
                    </div>
                    <?php
                    $f=1;
                  }
              } elseif (!isset($_SESSION["CF"]) && $row["TipoA"]=="pubblico") {
                  ?>
              <div class="col-md-4">
              <?php
                include "common/product-list-items.php"; ?>
                </div>
                <?php
                $f=1;
              }
          }
          if ($f==0) {
              ?>
          <p>Nessun prodotto nell'area geografica selezionata!</p>
          <?php
          }
      } else {
          ?>
        <p>Nessun prodotto presente!</p>
        <?php
      }
  } else {
      $annunci = fetchAnnunci($conn);

      if ($annunci == true) {
          while ($row = mysqli_fetch_assoc($annunci)) {
              if (isset($_SESSION["CF"])) {
                  if ($row["TipoA"]=="pubblico" || $row["TipoA"]=="ristretto" && $row["AreaGeo"]==$_SESSION["Regione"]) {
                      ?>
                    <div class="col-md-4">
                    <?php
                      include "common/product-list-items.php"; ?>
                      </div>
                      <?php
                      $f=1;
                  }
              } elseif (!isset($_SESSION["CF"]) && $row["TipoA"]=="pubblico") {
                  ?>
                <div class="col-md-4">
                <?php
                  include "common/product-list-items.php"; ?>
                  </div>
                  <?php
                  $f=1;
              }
          }
          if ($f==0) {
              ?>
            <p>Nessun prodotto nella categoria selezionata!</p>
            <?php
          }
      } else {
          ?>
          <p>Nessun prodotto presente!</p>
          <?php
      }
  }
