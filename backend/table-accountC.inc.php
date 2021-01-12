<?php

if (isset($_GET["cf"])) {
    $cf=$_GET["cf"];
} else {
    $cf= $_SESSION["CF"];
}

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
    if (!isset($_GET["cf"])) {
        echo '<th>Valuta Venditore</th>';
    }
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
        if (!isset($_GET["cf"])) {
            echo '<form action="evaluation.php?id='.$row["ID_A"].'&cf='.$row["CF"].'" method="post">';
            echo '<td><button class="btn" type="submit" name="valuta" formmethod="post">Valuta</button></td>';
            echo '</form>';
        }
        echo'</tr>';
        $i+=1;
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}
