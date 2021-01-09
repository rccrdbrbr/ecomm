<?php

  require_once 'dbh.inc.php';
  require_once 'functions/functions-product-list.inc.php';

  $sottocategorie = fetchCategorie($conn);

  while ($row = mysqli_fetch_assoc($sottocategorie)) {
      echo '<a href="product-list.php?subcategory='.$row["Sottocategoria"].'">'.$row["Sottocategoria"].'</a>';
  }
