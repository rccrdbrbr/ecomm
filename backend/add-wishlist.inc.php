<?php
  session_start();
  $cf=$_SESSION["CF"];
  $ida=$_GET["id"];

  require_once 'dbh.inc.php';
  require_once '../functions/functions-add.inc.php';

  aggiungiOsserva($conn, $cf, $ida);
