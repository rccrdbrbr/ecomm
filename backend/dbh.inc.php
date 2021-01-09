<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "mercatino";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connessione fallita: " .mysqli_connect_error());
}
