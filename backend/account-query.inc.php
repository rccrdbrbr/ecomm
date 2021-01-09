<?php


    $cf= $_SESSION["CF"];

    require_once 'dbh.inc.php';
    require_once 'functions/functions-account-query.inc.php';

    $utente = fetchInfo($conn, $cf);
    //$annunciP = fetchAnnunci($conn, $cf);
