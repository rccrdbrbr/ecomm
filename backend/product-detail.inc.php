<?php

  $ida = $_GET["id"];

  require_once 'dbh.inc.php';
  require_once 'functions/functions-product-list.inc.php';

  $annuncio= fetchAnnuncio($conn, $ida);
  if ($annuncio == false) {
      header("location: product-list.php");
  }

  $nOsserva= contaOsserva($conn, $ida);
