<?php

  require_once 'dbh.inc.php';
  require_once 'functions/functions-product-list.inc.php';

  $annunci = fetchAnnunci($conn);

while ($row = mysqli_fetch_assoc($annunci)) {
    if (isset($_SESSION["CF"])) {
        if ($row["TipoA"]=="pubblico" || $row["TipoA"]=="ristretto" && $row["AreaGeo"]==$_SESSION["Regione"]) {
            ?>
    <div class="product-item">
      <div class="product-title">
        <a href="product-detail.php?id=<?php echo $row["ID_A"].'&cf='.$row["CF"] ?>"><?php echo $row["Nome_A"] ?></a>
      </div>
    <div class="product-image">
      <a href="product-detail.php?id=<?php echo $row["ID_A"].'&cf='.$row["CF"] ?>">
        <img src="img/<?php echo $row["Foto"] ?>" width="300" height="300" alt="Product Image">
      </a>
      <div class="product-action">
        <a href="backend/add-cart.inc.php?id=<?php echo $row["ID_A"] ?>"><i class="fa fa-cart-plus"></i></a>
        <a href="backend/add-wishlist.inc.php?id=<?php echo $row["ID_A"] ?>"><i class="fa fa-heart"></i></a>
        <a href="product-detail.php?id=<?php echo $row["ID_A"].'&cf='.$row["CF"] ?>"><i class="fa fa-search"></i></a>
      </div>
    </div>
      <div class="product-price">
        <h3><span>€</span><?php echo $row["Prezzo"] ?></h3>
        <a class="btn" href="backend/add-cart.inc.php?id=<?php echo $row["ID_A"] ?>"><i class="fa fa-shopping-cart"></i>Carrello</a>
      </div>
    </div>
    <?php
        }
    } elseif (!isset($_SESSION["CF"]) && $row["TipoA"]=="pubblico") {
        ?>
  <div class="product-item">
    <div class="product-title">
      <a href="product-detail.php?id=<?php echo $row["ID_A"].'&cf='.$row["CF"] ?>"><?php echo $row["Nome_A"] ?></a>
    </div>
  <div class="product-image">
    <a href="product-detail.php?id=<?php echo $row["ID_A"].'&cf='.$row["CF"] ?>">
      <img src="img/<?php echo $row["Foto"] ?>" width="300" height="300" alt="Product Image">
    </a>
    <div class="product-action">
      <a href="backend/add-cart.inc.php?id=<?php echo $row["ID_A"] ?>"><i class="fa fa-cart-plus"></i></a>
      <a href="backend/add-wishlist.inc.php?id=<?php echo $row["ID_A"] ?>"><i class="fa fa-heart"></i></a>
      <a href="product-detail.php?id=<?php echo $row["ID_A"].'&cf='.$row["CF"] ?>"><i class="fa fa-search"></i></a>
    </div>
  </div>
    <div class="product-price">
      <h3><span>€</span><?php echo $row["Prezzo"] ?></h3>
      <a class="btn" href="backend/add-cart.inc.php?id=<?php echo $row["ID_A"] ?>"><i class="fa fa-shopping-cart"></i>Carrello</a>
    </div>
  </div>
  <?php
    }
}
