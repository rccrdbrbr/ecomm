<?php

session_start();


if (isset($_SESSION["CF"])) {
    include "common/header.php"; ?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Carrello</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">

                  <?php include 'backend/cart.inc.php'; ?>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Riepilogo</h1>
                                            <p >Subtotale<span id="subtot"><!--€<?php echo $_SESSION["Totale"]; ?>--></span></p>
                                            <p>Spese di spedizione<span>€0</span></p>
                                            <h2 >Totale<span id="tot"><!--€<?php echo $_SESSION["Totale"]; ?>--></span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            <button onclick="emptyCart()">Svuota</button>
                                            <button onclick="buyCart()">Compra</button>
                                            <p id="pcart"></p>
                                            <!--<button>Comra</button>
                                            <button>Compra</button> <button>Compra</button> <button>Compra</button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/buttons.js"></script>
        <script src="js/eventHandlerCart.js"></script>
        <!-- Cart End -->
        <?php
} else {
        header("location: index.php");
    }
           include "common/footer.php"

        ?>
