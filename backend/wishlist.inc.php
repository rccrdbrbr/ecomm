<?php

//session_start();

$cf=$_SESSION["CF"];

require_once 'dbh.inc.php';
require_once 'functions/functions-wishlist-cart.inc.php';

if (isset($_GET["category"])) {
    $osservati=fetchOsservatiCat($conn, $cf, $_GET["category"]);
    if ($osservati == true) {
        ?>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>Annunci</th>
                <th>Pezzo</th>
                <th>Carrello</th>
                <th>Rimuovi</th>
              </tr>
            </thead>
            <tbody class="align-middle">
              <?php
              while ($row = mysqli_fetch_assoc($osservati)) {
                  ?>
              <tr>
                <td>
                  <div class="img">
                    <a href="product-detail.php?id=<?php echo $row["ID_A"] ?>">
                      <img src="img/<?php echo $row["Foto"] ?>" alt="Image"></a>
                    <p><?php echo $row["Nome_A"] ?></p>
                  </div>
                </td>
                <td>€ <?php echo $row["Prezzo"] ?></td>
                <td><button id = "cart" name="cart" class="btn-cart">Carrello</button></td>
                <td><a href="backend/delete-wishlist.inc.php?id=<?php echo $row["ID_A"] ?>">
                  <button name="delete"><i class="fa fa-trash"></i></button></a></td>
                </tr>
                <?php
              } ?>
            </tbody>
          </table>
        </div>
        <?php
    } else {
        ?>
        <p>Non hai nessun prodotto osservato di questa categoria!</p>
        <?php
    }
} else {
    $osservati=fetchOsservati($conn, $cf);
    if ($osservati == true) {
        ?>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>Annunci</th>
                <th>Pezzo</th>
                <th>Carrello</th>
                <th>Rimuovi</th>
              </tr>
            </thead>
            <tbody class="align-middle">
              <?php
              while ($row = mysqli_fetch_assoc($osservati)) {
                  ?>
              <tr>
                <td>
                  <div class="img">
                    <a href="product-detail.php?id=<?php echo $row["ID_A"] ?>">
                      <img src="img/<?php echo $row["Foto"] ?>" alt="Image"></a>
                    <p><?php echo $row["Nome_A"] ?></p>
                  </div>
                </td>
                <td>€ <?php echo $row["Prezzo"] ?></td>
                <td><button id = "cart" name="cart" class="btn-cart">Carrello</button></td>
                <td><button name="delete"><i class="fa fa-trash"></i></button></td>
              </tr>
              <?php
              } ?>
            </tbody>
          </table>
        </div>
        <?php
    } else {
        ?>
        <p>Non hai nessun prodotto osservato!</p>
        <?php
    }
}
