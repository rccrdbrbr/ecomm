<?php

include "common/header.php"

 ?>


        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Annunci</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="product-search">
                                                <input type="email" placeholder="Cerca">
                                                <button><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-short">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Ordina per</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">Più Nuovi</a>
                                                        <a href="#" class="dropdown-item">Più Popolari</a>
                                                        <a href="#" class="dropdown-item">Più venduti</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-price-range">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Fascia di Prezzo</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">€0 to €50</a>
                                                        <a href="#" class="dropdown-item">€51 to €100</a>
                                                        <a href="#" class="dropdown-item">€101 to €150</a>
                                                        <a href="#" class="dropdown-item">€151 to €200</a>
                                                        <a href="#" class="dropdown-item">€201 to €250</a>
                                                        <a href="#" class="dropdown-item">€251 to €300</a>
                                                        <a href="#" class="dropdown-item">€301 to €350</a>
                                                        <a href="#" class="dropdown-item">€351 to €400</a>
                                                        <a href="#" class="dropdown-item">€401 to €450</a>
                                                        <a href="#" class="dropdown-item">€451 to €500</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php

                            include "backend/product-list.inc.php";

                              ?>

                        </div>

                        <!-- Pagination Start -->
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Precedente</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#" tabindex="0">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" tabindex="+1">Prossima</a>
                                    </li>
                                </ul>
                            </nav>
                      </div>
                        <!-- Pagination Start -->
                    </div>

                    <!-- Side Bar Start -->
                    <?php include "common/sidebar.php" ?>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->
        <script src="js/buttons.js"></script>
        <?php

           include "common/footer.php"

        ?>
