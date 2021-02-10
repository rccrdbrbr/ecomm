<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

  unset($_SESSION["Carrello"]);

  $_SESSION["Carrello"]= array();
  //header("location: ../cart.php");
  exit();
