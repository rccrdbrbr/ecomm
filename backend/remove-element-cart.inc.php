<?php

if (isset($_POST["id"])) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $ida=$_POST["id"];

    require_once "../functions/functions-wishlist-cart.inc.php";

    rimuoviCarrello($ida);
} else {
    header("location: ../cart.php");
}
