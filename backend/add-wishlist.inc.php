<?php
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }

  $cf=$_SESSION["CF"];
  $ida=$_POST["id"];

  require_once 'dbh.inc.php';
  require_once '../functions/functions-wishlist-cart.inc.php';

  if ($_SESSION["Tipo"] !== "Venditore") {
      aggiungiOsserva($conn, $cf, $ida);
  }
