<?php


function fetchInfo($conn, $cf)
{
    $sql= "SELECT * FROM utente WHERE CF= ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
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

function CambiaIndirizzo($conn, $utente, $prov, $reg, $city, $via)
{
    $sql= "UPDATE utente SET Via = ?, Città = ?,  Prov= ?, Reg = ? WHERE CF = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $via, $city, $prov, $reg, $utente["CF"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function CambiaImmagine($conn, $utente, $imgname, $imgtmpname)
{
    if ($imgname!== "") {
        $fileDestination = "../img/".$imgname;
        move_uploaded_file($imgtmpname, $fileDestination);
        $sql= "UPDATE utente SET Immagine = ? WHERE CF = ? ;";
        $stmt= mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../my-account.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $imgname, $utente["CF"]);
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

    $_SESSION["Tipo"]=$type;
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
    $sql= "SELECT *, a.ID_A id FROM annuncio a JOIN stati s ON a.ID_A=s.ID_A
    LEFT OUTER JOIN acquista ac ON ac.ID_A=a.ID_A WHERE a.CF= ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
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

    eliminaAnnunciEliminato($conn, $utente["CF"]);

    header("location: ../backend/logout.inc.php");
}

function eliminaAnnunciEliminato($conn, $utente)
{
    $sql= "UPDATE stati SET Stato = 'eliminato' WHERE CF =  ?  ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $utente);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function fetchValutazione($conn, $cf1, $cf2, $ida)
{
    $sql= "SELECT * FROM valutazione WHERE CF1 = ? AND CF2=? AND ID_A=? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
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

function fetchValutazioni($conn, $cf)
{
    $sql= "SELECT count(*) n, avg(Serietà) s, avg(Puntualità) p  FROM valutazione WHERE CF2=? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
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

function fetchTopVenditori($conn)
{
    $sql= 'SELECT v.CF2, count(*) n, avg(Serietà) s, avg(Puntualità) p, u.Nome, u.Cognome, u.Tipo, u.Immagine,
    (avg(Serietà)+avg(Puntualità))/2 av, ((avg(Serietà)+avg(Puntualità))/2)*count(*) val
    FROM valutazione v JOIN utente u ON v.CF2=u.CF
    WHERE u.Tipo= "Venditore" AND TipoValutante= "Acquirente" OR u.Tipo= "Venditore e Acquirente" AND TipoValutante= "Acquirente"
    GROUP BY v.CF2 ORDER BY val DESC ;';
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }

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

function valuta($conn, $cf1, $cf2, $ida, $serieta, $puntualita, $tipo)
{
    $sql= "INSERT INTO valutazione (CF1, CF2, ID_A, Serietà, Puntualità, TipoValutante) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssiiis", $cf1, $cf2, $ida, $serieta, $puntualita, $tipo);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../my-account.php?error=none");
}

function erroreValutazione($serieta, $puntualita)
{
    $risultato;
    if ($serieta=="#" || $puntualita=="#") {
        $risultato=true;
    } else {
        $risultato=false;
    }
    return $risultato;
}
