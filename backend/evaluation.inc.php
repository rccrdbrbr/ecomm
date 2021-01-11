<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$cf1= $_SESSION["CF"];
$cf2= $_GET["cf"];
$ida= $_GET["id"];
$serieta = $_POST["serieta"];
$puntualita = $_POST["puntualita"];

require_once 'dbh.inc.php';
require_once '../functions/functions-account-query.inc.php';

if (isset($_POST["submitV"])) {
    if (fetchValutazione($conn, $cf1, $cf2, $ida) == true) {
        aggiornaValutaV($conn, $cf1, $cf2, $ida, $serieta, $puntualita);
    } else {
        valutaV($conn, $cf1, $cf2, $ida, $serieta, $puntualita);
    }
} elseif (isset($_POST["submitA"])) {
} else {
    header("location: ../index.php");
}
