<?php

if (isset($_POST["submit"])) {
    $cf= $_POST["cf"];
    $pwd= $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once '../functions/functions-signup-login.inc.php';

    if (LoginVuoto($cf, $pwd)!== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    LoginUser($conn, $cf, $pwd);
} else {
    header("location: ../login.php");
    exit();
}
