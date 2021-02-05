<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$c=0;

if (isset($_SESSION["Carrello"])) {
    $c = count($_SESSION["Carrello"]);
} else {
    echo $c;
    ;
};
