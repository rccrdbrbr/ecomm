<?php

if (isset($_SESSION["CF"])) {
    $cf=$_SESSION["CF"];

    require_once 'dbh.inc.php';
    require_once 'functions/functions-wishlist-cart.inc.php';

    if (contaOsservati($conn, $cf) !== false) {
        $conta=contaOsservati($conn, $cf);
        echo $conta["n"];
    } else {
        echo "0";
    }
} else {
    echo "0";
}
