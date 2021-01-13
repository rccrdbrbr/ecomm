<?php

if (isset($_GET["cf"])) {
    $cf=$_GET["cf"];
} else {
    $cf= $_SESSION["CF"];
}

  require_once 'dbh.inc.php';
  require_once 'functions/functions-account-query.inc.php';

  $annunciP = fetchAnnunciP($conn, $cf);


  if ($annunciP == true) {
      echo '<div class="col-md-12">';
      echo '<h3>Annunci Pubblicati</h3>';
      echo '</div>';
      echo '<div class="table-responsive">';
      echo '<table class="table table-bordered">';
      echo '<thead class="thead-dark">';
      echo '<tr>';
      echo '<th>No</th>';
      echo '<th>Nome Annuncio</th>';
      echo '<th>Data Scadenza</th>';
      echo '<th>Prezzo</th>';
      echo '<th>Stato</th>';
      if (!isset($_GET["cf"])) {
          echo '<th>Valuta/Modifica</th>';
      }
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      $i=1;
      while ($row = mysqli_fetch_assoc($annunciP)) {
          echo '<tr>';
          echo    '<td>'.$i.'</td>';
          echo    '<td>'.$row["Nome_A"].'</td>';
          echo    '<td>'.$row["DataFine"].'</td>';
          echo    '<td>'.$row["Prezzo"].' €</td>';
          echo    '<td>'.$row["Stato"].'</td>';
          if (!isset($_GET["cf"])) {
              if ($row["Stato"] === "venduto") {
                  echo '<form action="evaluation.php?id='.$row["ID_A"].'&cf='.$row["CF"].'" method="post">';
                  echo '<td><button class="btn" type="submit" name="valuta" formmethod="post">Valuta</button></td>';
                  echo '</form>';
              //echo '<td><a href="evaluation.php?id='.$row["ID_A"].'&cf='.$row["CF"].'"><button class="btn" type="submit" name="valutaA">Valuta</button></a></td>';
              } elseif ($row["Stato"] === "in vendita") {
                  echo '<form action="modify.php?id='.$row["ID_A"].'&cf='.$row["CF"].'" method="post">';
                  echo '<td><button class="btn" type="submit" name="modifica" formmethod="post">Modifica</button></td>';
                  echo '</form>';
              } else {
                  echo    '<td></td>';
              }
          }

          echo'</tr>';
          $i+=1;
      }
      echo '</tbody>';
      echo '</table>';
      echo '</div>';
  }
