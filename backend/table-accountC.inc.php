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
    ?>
    <div class="col-md-12">
    <h3>Annunci Comprati</h3>
    </div>
    <div class="table-responsive">
    <table class="table table-bordered">
    <thead class="thead-dark">
    <tr>
    <th>No</th>
    <th>Nome Annuncio</th>
    <th>Data Acquisto</th>
    <th>Prezzo</th>
    <th>Metodo di Pagamento</th>
    <?php
    if (!isset($_GET["cf"])) {
        ?>
        <th>Valuta Venditore</th>
        <?php
    } ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    while ($row = mysqli_fetch_assoc($annunciC)) {
        ?>
        <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row["Nome_A"] ?></td>
        <td><?php echo $row["DataAcquisto"] ?></td>
        <td><?php echo $row["Prezzo"] ?> €</td>
        <td><?php echo $row["MetodoPagamento"] ?></td>
        <?php
        if (!isset($_GET["cf"])) {
            ?>
            <form action="evaluation.php?id=<?php echo  $row["ID_A"].'&cf='.$row["CF"]?>" method="post">
            <td><button class="btn" type="submit" name="valuta" formmethod="post">Valuta</button></td>
            </form>
            <?php
        }
        echo'</tr>';
        $i+=1;
    } ?>
    </tbody>
    </table>
    </div>
    <?php
}
