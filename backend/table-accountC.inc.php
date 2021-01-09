<?php

  $cf= $_SESSION["CF"];

  require_once 'dbh.inc.php';
  require_once 'functions/functions-account-query.inc.php';

  $annunciC = fetchAnnunciC($conn, $cf);

if ($annunciC == true) {
    echo '<div class="col-md-12">';
    echo '<h3>Annunci Comprati</h3>';
    echo '</div>';
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th>No</th>';
    echo '<th>Nome Annuncio</th>';
    echo '<th>Data Acquisto</th>';
    echo '<th>Prezzo</th>';
    echo '<th>Metodo di Pagamento</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $i=1;
    while ($row = mysqli_fetch_assoc($annunciC)) {
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$row["Nome_A"].'</td>';
        echo '<td>'.$row["DataAcquisto"].'</td>';
        echo '<td>'.$row["Prezzo"].' €</td>';
        echo '<td>'.$row["MetodoPagamento"].'</td>';

        echo'</tr>';
        $i+=1;
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}
