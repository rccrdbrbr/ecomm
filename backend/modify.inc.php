<?php
if (isset($_POST["modify"])) {
    $ida=$_GET["id"];
    $nameA = $_POST["nameA"];
    $nameP = $_POST["nameP"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $visibility = $_POST["visibility"];
    $subcategory = $_POST["subcategory"];
    $area = $_POST["area"];
    $com = $_POST["com"];
    $prov = $_POST["prov"];
    $reg = $_POST["reg"];
    if (isset($_POST["description"])) {
        $description = $_POST["description"];
    }
    if (isset($_POST["imgN"])) {
        $img = $_POST["imgN"];
    }

    require_once 'dbh.inc.php';
    require_once '../functions/functions-ad.inc.php';

    if (modifyVuoto($nameA, $nameP, $price, $category, $visibility, $com, $prov, $reg)!== false) {
        header("location: ../my-account.php?error=emptyinput");
        exit();
    }

    if (AreaVuota($visibility, $area)!== false) {
        header("location: ../my-account.php?error=missinginput");
        exit();
    }

    if (AreaErrata($visibility, $area)!== false) {
        header("location: ../my-account.php?error=wronginput");
        exit();
    }

    cambiaAnnuncio($conn, $ida, $nameA, $price, $com, $prov, $reg, $visibility, $area);
    cambiaProdotto($conn, $ida, $nameP, $category, $subcategory);
    if (isset($_POST["imgN"])) {
        cambiaImmagine($conn, $ida, $img);
    }
    if (isset($_POST["description"])) {
        cambiaDescrizione($conn, $ida, $description);
    }
} else {
    header("location: my-account.php");
}
