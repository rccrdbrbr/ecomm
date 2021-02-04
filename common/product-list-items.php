<div class="col-md-4">
  <div class="product-item">
    <div class="product-title">
      <a href="product-detail.php?id=<?php echo $row["ID_A"].'&cf='.$row["CF"] ?>"><?php echo $row["Nome_A"] ?></a>
    </div>
    <div class="product-image">
      <a href="product-detail.php?id=<?php echo $row["ID_A"].'&cf='.$row["CF"] ?>">
        <img src="img/<?php echo $row["Foto"] ?>" width="300" height="300" alt="Product Image">
      </a>
      <div class="product-action">
<<<<<<< Updated upstream
        <a href="backend/add-cart.inc.php?id=<?php echo $row["ID_A"] ?>"><i class="fa fa-cart-plus"></i></a>
        <a href="backend/add-wishlist.inc.php?id=<?php echo $row["ID_A"] ?>"><i class="fa fa-heart"></i></a>
=======
<<<<<<< Updated upstream
        <a href="backend/add-cart.inc.php?id=<?php echo $row["ID_A"] ?>"><i class="fa fa-cart-plus"></i></a>
        <a href="backend/add-wishlist.inc.php?id=<?php echo $row["ID_A"] ?>"><i class="fa fa-heart"></i></a>
=======
        <button id = "cart2" name="cart2" class="btn" value="<?php echo $row["ID_A"] ?>"><i class="fa fa-cart-plus"></i></button>
        <button id = "wish" name="cart2" class="btn" value="<?php echo $row["ID_A"] ?>" onclick="addWish"><i class="fa fa-heart"></i></button>
>>>>>>> Stashed changes
>>>>>>> Stashed changes
        <a href="product-detail.php?id=<?php echo $row["ID_A"].'&cf='.$row["CF"] ?>"><i class="fa fa-search"></i></a>
      </div>
    </div>
    <div class="product-price">
      <h3><span>€</span><?php echo $row["Prezzo"] ?></h3>
<<<<<<< Updated upstream
      <a class="btn" href="backend/add-cart.inc.php?id=<?php echo $row["ID_A"] ?>"><i class="fa fa-shopping-cart"></i>Carrello</a>
=======
<<<<<<< Updated upstream
      <a class="btn" href="backend/add-cart.inc.php?id=<?php echo $row["ID_A"] ?>"><i class="fa fa-shopping-cart"></i>Carrello</a>
=======
      <button id = "cart2" name="cart2" class="btn" value="<?php echo $row["ID_A"] ?>"><i class="fa fa-shopping-cart"></i>Carrello</button>
>>>>>>> Stashed changes
>>>>>>> Stashed changes
    </div>
  </div>
</div>
