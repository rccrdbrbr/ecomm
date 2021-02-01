<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$ida=$_GET["id"];

require_once "dbh.inc.php";
require_once "../functions/functions-wishlist-cart.inc.php";

addCart($conn, $ida);
