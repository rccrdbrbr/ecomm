<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//$_SESSION["Totale"]=0;

require_once 'dbh.inc.php';
require_once 'functions/functions-wishlist-cart.inc.php';

if (!empty($_SESSION["Carrello"])) {
    ?>

<div class="col-lg-8">
    <div class="cart-page-inner">
        <div class="table-responsive">
          <p id="p"></p>
            <table class="table table-bordered" id="cartTable">
                <thead class="thead-dark">
                    <tr>
                        <th>Annunci</th>
                        <th>Prezzo</th>


                        <th>Rimuovi</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
<?php

foreach ($_SESSION["Carrello"] as $ida) {
    $elemento= fetchCarrello($conn, $ida);
    if ($elemento ==  true) {
        ?>
    <tr id="row<?php echo $elemento["ID_A"] ?>">
        <td>
            <div class="img">
                <a href="product-detail.php?id=<?php echo $elemento["ID_A"]; ?>&cf=<?php echo $elemento["CF"]; ?>"><img src="img/<?php echo $elemento["Foto"]; ?>" alt="Image"></a>
                <p><?php echo $elemento["Nome_A"]; ?></p>
            </div>
        </td>
        <td>€<?php echo $elemento["Prezzo"]; ?></td>


        <td><a onclick="deleteCart(<?php echo $elemento["ID_A"]; ?>)"><button><i class="fa fa-trash"></i></button></td>
    </tr>
    <?php
    }
} ?>
</tbody>
</table>
</div>
</div>
</div>
<?php
} else {
    ?>
    <div class="col-lg-8">
    <div class="cart-page-inner">
    <p>Non hai nessun prodotto nel carrello!</p>
    </div>
    </div>
    <?php
}
