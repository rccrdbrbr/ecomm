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
    $description = $_POST["description"];
    if (isset($_POST["imgN"])) {
        $img = $_POST["imgN"];
    }

    require_once 'dbh.inc.php';
    require_once '../functions/functions-ad.inc.php';

    CambiaImmagine($conn, $ida, $img);
} else {
    header("location: my-account.php");
}
