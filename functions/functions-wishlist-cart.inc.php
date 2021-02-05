<?php

function fetchOsservati($conn, $cf)
{
    $sql= "SELECT * FROM annuncio a JOIN prodotto p ON a.ID_P=p.ID_P JOIN osserva o ON o.ID_A=a.ID_A WHERE o.CF= ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../wishlist.php?error=stmtfailed");
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

function fetchOsservatiCat($conn, $cf, $cat)
{
    $sql= "SELECT * FROM annuncio a JOIN prodotto p ON a.ID_P=p.ID_P JOIN osserva o ON o.ID_A=a.ID_A WHERE o.CF= ? AND p.Categoria= ?;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../wishlist.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $cf, $cat);
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

function deleteWish($conn, $cf, $ida)
{
    $sql= "DELETE FROM osserva WHERE CF = ? AND ID_A = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../wishlist.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $cf, $ida);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../wishlist.php");
}

function addCart($conn, $ida)
{
    //session_start();
    $idai= intval($ida);
    if (array_search($idai, $_SESSION["Carrello"]) === false) {
        array_push($_SESSION["Carrello"], $idai);
    }


    //header("location: ../cart.php");
}

function contaOsservati($conn, $cf)
{
    $sql= "SELECT COUNT(*) AS n FROM osserva WHERE CF = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../wishlist.php?error=stmtfailed");
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
    //header("location: ../wishlist.php");
}

function fetchCarrello($conn, $ida)
{
    $sql= "SELECT * FROM annuncio a JOIN prodotto p ON a.ID_P=p.ID_P JOIN stati s ON s.ID_A=a.ID_A WHERE a.ID_A= ? AND s.Stato= 'in vendita' ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../wishlist.php?error=stmtfailed");
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

function rimuoviCarrello($ida)
{
    $idai= intval($ida);
    $index= array_search($idai, $_SESSION["Carrello"]);
    if ($index !== false) {
        unset($_SESSION["Carrello"][$index]);
    }
    header("location: ../cart.php");
}

function buyCart($conn, $cf, $ida)
{
    $metodo="di persona";
    $conferma=1;
    $sql= "INSERT INTO acquista (CF, ID_A, MetodoPagamento, Conferma) VALUES (?, ?, ?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cart.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sisi", $cf, $ida, $metodo, $conferma);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    //header("location: ../index.php?error=none");
}

function cambiaStato($conn, $ida)
{
    //$data=date('Y-m-d');
    //$del="eliminato";
    $sql= "UPDATE stati s JOIN annuncio a ON s.ID_A=a.ID_A SET Stato = 'venduto' WHERE s.ID_A = ? AND Stato = 'in vendita';";
    $stmt= mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cart.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $ida);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    //header("location: ../index.php?error=none");
}

function aggiungiOsserva($conn, $cf, $ida)
{
    $sql= "INSERT INTO osserva (CF, ID_A) VALUES (?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../product-detail.php?id=".$ida."&error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $cf, $ida);
    mysqli_stmt_execute($stmt);

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("statusCode"=>200));
    } else {
        echo json_encode(array("statusCode"=>201));
    }

    mysqli_stmt_close($stmt);
    //header("location: ../product-detail.php?id=".$ida."");
}
