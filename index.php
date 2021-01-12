<?php

include "common/header.php"

 ?>

        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php"><i class="fa fa-shopping-bag"></i>Più Visti</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?category=Elettrodomestici"><i class="fa fa-microchip"></i>Elettrodomestici</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?category=Foto e video"><i class="fa fa-mobile-alt"></i>Foto e video</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?category=Abbigliamento"><i class="fa fa-tshirt"></i>Abbigliamento</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?category=Hobby"><i class="fa fa-child"></i>Hobby</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item">
                                <img src="img/elettrodomestici.jpg" alt="Slider Image" width="600" height="400"/>
                                <div class="header-slider-caption">
                                    <p>Guarda i migliori elettrodomestici in vendita</p>
                                    <a class="btn" href="product-list.php?category=Elettrodomestici"><i class="fa fa-shopping-cart"></i>Compra ora</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/fotovideo.jpeg" alt="Slider Image" width="600" height="400"/>
                                <div class="header-slider-caption">
                                    <p>I migliori prodotti per immortalare i tuoi ricordi</p>
                                    <a class="btn" href="product-list.php?category=Foto e video"><i class="fa fa-shopping-cart"></i>Compra ora</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/abbigliamento.jpg" alt="Slider Image" width="600" height="400"/>
                                <div class="header-slider-caption">
                                    <p>I capi d'abbigliamento più di tendenza del momento</p>
                                    <a class="btn" href="product-list.php?category=Abbigliamento"><i class="fa fa-shopping-cart"></i>Compra ora</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/hobby.jpg" alt="Slider Image" width="600" height="400"/>
                                <div class="header-slider-caption">
                                    <p>Tutti gli articoli necessari per coltivare i tuoi hobby</p>
                                    <a class="btn" href="product-list.php?category=Hobby"><i class="fa fa-shopping-cart"></i>Compra ora</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main Slider End -->

        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Annunci Popolari</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
        <!-- Feature Start-->
        <?php include 'backend/featured-products.inc.php' ?>

        <!-- Feature End-->
        </div>
        </div>
        </div>

        <!-- Recent Start-->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Annunci Recenti</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
        <?php include 'backend/recent-products.inc.php' ?>
        <!-- Recent End-->
        </div>
        </div>
        </div>

        <!-- Review Start -->
        <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                  <?php include "backend/evaluations-slider.inc.php"; ?>      
                </div>
            </div>
        </div>
        <!-- Review End -->
<?php

   include "common/footer.php"

?>
