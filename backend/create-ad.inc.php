<?php

if (isset($_POST["submit"])) {
    $name_an = $_POST["name_an"];
    $name_ar = $_POST["name_ar"];
    $price = $_POST["price"];
    $com = $_POST["com"];
    $prov = $_POST["prov"];
    $reg = $_POST["regione"];
    $date = $_POST["date"];
    $visibility = $_POST["visibility"];
    $area = $_POST["area"];
    $img = $_POST["img"];
    $type = $_POST["type"];
    $ensurance = $_POST["ensurance"];
    $usura = $_POST["usura"];
    $periodo = $_POST["periodo"];
    $category = $_POST["category"];
    $subcategory = $_POST["subcategory"];
    $description = $_POST["description"];

    require_once 'dbh.inc.php';
    require_once '../functions/functions-ad.inc.php';

    if (AdVuoto($name_an, $name_ar, $price, $com, $prov, $reg, $date, $visibility, $type, $category, $subcategory, $description)!== false) {
        header("location: ../create-ad.php?error=emptyinput");
        exit();
    }

    if (AreaVuota($visibility, $area)!== false) {
        header("location: ../create-ad.php?error=missinginput");
        exit();
    }

    if (AreaErrata($visibility, $area)!== false) {
        header("location: ../create-ad.php?error=wronginput");
        exit();
    }

    if (AssicurazioneErr($type, $ensurance)!== false) {
        header("location: ../create-ad.php?error=wronginput");
        exit();
    }

    if (UsuraPeriodoErr($type, $usura, $periodo)!== false) {
        header("location: ../create-ad.php?error=wronginput");
        exit();
    }

    if (DataErrata($date, $type)!== false) {
        header("location: ../create-ad.php?error=wrongdate");
        exit();
    }

    CreaProdotto($conn, $name_ar, $type, $img, $ensurance, $usura, $periodo, $category, $subcategory);

    CreaAnnuncio($conn, $name_an, $price, $com, $prov, $reg, $date, $visibility, $area, $description);

    CreaStato($conn);
} else {
    header("location: ../create-ad.php");
    exit();
}
