<?php

  $ida = $_GET["id"];

  require_once 'dbh.inc.php';
  require_once 'functions/functions-product-list.inc.php';

  $annuncio= fetchAnnuncio($conn, $ida);
  $nOsserva= contaOsserva($conn, $ida);
