<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cf=$_SESSION["CF"];
$f=0;

require_once "dbh.inc.php";
require_once "../functions/functions-wishlist-cart.inc.php";

foreach ($_SESSION["Carrello"] as $ida) {
  $check = checkBuy($conn, $ida)
    if ($check["CF"] !== $cf) {
        buyCart($conn, $cf, $ida);
        cambiaStato($conn, $ida);
    }else {
      $f=1;
    }
}

unset($_SESSION["Carrello"]);

$_SESSION["Carrello"]= array();
echo $f;
//header("location: ../index.php?error=none");
//exit();
