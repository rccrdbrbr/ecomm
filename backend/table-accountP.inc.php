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
      ?>
      <div class="col-md-12">
      <h3>Annunci Pubblicati</h3>
      </div>
      <div class="table-responsive">
      <table class="table table-bordered">
      <thead class="thead-dark">
      <tr>
      <th>No</th>
      <th>Nome Annuncio</th>
      <th>Data Scadenza</th>
      <th>Prezzo</th>
      <th>Stato</th>
      <?php
      if (!isset($_GET["cf"])) {
          ?>
          <th>Valuta/Modifica</th>
          <?php
      } ?>
      </tr>
      </thead>
      <tbody>
      <?php
      $i=1;
      while ($row = mysqli_fetch_assoc($annunciP)) {
          ?>
          <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row["Nome_A"] ?></td>
          <td><?php echo $row["DataFine"] ?></td>
          <td><?php echo $row["Prezzo"] ?> €</td>
          <td><?php echo $row["Stato"] ?></td>
          <?php
          if (!isset($_GET["cf"])) {
              if ($row["Stato"] === "in vendita") {
                  ?>
                  <form action="modify.php?id=<?php echo $row["id"] ?>" method="post">
                  <td><button class="btn" type="submit" name="modifica" formmethod="post">Modifica</button></td>
                  </form>
                  <?php
              } elseif ($row["Stato"] === "venduto") {
                  ?>
                  <form action="evaluation.php?id=<?php echo  $row["ID_A"].'&cf='.$row["CF"]?>" method="post">
                  <td><button class="btn" type="submit" name="valutaA" formmethod="post">Valuta</button></td>
                  </form>
                  <?php
              } else {
                  echo '<td></td>';
              }
          }

          echo'</tr>';
          $i+=1;
      } ?>
      </tbody>
      </table>
      </div>
      <?php
  }
