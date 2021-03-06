<?php

function fetchAnnunci($conn)
{
    $sql= "SELECT a.ID_A, a.Nome_A, p.ID_P, a.CF, p.Foto, a.Prezzo, Stato, a.Tipo TipoA, AreaGeo, count(o.CF) n
    FROM annuncio a JOIN prodotto p ON a.ID_P=p.ID_P JOIN stati s ON s.ID_A=a.ID_A LEFT OUTER JOIN osserva o ON o.ID_A=a.ID_A
    WHERE Stato='in vendita'
    GROUP BY a.ID_A, p.ID_P
    ORDER BY n DESC;";
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

function fetchAnnunciRecenti($conn)
{
    $sql= "SELECT a.ID_A, a.Nome_A, p.ID_P, a.CF, p.Foto, a.Prezzo, Stato, a.Tipo TipoA, AreaGeo
    FROM annuncio a JOIN prodotto p ON a.ID_P=p.ID_P JOIN stati s ON s.ID_A=a.ID_A
    WHERE Stato='in vendita' ORDER BY DataPubb DESC;";
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

function contaOsserva($conn, $ida)
{
    $sql= "SELECT COUNT(*) as n FROM osserva o WHERE o.ID_A= ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $ida);
    mysqli_stmt_execute($stmt);

    $dati= mysqli_stmt_get_result($stmt);

    if ($num= mysqli_fetch_assoc($dati)) {
        return $num;
    } else {
        $risultato= false;
        return $risultato;
    }

    mysqli_stmt_close($stmt);
}

function fetchAnnuncio($conn, $ida)
{
    $sql= "SELECT *, p.Tipo AS TipoP FROM annuncio a JOIN prodotto p ON a.ID_P=p.ID_P
    JOIN utente u ON a.CF=u.CF WHERE a.ID_A= ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $ida);
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

function fetchAnnunciCat($conn, $cat)
{
    $sql= "SELECT a.ID_A, a.Nome_A, p.ID_P, a.CF, p.Foto, a.Prezzo, Stato, a.Tipo TipoA, AreaGeo, count(o.CF) n
    FROM annuncio a JOIN prodotto p ON a.ID_P=p.ID_P JOIN stati s ON s.ID_A=a.ID_A LEFT OUTER JOIN osserva o ON o.ID_A=a.ID_A
    WHERE Categoria=? AND Stato='in vendita'
    GROUP BY a.ID_A, p.ID_P
    ORDER BY n DESC;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $cat);
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

function fetchAnnunciSubcat($conn, $subcat)
{
    $sql= "SELECT  a.ID_A, a.Nome_A, p.ID_P, a.CF, p.Foto, a.Prezzo, Stato, a.Tipo TipoA, AreaGeo, count(o.CF) n
    FROM annuncio a JOIN prodotto p ON a.ID_P=p.ID_P JOIN stati s ON s.ID_A=a.ID_A LEFT OUTER JOIN osserva o ON o.ID_A=a.ID_A
    WHERE Sottocategoria=? AND Stato='in vendita'
    GROUP BY a.ID_A, p.ID_P
    ORDER BY n DESC;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $subcat);
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

function fetchAnnunciProv($conn, $prov)
{
    $sql= "SELECT  a.ID_A, a.Nome_A, p.ID_P, a.CF, p.Foto, a.Prezzo, Stato, a.Tipo TipoA, AreaGeo, count(o.CF) n
    FROM annuncio a JOIN prodotto p ON a.ID_P=p.ID_P JOIN stati s ON s.ID_A=a.ID_A LEFT OUTER JOIN osserva o ON o.ID_A=a.ID_A
    WHERE Provincia=? AND Stato='in vendita'
    GROUP BY a.ID_A, p.ID_P
    ORDER BY n DESC;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $prov);
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

function fetchCategorie($conn)
{
    $sql= "SELECT DISTINCT  Sottocategoria FROM categoria c NATURAL JOIN prodotto p
    JOIN annuncio a ON p.ID_P=a.ID_P JOIN stati s ON s.ID_A=a.ID_A
    WHERE stato='in vendita';";
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
