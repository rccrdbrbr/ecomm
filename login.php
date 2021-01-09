<?php

include "common/header.php"

 ?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Login Start -->
        <form action="backend/login.inc.php" method="post">
        <div class="login">
          <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Codice Fiscale/E-mail</label>
                                    <input class="form-control" type="text" name="cf" placeholder="E-mail / Username">
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="pwd" placeholder="Password">
                                </div>
                                <div class="col-md-12">
                                  <?php

                                  if (isset($_GET["error"])) {
                                      if ($_GET["error"] == "emptyinput") {
                                          echo "<p>Riempi tutti i campi!</p>";
                                      } elseif ($_GET["error"] == "wronglogin") {
                                          echo "<p>Password e/o username errati!</p>";
                                      }
                                  }

                                  ?>
                                </div>


                                <div class="col-md-12">
                                    <button class="btn" type="submit" name="submit">Invia</button>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>


        <!-- Login End -->
        <?php

           include "common/footer.php"

        ?>
