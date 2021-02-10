<?php

if (isset($_SESSION["CF"])) {
    $cf=$_SESSION["CF"];

    require_once 'dbh.inc.php';
    require_once 'functions/functions-wishlist-cart.inc.php';

    $osservati=fetchOsservati($conn, $cf);
    $i = mysqli_num_rows($osservati);

    //echo $i;
    echo json_encode($i);
    return $i;
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
