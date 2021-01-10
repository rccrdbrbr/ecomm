<?php

require_once 'dbh.inc.php';
require_once 'functions/functions-product-list.inc.php';

$annunci = fetchAnnunciRecenti($conn);
while ($row = mysqli_fetch_assoc($annunci)) {
    echo '<div class="col-lg-3">';
    echo '<div class="product-item">';
    echo '<div class="product-title">';
    echo '<a href="product-detail.php?id='.$row["ID_A"].'&cf='.$row["CF"].'">'.$row["Nome_A"].'</a>';
    echo '</div>';
    echo '<div class="product-image">';
    echo '<a href="product-detail.php?id='.$row["ID_A"].'&cf='.$row["CF"].'">';
    echo '<img src="img/'.$row["Foto"].'" alt="Product Image">';
    echo '</a>';
    echo '<div class="product-action">';
    echo '<a href="backend/add-cart.inc.php?id='.$row["ID_A"].'"><i class="fa fa-cart-plus"></i></a>';
    echo '<a href="backend/add-wishlist.inc.php?id='.$row["ID_A"].'"><i class="fa fa-heart"></i></a>';
    echo '<a href="product-detail.php?id='.$row["ID_A"].'&cf='.$row["CF"].'"><i class="fa fa-search"></i></a>';
    echo '</div>';
    echo '</div>';
    echo '<div class="product-price">';
    echo '<h3><span>$</span>'.$row["Prezzo"].'</h3>';
    echo '<a class="btn" href="backend/add-cart.inc.php?id='.$row["ID_A"].'"><i class="fa fa-shopping-cart"></i>Carrello</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
