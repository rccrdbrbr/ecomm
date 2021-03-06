<?php

function SignupVuoto($name, $surname, $email, $cf, $via, $city, $prov, $reg, $img, $pwd1, $pwd2)
{
    $risultato;
    if (empty($name) || empty($surname) || empty($email) || empty($cf) || empty($via) ||empty($city) ||empty($prov) ||empty($reg) ||empty($img) ||empty($pwd1) || empty($pwd2)) {
        $risultato=true;
    } else {
        $risultato=false;
    }
    return $risultato;
}

function EmailNValido($email)
{
    $risultato;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $risultato=true;
    } else {
        $risultato=false;
    }
    return $risultato;
}

function ControlloPwd($pwd1, $pwd2)
{
    $risultato;
    if ($pwd1 !== $pwd2) {
        $risultato=true;
    } else {
        $risultato=false;
    }
    return $risultato;
}

function UsernameEsiste($conn, $cf, $email)
{
    $eliminato=0;
    $sql= "SELECT * FROM utente WHERE CF= ? AND Eliminato=? OR Email = ? AND Eliminato=?;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sbsb", $cf, $eliminato, $email, $eliminato);
    mysqli_stmt_execute($stmt);

    $dati= mysqli_stmt_get_result($stmt);

    if ($riga= mysqli_fetch_assoc($dati)) {
        return $riga;
    } else {
        $risultato= false;
        return $risultato;
    }

    mysqli_stmt_close($stmt);
}

function fetchSigla($conn, $prov, $reg)
{
    $sql= "SELECT sigla FROM regioni WHERE provincia = ? AND regione = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $prov, $reg);
    mysqli_stmt_execute($stmt);

    $dati= mysqli_stmt_get_result($stmt);

    if ($riga= mysqli_fetch_assoc($dati)) {
        return $riga["sigla"];
    } else {
        $risultato= false;
        return $risultato;
    }

    mysqli_stmt_close($stmt);
}

function CreaIndirizzo($conn, $via, $city, $prov, $reg)
{
    $sql= "INSERT INTO indirizzo (Via, Citta, Prov, Reg) VALUES (?, ?, ?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtaddrfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $via, $city, $prov, $reg);
    mysqli_stmt_execute($stmt);
}

function CreaUtente($conn, $name, $surname, $email, $cf, $via, $city, $prov, $reg, $imgname, $imgtmpname, $type, $pwd1)
{
    $del=0;

    $fileDestination = "../img/".$imgname;
    move_uploaded_file($imgtmpname, $fileDestination);
    $sql= "INSERT INTO utente (CF, Email, Tipo, Nome, Cognome, Immagine, Eliminato,  Via, Città, Prov, Reg, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashPwd = password_hash($pwd1, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssisssss", $cf, $email, $type, $name, $surname, $imgname, $del, $via, $city, $prov, $reg, $hashPwd);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
}

function LoginVuoto($cf, $pwd)
{
    $risultato;
    if (empty($cf) || empty($pwd)) {
        $risultato=true;
    } else {
        $risultato=false;
    }
    return $risultato;
}

function LoginUser($conn, $cf, $pwd)
{
    $cfEsiste= UsernameEsiste($conn, $cf, $cf);

    if ($cfEsiste === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $hashPwd= $cfEsiste["Password"];
    $controllaPwd= password_verify($pwd, $hashPwd);

    if ($controllaPwd===false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } elseif ($controllaPwd===true) {
        session_start();
        $_SESSION["CF"]= $cfEsiste["CF"];
        $_SESSION["Email"]= $cfEsiste["Email"];
        $_SESSION["Tipo"]= $cfEsiste["Tipo"];
        $_SESSION["Regione"]= $cfEsiste["Reg"];
        $_SESSION["Carrello"]= array();
        header("location: ../index.php");
        exit();
    }
}
