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
    $reg = $_POST["regione"];
    $img = $_FILES["img"];
    $imgname = $img["name"];
    $imgtmpname = $img["tmp_name"];
    $type = $_POST["type"];

    require_once 'dbh.inc.php';
    require_once '../functions/functions-account-query.inc.php';
    require_once '../functions/functions-signup-login.inc.php';

    if (EmailNValido($email)!== false) {
        header("location: ../my-account.php?error=invalidemail");
        exit();
    }
    $sigla = fetchSigla($conn, $prov, $reg);
    CambiaIndirizzo($conn, $utente, $sigla, $reg, $city, $via);
    CreaIndirizzo($conn, $via, $city, $sigla, $reg);
    CambiaEmail($conn, $utente, $email);
    CambiaImmagine($conn, $utente, $imgname, $imgtmpname);
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
