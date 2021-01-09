<?php

session_start();

//$_SESSION["CF"]=new String();
$ida=$_GET["id"];

require_once "dbh.inc.php";
require_once "../functions/functions-wishlist-cart.inc.php";

addCart($conn, $ida);
