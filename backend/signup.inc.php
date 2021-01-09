<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $cf = $_POST["cf"];
    $via = $_POST["via"];
    $city = $_POST["city"];
    $prov = $_POST["prov"];
    $reg = $_POST["reg"];
    $img = $_POST["img"];
    $type = $_POST["type"];
    $pwd1 = $_POST["pwd1"];
    $pwd2 = $_POST["pwd2"];

    require_once 'dbh.inc.php';
    require_once '../functions/functions-signup-login.inc.php';

    if (SignupVuoto($name, $surname, $email, $cf, $via, $city, $prov, $reg, $img, $pwd1, $pwd2)!== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    /*
    if (UsernameNValido($cf)!== false) {
      header("location: ../signup.php?error=invalidusername");
      exit();
    }
    */

    if (EmailNValido($email)!== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (ControlloPwd($pwd1, $pwd2)!== false) {
        header("location: ../signup.php?error=differentpwd");
        exit();
    }

    if (UsernameEsiste($conn, $cf, $email)!== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }



    CreaIndirizzo($conn, $via, $city, $prov, $reg);
    CreaUtente($conn, $name, $surname, $email, $cf, $via, $city, $prov, $reg, $img, $type, $pwd1);
} else {
    header("location: ../signup.php");
    exit();
}
