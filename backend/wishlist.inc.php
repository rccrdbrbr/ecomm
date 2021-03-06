<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cf=$_SESSION["CF"];

require_once 'dbh.inc.php';
require_once 'functions/functions-wishlist-cart.inc.php';

if (isset($_GET["category"])) {
    $osservati=fetchOsservatiCat($conn, $cf, $_GET["category"]);
    $_SESSION["Categoria"]=$_GET["category"];
    if ($osservati == true) { ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="WishTable">
            <thead class="thead-dark">
              <p id="p"></p>
              <tr>
                <th>Annunci</th>
                <th>Pezzo</th>
                <th>Carrello</th>
                <th>Rimuovi</th>
              </tr>
            </thead>
            <tbody class="align-middle">
              <?php
              $i=0;
        while ($row = mysqli_fetch_assoc($osservati)) {
            ?>
              <tr id="row<?php echo $row["ID_A"] ?>">
                <td>
                  <div class="img">
                    <a href="product-detail.php?id=<?php echo $row["ID_A"] ?>&cf=<?php echo $row["CF"] ?>">
                      <img src="img/<?php echo $row["Foto"] ?>" alt="Image"></a>
                    <p><?php echo $row["Nome_A"] ?></p>
                  </div>
                </td>
                <td>€ <?php echo $row["Prezzo"] ?></td>
                <td><button id = "cart<?php echo $row["ID_A"] ?>" name="cart" class="btn-cart" onclick="addCart(<?php echo $row["ID_A"] ?>)">
                  Carrello</button></td>
                <td><button id="delete<?php echo $row["ID_A"] ?>" name="delete" onclick="deleteWish(<?php echo $row["ID_A"] ?>)"><i class="fa fa-trash">
                </i></button></a></td>
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
    if ($osservati == true) { ?>
        <div class="table-responsive" >
          <table class="table table-bordered" id="WishTable">
            <thead class="thead-dark">
              <p id="p"></p>
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
              <tr id="row<?php echo $row["ID_A"] ?>">
                <td>
                  <div class="img">
                    <a href="product-detail.php?id=<?php echo $row["ID_A"] ?>&cf=<?php echo $row["CF"] ?>">
                      <img src="img/<?php echo $row["Foto"] ?>" alt="Image"></a>
                    <p><?php echo $row["Nome_A"] ?></p>
                  </div>
                </td>
                <td>€ <?php echo $row["Prezzo"] ?></td>
                <td><button id = "cart<?php echo $row["ID_A"] ?>" name="cart" class="btn-cart" onclick="addCart(<?php echo $row["ID_A"] ?>)">
                  Carrello</button></td>
                <td><button id="delete<?php echo $row["ID_A"] ?>" name="delete" onclick="deleteWish(<?php echo $row["ID_A"]?>)"><i class="fa fa-trash">
                  </i></button></td>
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
