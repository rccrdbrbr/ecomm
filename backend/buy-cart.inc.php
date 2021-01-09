<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cf=$_SESSION["CF"];

require_once "dbh.inc.php";
require_once "../functions/functions-wishlist-cart.inc.php";

foreach ($_SESSION["Carrello"] as $ida) {
    buyCart($conn, $cf, $ida);
    cambiaStato($conn, $ida);
}

unset($_SESSION["Carrello"]);

$_SESSION["Carrello"]= array();
header("location: ../index.php?error=none");
exit();
