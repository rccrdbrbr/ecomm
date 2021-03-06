<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
  include 'backend/check-ad.inc.php';

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E Store</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">


        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        support@email.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +012-345-6789
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->

        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">

                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <a href="product-list.php" class="nav-item nav-link">Annunci</a>
                            <?php if (isset($_SESSION["CF"])) {
     if ($_SESSION["Tipo"]!== "Venditore") {   ?>
                            <a href="wishlist.php" class="nav-item nav-link" >Osservati</a>
                            <a href="cart.php" class="nav-item nav-link">Carrello</a>

                          <?php if ($_SESSION["Tipo"]=== "Venditore e Acquirente") {
         ?>
                            <a href="create-ad.php" class="nav-item nav-link">Crea Annuncio</a>
                            <?php
     }
                         } else {
                             ?>
                            <a href="create-ad.php" class="nav-item nav-link">Crea Annuncio</a>
                            <?php
                         }
 } ?>

                        </div>
                              <div class="navbar-nav ml-auto">
                                <div class="nav-item dropdown">
                                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>
                                  <div class="dropdown-menu">
                                    <?php

                                    if (isset($_SESSION["CF"])) {
                                        ?>
                                    <a href="my-account.php" class="dropdown-item">Profilo</a>
                                    <a href="backend/logout.inc.php" class="dropdown-item">Logout</a>
                                    <?php
                                    } else {
                                        ?>
                                    <a href="login.php" class="dropdown-item">Login</a>
                                    <a href="signup.php" class="dropdown-item">Registrati</a>
                                    <?php
                                    }
                                  ?>
                                  </div>
                                </div>
                              </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="wishlist.php" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span id="nwish"></span>
                            </a>
                            <a href="cart.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span id="ncart"></span>
                                <script src=""="js/buttons.js"></script>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar End -->
