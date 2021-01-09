<?php

  //$cat=$_GET["category"];

  require_once 'dbh.inc.php';
  require_once 'functions/functions-product-list.inc.php';

  if (isset($_GET["category"])) {
      $annunci = fetchAnnunciCat($conn, $_GET["category"]);
      if ($annunci == true) {
          while ($row = mysqli_fetch_assoc($annunci)) {
              echo '<div class="col-md-4">';
              echo  '<div class="product-item">';
              echo  '<div class="product-title">';
              echo  '<a href="product-detail.php?id='.$row["ID_A"].'">'.$row["Nome_A"].'</a>';

              echo  '</div>';
              echo  '<div class="product-image">';
              echo  '<a href="product-detail.html">';
              echo  '<img src="img/'.$row["Foto"].'" width="300" height="300" alt="Product Image">';
              echo  '</a>';
              echo  '<div class="product-action">';
              echo  '<a href="backend/add-cart.inc.php?id='.$row["ID_A"].'"><i class="fa fa-cart-plus"></i></a>';
              echo  '<a href="backend/add-wishlist.inc.php?id='.$row["ID_A"].'"><i class="fa fa-heart"></i></a>';
              echo  '<a href="product-detail.php?id='.$row["ID_A"].'"><i class="fa fa-search"></i></a>';
              echo  '</div>';
              echo  '</div>';
              echo  '<div class="product-price">';
              echo  '<h3><span>€</span>'.$row["Prezzo"].'</h3>';
              echo  '<a class="btn" href="backend/add-cart.inc.php?id='.$row["ID_A"].'"><i class="fa fa-shopping-cart"></i>Carrello</a>';
              echo  '</div>';
              echo  '</div>';
              echo  '</div>';
          }
      } else {
          echo "<p>Nessun prodotto nella categoria selezionata!";
      }
  } elseif (isset($_GET["subcategory"])) {
      $annunci = fetchAnnunciSubcat($conn, $_GET["subcategory"]);
      if ($annunci == true) {
          while ($row = mysqli_fetch_assoc($annunci)) {
              echo '<div class="col-md-4">';
              echo  '<div class="product-item">';
              echo  '<div class="product-title">';
              echo  '<a href="product-detail.php?id='.$row["ID_A"].'">'.$row["Nome_A"].'</a>';

              echo  '</div>';
              echo  '<div class="product-image">';
              echo  '<a href="product-detail.html">';
              echo  '<img src="img/'.$row["Foto"].'" width="300" height="300" alt="Product Image">';
              echo  '</a>';
              echo  '<div class="product-action">';
              echo  '<a href="backend/add-cart.inc.php?id='.$row["ID_A"].'"><i class="fa fa-cart-plus"></i></a>';
              echo  '<a href="backend/add-wishlist.inc.php?id='.$row["ID_A"].'"><i class="fa fa-heart"></i></a>';
              echo  '<a href="product-detail.php?id='.$row["ID_A"].'"><i class="fa fa-search"></i></a>';
              echo  '</div>';
              echo  '</div>';
              echo  '<div class="product-price">';
              echo  '<h3><span>€</span>'.$row["Prezzo"].'</h3>';
              echo  '<a class="btn" href="backend/add-cart.inc.php?id='.$row["ID_A"].'"><i class="fa fa-shopping-cart"></i>Carrello</a>';
              echo  '</div>';
              echo  '</div>';
              echo  '</div>';
          }
      } else {
          echo "<p>Nessun prodotto nella sottocategoria selezionata!";
      }
  } else {
      $annunci = fetchAnnunci($conn);

      if ($annunci == true) {
          while ($row = mysqli_fetch_assoc($annunci)) {
              echo '<div class="col-md-4">';
              echo  '<div class="product-item">';
              echo  '<div class="product-title">';
              echo  '<a href="product-detail.php?id='.$row["ID_A"].'&cf='.$row["CF"].'">'.$row["Nome_A"].'</a>';

              echo  '</div>';
              echo  '<div class="product-image">';
              echo  '<a href="product-detail.php?id='.$row["ID_A"].'&cf='.$row["CF"].'">';
              echo  '<img src="img/'.$row["Foto"].'" width="300" height="300" alt="Product Image">';
              echo  '</a>';
              echo  '<div class="product-action">';
              echo  '<a href="backend/add-cart.inc.php?id='.$row["ID_A"].'"><i class="fa fa-cart-plus"></i></a>';
              echo  '<a href="backend/add-wishlist.inc.php?id='.$row["ID_A"].'"><i class="fa fa-heart"></i></a>';
              echo  '<a href="product-detail.php?id='.$row["ID_A"].'&cf='.$row["CF"].'"><i class="fa fa-search"></i></a>';
              echo  '</div>';
              echo  '</div>';
              echo  '<div class="product-price">';
              echo  '<h3><span>€</span>'.$row["Prezzo"].'</h3>';
              echo  '<a class="btn" href="backend/add-cart.inc.php?id='.$row["ID_A"].'"><i class="fa fa-shopping-cart"></i>Carrello</a>';
              echo  '</div>';
              echo  '</div>';
              echo  '</div>';
          }
      } else {
          echo "<p>Nessun prodotto presente!";
      }
  }
