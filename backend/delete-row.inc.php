<?php

if (isset($_POST["nrow"])) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $nrow=$_POST["nrow"];

    unset($_SESSION["table"][$nrow]);
    $_SESSION["table"]=array_values($_SESSION["table"]);
}
