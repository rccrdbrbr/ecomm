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
                            <?php

                            include "backend/product-list.inc.php";

                              ?>
                        </div>
                    </div>

                    <!-- Side Bar Start -->
                    <?php include "common/sidebar.php" ?>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <script src="js/buttons.js"></script>
        <!-- Product List End -->
        <?php

           include "common/footer.php"

        ?>
