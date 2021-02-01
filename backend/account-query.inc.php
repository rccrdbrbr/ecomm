<?php

  if (isset($_GET["cf"])) {
      $cf=$_GET["cf"];
  } else {
      $cf= $_SESSION["CF"];
  }

    require_once 'dbh.inc.php';
    if (isset($_POST["modprof"]) || isset($_POST["modpwd"]) || isset($_POST["delete"])) {
        require_once '../functions/functions-account-query.inc.php';
    } else {
        require_once 'functions/functions-account-query.inc.php';
    }

    $utente = fetchInfo($conn, $cf);
    $valutazioni = fetchValutazioni($conn, $cf);
