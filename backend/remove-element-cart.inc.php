<?php

if (isset($_GET["id"])) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $ida=$_GET["id"];

    require_once "../functions/functions-wishlist-cart.inc.php";

    rimuoviCarrello($ida);
} else {
    header("location: ../cart.php");
}
