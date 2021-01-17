<?php

//session_start();

$cf=$_SESSION["CF"];

require_once 'dbh.inc.php';
require_once 'functions/functions-wishlist-cart.inc.php';

if (isset($_GET["category"])) {
    $osservati=fetchOsservatiCat($conn, $cf, $_GET["category"]);
    if ($osservati == true) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-dark">';
        echo '<tr>';
        echo '<th>Annunci</th>';
        echo '<th>Pezzo</th>';
        echo '<th>Carrello</th>';
        echo '<th>Rimuovi</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody class="align-middle">';
        while ($row = mysqli_fetch_assoc($osservati)) {
            echo '<tr>';
            echo '<td>';
            echo '<div class="img">';
            echo '<a href="product-detail.php?id='.$row["ID_A"].'"><img src="img/'.$row["Foto"].'" alt="Image"></a>';
            echo '<p>'.$row["Nome_A"].'</p>';
            echo '</div>';
            echo '</td>';
            echo '<td>€'.$row["Prezzo"].'</td>';
            //          echo '<form action="backend/actions-wishlist.inc.php" method="post">';
            //echo '<td><a href="backend/add-cart.inc.php?id='.$row["ID_A"].'"><button id = "cart" name="cart" class="btn-cart">Carrello</button></a></td>';
            echo '<td><button id = "cart" name="cart" class="btn-cart">Carrello</button></td>';
            echo '<td><a href="backend/delete-wishlist.inc.php?id='.$row["ID_A"].'"><button name="delete"><i class="fa fa-trash"></i></button></a></td>';
            //          echo '</form>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo "<p>Non hai nessun prodotto osservato di questa categoria!</p>";
    }
} else {
    $osservati=fetchOsservati($conn, $cf);
    if ($osservati == true) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-dark">';
        echo '<tr>';
        echo '<th>Annunci</th>';
        echo '<th>Pezzo</th>';
        echo '<th>Carrello</th>';
        echo '<th>Rimuovi</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody class="align-middle">';
        while ($row = mysqli_fetch_assoc($osservati)) {
            echo '<tr>';
            echo '<td>';
            echo '<div class="img">';
            echo '<a href="product-detail.php?id='.$row["ID_A"].'"><img src="img/'.$row["Foto"].'" alt="Image"></a>';
            echo '<p>'.$row["Nome_A"].'</p>';
            echo '</div>';
            echo '</td>';
            echo '<td>€'.$row["Prezzo"].'</td>';
//          echo '<form action="backend/actions-wishlist.inc.php" method="post">';
            //echo '<td><a href="backend/add-cart.inc.php?id='.$row["ID_A"].'"><button id = "cart" name="cart" class="btn-cart">Carrello</button></a></td>';
            echo '<td><button id = "cart" name="cart" class="btn-cart" onclick="add_cart()">Carrello</button></td>';
            //echo '<td><a href="backend/delete-wishlist.inc.php?id='.$row["ID_A"].'"><button name="delete"><i class="fa fa-trash"></i></button></a></td>';
            echo '<td><button name="delete"><i class="fa fa-trash"></i></button></td>';
//          echo '</form>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo "<p>Non hai nessun prodotto osservato!</p>";
    }
}
?>
<script type="text/javascript">
function add_cart(){
  var cf = $(row["ID_A"]);
  alert("" + cf + "");
}
</script>
