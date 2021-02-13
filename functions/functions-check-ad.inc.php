<?php

function eliminaAnnunci($conn)
{
    $data=date('Y-m-d');
    $sql= "UPDATE stati s JOIN annuncio a ON s.ID_A=a.ID_A SET Stato = 'eliminato' WHERE DataFine < ? AND Stato = 'in vendita';";
    $stmt= mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $data);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function eliminaAnnunciOsservati($conn)
{
    $sql= "DELETE o FROM osserva o JOIN annuncio a ON o.ID_A=a.ID_A JOIN stati s ON s.ID_A=a.ID_A WHERE Stato <> 'in vendita' ;";
    $stmt= mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
