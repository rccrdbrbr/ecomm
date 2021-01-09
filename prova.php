<?php
session_start();
/*
$vettore=array();
foreach ($_SESSION["Carrello"] as $key) {
    $ida= intval($key);
    array_push($vettore, $ida);
}*/
  var_dump($_SESSION["Carrello"]);
  echo $_SESSION["Totale"];
  echo "<br>";
  if (!empty($_SESSION['Carrello'])) {
      echo "Vuoto";
  } else {
      echo "Pieno";
  }

  //var_dump($vettore);
