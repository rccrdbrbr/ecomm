<?php
session_start();


if (isset($_SESSION["CF"])) {
    include "common/header.php"; ?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Osservati</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Wishlist Start -->
        <div class="wishlist-page">
            <div class="container-fluid">
                <div class="wishlist-page-inner">
                    <div class="row">
                        <div class="col-md-8">
                                    <?php include "backend/wishlist.inc.php" ?>
                        </div>
                        <div class="col-lg-4 sidebar">
                            <div class="sidebar-widget category">
                                <h2 class="title">Categorie</h2>
                                <nav class="navbar bg-light">
                                    <ul class="navbar-nav">
                                      <li class="nav-item">
                                          <a class="nav-link" href="wishlist.php?category=Elettrodomestici"><i class="fa fa-microchip"></i>Elettrodomestici</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="wishlist.php?category=Foto e video"><i class="fa fa-mobile-alt"></i>Foto e video</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="wishlist.php?category=Abbigliamento"><i class="fa fa-tshirt"></i>Abbigliamento</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="wishlist.php?category=Hobby"><i class="fa fa-child"></i>Hobby</a>
                                      </li>
                                    </ul>
                                </nav>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist End -->
<?php
} else {
        header("location: index.php");
    }
include "common/footer.php"

 ?>
