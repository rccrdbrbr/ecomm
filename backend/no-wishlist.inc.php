<?php

function fetchOsservatin($conn, $cf)
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

function fetchOsservatiCatn($conn, $cf, $cat)
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

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["CF"])) {
    if (isset($_SESSION["Categoria"])) {
        $cf=$_SESSION["CF"];
        $cat=$_SESSION["Categoria"];

        require_once 'dbh.inc.php';

        $osservati=fetchOsservatiCatn($conn, $cf, $cat);
        if ($osservati == true) {
            $i = mysqli_num_rows($osservati);
            echo json_encode($i);
        } else {
            echo 0;
        }
        unset($_SESSION["Categoria"]);
    } else {
        $cf=$_SESSION["CF"];

        require_once 'dbh.inc.php';
        //require_once 'functions/functions-wishlist-cart.inc.php';

        $osservati=fetchOsservatin($conn, $cf);
        if ($osservati == true) {
            $i = mysqli_num_rows($osservati);
            echo json_encode($i);
        } else {
            echo 0;
        }
        //echo $i;
    //return $i;
    }
}

    /*if (contaOsservati($conn, $cf) !== false) {
        $conta=contaOsservati($conn, $cf);
        echo $conta["n"];
    //echo json_encode($conta);
    } else {
        echo "0";
    }
} else {
    echo "0";
}*/
