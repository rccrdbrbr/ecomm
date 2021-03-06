<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET["id"]) and isset($_GET["cf"])) {
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
                                              ?>
                                              <h2><?php echo $annuncio["Nome_A"] ?></h2></div>
                                              <div class="price">
                                              <h4>Prezzo:</h4>
                                              <p>€ <?php echo $annuncio["Prezzo"] ?> </p>
                                              <?php
                                          } ?>



                                        </div>

                                        <?php
                                        if (isset($_SESSION["Tipo"])) {
                                            if ($_SESSION["Tipo"] !== "Venditore") {
                                                ?>
                                            <div class="action">
                                            <a class="btn" onclick="addWish(<?php echo $annuncio["ID_A"] ?>)">
                                            <i class="fa fa-heart"></i>Osserva</a>
                                            <a class="btn" onclick="addCart(<?php echo $annuncio["ID_A"] ?>)">
                                            <i class="fa fa-shopping-cart"></i>Carrello</a>
                                            </div>
                                            <?php
                                            }
                                        } ?>
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
                                          <li>Venditore: <a href='my-account.php?cf=<?php echo $annuncio["CF"] ?>'>
                                          <?php echo $annuncio["Nome"]. " " .$annuncio["Cognome"] ?> </a></li>
                                          <li>Prodotto <?php echo $annuncio["TipoP"] ?></li>
                                          <?php
                                          if ($annuncio["TipoP"] === "nuovo") {
                                              if ($annuncio["PeriodoAssicurazione"] > 0) {
                                                  ?>
                                              <li>L'assicurazione dura ancora <?php echo $annuncio["PeriodoAssicurazione"] ?> mesi</li>
                                              <?php
                                              }
                                          } else {
                                              ?>
                                            <li>Stato di usura: <?php echo $annuncio["StatoUsura"] ?></li>
                                            <li>Il prodotto è stato usato per <?php echo $annuncio["PeriodoUtilizzo"] ?> mesi</li>
                                            <?php
                                          } ?>
                                          <li>Categoria: <?php echo $annuncio["Categoria"] ?></li>
                                          <li>Sottocategoria <?php echo $annuncio["Sottocategoria"] ?></li>
                                          <li>Questo prodotto è osservato da <?php echo $nOsserva["n"] ?> persone</li>
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
                        <?php include "common/sidebar.php" ?>
                </div>
            </div>
        </div>
        <script src="js/buttons.js"></script>
<?php
  include "common/footer.php";
} else {
    header("location: product-list.php");
}
?>
