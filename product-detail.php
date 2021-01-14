<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET["id"]) and isset($_GET["cf"])) {
    if (!isset($_SESSION["CF"]) || $_GET["cf"] !== $_SESSION["CF"]) {
        include "backend/product-detail.inc.php";
        include "common/header.php"; ?>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="product-list.php">Annunci</a></li>
                    <li class="breadcrumb-item active">Dettagli Annuncio</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                  <div class="slider-nav-img">
                                    <?php
                                    echo '<img src="img/'.$annuncio["Foto"].'" width="300" height="300" alt="Product Image">'; ?>

                                  </div>

                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title">
                                          <?php
                                          if (isset($_GET["id"])) {
                                              echo "<h2>".$annuncio["Nome_A"]."</h2></div>";
                                              echo '<div class="price">';
                                              echo "<h4>Prezzo:</h4>";
                                              echo "<p>€".$annuncio["Prezzo"]." </p>";
                                          } ?>



                                        </div>


                                        <div class="action">
                                          <a class="btn" href="backend/add-wishlist.inc.php?id=<?php echo $_GET["id"]; ?>">
                                            <i class="fa fa-heart"></i>Osserva</a>
                                            <a class="btn" href="backend/add-cart.inc.php?id=<?php echo $_GET["id"]; ?>"><i class="fa fa-shopping-cart"></i>Carrello</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Descrizione</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Specifiche</a>
                                    </li>

                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Descrizione</h4>
                                        <?php
                                        echo "<p>".$annuncio["Descrizione"]."</p>"; ?>

                                    </div>
                                    <div id="specification" class="container tab-pane fade">
                                        <h4>Specifiche</h4>
                                        <ul>
                                          <?php
                                          echo "<li>Venditore: <a href='my-account.php?cf=".$annuncio["CF"]."'>".$annuncio["Nome"]. " " .$annuncio["Cognome"]." </a></li>";
        echo "<li>Prodotto ".$annuncio["Tipo"]."</li>";
        if ($annuncio["Tipo"] === "nuovo") {
            if ($annuncio["PeriodoAssicurazione"] > 0) {
                echo "<li>L'assicurazione dura ancora ".$annuncio["PeriodoAssicurazione"]." mesi</li>";
            }
        } else {
            echo "<li>Stato di usura: ".$annuncio["StatoUsura"]."</li>";
            echo "<li>Il prodotto è stato usato per ".$annuncio["PeriodoUtilizzo"]." mesi</li>";
        }
        echo "<li>Categoria: ".$annuncio["Categoria"]."</li>";
        echo "<li>Sottocategoria ".$annuncio["Sottocategoria"]."</li>";
        echo "<li>Questo prodotto è osservato da ".$nOsserva["n"]." persone</li>"; ?>


                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="product">
                            <div class="section-header">
                                <h1>Annunci Popolari</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">
                              <?php

                              include "backend/featured-products.inc.php"

                               ?>

                               </div>




                        </div>

                        </div>
                        <!-- Side Bar Start -->
                        <?php include "common/sidebar.php" ?>
                        <!-- Side Bar End -->
                        </div>

                  </div>

                  </div>

          <!-- Product Detail End -->

<?php

  include "common/footer.php";
    } else {
        header("location: product-list.php");
    }
} else {
    header("location: product-list.php");
}
?>
