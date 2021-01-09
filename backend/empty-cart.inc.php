<?php
    session_start();
    //while (empty($_SESSION["Carrello"]) !== true) {
    unset($_SESSION["Carrello"]);
    //}

    $_SESSION["Carrello"]= array();
    header("location: ../cart.php");
    exit();
