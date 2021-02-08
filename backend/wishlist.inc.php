<?php

//session_start();

$cf=$_SESSION["CF"];
$_SESSION["table"]=array();

require_once 'dbh.inc.php';
require_once 'functions/functions-wishlist-cart.inc.php';

if (isset($_GET["category"])) {
    $osservati=fetchOsservatiCat($conn, $cf, $_GET["category"]);
    if ($osservati == true) {
        //$i=1;?>
        <div class="table-responsive">
          <table class="table table-bordered" id="WishTable">
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
                <td><button id = "cart" name="cart" class="btn-cart" onclick="addCart(<?php echo $row["ID_A"] ?>)">
                  Carrello</button></td>
                <td><button name="delete" onclick="deleteWish(<?php echo $row["ID_A"].",".$i ?>)"><i class="fa fa-trash">
                </i></button></a></td>
                </tr>
                <?php
                //$i+=1;
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
        $i=array(); ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="WishTable">
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
                  array_push($_SESSION["table"], $row["ID_A"]); ?>
              <tr>
                <td>
                  <div class="img">
                    <a href="product-detail.php?id=<?php echo $row["ID_A"] ?>">
                      <img src="img/<?php echo $row["Foto"] ?>" alt="Image"></a>
                    <p><?php echo $row["Nome_A"] ?></p>
                  </div>
                </td>
                <td>€ <?php echo $row["Prezzo"] ?></td>
                <td><button id = "cart" name="cart" class="btn-cart" onclick="addCart(<?php echo $row["ID_A"] ?>)">
                  Carrello</button></td>
                <td><button name="delete" onclick="deleteWish(<?php echo $row["ID_A"].",".array_search($row["ID_A"], $_SESSION["table"]) ?>)"><i class="fa fa-trash">
                  </i></button></td>
              </tr>
              <?php
              } ?>
            </tbody>
          </table>
            <?php //var_dump($_SESSION["table"]);
        //unset($_SESSION["table"][1]);
        //echo "<br>";
        //$_SESSION["table"]=array_values($_SESSION["table"]);
        //var_dump($_SESSION["table"]);?>
        </div>
        <?php
    } else {
        ?>
        <p>Non hai nessun prodotto osservato!</p>
        <?php
    }
}
