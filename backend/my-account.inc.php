<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "account-query.inc.php";

if (isset($_POST["modprof"])) {
    $email = $_POST["email"];
    $via = $_POST["via"];
    $city = $_POST["city"];
    $prov = $_POST["prov"];
    $reg = $_POST["reg"];
    $img = $_POST["img"];
    $type = $_POST["type"];

    require_once 'dbh.inc.php';
    require_once '../functions/functions-account-query.inc.php';
    require_once '../functions/functions-signup-login.inc.php';

    if (EmailNValido($email)!== false) {
        header("location: ../my-account.php?error=invalidemail");
        exit();
    }

    CambiaEmail($conn, $utente, $email);
    CreaIndirizzo($conn, $via, $city, $prov, $reg);
    CambiaVia($conn, $utente, $via);
    CambiaCittà($conn, $utente, $city);
    CambiaProvincia($conn, $utente, $prov);
    CambiaRegione($conn, $utente, $reg);
    CambiaImmagine($conn, $utente, $img);
    CambiaTipo($conn, $utente, $type);
} elseif (isset($_POST["modpwd"])) {
    $pwdv = $_POST["pwdv"];
    $pwdn1 = $_POST["pwdn1"];
    $pwdn2 = $_POST["pwdn2"];

    require_once 'dbh.inc.php';
    require_once '../functions/functions-account-query.inc.php';

    CambiaPwd($conn, $utente, $pwdv, $pwdn1, $pwdn2);
} elseif (isset($_POST["delete"])) {
    require_once 'dbh.inc.php';
    require_once '../functions/functions-account-query.inc.php';

    eliminaAccount($conn, $utente);
} else {
    header("location: ../my-account.php");
    exit();
}
