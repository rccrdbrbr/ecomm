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

if (isset($_POST["submit"])) {
    if (erroreValutazione($serieta, $puntualita) !== true) {
        if (fetchValutazione($conn, $cf1, $cf2, $ida) === false) {
            valuta($conn, $cf1, $cf2, $ida, $serieta, $puntualita);
        } else {
            header("location: ../my-account.php?error=notunique");
        }
    } else {
        header("location: ../my-account.php?error=wronginput");
    }
} else {
    header("location: ../index.php");
}
