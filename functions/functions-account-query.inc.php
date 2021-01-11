<?php


function fetchInfo($conn, $cf)
{
    $sql= "SELECT * FROM utente WHERE CF= ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $cf);
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

function EmailEsiste($conn, $email)
{
    $eliminato=0;
    $sql= "SELECT * FROM utente WHERE Email = ? AND Eliminato=?;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sb", $email, $eliminato);
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

function CambiaEmail($conn, $utente, $email)
{
    /*
    $emailEsiste= EmailEsiste($conn, $email);

    if ($emailEsiste !== false){
      header("location: ../my-account.php?error=repemail");
      exit();
    }
*/
    $sql= "UPDATE utente SET Email = ? WHERE CF = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $utente["CF"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function CambiaVia($conn, $utente, $via)
{
    $sql= "UPDATE utente SET Via = ? WHERE CF = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $via, $utente["CF"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function CambiaCittà($conn, $utente, $city)
{
    $sql= "UPDATE utente SET Città = ? WHERE CF = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $city, $utente["CF"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function CambiaProvincia($conn, $utente, $prov)
{
    $sql= "UPDATE utente SET Prov = ? WHERE CF = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $prov, $utente["CF"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function CambiaRegione($conn, $utente, $reg)
{
    $sql= "UPDATE utente SET Reg = ? WHERE CF = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $reg, $utente["CF"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function CambiaImmagine($conn, $utente, $img)
{
    if ($img!== "") {
        $sql= "UPDATE utente SET Immagine = ? WHERE CF = ? ;";
        $stmt= mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../my-account.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $img, $utente["CF"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

function CambiaTipo($conn, $utente, $type)
{
    $sql= "UPDATE utente SET Tipo = ? WHERE CF = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $type, $utente["CF"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../my-account.php?error=none");
    exit();
}

function CambiaPwd($conn, $utente, $pwdv, $pwdn1, $pwdn2)
{
    $hashPwd= $utente["Password"];
    $controllaPwd= password_verify($pwdv, $hashPwd);

    if ($controllaPwd===false) {
        header("location: ../my-account.php?error=wrongpwd");
        exit();
    } elseif ($controllaPwd===true) {
        if ($pwdn1 === $pwdn2) {
            $hashPwdn = password_hash($pwdn1, PASSWORD_DEFAULT);
            $sql= "UPDATE utente SET Password = ? WHERE CF = ? ;";
            $stmt= mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../my-account.php?error=stmtfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "ss", $hashPwdn, $utente["CF"]);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("location: ../my-account.php?error=none");
            exit();
        }
    }
}

function fetchAnnunciP($conn, $cf)
{
    $sql= "SELECT * FROM annuncio a NATURAL JOIN stati s
    LEFT OUTER JOIN acquista ac ON ac.ID_A=a.ID_A WHERE a.CF= ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $cf);
    mysqli_stmt_execute($stmt);

    $dati= mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($dati) > 0) {
        return $dati;
    } else {
        $risultato=false;
        return $risultato;
    }

    mysqli_stmt_close($stmt);
}

function fetchAnnunciC($conn, $cf)
{
    $sql= "SELECT an.ID_A, an.CF, an.Nome_A, ac.DataAcquisto, an.Prezzo, ac.MetodoPagamento
    FROM annuncio an JOIN acquista ac ON an.ID_A=ac.ID_A WHERE ac.CF= ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $cf);
    mysqli_stmt_execute($stmt);

    $dati= mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($dati) > 0) {
        return $dati;
    } else {
        $risultato=false;
        return $risultato;
    }

    mysqli_stmt_close($stmt);
}

function eliminaAccount($conn, $utente)
{
    $elimina=1;
    $sql= "UPDATE utente SET Eliminato = ? WHERE CF = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $elimina, $utente["CF"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../backend/logout.inc.php");
}

function fetchValutazione($conn, $cf1, $cf2, $ida)
{
    $sql= "SELECT * FROM valutazione WHERE CF1 = ? AND CF2=? AND ID_A=? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed1");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssi", $cf1, $cf2, $ida);
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

function aggiornaValutaV($conn, $cf1, $cf2, $ida, $serieta, $puntualita)
{
    $sql= "UPDATE valutazione SET SerietàV = ? PuntualitàV = ?  WHERE CF1 = ? AND CF2 = ? AND ID_A = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed2");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $serieta, $puntualita, $cf1, $cf2, $ida);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../my-account.php?error=none");
}

function valutaV($conn, $cf1, $cf2, $ida, $serieta, $puntualita)
{
    $sql= "INSERT INTO osserva (CF1, CF2, ID_A, SerietàV, PuntualitàV) VALUES (?, ?, ?, ?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed3");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssiss", $cf1, $cf2, $ida, $serieta, $puntualita);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../my-account.php?error=none");
}
