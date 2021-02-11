<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "dbh.inc.php";
require_once "../functions/functions-wishlist-cart.inc.php";

$cart=$_SESSION["Carrello"];
$_SESSION["Totale"]=0;

foreach ($cart as $ida) {
    if (productPrice($conn, $ida)!==false) {
        $p = productPrice($conn, $ida);
        $_SESSION["Totale"]+= $p["Prezzo"];
    }
}

echo $_SESSION["Totale"];
