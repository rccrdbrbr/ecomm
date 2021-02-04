<?php

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
    header("location: ../product-detail.php?id=".$ida."");
}
