<?php

  require_once 'dbh.inc.php';
  require_once 'functions/functions-product-list.inc.php';

  $sottocategorie = fetchCategorie($conn);
  if ($sottocategorie!== false) {
      while ($row = mysqli_fetch_assoc($sottocategorie)) {
          echo '<a href="product-list.php?subcategory='.$row["Sottocategoria"].'">'.$row["Sottocategoria"].'</a>';
      }
  } else {
      ?>
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3>Non ci sono sottocategorie da mostrare!</h3>
        </div>
      </div>
  </div>
  <?php
  }
